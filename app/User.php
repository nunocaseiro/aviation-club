<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;



class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;
    use SoftDeletes;
    use RefreshDatabase;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */




    protected $table= 'users';

    protected $fillable=['name','email','password','num_socio','nome_informal','sexo','data_nascimento','nif','telefone','endereco','tipo_socio','quota_paga','ativo','direcao','num_licenca','tipo_licenca','instrutor','aluno','validade_licenca','licenca_confirmada','num_certificado','classe_certificado','validade_certificado','certificado_confirmado'];



    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];




    public function pilotosAeronaves(){
        return $this->hasMany('App\AeronavePilotos', 'id');
    }

      public function  movimentosUser(){
        return $this->hasMany('App\Movimento','id');
    }

    public function classeCertificados(){
        return $this->belongsToMany('App\ClassesCertificados' );
    }
    public function tiposLicencas(){
        return $this->belongsToMany('App\TiposLicencas' );
    }

    public function typeToStr()
    {
        switch ($this->tipo_socio) {
            case 'P':
                return 'Piloto';
            case 'NP':
                return 'Normal';
            case 'A':
                return 'Aeromodelista';
        }
        return 'Unknown';
    }
    public function isPiloto()
    {
        return $this->tipo_socio === 'P';
    }
    public function isNotPiloto()
    {
        return $this->tipo_socio === 'NP';
    }
    public function isAeromodelista()
    {
        return $this->tipo_socio === 'A';
    }
    public function isAtivo()
    {
        return $this->ativo === 1;
    }
    public function isInstrutor()
    {
        return $this->instrutor===1;
    }
    public function isAluno()
    {
        return $this->aluno===1;
    }
    public function isDirecao()
    {
        return $this->direcao===1;
    }

    public function isPasswordInicial()
    {
        return $this->password_inicial===1;
    }

  

    public function NotSoftDeleted(){
        return $this->deleted_at==null;
    }

    public function setPasswordAttribute($password)
    {
        if ( $password !== null & $password !== "" )
        {
            $this->attributes['password'] = bcrypt($password);
        }
    }


}
