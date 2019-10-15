<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StatusChamado extends Model
{
    protected $table = 'chamados_status';
    protected $fillable = ['descricao'];
}
