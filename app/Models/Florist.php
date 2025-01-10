<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Florist extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'florist_avatar',
        'email',
        'phone',
        'address',
    ];
}
