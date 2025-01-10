<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'company_name',
        'description',
        'email',
        'address',
        'phone',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'about_image',
        'slider_image',
        'set_image',
        'instagram',
        'facebook',
        'twitter',
        'linkedin',
        'whatsapp',
        'google_map',
    ];
}
