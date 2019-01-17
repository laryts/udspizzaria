<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tamanho extends Model
{
    // use SoftDeletes;

    protected $table = 'tamanhos';
    protected $primaryKey = 'idTamanhos';

    protected $fillable = [
        'tmDescricao', 'tmValor', 'tmTempo'
    ];

    public function pedidos(){
        return $this->hasMany(Pedido::class);
    }
}
