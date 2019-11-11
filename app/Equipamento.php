<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipamento extends Model
{
    protected $table = 'equipamentos';
    protected $fillable = ['equipamento_tipo_id','marca_modelo','nr_serie', 'nr_patrimonio', 'obs', 'equipamento_status_id'];

    //Muitos para 1
    public function equipamento_tipo()
    {
        return $this->belongsTo('App\TipoEquipamento');
    }

    //Muitos para 1
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function cautelas()
    {
        return $this->belongsToMany(Cautela::class);
    }

    //Muitos para 1
    public function equipamento_status()
    {
        return $this->belongsTo('App\EquipamentoStatus');
    }

    
}
