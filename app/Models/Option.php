<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Option extends Model
{
    protected $fillable = [
        'name',
        'type'
    ];

    // relacion muchos a muchos
    public function products(): BelongsToMany {
        return $this->belongsToMany(Product::class)
            ->withPivot('value')
            ->withTimestamps();
    }

    // relacion uno a muchos
    public function features(): HasMany {
        return $this->hasMany(Feature::class);
    }
}
