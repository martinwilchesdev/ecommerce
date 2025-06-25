<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Subcategory extends Model
{
    protected $fillable = [
        'name',
        'category_id'
    ];

    // relacion uno a muchos inversa
    public function category(): BelongsTo {
        return $this->belongsTo(Category::class);
    }

    // relacion uno a muchos
    public function products(): HasMany {
        return $this->hasMany(Product::class);
    }
}
