<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 
        'user_name', 
        'user_phone',
        'title',
        'description',
        'price',
        'quantity',
        'total_price',
        'status',
        'courier_id'
    ];

    public function courier()
    {
        return $this->belongsTo(Courrier::class);
    }
}

