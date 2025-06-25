<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Feature extends Model
{
    protected $fillable = [
        'value',
        'description',
        'option_id'
    ];

    // relacion uno a muchos inversa
    public function option(): BelongsTo {
        return $this->belongsTo(Option::class);
    }

    // relacion muchos a muchos
    public function variants(): BelongsToMany {
        return $this->belongsToMany(Variant::class)
            ->withTimestamps();
    }
}
