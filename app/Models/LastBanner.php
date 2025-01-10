<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LastBanner extends Model
{
    use HasFactory;
    protected $table = 'last_banners';
    protected $fillable = ['image', 'title', 'description'];
}
