<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\CarType;
use App\Models\FuelType;
use App\Models\Maker;
use App\Models\State;

class HomeController extends Controller
{
    public function index()
    {
        $cars = Car::where('published_at', '<', now())
            ->with(['primaryImage', 'city', 'carType', 'fuelType', 'maker', 'model', 'favoriteUsers'])
            ->orderBy('published_at', 'desc')
            ->limit(30)
            ->get()
            ->each->append('in_wishlist');

        // $favoriteCars = favouriteCars::where('user_id', auth()->user()->id)->get();
        // dd($cars->first()->getInWishlistAttribute);



        $makers = Maker::get();
        $carTypes = CarType::get();
        $fuelTypes = FuelType::get();
        $states = State::get();
        return view('home.index', [
            'cars' => $cars,
            'makers' => $makers,
            'carTypes' => $carTypes,
            'fuelTypes' => $fuelTypes,
            'states' => $states
        ]);

    }


}
