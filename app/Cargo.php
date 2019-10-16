<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    protected $table = 'cargos';
    protected $fillable = ['nome','descricao'];
    
    //Relacionamento de Cargo com Usuarios
    //1 para muitos
    public function users()
    {
        return $this->belongsToMany(Users::class);
    }

}
