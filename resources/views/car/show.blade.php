<x-app-layout title="inner-car-details" bodyClass='car-details-page'>
    <main>
        {{-- @dd($car->in_wishlist); --}}
        <div class="container">
            <h1 class="car-details-page-title">{{ $car->maker->name }} {{ $car->model->name }} - {{ $car->year }}</h1>
            <div class="car-details-region">{{ $car->city->name }} - {{ $car->published_at }}</div>

            <div class="car-details-content">
                <div class="car-images-and-description col-lg-9">
                    <div class="swiper car-details-swiper">
                        <!-- Additional required wrapper -->
                        <div class="swiper-wrapper">
                            <!-- Slides -->
                            @foreach ($car->images as $carImage)
                                <div class="swiper-slide"> <img src="{{ asset('img/' . $carImage->image_path) }}"
                                        alt=""></div>
                            @endforeach
                        </div>
                        <!-- If we need pagination -->
                        <div class="swiper-pagination"></div>

                        <!-- If we need navigation buttons -->
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>

                    </div>
                    {{-- <div class="car-images-carousel">
                        <div class="car-image-wrapper">
                            <img src="{{ asset('img/' . $car->primaryImage?->image_path) }}" alt=""
                                class="car-active-image" id="activeImage" />
                        </div>
                        <div class="car-image-thumbnails">
                            @foreach ($car->images as $carImage)
                                <img src="{{ asset('img/' . $carImage->image_path) }}" alt="">
                            @endforeach
                        </div>
                        <button class="carousel-button prev-button" id="prevButton">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" style="width: 64px">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                            </svg>
                        </button>
                        <button class="carousel-button next-button" id="nextButton">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" style="width: 64px">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                            </svg>
                        </button>
                    </div> --}}

                    <div class="card car-detailed-description">
                        <h2 class="car-details-title">Detailed Description</h2>
                        <p>
                            {{ $car->description }}
                        </p>
                    </div>

                    <div class="card car-detailed-description">
                        <h2 class="car-details-title">Car Specifications</h2>

                        <ul class="car-specifications">
                            <x-car-specification :value="$car->features->abs">
                                ABS
                            </x-car-specification>
                            <x-car-specification :value="$car->features->air_conditioning">
                                Air Conditioning
                            </x-car-specification>
                            <x-car-specification :value="$car->features->power_windows">
                                Power Windows
                            </x-car-specification>
                            <x-car-specification :value="$car->features->power_door_locks">
                                Power Door Lock
                            </x-car-specification>
                            <x-car-specification :value="$car->features->cruise_control">
                                Cruise Control
                            </x-car-specification>
                            <x-car-specification :value="$car->features->bluetooth_connectivity">
                                Bluetooth Connectivity
                            </x-car-specification>
                            <x-car-specification :value="$car->features->remote_start">
                                Remote Start
                            </x-car-specification>
                            <x-car-specification :value="$car->features->gps_navigation">
                                GPS Navigation
                            </x-car-specification>
                            <x-car-specification :value="$car->features->heated_seats">
                                Heated Seats
                            </x-car-specification>
                            <x-car-specification :value="$car->features->climate_control">
                                Climate Control
                            </x-car-specification>
                            <x-car-specification :value="$car->features->rear_parking_sensor">
                                Rear Parking Sensors
                            </x-car-specification>
                            <x-car-specification :value="$car->features->leather_seats">
                                Leather Seats
                            </x-car-specification>

                        </ul>
                    </div>
                </div>
                <div class="car-details card col-lg-3">
                    <div class="flex items-center justify-between">
                        <p class="car-details-price">${{ $car->price }}</p>
                        <button id="btnHeart" class="btn-heart text-primary" data-carid="{{ $car->id }}">

                            <svg id="emptyHeart{{ $car->id }}" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width: 20px"
                                @class([
                                    'hidden' => $car->in_wishlist,
                                ])>
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                            </svg>

                            <svg id="filledHeart{{ $car->id }}" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 24 24" fill="currentColor" style="width: 16px"
                                @class([
                                    'hidden' => !$car->in_wishlist,
                                ])>
                                <path
                                    d="m11.645 20.91-.007-.003-.022-.012a15.247 15.247 0 0 1-.383-.218 25.18 25.18 0 0 1-4.244-3.17C4.688 15.36 2.25 12.174 2.25 8.25 2.25 5.322 4.714 3 7.688 3A5.5 5.5 0 0 1 12 5.052 5.5 5.5 0 0 1 16.313 3c2.973 0 5.437 2.322 5.437 5.25 0 3.925-2.438 7.111-4.739 9.256a25.175 25.175 0 0 1-4.244 3.17 15.247 15.247 0 0 1-.383.219l-.022.012-.007.004-.003.001a.752.752 0 0 1-.704 0l-.003-.001Z" />
                            </svg>

                        </button>
                    </div>

                    <hr />
                    <table class="car-details-table">
                        <tbody>
                            <tr>
                                <th>Maker</th>
                                <td>{{ $car->maker->name }}</td>
                            </tr>
                            <tr>
                                <th>Model</th>
                                <td>{{ $car->model->name }}</td>
                            </tr>
                            <tr>
                                <th>Year</th>
                                <td>{{ $car->year }}</td>
                            </tr>
                            <tr>
                                <th>Vin</th>
                                <td>{{ $car->vin }}</td>
                            </tr>
                            <tr>
                                <th>Mileage</th>
                                <td>{{ $car->mileage }}</td>
                            </tr>
                            <tr>
                                <th>Car Type</th>
                                <td>{{ $car->carType->name }}</td>
                            </tr>
                            <tr>
                                <th>Fuel Type</th>
                                <td>{{ $car->fuelType->name }}</td>
                            </tr>
                            <tr>
                                <th>Address</th>
                                <td>{{ $car->address }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <hr />

                    <div class="flex gap-1 my-medium">
                        <img src="/img/avatar.png" alt="" class="car-details-owner-image" />
                        <div>
                            <h3 class="car-details-owner">{{ $car->owner->name }}</h3>
                            <div class="text-muted">{{ $car->owner->cars()->count() }} cars</div>
                        </div>
                    </div>
                    <a href="tel:{{ \Illuminate\Support\Str::mask($car->phone, '*', -3) }}" class="car-details-phone">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" style="width: 16px">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M10.5 1.5H8.25A2.25 2.25 0 0 0 6 3.75v16.5a2.25 2.25 0 0 0 2.25 2.25h7.5A2.25 2.25 0 0 0 18 20.25V3.75a2.25 2.25 0 0 0-2.25-2.25H13.5m-3 0V3h3V1.5m-3 0h3m-3 18.75h3" />
                        </svg>

                        <span id="phone-number">{{ \Illuminate\Support\Str::mask($car->phone, '*', -3) }}</span>
                        <span id="view-full-number" class="car-details-phone-view">view full number</span>
                    </a>
                </div>
            </div>
        </div>
    </main>
</x-app-layout>

<script>
    $(document).ready(function() {
        const images = [
            @foreach ($car->images as $carImage)
                '{{ asset('img/' . $carImage->image_path) }}',
            @endforeach
        ]; // array of thumbnails

        const swiper = new Swiper('.swiper', {
            // Optional parameters
            direction: 'horizontal',
            loop: true,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
                renderBullet: function(index, className) {
                    return `<span class="${className}">
                  <img src="${images[index]}" />
                </span>`;
                },
            },
            // Navigation arrows
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },

        });
        //view the user full number
        $('#view-full-number').on('click', function(e) {
            e.preventDefault();
            var fullPhone = "{{ $car->phone }}";
            $('#phone-number').text(fullPhone);
            $(this).hide();
        });

    })
</script>
