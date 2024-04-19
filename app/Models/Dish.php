<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class Dish extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'ingredient',
        'image',
        'price',
        'visible',
        'restaurant_id',
        'category_id',
    ];

    public static function generateSlug($name){
        return Str::slug($name,'-');
    }

    public function category(): BelongsTo {
        return $this->belongsTo(Category::class);
    }
}
