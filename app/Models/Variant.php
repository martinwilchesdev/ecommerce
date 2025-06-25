<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Variant extends Model
{
    protected $fillable = [
        'sku',
        'image_path',
        'product_id'
    ];

    // relacion uno a muchos inversa
    public function product(): BelongsTo {
        return $this->belongsTo(Product::class);
    }

    // relacion muchos a muchos
    public function features(): BelongsToMany {
        return $this->belongsToMany(Feature::class)
            ->withTimestamps();
    }
}
