<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class favouriteCars extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = ['car_id', 'user_id'];

}
