<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_type_id',
        'name',
        'description',
        'currency',
        'price',
        'quota',
    ];

    public function userType()
    {
        return $this->belongsTo(UserType::class);
    }
}
