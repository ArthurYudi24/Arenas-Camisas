<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Camisas extends Model
{
    use HasFactory;
    protected $table = "camisas";

    public function historicoCompra()
    {
        return $this->hasMany(HistoricoCompras::class, 'camisas_id');
    }

    public function menuCarrinho()
    {
        return $this->hasMany(MenuCarrinho::class, 'camisas_id');
    } 

}
