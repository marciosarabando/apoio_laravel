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

    public function equipamentos()
    {
        return $this->belongsToMany(Equipamento::class);
    }

    public function existeEquipamento($equipamento)
    {
      if (is_string($equipamento))
      {
        $equipamento = Equipamento::where('marca_modelo','=',$equipamento)->firstOrFail();
      }
      return (boolean) $this->equipamento()->find($equipamento->id);
    }

    public function vinculaEquipamento($equipamento)
    {
        /*
        if (is_string($equipamento))
        {
            $equipamento = Equipamento::where('marca_modelo','=',$equipamento)->firstOrFail();
        }

        if($this->existeEquipamento($equipamento))
        {
            return;
        }
        */

        //Adiciona o Equipamento usando a função equipamento com o método Attach passando o Obj Equipamento
        return $this->equipamentos()->attach($equipamento);
    }
}
