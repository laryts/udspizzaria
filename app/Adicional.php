<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Pedido;

class Adicional extends Model
{
    // use SoftDeletes;

    protected $table = 'adicionais';
    protected $primaryKey = 'idAdicionais';

    protected $fillable = [
        'tmDescricao', 'tmValor', 'tmTempo'
    ];

    public function pedidos()
    {
        return $this->belongsToMany(Pedido::class, 'adicionaisdospedidos', 'idPedidos', 'idAdicionais');
    }


}
