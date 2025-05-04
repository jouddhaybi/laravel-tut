<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\CarFeatures;
use App\Models\CarImage;
use App\Models\CarType;
use App\Models\City;
use App\Models\favouriteCars;
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
        $carFeatures = CarFeatures::get();

        return view('car.create', [
            'makers' => $makers,
            'carTypes' => $carTypes,
            'fuelTypes' => $fuelTypes,
            'states' => $states,
            'carFeatures' => $carFeatures
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

    public function createCar(Request $request)
    {
        if (!auth()->check()) {
            return redirect($this->redirectTo);
        }

        $authUser = auth()->user();
        $authUserID = $authUser->id;

        try {
            $published = $request->has('published') ? 1 : 0;
            $published_at = $published ? now()->format('Y-m-d H:i:s') : null;


            $data = [
                'maker_id' => $request->input('maker'),
                'model_id' => $request->input('model'),
                'year' => $request->input('year'),
                'price' => $request->input('price'),
                'vin' => $request->input('vin'),
                'mileage' => $request->input('mileage'),
                'car_type_id' => $request->input('car_type'),
                'fuel_type_id' => $request->input('fuel_type'),
                'user_id' => $authUserID,
                'city_id' => $request->input('city'),
                'address' => $request->input('address'),
                'phone' => $request->input('phone'),
                'description' => $request->input('description'),
                'published_at' => $published_at
            ];

            $newCar = Car::create($data);

            if ($newCar) {
                $features = [
                    'car_id' => $newCar->id,
                    'air_conditioning' => $request->has('air_conditioning'),
                    'power_windows' => $request->has('power_windows'),
                    'power_door_locks' => $request->has('power_door_locks'),
                    'abs' => $request->has('abs'),
                    'cruise_control' => $request->has('cruise_control'),
                    'bluetooth_connectivity' => $request->has('bluetooth_connectivity'),
                    'remote_start' => $request->has('remote_start'),
                    'gps_navigation' => $request->has('gps_navigation'),
                    'heated_seats' => $request->has('heated_seats'),
                    'climate_control' => $request->has('climate_control'),
                    'rear_parking_sensors' => $request->has('rear_parking_sensors'),
                    'leather_seats' => $request->has('leather_seats'),
                ];
                CarFeatures::create($features);
                $this->addCarImages($request, $newCar);
                return back()->with('success', 'Car Added Successfully!');
            }
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'error',
                'message' => $th->getMessage()
            ], 500);
        }
    }
    public function addCarImages(Request $request, Car $car, $newCar = null)
    {
        if (!auth()->check()) {
            return redirect($this->redirectTo);
        }
        // dd($request);
        $authUser = auth()->user();
        $authUserID = $authUser->id;
        $newCar = $car;
        // dd($newCar);
        $carLastImage = CarImage::where('car_id', $car->id)
            ->latest('id')
            ->first();

        if ($request->hasFile('images')) {
            $folderName = time() . '_' . $authUserID;
            $destinationPath = public_path("img/cars/{$folderName}");

            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }

            $carImages = $request->file('images');
            if (!is_array($carImages)) {
                $carImages = [$carImages]; // wrap it into an array
            }

            foreach ($carImages as $index => $image) {

                if (!$carLastImage) {
                    $index = $index + 1;
                } else {
                    $index = $carLastImage->position + $index + 1;
                }
                $fileName = time() . '_' . $image->getClientOriginalName();
                $image->move($destinationPath, $fileName);

                CarImage::create([
                    'car_id' => $newCar->id,
                    'image_path' => "cars/{$folderName}/{$fileName}",
                    'position' => $index,
                ]);
            }
        }
        return back()->with('success', 'image Added Successfully!');
    }
    public function updateImages(Request $request)
    {
        if (!auth()->check()) {
            return redirect($this->redirectTo);
        }

        $deleteImages = $request->input('delete_images');
        if ($deleteImages) {
            foreach ($deleteImages as $deleteImage) {
                $carImage = CarImage::find($deleteImage);
                if ($carImage) {
                    $filePath = public_path('img/' . $carImage->image_path);
                    if (file_exists($filePath)) {
                        unlink($filePath);
                    }
                    $carImage->delete();
                }
            }
        }

        $positions = $request->input('positions');
        if ($positions) {
            foreach ($positions as $id => $position) {
                CarImage::where('id', $id)->update(['position' => $position]);
            }
        }

        return back()->with('success', 'images Updated Successfully!');
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

        return view('car.show', [
            'car' => $car
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Car $car)
    {
        // dd($car);
        $makers = Maker::get();
        $carTypes = CarType::get();
        $fuelTypes = FuelType::get();
        $states = State::get();
        $carFeatures = CarFeatures::where(['car_id' => $car->id])->first();

        $carCity = City::where(['id' => $car->city_id])->first();
        $carState = State::where(['id' => $carCity->state_id])->first();

        return view('car.edit', [
            'car' => $car,
            'makers' => $makers,
            'carTypes' => $carTypes,
            'fuelTypes' => $fuelTypes,
            'states' => $states,
            'carState' => $carState,
            'carFeatures' => $carFeatures
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Car $car)
    {

        if (!auth()->check()) {
            return redirect($this->redirectTo);
        }

        // dd($request->input('city'));
        try {
            $authUser = auth()->user();
            $authUserID = $authUser->id;

            $published = $request->has('published') ? 1 : 0;
            $hasDate = $car->published_at ? $car->published_at : now()->format('Y-m-d H:i:s');
            $published_at = $published ? $hasDate : null;

            $data = [
                'maker_id' => $request->input('maker'),
                'model_id' => $request->input('model'),
                'year' => $request->input('year'),
                'price' => $request->input('price'),
                'vin' => $request->input('vin'),
                'mileage' => $request->input('mileage'),
                'car_type_id' => $request->input('car_type'),
                'fuel_type_id' => $request->input('fuel_type'),
                'user_id' => $authUserID,
                'city_id' => $request->input('city'),
                'address' => $request->input('address'),
                'phone' => $request->input('phone'),
                'description' => $request->input('description'),
                'published_at' => $published_at
            ];
            $car->update($data);
            $features = [
                'car_id' => $car->id,
                'air_conditioning' => $request->has('air_conditioning'),
                'power_windows' => $request->has('power_windows'),
                'power_door_locks' => $request->has('power_door_locks'),
                'abs' => $request->has('abs'),
                'cruise_control' => $request->has('cruise_control'),
                'bluetooth_connectivity' => $request->has('bluetooth_connectivity'),
                'remote_start' => $request->has('remote_start'),
                'gps_navigation' => $request->has('gps_navigation'),
                'heated_seats' => $request->has('heated_seats'),
                'climate_control' => $request->has('climate_control'),
                'rear_parking_sensors' => $request->has('rear_parking_sensors'),
                'leather_seats' => $request->has('leather_seats'),
            ];
            $carFeatures = CarFeatures::findOrFail($car->id);
            $carFeatures->update($features);
            // dd($features);
            return back()->with('success', 'Car Edited Successfully!');
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'error',
                'message' => $th->getMessage()
            ], 500);
        }

        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Car $car)
    {
        if ($car->delete()) {
            favouriteCars::where('car_id', $car->id)->delete();
            return back()->with([
                'success' => 'Car Deleted Successfully!',
                'deletedCarId' => $car->id,
            ]);
        }

    }
    public function images(Car $car)
    {
        if (!auth()->check()) {
            return redirect($this->redirectTo);
        }
        return view('car.images', ['car' => $car]);
    }

    public function search(Request $request)
    {
        if (!auth()->check()) {
            return redirect($this->redirectTo);
        }
        $query = Car::where('published_at', '<', now())
            ->with(['primaryImage', 'city', 'carType', 'fuelType', 'maker', 'model'])
            ->orderBy('published_at', 'desc');

        // Apply filters only if values exist
        if ($request->filled('maker_id')) {
            $query->where('maker_id', $request->maker_id);
        }

        if ($request->filled('model_id')) {
            $query->where('model_id', $request->model_id);
        }

        if ($request->filled('state_id')) {
            $query->whereHas('city', function ($q) use ($request) {
                $q->where('state_id', $request->state_id);
            });
        }

        if ($request->filled('city_id')) {
            $query->where('city_id', $request->city_id);
        }

        if ($request->filled('car_type_id')) {
            $query->where('car_type_id', $request->car_type_id);
        }

        if ($request->filled('year_from')) {
            $query->where('year', '>=', $request->year_from);
        }

        if ($request->filled('year_to')) {
            $query->where('year', '<=', $request->year_to);
        }

        if ($request->filled('price_from')) {
            $query->where('price', '>=', $request->price_from);
        }

        if ($request->filled('price_to')) {
            $query->where('price', '<=', $request->price_to);
        }

        if ($request->filled('fuel_type_id')) {
            $query->where('fuel_type_id', $request->fuel_type_id);
        }

        $cars = $query->paginate(15);

        $makers = Maker::get();
        $carTypes = CarType::get();
        $fuelTypes = FuelType::get();
        $states = State::get();
        return view('car.search', [
            'cars' => $cars,
            'makers' => $makers,
            'carTypes' => $carTypes,
            'fuelTypes' => $fuelTypes,
            'states' => $states
        ]);
    }

    public function watchlist()
    {
        if (auth()->check()) {
            $authUser = auth()->user();
            $authUserID = $authUser->id;
            $cars = User::find($authUserID)
                ->favoriteCars()
                ->with(['primaryImage', 'city', 'carType', 'fuelType', 'maker', 'model'])
                ->paginate(15);

            return view('car.watchlist', ['cars' => $cars]);
        } else {
            return redirect($this->redirectTo);
        }

    }
    public function addToWatchList(Request $request)
    {
        $authUser = auth()->user();
        $authUserID = $authUser->id;

        $carId = $request->input('value');

        // dd($carId);

        $favoriteCar = favouriteCars::where('user_id', $authUserID)->where('car_id', $carId);

        if ($favoriteCar->exists()) {
            $favoriteCar->delete();
            return response()->json(['message' => 'Car Removed From WatchList!', 'status' => 200]);
        } else {
            $favoriteCar = new favouriteCars();
            $favoriteCar->car_id = $carId;
            $favoriteCar->user_id = $authUserID;
            $favoriteCar->save();
            return response()->json(['message' => 'Car Added To WatchList!', 'status' => 201]);
        }
        // return response()->json(['message' => $favoriteCar, 'status' => 201]);


    }
}



