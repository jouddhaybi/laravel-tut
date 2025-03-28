<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {   // select all cars 
        $cars = Car::get();
        // select cars with condition
        $cars = Car::where('published_at', '!=', null)->get();
        // select car with specific id
        $cars = Car::find(2);


        dump($cars);
        return view('home.index');
    }
}
