<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Maker;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        User::factory()
            ->has(Car::factory()->count(5), 'favouriteCars')
            ->create();

        return view('home.index');
    }
}
