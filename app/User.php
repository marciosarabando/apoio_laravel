<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cargo_id', 'perfil_id', 'secao_id', 'login', 'nm_guerra', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    //Função para Retornar o Cargo Relacionado ao Registro na Base
    //Muitos para 1
    public function cargo()
    {
        return $this->belongsTo('App\Cargo');
    }

    //Função para Retornar o Perfil Relacionado ao Registro na Base
    //Muitos para 1
    public function perfil()
    {
        return $this->belongsTo('App\Perfil');
    }

    //Função para Retornar o Secao Relacionado ao Registro na Base
    //Muitos para 1
    public function secao()
    {
        return $this->belongsTo('App\Secao');
    }
}
