<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoricoCompras extends Model
{
    use HasFactory;
    protected $table = "historicoCompras";

    protected $fillable = [
        'camisas_id', 
        'users_id', 
        'valor'
    ];

    public function camisas()
    {
        return $this->belongsTo(Camisas::class, 'camisas_id');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'users_id');
    }
}
