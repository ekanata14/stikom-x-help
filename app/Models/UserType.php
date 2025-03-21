<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserType extends Model
{
    use HasFactory;

    protected $fillable = ['type_name', 'region'];

    public function users()
    {
        return $this->hasMany(User::class, 'id_user_type');
    }
}
