<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'full_name',
        'email',
        'address',
        'tel_number',
        'description',
        'date',
        'status',
        'total_price',
        'restaurant_id',
    ];

    public function dishes() :BelongsToMany {
        return $this->belongsToMany(Dish::class)->withPivot('quantity','price', 'name');
    }

    public function restaurant() :HasMany {
        return $this->hasMany(Restaurant::class);
    }
}
