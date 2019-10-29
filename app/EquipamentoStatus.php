<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EquipamentoStatus extends Model
{
    protected $table = 'equipamentos_status';
    protected $fillable = ['descricao'];

    //Relacionamento de Tipo de Equipamento usado por muitos Equipamentos
    //1 para muitos
    public function equipamentos_status()
    {
        return $this->belongsToMany(Equipamento::class);
    }
}
