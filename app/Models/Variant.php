<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Variant extends Model
{
    public function product(): BelongsTo {
        return $this->belongsTo(Product::class);
    }

    public function features(): BelongsToMany {
        return $this->belongsToMany(Feature::class)
            ->withTimestamps();
    }
}
