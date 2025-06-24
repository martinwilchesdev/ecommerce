<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    public function subcategory(): BelongsTo {
        return $this->belongsTo(Product::class);
    }

    public function variants(): HasMany {
        return $this->hasMany(Variant::class);
    }

    public function options(): BelongsToMany {
        return $this->belongsToMany(Option::class)
            ->withPivot('value')
            ->withTimestamps();
    }
}
