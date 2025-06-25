<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    protected $fillable = [
        'name',
        'family_id'
    ];

    // relacion uno a muchos inversa
    public function family(): BelongsTo {
        return $this->belongsTo(Family::class);
    }

    // relacion muchos a muchos
    public  function subcategories(): HasMany {
        return $this->hasMany(Subcategory::class);
    }
}
