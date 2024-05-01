<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Dish extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable=[
        "name",
        "slug",
        "description",
        "ingredient",
        "image",
        "price",
        "visible",
        "restaurant_id",
        "category_id",
        "deleted_at"
    ];

    public function restaurant() :BelongsTo{
        return $this->belongsTo(Restaurant::class);
    }

    public function category() :BelongsTo{
        return $this->belongsTo(Category::class);
    }

    public function orders() :BelongsToMany{
        return $this->belongsToMany(Order::class)->withPivot('quantity','price', 'name');
    }
}
