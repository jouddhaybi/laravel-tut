<x-app-layout title="Car Edit">
    {{-- @dd($carFeatures); --}}
    <main>
        <div class="container-small">
            <h1 class="car-details-page-title">Add new car</h1>
            <form action="" method="POST" enctype="multipart/form-data" class="card add-new-car-form">
                <div class="form-content">
                    <div class="form-details">
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label>Maker</label>
                                    <select id="makerSelect" name="maker">
                                        <option value="">Maker</option>
                                        @foreach ($makers as $maker)
                                            <option {{ $maker->id == $car->maker_id ? 'selected' : '' }}
                                                value="{{ $maker->id }}">
                                                {{ $maker->name }}</option>
                                        @endforeach
                                    </select>
                                    <p class="error-message">This field is required</p>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label>Model</label>
                                    <input type="hidden" name="" id="car_model" value="{{ $car->model_id }}">
                                    <select id='modelSelect' name="modelEdit">
                                        <option value="">Model</option>

                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label>Year</label>
                                    <select name="year">
                                        <option value="">Year</option>
                                        @php
                                            $currentYear = date('Y');
                                        @endphp
                                        @for ($year = $currentYear; $year >= 1000; $year--)
                                            <option value="{{ $year }}"
                                                {{ $year == $car->year ? 'selected' : '' }}>
                                                {{ $year }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Car Type</label>
                            <div class="row car-type-options">
                                @foreach ($carTypes as $carType)
                                    <div class="col">
                                        <label class="inline-radio">
                                            <input type="radio" name="car_type" value="{{ $carType->id }}"
                                                {{ $carType->id == $car->car_type_id ? 'checked' : '' }} />
                                            {{ $carType->name }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label>Price</label>
                                    <input type="number" placeholder="Price" value="{{ $car->price }}" />
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label>Vin Code</label>
                                    <input placeholder="Vin Code" value="{{ $car->vin }}" />
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label>Mileage (ml)</label>
                                    <input placeholder="Mileage" value="{{ $car->mileage }}" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Fuel Type</label>
                            <div class="row">
                                @foreach ($fuelTypes as $fuelType)
                                    <div class="col">
                                        <label class="inline-radio">
                                            <input type="radio" name="fuel_type" value="{{ $fuelType->id }}"
                                                {{ $fuelType->id == $car->fuel_type_id ? 'checked' : '' }} />
                                            {{ $fuelType->name }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label>State/Region</label>
                                    <select id="stateSelect" name="state">
                                        <option value="">State/Region</option>
                                        @foreach ($states as $state)
                                            <option value="{{ $state->id }}"
                                                {{ $state->id == $carState->id ? 'selected' : '' }}>
                                                {{ $state->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label>City</label>
                                    <input type="hidden" name="cityCar" id="car_city" value="{{ $car->city_id }}">
                                    <select id="citiesSelect" name="city">
                                        <option value="">City</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label>Address</label>
                                    <input placeholder="Address" value="{{ $car->address }}" />
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label>Phone</label>
                                    <input placeholder="Phone" value="{{ $car->phone }}" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">

                                @foreach ($carFeatures->getAttributes() as $column => $value)
                                    @if ($column !== 'car_id')
                                        <div class="col col-lg-6">
                                            <label class="checkbox">
                                                <input type="checkbox" name="air_conditioning"
                                                    value="{{ $value }}" {{ $value == 1 ? 'checked' : '' }} />
                                                {{ $column }}
                                            </label>
                                        </div>
                                    @endif
                                @endforeach

                            </div>
                        </div>
                        <div class="form-group">
                            <label>Detailed Description</label>
                            <textarea rows="10">
                                {{ $car->description }}
                            </textarea>
                        </div>
                        <div class="form-group">
                            <label class="checkbox">
                                <input type="checkbox" name="published"
                                    {{ $car->published_at != null ? 'checked' : '' }} />
                                Published
                            </label>
                        </div>
                    </div>
                    <div class="form-images">
                        <div class="form-image-upload">
                            <div class="upload-placeholder">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" style="width: 48px">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                            </div>
                            <input id="carFormImageUpload" type="file" multiple />
                        </div>
                        <div id="imagePreviews" class="car-form-images"></div>
                    </div>
                </div>
                <div class="p-medium" style="width: 100%">
                    <div class="flex justify-end gap-1">
                        <button type="button" class="btn btn-default">Reset</button>
                        <button class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </main>

</x-app-layout>


<script>
    $(document).ready(function() {
        const makerID = $('#makerSelect').val();
        const stateID = $('#stateSelect').val();

        $('#makerSelect').val(makerID).change();
        $('#stateSelect').val(stateID).change();

        const modelID = $('#car_model').val();
        const cityID = $('#car_city').val();
        console.log(modelID);

        setTimeout(function() {
            $('#modelSelect').val(modelID);
            $('#citiesSelect').val(cityID);
        }, 1000);
    })
</script>
