<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuCarrinho extends Model
{
    use HasFactory;
    protected $table = "menuCarrinho";

    protected $fillable = [
        'users_id', 
        'camisas_id', 
        'quantidade'
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    public function camisas()
    {
        return $this->belongsTo(Camisas::class, 'camisas_id');
    }
}
