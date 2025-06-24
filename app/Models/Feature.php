<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Feature extends Model
{
    public function option(): HasMany {
        return $this->hasMany(Option::class);
    }

    public function variants(): BelongsToMany {
        return $this->belongsToMany(Variant::class)
            ->withTimestamps();
    }
}
