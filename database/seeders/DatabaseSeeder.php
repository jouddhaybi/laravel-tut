<?php

namespace Database\Seeders;

use App\Models\Car;
use App\Models\CarImage;
use App\Models\CarType;
use App\Models\City;
use App\Models\FuelType;
use App\Models\Maker;
use App\Models\Model;
use App\Models\State;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //create car types 

        CarType::factory()
            ->sequence(
                ['name' => 'SUV'],
                ['name' => 'Sedan'],
                ['name' => 'Coupe'],
                ['name' => 'Hatchback'],
                ['name' => 'Convertible'],
                ['name' => 'Pickup Truck'],
                ['name' => 'Minivan'],
                ['name' => 'Wagon'],
                ['name' => 'Crossover'],
                ['name' => 'Luxury Car'],
                ['name' => 'Electric Vehicle (EV)'],
                ['name' => 'Hybrid Car'],
                ['name' => 'Sports Car'],
                ['name' => 'Off-Road Vehicle'],
                ['name' => 'Compact Car']
            )
            ->count(15)
            ->create();

        //Create fuel type
        FuelType::factory()
            ->sequence(
                ['name' => 'Gasoline'],
                ['name' => 'Diesel'],
                ['name' => 'Electric'],
                ['name' => 'Hybrid']
            )
            ->count(4)
            ->create();

        // create states with their corresponding cities 
        $states = [
            'Beirut' => [
                'Achrafieh',
                'Hamra',
                'Ain El Mreisseh',
                'Ras Beirut',
                'Mazraa',
                'Bashoura',
                'Mar Mikhael',
                'Gemmayzeh',
                'Sodeco',
                'Verdun',
                'Badaro',
                'Kantari',
                'Zokak El Blat',
                'Manara',
                'Tariq El Jdideh'
            ],
            'Mount Lebanon' => [
                'Baabda',
                'Jounieh',
                'Aley',
                'Chouf',
                'Bikfaya',
                'Dahr El Sawan',
                'Broummana',
                'Beit Mery',
                'Damour',
                'Zouk Mosbeh',
                'Jal El Dib',
                'Dbayeh',
                'Ain Saadeh',
                'Keserwan',
                'Bhamdoun'
            ],
            'North Lebanon' => [
                'Tripoli',
                'Mina',
                'Beddawi',
                'Zgharta',
                'Koura',
                'Batroun',
                'Bsharri',
                'Amioun',
                'Anfeh',
                'Chekka',
                'Qoubaiyat',
                'Sir El Dennieh',
                'Minyara',
                'Marmarita',
                'Deddeh'
            ],
            'Akkar' => [
                'Halba',
                'Berkayel',
                'Rahbeh',
                'Khirbet Daoud',
                'Qoubaiyat',
                'Beino',
                'Akkar El Atiqa',
                'Saidnaya',
                'Fnaydeq',
                'Qammoua',
                'Meshmesh',
                'Menjez',
                'Tikrit',
                'Sammouniyeh',
                'Kfar Melki'
            ],
            'Bekaa' => [
                'Zahle',
                'Rayak',
                'Taanayel',
                'Ferzol',
                'Anjar',
                'Bar Elias',
                'Chtaura',
                'Riyak',
                'Ksara',
                'Jdita',
                'Kfarzabad',
                'Temnin El Tahta',
                'Kamed El Loz',
                'Makse',
                'Qabb Elias'
            ],
            'Baalbek-Hermel' => [
                'Baalbek',
                'Hermel',
                'Ras Baalbek',
                'Deir El Ahmar',
                'Labweh',
                'Brital',
                'Nabi Chit',
                'Talia',
                'Ain Bourday',
                'Qaa',
                'Younine',
                'Taraya',
                'Chmistar',
                'Boudai',
                'Jdeideh'
            ],
            'South Lebanon' => [
                'Sidon',
                'Tyre',
                'Jezzine',
                'Qana',
                'Sarafand',
                'Aadloun',
                'Hariss',
                'Ain Baal',
                'Dibbine',
                'Zahrani',
                'Bint Jbeil',
                'Deir Mimas',
                'Majdal Zoun',
                'Tayr Debba',
                'Marwahin'
            ],
            'Nabatieh' => [
                'Nabatieh',
                'Kfar Kila',
                'Houla',
                'Marjayoun',
                'Bint Jbeil',
                'Tibnine',
                'Khiam',
                'Qabrikha',
                'Deir Seriane',
                'Adchit',
                'Habbouch',
                'Zawtar',
                'Yater',
                'Ansar',
                'Harouf'
            ]
        ];
        foreach ($states as $state => $cities) {
            State::factory()
                ->state(['name' => $state])
                ->has(
                    City::factory()
                        ->count(count($cities))
                        ->sequence(...array_map(fn($city) => ['name' => $city], $cities))
                )
                ->create();
        }
        // car makers with theire corresponding models 
        $makers = [
            'Toyota' => [
                'Corolla',
                'Camry',
                'Yaris',
                'Hilux',
                'Land Cruiser',
                'RAV4',
                'Highlander',
                'Fortuner',
                'Tacoma',
                'Tundra',
                'C-HR',
                'Supra',
                'Avalon',
                'Sienna',
                '4Runner'
            ],
            'Honda' => [
                'Civic',
                'Accord',
                'CR-V',
                'HR-V',
                'Pilot',
                'Odyssey',
                'Ridgeline',
                'Fit',
                'Passport',
                'Insight',
                'Prelude',
                'Element',
                'S2000',
                'Brio',
                'Jazz'
            ],
            'Ford' => [
                'F-150',
                'Mustang',
                'Explorer',
                'Escape',
                'Ranger',
                'Bronco',
                'Edge',
                'Expedition',
                'Fusion',
                'Focus',
                'Maverick',
                'Taurus',
                'EcoSport',
                'Transit',
                'GT'
            ],
            'BMW' => [
                '1 Series',
                '2 Series',
                '3 Series',
                '4 Series',
                '5 Series',
                '6 Series',
                '7 Series',
                '8 Series',
                'X1',
                'X3',
                'X5',
                'X7',
                'Z4',
                'M3',
                'i4'
            ],
            'Mercedes-Benz' => [
                'A-Class',
                'C-Class',
                'E-Class',
                'S-Class',
                'GLA',
                'GLC',
                'GLE',
                'GLS',
                'G-Class',
                'AMG GT',
                'CLA',
                'SL',
                'SLC',
                'EQC',
                'V-Class'
            ],
            'Nissan' => [
                'Altima',
                'Maxima',
                'Sentra',
                'Versa',
                '370Z',
                'GT-R',
                'Rogue',
                'Pathfinder',
                'Murano',
                'Armada',
                'Frontier',
                'Titan',
                'Juke',
                'X-Trail',
                'Leaf'
            ]
        ];
        foreach ($makers as $maker => $models) {
            Maker::factory()
                ->state(['name' => $maker])
                ->has(
                    Model::factory()
                        ->count(count($models))
                        ->sequence(...array_map(fn($model) => ['name' => $model], $models))
                )
                ->create();
        }

        // create users and cars with images and features

        User::factory()
            ->count(3)->create();

        User::factory()->count(2)
            ->has(
                Car::factory()
                    ->count(50)
                    ->has(
                        CarImage::factory()
                            ->count(5)
                            ->sequence(fn(Sequence $sequence) => ['position' => $sequence->index + 1]),
                        'images'
                    )
                    ->hasFeatures(),
                'favoriteCars'
            )->create();
    }
}
