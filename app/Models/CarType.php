<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model as EloquentModel;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CarType extends EloquentModel
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = ['name'];

    public function cars(): HasMany
    {
        return $this->hasMany(Car::class);
    }
}
