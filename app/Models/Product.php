<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    protected $fillable = [
        'sku',
        'name',
        'description',
        'image_path',
        'price',
        'subcategory_id'
    ];

    // relacion uno a muchos inversa
    public function subcategory(): BelongsTo {
        return $this->belongsTo(Product::class);
    }

    // relacion uno a muchos
    public function variants(): HasMany {
        return $this->hasMany(Variant::class);
    }

    // relacion muchos a muchos
    public function options(): BelongsToMany {
        return $this->belongsToMany(Option::class)
            ->withPivot('value') // valor de la columna `value` de la tabla intermedia
            ->withTimestamps();
    }
}
