<?php

namespace App\Http\Controllers;

use App\Http\Requests\AeronaveCreate;
use App\Http\Requests\AeronaveUpdate;
use App\Movimento;
use DB;
use App\Aeronave;
use App\AeronaveValores;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AeronaveController extends Controller
{
    private $matricula;

    public function index(){

        $this->authorize('listar', Auth::user());

        if(Auth::user()->can('socio_Direcao', Auth::user())) {
            $aeronaves = Aeronave::paginate(20)->appends([
                'matricula' => request('matricula'),
                'marca' => request('marca'),
                'num_lugares' => request('num_lugares'),
                'conta_horas' => request('conta_horas'),
                'preco_hora' => request('preco_hora'),
                ]);
            //meter paginate
        }elseif(Auth::user()->can('socio_Piloto', Auth::user())) {
            $aeronavesMatriculas= DB::table('aeronaves_pilotos')->select('matricula')->where('piloto_id',Auth::id())->pluck('matricula');
            foreach ($aeronavesMatriculas as $matricula){
                $aeronaves[]=Aeronave::findOrFail($matricula);
            }

        }else{
            $aeronaves = Aeronave::paginate(20)->appends([
                'matricula' => request('matricula'),
                'marca' => request('marca'),
                'num_lugares' => request('num_lugares'),
                'conta_horas' => request('conta_horas'),
                'preco_hora' => request('preco_hora'),
            ]);

        }

        $title= "Lista de Aeronaves";

        return view('aeronaves.list', compact('aeronaves', 'title'));

    }

    public function create(){
        $this->authorize('socio_Direcao',Auth::user());
        $title= "Adicionar aeronave";
        return view('aeronaves.create', compact('title'));
    }

    public function store(AeronaveCreate $request)
    {
        $this->authorize('socio_Direcao',Auth::user());
        if ($request->has('cancel')) {
            return redirect()->action('AeronaveController@index');
        }

        $aeronave=$request->all();

        $aeronave=Aeronave::create($aeronave);

        foreach(range(1,10) as $i){

           $aeronaveValores= new AeronaveValores();
           $aeronaveValores->fill($request->only('matricula', 'unidade_conta_horas', 'minutos', 'preco'));
           $aeronaveValores->unidade_conta_horas=$i;
           $aeronaveValores->minutos=$request->tempos[$i];
           $aeronaveValores->preco =$request->precos[$i];
           $aeronaveValores->save();

           /* Aeronave::findOrFail($request->matricula)->aeronaveValores()->create(['unidade_conta_horas' => $i,
                'minutos' => $request->tempos[$i-1], 'preco' => $request->precos[$i-1]])->except('id');*/
        }

       // $aeronave->preco_hora=Aeronave::findOrFail($request->matricula)->aeronaveValores()->select('preco')->where('unidade_conta_horas', 10)->value('preco');
        $aeronave->save();

        return redirect()->action('AeronaveController@index');
    }



    public function edit($matricula)
    {
        $this->authorize('socio_Direcao',Auth::user() );

        $title = "Editar Aeronave";
        $aeronave = Aeronave::findOrFail($matricula);

        $aeronaveValores= Aeronave::findOrFail($matricula)->aeronaveValores()->get()->toArray();


        return view('aeronaves.edit', compact('title', 'aeronave', 'aeronaveValores'));
    }


    public function update(AeronaveUpdate $request, $matricula){
        $this->authorize('socio_Direcao',Auth::user());

        if ($request->has('cancel')) {
            return redirect()->action('AeronaveController@index');
        }

        $aeronaveModel= Aeronave::findOrFail($matricula);
        $aeronaveModel->fill($request->except(['created_at', 'updated_at', 'deleted_at']));

        $aeronaveModel->save();


        $i=0;
        $conta=0;
        $linha=Aeronave::findOrFail($matricula)->aeronaveValores()->get();
        if(isset($request->precos)){
            foreach ($request->precos as $preco){
                    Aeronave::findOrFail($matricula)->aeronaveValores()->where('unidade_conta_horas',$i+1)->update(['preco'=> $request->precos[$i+1],'minutos'=> $request->tempos[$i+1] ]);
                    $i++;
            }
        }

      //  $aeronaveModel->preco_hora=Aeronave::findOrFail($request->matricula)->aeronaveValores()->select('preco')->where('unidade_conta_horas', 10)->value('preco');
        $aeronaveModel->save();





        return redirect()->action('AeronaveController@index');

    }


    public function destroy($matricula){

        $this->authorize('socio_Direcao', Auth::user());
        Aeronave::find($matricula)->aeronaveValores()->delete();
        $aeronave= Aeronave::findOrFail($matricula);
        $movimentosAssociados= DB::table('movimentos')->select('id')->where('aeronave',$matricula)->get();
        if($movimentosAssociados->isEmpty()){
            $aeronave->forceDelete();
        }
        else {
            $aeronave->delete(); // faz soft delete

        }

        return redirect()->action('AeronaveController@index');

    }

    public function pilotosAutorizados($matricula){
        $title = "Pilotos autorizados";

        $users= DB::table('users')->get();


        $pilotosAutorizados= Aeronave::findOrFail($matricula)->pilotosAutorizados()->where('matricula','=',$matricula)->get();



        $this->matricula=$matricula;

        $pilotosNaoAutorizados= DB::table('users')->whereNotIn('id', function ($query){
            $query->select('piloto_id')->from('aeronaves_pilotos')
                ->where('matricula', $this->matricula);


        })->get();

        return view('aeronaves.pilotosautorizados_list', compact('title', 'pilotosAutorizados', 'matricula', 'pilotosNaoAutorizados', 'users'));

    }

    public function addPilotoAutorizado($matricula, $piloto){

        DB::table('aeronaves_pilotos')->insert(['matricula'=>$matricula, 'piloto_id' =>$piloto]);
        return redirect()->back();
    }

    public function removePilotoAutorizado($matricula, $piloto){
        DB::table('aeronaves_pilotos')->where('matricula', $matricula)->where('piloto_id', $piloto)->delete();
        return redirect()->back();

    }


    public function precosTempos($matricula){
        $title= "Tempos e precos";
        $aeronaveValores= Aeronave::findOrFail($matricula)->aeronaveValores()->get()->toJson();
      
        return view('aeronaves.precoValores',compact('aeronaveValores', 'title', 'matricula'));

    }


    public function timeLine($matricula){

        $data_inf=request()->query('data_inf');
        $data_sup=request()->query('data_sup');



    $result=DB::table('movimentos')->where('aeronave', $matricula)->orderByRaw('data desc' )->get();

        if(isset($data_inf)){
            $result = $result->where('data','>=', $data_inf);
        }

        if(isset($data_sup)){
            $result = $result->where('data','<=', $data_sup);
        }

    return view('aeronaves.timeline ', compact('result', 'matricula'));



    }




}
