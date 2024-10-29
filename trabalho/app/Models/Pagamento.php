<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pagamento extends Model
{
    use HasFactory;
    protected $table = "pagamento";

    protected $fillable = [
        'users_id', 
        'forma_pagamento', 
        'valor'
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'users_id');
    }
    
}
