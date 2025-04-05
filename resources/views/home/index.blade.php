{{-- @extends('layout.app')

@section('title', 'Home Page')

@section('content')

@endsection --}}

<x-app-layout title="Home Page">
    <!-- Home Slider -->
    <section class="hero-slider">
        <!-- Carousel wrapper -->
        <div class="hero-slides">
            <!-- Item 1 -->
            <div class="hero-slide">
                <div class="container">
                    <div class="slide-content">
                        <h1 class="hero-slider-title">
                            Buy <strong>The Best Cars</strong> <br />
                            in your region
                        </h1>
                        <div class="hero-slider-content">
                            <p>
                                Use powerful search tool to find your desired cars based on
                                multiple search criteria: Maker, Model, Year, Price Range, Car
                                Type, etc...
                            </p>

                            <button class="btn btn-hero-slider">Find the car</button>
                        </div>
                    </div>
                    <div class="slide-image">
                        <img src="/img/car-png-39071.png" alt="" class="img-responsive" />
                    </div>
                </div>
            </div>
            <!-- Item 2 -->
            <div class="hero-slide">
                <div class="flex container">
                    <div class="slide-content">
                        <h2 class="hero-slider-title">
                            Do you want to <br />
                            <strong>sell your car?</strong>
                        </h2>
                        <div class="hero-slider-content">
                            <p>
                                Submit your car in our user friendly interface, describe it,
                                upload photos and the perfect buyer will find it...
                            </p>

                            <button class="btn btn-hero-slider">Add Your Car</button>
                        </div>
                    </div>
                    <div class="slide-image">
                        <img src="/img/car-png-39071.png" alt="" class="img-responsive" />
                    </div>
                </div>
            </div>
            <button type="button" class="hero-slide-prev">
                <svg style="width: 18px" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M5 1 1 5l4 4" />
                </svg>
                <span class="sr-only">Previous</span>
            </button>
            <button type="button" class="hero-slide-next">
                <svg style="width: 18px" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 9 4-4-4-4" />
                </svg>
                <span class="sr-only">Next</span>
            </button>
        </div>
    </section>
    <!--/ Home Slider -->



    <main>
        <!-- Find a car form -->
        <x-search-form :makers="$makers" :carTypes="$carTypes" :fuelTypes="$fuelTypes" :states="$states" />
        <!--/ Find a car form -->

        <!-- New Cars -->
        <section>
            <div class="container">
                <h2>Latest Added Cars</h2>
                <div class="car-items-listing">
                    {{-- @dd($favoriteCars->first()) --}}

                    @foreach ($cars as $index => $car)
                        <x-car-item :car="$car" />
                    @endforeach ()
                </div>
            </div>
        </section>
        <!--/ New Cars -->
    </main>


</x-app-layout>

<script>
    $('#formResetBtn').on('click', function() {
        $('#makersSelect').val('')
        $('#modelSelect').val('')
        $('#stateSelect').val('')
        $('#citySelect').val('')
        $('#carTypeSelect')
        $('#yearFrom').val('');
        $('#yearTo').val('');
        $('#priceFrom').val('');
        $('#priceTo').val('');
        $('#fuelTypes').val('')
    })

    $('#makersSelect').on('change', function() {
        const makerId = this.value;
        $('#modelSelect').html('<option value=>Model</option>');
        $.ajax({
            url: "{{ route('car.models') }}",
            type: 'POST',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                value: makerId
            },
            success: function(response) {
                let html = "";
                for (let i = 0; i < response.models.length; i++) {
                    html +=
                        `<option value=${response.models[i].id}>${response.models[i].name}</option>`;
                }
                $('#modelSelect').append(html);
            },
            error: function(xhr, status, error) {
                console.log('Error:', error);
            }
        });
    })

    $('#stateSelect').on('change', function() {
        const stateId = this.value;
        $('#citySelect').html('<option value=>City</option>')
        $.ajax({
            url: "{{ route('car.cities') }}",
            type: 'POST',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                value: stateId
            },
            success: function(response) {
                let html = "";
                for (let i = 0; i < response.cities.length; i++) {
                    html +=
                        `<option value=${response.cities[i].id}>${response.cities[i].name}</option>`;
                }
                $('#citySelect').append(html);
            },
            error: function(xhr, status, error) {
                console.log('Error:', error);
            }
        });
    })
</script>
