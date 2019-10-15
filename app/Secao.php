<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Secao extends Model
{
    protected $table = 'secoes';
    protected $fillable = ['nome','descricao'];
}
