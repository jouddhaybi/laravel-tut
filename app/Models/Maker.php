<?php

namespace App\Models;

// use Database\Factories\MakerFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model as EloquentModel;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Maker extends EloquentModel
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = ['name'];
    public function cars(): HasMany
    {
        return $this->hasMany(Car::class);
    }

    public function models(): HasMany
    {
        return $this->hasMany(Model::class);
    }




    // connect the model to a factory if the names are different
    // protected static function newFactory()
    // {
    //     return MakerFactory::new();
    // }
}
