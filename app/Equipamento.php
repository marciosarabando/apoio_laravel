<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipamento extends Model
{
    protected $table = 'equipamentos';
    protected $fillable = ['tipo_id','marca_modelo','nr_serie', 'obs'];

    //Muitos para 1
    public function tipo_equipamento()
    {
        return $this->belongsTo('App\TipoEquipamento');
    }

    public function cautelas()
    {
        return $this->belongsToMany(Cautela::class);
    }
}
