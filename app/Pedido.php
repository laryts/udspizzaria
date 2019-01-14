<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pedido extends Model
{
    // use SoftDeletes;

    protected $table = 'pedidos';

    protected $fillable = [
        'idTamanhos', 'idSabores', 'idUsers', 'pdValor', 'pdTempo' 
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'idUsers');
    }

    public function tamanho()
    {
        return $this->belongsTo(Tamanho::class, 'idTamanhos');
    }

    public function sabor()
    {
        return $this->belongsTo(Sabor::class, 'idSabores');
    }

    public function adicional()
    {
        return $this->belongsTo(Adicional::class, 'idAdicionais');
    }
}
