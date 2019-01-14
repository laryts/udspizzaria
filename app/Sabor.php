<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sabor extends Model
{
    // use SoftDeletes;

    protected $table = 'sabores';

    protected $fillable = [
        'sbDescricao', 'sbValor', 'sbTempo'
    ];
}
