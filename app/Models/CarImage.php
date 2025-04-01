<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model as EloquentModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CarImage extends EloquentModel
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'image_path',
        'position'
    ];

    public function car(): BelongsTo
    {
        return $this->belongsTo(Car::class);
    }
}
