<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipamento extends Model
{
    protected $table = 'equipamentos';
    protected $fillable = ['equipamento_tipo_id','marca_modelo','nr_serie', 'obs', 'st_cautelado'];

    //Muitos para 1
    public function equipamento_tipo()
    {
        return $this->belongsTo('App\TipoEquipamento');
    }

    public function cautelas()
    {
        return $this->belongsToMany(Cautela::class);
    }
}
