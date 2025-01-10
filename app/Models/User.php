<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'role',
        'password',
        'avatar',
    ];

    public function cartItems()
    {
        return $this->hasMany(Cart::class);
    }

    public function comments()
    {
        return $this->hasMany(Comments::class, 'user_id');
    }

    public function shops()
    {
        return $this->hasMany(Shop::class, 'user_id');
    }


}
