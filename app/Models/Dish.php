<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Dish extends Model
{
    use HasFactory;
    protected $fillable=[
        "name",
        "description",
        "ingredient",
        "image",
        "price",
        "visible",
        "restaurant_id",
        "category_id"
    ];

    public function restaurant() :BelongsTo{
        return $this->belongsTo(Restaurant::class);
    }

    public function category() :BelongsTo{
        return $this->belongsTo(Category::class);
    }

    public function orders() :BelongsToMany{
        return $this->belongsToMany(Order::class);
    }
}
