<?php

namespace App\Models;

use App\Http\Controllers\Front\CommentController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'category_id',
        'shop_id',
        'florist_id',
        'product_image',
        'name',
        'description',
        'price',
        'stock',
        'features',
        'slug',

    ];

    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }

    public function comments()
    {
        return $this->hasMany(Comments::class, 'product_id');
    }

    public function galleries()
    {
        return $this->hasMany(ProductGallery::class, 'product_id', 'id');
    }

    public function categories()
    {
        return $this->hasMany(Category::class, 'id', 'category_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }


    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($product) {
            $product->slug = Str::slug($product->name);
        });

        static::updating(function ($product) {
            $product->slug = Str::slug($product->name);
        });
    }
}


