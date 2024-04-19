<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

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


    public function restaurant(): HasOne {
        return $this->hasOne(Restaurant::class, 'id', 'restaurant_id');
    }
}
