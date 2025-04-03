<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\CarType;
use App\Models\City;
use App\Models\FuelType;
use App\Models\Maker;
use App\Models\Model;
use App\Models\State;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $redirectTo = '/login';

    public function index()
    {
        if (!auth()->check()) {
            return redirect($this->redirectTo);
        }

        $authUser = auth()->user();
        $authUserID = $authUser->id;
        $cars = User::find($authUserID)
            ->cars()
            ->with(['primaryImage', 'maker', 'model'])
            ->orderBy("created_at", "desc")
            ->paginate(5);
        // ->withPath('/user/cars')
        // ->appends(['sort' => 'price'])
        // ->withQueryString()
        // ->fragment('cars')

        return view('car.index', ['cars' => $cars]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!auth()->check()) {
            return redirect($this->redirectTo);
        }
        $makers = Maker::get();
        $carTypes = CarType::get();
        $fuelTypes = FuelType::get();
        $states = State::get();
        return view('car.create', [
            'makers' => $makers,
            'carTypes' => $carTypes,
            'fuelTypes' => $fuelTypes,
            'states' => $states
        ]);
    }

    public function getModelsByMakersId(Request $request)
    {
        $makerId = $request->input('value');
        $models = Model::select(['id', 'name'])->where('maker_id', $makerId)->get();
        return response()->json(['models' => $models]);
    }
    public function getCitiesByStatesId(Request $request)
    {
        $stateId = $request->input('value');
        $cities = City::select(['id', 'name'])->where('state_id', $stateId)->get();
        return response()->json(['cities' => $cities]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Car $car)
    {
        return view('car.show', ['car' => $car]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Car $car)
    {
        return view('car.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Car $car)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Car $car)
    {
        //
    }

    public function search()
    {
        $query = Car::where('published_at', '<', now())
            ->with(['primaryImage', 'city', 'carType', 'fuelType', 'maker', 'model'])
            ->orderBy('published_at', 'desc');

        // $query->join('cities', 'cities.id', '=', 'cars.city_id')
        //     ->where('cities.state_id', 1);

        // $carCount = $query->count();
        // $cars = $query->limit(30)->get();
        $cars = $query->paginate(15);
        return view('car.search', ['cars' => $cars]);
    }

    public function watchlist()
    {
        $cars = User::find(3)
            ->favoriteCars()
            ->with(['primaryImage', 'city', 'carType', 'fuelType', 'maker', 'model'])
            ->paginate(15);

        return view('car.watchlist', ['cars' => $cars]);
    }
}
