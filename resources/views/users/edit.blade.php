@extends('layouts.app')
@section('content')

    @if (count($errors) > 0)
        @include('shared.errors')
    @endif



     <script>
          function myFunction() {
              var selectedValue=document.getElementById("inputTipoSocio").value;

              if(selectedValue != "P") {
                  document.getElementById("inputNrLicenca").style="display: none;"
                  document.getElementById("labelInputNrLicenca").style="display: none;"
                  document.getElementById("labelInputTipoLicenca").style="display: none;"
                  document.getElementById("inputTipoLicenca").style="display: none;"
                  document.getElementById("labelAluno").style="display: none;"
                  document.getElementById("inputAluno").style="display: none;"
                  document.getElementById("labelInstrutor").style="display: none;"


                  document.getElementById("inputInstrutor").style="display: none;"



                  document.getElementById("labelValidadeLicenca").style="display: none;"
                  document.getElementById("validade_licenca").style="display: none;"
                  document.getElementById("labelInputLicencaConfirmada").style="display: none;"
                  document.getElementById("inputLicencaConfirmada1").style="display: none;"
                  document.getElementById("inputLicencaConfirmada2").style="display: none;"
                  document.getElementById("labelCopia").style="display: none;"
                  document.getElementById("hrefDownload").style="display: none;"
                  document.getElementById("hrefDownload1").style="display: none;"
                  document.getElementById("inputNrCertificado").style="display: none;"
                  document.getElementById("labelNrCertificado").style="display: none;"

                  document.getElementById("classe_certificado").style="display: none;"
                  document.getElementById("labelCertificado").style="display: none;"

                  document.getElementById("validade_certificado").style="display: none;"
                  document.getElementById("inputValidadeCertificado").style="display: none;"


                  document.getElementById("labelCertificadoConfirmado").style="display: none;"
                  document.getElementById("inputCertificadoConfirmado").style="display: none;"

                  document.getElementById("inputCertificadoPorConfirmar").style="display: none;"
                  document.getElementById("naoConfirmado").style="display: none;"

                  document.getElementById("confirmado").style="display: none;"
                  document.getElementById("confirmado1").style="display: none;"
                  document.getElementById("naoConfirmado1").style="display: none;"

                  document.getElementById("labelCopia1").style="display: none;"
                  document.getElementById("hrefDownload2").style="display: none;"
                  document.getElementById("hrefDownload3").style="display: none;"
                  document.getElementById("file_certificado").style="display: none;"
                  document.getElementById("file_licenca").style="display: none;"



                  document.getElementById("inputNrLicenca").value=null;
                  document.getElementById("inputTipoLicenca").value=null;

                  document.getElementById("inputAluno").value=null;


                  document.getElementById("inputInstrutor").value=null;




                  document.getElementById("validade_licenca").value=null;
                  document.getElementById("inputLicencaConfirmada1").value=null;
                  document.getElementById("inputLicencaConfirmada2").value=null;


                  document.getElementById("hrefDownload").value=null;
                  document.getElementById("hrefDownload1").value=null;
                  document.getElementById("inputNrCertificado").value=null;


                  document.getElementById("classe_certificado").value=null;


                  document.getElementById("validade_certificado").value=null;
                  document.getElementById("inputValidadeCertificado").value=null;


                  document.getElementById("inputCertificadoConfirmado").value=null;

                  document.getElementById("inputCertificadoPorConfirmar").value=null;




                  document.getElementById("hrefDownload2").value=null;
                  document.getElementById("hrefDownload3").value=null;
                  document.getElementById("file_certificado").value=null;
                  document.getElementById("file_licenca").value=null;





              }else{
                  document.getElementById("labelInputNrLicenca").style="display: ?;"
                  document.getElementById("inputNrLicenca").style="display: ?;"
                  document.getElementById("labelInputTipoLicenca").style="display: ?;"
                  document.getElementById("inputTipoLicenca").style="display: ?;"
                  document.getElementById("labelAluno").style="display: ?;"
                  document.getElementById("inputAluno").style="display: ?;"
                  document.getElementById("inputInstrutor").style="display: ?;"
                  document.getElementById("labelInstrutor").style="display: ?;"
                  document.getElementById("labelValidadeLicenca").style="display: ?;"
                  document.getElementById("validade_licenca").style="display: ?;"
                  document.getElementById("labelInputLicencaConfirmada").style="display: ?;"
                  document.getElementById("inputLicencaConfirmada1").style="display: ?;"
                  document.getElementById("inputLicencaConfirmada2").style="display: ?;"
                  document.getElementById("labelCopia").style="display: ?;"
                  document.getElementById("hrefDownload").style="display: ?;"
                  document.getElementById("hrefDownload1").style="display: ?;"
                  document.getElementById("inputNrCertificado").style="display: ?;"
                  document.getElementById("labelNrCertificado").style="display: ?;"

                  document.getElementById("classe_certificado").style="display: ?;"
                  document.getElementById("labelCertificado").style="display: ?;"

                  document.getElementById("validade_certificado").style="display: ?;"
                  document.getElementById("inputValidadeCertificado").style="display: ?;"

                  document.getElementById("labelCertificadoConfirmado").style="display: ?;"
                  document.getElementById("inputCertificadoConfirmado").style="display: ?;"

                  document.getElementById("inputCertificadoPorConfirmar").style="display: ?;"
                  document.getElementById("naoConfirmado").style="display: ?;"
                  document.getElementById("naoConfirmado1").style="display: ?;"

                  document.getElementById("confirmado").style="display: ?;"
                  document.getElementById("confirmado1").style="display: ?;"

                  document.getElementById("labelCopia1").style="display: ?;"
                  document.getElementById("hrefDownload2").style="display: ?;"
                  document.getElementById("hrefDownload3").style="display: ?;"
                  document.getElementById("file_certificado").style="display: ?;"
                  document.getElementById("file_licenca").style="display: ?;"

              }
          }
      </script>






    <form method="POST" action="{{route('socios.update', $user->id)}}" enctype="multipart/form-data">
        @method('PUT')
        @csrf

        <input type="hidden" value="{{$user->id}}" name="id">

        <div>
        @if($user->foto_url!=null)
            <img src="{{Storage::url('public/fotos'.'/'.$user->foto_url)}}">
        @else

        @endif
        </div>

        <br>

        <div>
            <label for="num_socio">Número de socio</label>
            <input id="num_socio" type="text" name="num_socio" value="{{ $user->num_socio }}" >
        </div>

        <div>
            <label for="inputName">Nome Completo</label>
            <input type="text" name="name" id="inputName" placeholder="Name" value="{{ $user->name }}">
        </div>

        <div>
            <label for="inputNomeInformal">Nome Informal</label>
            <input type="text" name="nome_informal" id="inputNomeInformal" placeholder="NomeInformal" value="{{$user->nome_informal}}">
        </div>
        <div>
            <label for="inputSexo">Sexo</label>
            <select name="sexo" id="inputSexo" >
                <option value="F" @if((Auth::user()->can('socio_normal',App\User::class))) {{ ($user->sexo=="F")? "selected" : "disabled" }} @else
                    {{ ($user->sexo=="F")? "selected" : "" }}
                        @endif
                          >Feminino</option>
                <option value="M" @if((Auth::user()->can('socio_normal',App\User::class))) {{ ($user->sexo=="M")? "selected" : "disabled" }}@else
                    {{ ($user->sexo=="M")? "selected" : "" }}
                        @endif
                        >Masculino</option>
            </select>
        </div>


        <div>
            <label >Data nascimento</label>
            <input type="date" name="data_nascimento" format="YYYY-MM-DD" value="{{$user->data_nascimento}}">
        </div>

        <div>
            <label for="inputEmail">Email</label>
            <input type="email" name="email" id="inputEmail" placeholder="Email" value="{{old('email', $user->email)}}">
        </div>

        <div>
            <label for="inputNif">NIF</label>
            <input type="text" name="nif" id="inputNif" placeholder="Nif" value="{{$user->nif}}">
        </div>

        <div>
            <label for="inputTelefone">Telefone</label>
            <input type="text" name="telefone" id="inputTelefone" placeholder="Telefone" value="{{$user->telefone}}">
        </div>
        <div>
            <label for="inputTipoSocio">Tipo de Sócio </label>
            <select name="tipo_socio" id="inputTipoSocio" onchange="myFunction()">
                <option value="P" @if((Auth::user()->can('socio_normal',App\User::class))) {{($user->tipo_socio=="P")? "selected" : "disabled" }} @endif
                @if((Auth::user()->can('socio_direcao',App\User::class))) {{($user->tipo_socio=="P")? "selected" : "" }} @endif>Piloto</option>
                <option value="NP"@if((Auth::user()->can('socio_normal',App\User::class))) {{($user->tipo_socio=="NP")? "selected" : "disabled" }} @endif
                @if((Auth::user()->can('socio_direcao',App\User::class))) {{($user->tipo_socio=="NP")? "selected" : "" }} @endif>Não Piloto</option>
                <option value="A" @if((Auth::user()->can('socio_normal',App\User::class))) {{($user->tipo_socio=="A")? "selected" : "disabled" }} @endif
                @if((Auth::user()->can('socio_direcao',App\User::class))) {{($user->tipo_socio=="A")? "selected" : "" }} @endif>Aeromodelista</option>
            </select>
        </div>

        <div>
            <label for="inputQuotaPaga"  >Quotas em dia</label>
            <input type="radio" name="quota_paga" value="1" @if((Auth::user()->can('socio_normal',App\User::class))) {{ ($user->quota_paga=="1")? "checked" : "disabled" }} @else
                {{ ($user->quota_paga=="1")? "checked" : "" }}
                    @endif  > Sim
            <input type="radio" name="quota_paga" value="0" @if((Auth::user()->can('socio_normal',App\User::class))) {{ ($user->quota_paga=="0")? "checked" : "disabled" }} @else
                {{ ($user->quota_paga=="0")? "checked" : "" }}
                    @endif> Não
        </div>
        {{--    @can('socio_Direcao', Auth::User())
    <div>

                <form method="POST" action="{{action('UserController@quotaPaga', $user->id)}}">
                    @csrf

                    <input type="hidden" name="_method" value="PATCH">
                    <input type="hidden" name="quota_paga" value="{{$user->quota_paga}}">
                    @if($user->quota_paga==1)
                        <input class="btn btn-xs btn-primary" type="submit" value="Paga">
                    @else
                        <input class="btn btn-xs btn-primary" type="submit" value="Por pagar">
                    @endif
                </form>

            </div>
            @endcan
--}}
        <div>
            <label for="inputEndereco">Endereço</label>
            <textarea type="text" name="endereco" id="inputEndereco">{{$user->endereco}} </textarea>
        </div>

        <div>
            <label for="inputAtivo">Sócio Ativo</label>
            <input type="radio" name="ativo" value="1" @if((Auth::user()->can('socio_normal',App\User::class))) {{ ($user->ativo=="1")? "checked" : "disabled" }} @else
                {{ ($user->ativo=="1")? "checked" : "" }}
                @endif  > Sim
        <input type="radio" name="ativo" value="0" @if((Auth::user()->can('socio_normal',App\User::class))) {{ ($user->ativo=="0")? "checked" : "disabled" }}  @else
            {{ ($user->ativo=="0")? "checked" : "" }}
                @endif > Não

        </div>

        <div>
            <label for="inputDirecao">Direção</label>
            <input type="radio" name="direcao"  value="1" @if((Auth::user()->can('socio_normal',App\User::class))) {{ ($user->direcao=="1")? "checked" : "disabled" }} @else
                {{ ($user->direcao=="1")? "checked" : "" }}
                    @endif > Sim
            <input type="radio" name="direcao" value="0" @if((Auth::user()->can('socio_normal',App\User::class))) {{ ($user->direcao=="0")? "checked" : "disabled" }} @else
                {{ ($user->direcao=="0")? "checked" : "" }}
                    @endif> Não

        </div>

        <div>
            <label for="file_foto">Foto</label>
            <input type="file" name="file_foto">
        </div>


        @can('socio_DP', Auth::user())



            <div>
                <label id="labelInputNrLicenca" for="inputNrLicenca" @if ($user->tipo_socio!="P") style="display: none;" @endif> Número de licença </label>
                <input type="text" name="num_licenca" id="inputNrLicenca" @if ($user->tipo_socio!="P") style="display: none;" @endif value="{{$user->num_licenca}}">
            </div>


            <div>
                <label id="labelInputTipoLicenca"for="inputTipoLicenca" @if ($user->tipo_socio!="P") style="display: none;" @endif>Tipo de licença</label>
                <select name="tipo_licenca" id="inputTipoLicenca" @if ($user->tipo_socio!="P") style="display: none;" @endif>
                    @foreach($licencas as $licenca)
                        <option id="inputTipoLicenca" value="{{$licenca->code}}" {{($user->tipo_licenca==$licenca->code)? "selected" : "" }} >{{$licenca->nome}}</option>
                    @endforeach

                </select>
            </div>



        <div>
            <label id="labelAluno"for="inputAluno" @if ($user->tipo_socio!="P") style="display: none;" @endif> Aluno </label>
            <input type="text" name="aluno" id="inputAluno" @if ($user->tipo_socio!="P") style="display: none;" @endif value="{{$user->aluno}}">

        </div>

        <div>
            <label id="labelInstrutor"for="inputInstrutor" @if ($user->tipo_socio!="P") style="display: none;" @endif> Instrutor </label>
            <input type="text" name="instrutor" id="inputInstrutor" @if ($user->tipo_socio!="P") style="display: none;" @endif value="{{$user->instrutor}}" >
        </div>

            <div>
                <label id="labelValidadeLicenca" @if ($user->tipo_socio!="P") style="display: none;" @endif>Validade da licença</label>
                <input id="validade_licenca"type="date" name="validade_licenca" @if ($user->tipo_socio!="P") style="display: none;" @endif value="{{$user->validade_licenca}}") >
            </div>

            <div>
                <label id="labelInputLicencaConfirmada"for="inputLicencaConfirmada" @if ($user->tipo_socio!="P") style="display: none;" @endif>Licença confirmada</label>
                <input id="inputLicencaConfirmada1" type="radio" name="licenca_confirmada" @if ($user->tipo_socio!="P") style="display: none;" @endif value="1" @if((Auth::user()->can('socio_piloto',App\User::class))) {{ ($user->licenca_confirmada=="1")? "checked" : "disabled" }}@else
                        {{ ($user->licenca_confirmada=="1")? "checked" : "" }}
                        @endif > <label id="confirmado1" @if ($user->tipo_socio!="P") style="display: none;" @endif>Sim</label>
                <input type="radio"id="inputLicencaConfirmada2" name="licenca_confirmada" @if ($user->tipo_socio!="P") style="display: none;" @endif value="0" @if((Auth::user()->can('socio_piloto',App\User::class))) {{ ($user->licenca_confirmada=="0")? "checked" : "disabled" }} @else
                    {{ ($user->licenca_confirmada=="0")? "checked" : "" }}
                        @endif > <label id="naoConfirmado1" @if ($user->tipo_socio!="P") style="display: none;" @endif>Não</label>

            </div>

            <div>
                <label id="labelCopia" for="" @if ($user->tipo_socio!="P") style="display: none;" @endif> Cópia digitial da licença </label>
                <a id="hrefDownload" @if ($user->tipo_socio!="P") style="display: none;" @endif href="{{route('licenca',$user->id)}}" class="btn btn-success mb-2" > Ver PDF</a>
                <a id="hrefDownload1" @if ($user->tipo_socio!="P") style="display: none;" @endif href="{{route('licenca_pdf',$user->id)}}" class="btn btn-success mb-2" > Download</a>
                <input type="file" name="file_licenca" id="file_licenca" @if ($user->tipo_socio!="P") style="display: none;" @endif>
            </div>

            <div>
                <label id="labelNrCertificado"for="inputNrCertificado" @if ($user->tipo_socio!="P") style="display: none;" @endif> Número de certificado </label>
                <input type="text" name="num_certificado" id="inputNrCertificado" @if ($user->tipo_socio!="P") style="display: none;" @endif @if((!Auth::user()->can('socio_piloto',App\User::class))) readonly @endif  value="{{$user->num_certificado}}">
            </div>

                <div>
                <label for="inputClasseCertificado" id="labelCertificado" @if ($user->tipo_socio!="P") style="display: none;" @endif>Classe do certificado </label>
                <select name="classe_certificado" id="classe_certificado" @if ($user->tipo_socio!="P") style="display: none;" @endif >
                    @foreach($classes as $classe)
                        <option id="inputClasseCertificado" value="{{$classe->code}}" {{($user->classe_certificado==$classe->code)? "selected" : "" }}>{{$classe->nome}}</option>
                    @endforeach


                </select>

                </div>

                <div>
                    <label id="validade_certificado" @if ($user->tipo_socio!="P") style="display: none;" @endif>Validade do certificado </label>
                    <input type="date" id="inputValidadeCertificado" name="validade_certificado" @if ($user->tipo_socio!="P") style="display: none;" @endif value="{{$user->validade_certificado}}" >
                </div>

                <div>
                    <label id="labelCertificadoConfirmado" for="inputCertificadoConfirmado" @if ($user->tipo_socio!="P") style="display: none;" @endif >Certificado confirmado</label>
                    <input  id="inputCertificadoConfirmado" type="radio" name="certificado_confirmado" @if ($user->tipo_socio!="P") style="display: none;" @endif value="1" @if((Auth::user()->can('socio_piloto',App\User::class))) {{ ($user->certificado_confirmado=="1")? "checked" : "disabled" }}@else
                        {{ ($user->certificado_confirmado=="1")? "checked" : "" }}
                            @endif   > <label id="confirmado" @if ($user->tipo_socio!="P") style="display: none;" @endif>Sim</label>
                    <input type="radio"id="inputCertificadoPorConfirmar" name="certificado_confirmado" @if ($user->tipo_socio!="P") style="display: none;" @endif value="0" @if((Auth::user()->can('socio_piloto',App\User::class))) {{ ($user->certificado_confirmado=="0")? "checked" : "disabled" }} @else
                        {{ ($user->certificado_confirmado=="0")? "checked" : "" }}
                            @endif  > <label id="naoConfirmado" @if ($user->tipo_socio!="P") style="display: none;" @endif >Não</label>

                </div>

                <div>
                    <label id="labelCopia1" @if ($user->tipo_socio!="P") style="display: none;" @endif> Cópia digital certificado </label>
                    <a id="hrefDownload2" @if ($user->tipo_socio!="P") style="display: none;" @endif href="{{route('certificado',$user->id)}}" class="btn btn-success mb-2" > Ver PDF</a>
                    <a id="hrefDownload3"  @if ($user->tipo_socio!="P") style="display: none;" @endif href="{{route('certificado_pdf',$user->id)}}" class="btn btn-success mb-2" > Download</a>
                    <input type="file" name="file_certificado" id="file_certificado" @if ($user->tipo_socio!="P") style="display: none;" @endif >
                 </div>


                  @endcan

              <div>
                  <button type="submit" class="btn btn-xs btn-primary"  name="ok">Save</button>
                  <button type="button" class="btn btn-primary" onclick="window.history.back();">Cancel</button>
              </div>
      </form>

    @can('socio_DP', Auth::user())

    <form method="POST" action="{{ action('UserController@sendReactivateEmail', $user->id) }}" >

        @csrf
        <button type="submit" class="btn btn-xs btn-primary" >Send Email</button>

    </form>

    @endcan

  @endsection