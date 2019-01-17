<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sabor extends Model
{
    // use SoftDeletes;

    protected $table = 'sabores';
    protected $primaryKey = 'idSabores';

    protected $fillable = [
        'sbDescricao', 'sbValor', 'sbTempo'
    ];
    
    public function pedidos(){
        return $this->hasMany(Pedido::class);
    }
}
