<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Restaurant extends Model
{
    use HasFactory;
    protected $fillable = [
        "activity_name",
        "slug",
        "address",
        "piva",
        "image",
        "user_id",
    ];

    public function user(): BelongsTo{
        return $this->belongsTo( User::class );
    }

    public function types(): BelongsToMany{
        return $this->belongsToMany( Type::class );
    }

    public function dish(): HasMany{
        return $this->hasMany( Dish::class );
    }
    public function order(): HasMany{
        return $this->hasMany( Order::class );
    }
}
