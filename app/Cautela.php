<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cautela extends Model
{
    protected $table = 'cautelas';
    protected $fillable = ['equipamento_id','pessoa_id','dt_cautela','dt_descautela','obs'];

    //Equipamento
    //Relacionamento muitos para 1
    public function equipamento()
    {
        return $this->belongsTo('App\Equipamento');
    }

    //Pessoa
    //Relacionamento muitos para 1
    public function pessoa()
    {
        return $this->belongsTo('App\Pessoa');
    }
}
