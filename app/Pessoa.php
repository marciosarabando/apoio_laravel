<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    protected $table = 'pessoas';
    protected $fillable = ['cargo_id','nome','secao','obs'];

    //Função para Retornar o Cargo Relacionado ao Registro na Base
    //Muitos para 1
    public function cargo()
    {
        return $this->belongsTo('App\Cargo');
    }

    //Relacionamento de Tipo de Equipamento usado por muitos Equipamentos
    //1 para muitos
    public function equipamentos()
    {
        return $this->belongsToMany(Equipamento::class);
    }
}
