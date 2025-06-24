<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    public function family(): BelongsTo {
        return $this->belongsTo(Family::class);
    }

    public  function subcategories(): HasMany {
        return $this->hasMany(Subcategory::class);
    }
}
