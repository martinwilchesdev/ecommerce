<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Option extends Model
{
    public function products(): BelongsToMany {
        return $this->belongsToMany(Product::class)
            ->withPivot('value')
            ->withTimestamps();
    }

    public function features(): HasMany {
        return $this->hasMany(Feature::class);
    }
}
