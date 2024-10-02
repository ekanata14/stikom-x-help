<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;

    protected $fillable = [
        'cart_id',
        'user_id',
        'invoice_id',
        'total_price',
        'status',
        'payment_method',
        'payment_status',
    ];

    // Relasi ke Cart
    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }

    // Relasi ke User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
