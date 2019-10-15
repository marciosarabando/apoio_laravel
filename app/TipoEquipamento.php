<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoEquipamento extends Model
{
    protected $table = 'equipamentos_tipos';
    protected $fillable = ['nome','descricao'];

    //Relacionamento de Tipo de Equipamento usado por muitos Equipamentos
    //1 para muitos
    public function equipamentos()
    {
        return $this->belongsToMany(Equipamento::class);
    }
}
