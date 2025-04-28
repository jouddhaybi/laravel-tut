<x-app-layout title="Car Edit" bodyClass="edit-car-page">
    <main>
        <div class="container-small">
            <h1 class="car-details-page-title">Add new car</h1>
            <form action="{{ route('car.updatecar', $car->id) }}" method="POST" enctype="multipart/form-data"
                class="card add-new-car-form">
                @csrf
                @method('PATCH')
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
                                    <select id='modelSelect' name="model">
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
                                    <input name="price" type="number" placeholder="Price"
                                        value="{{ $car->price }}" />
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label>Vin Code</label>
                                    <input name="vin" placeholder="Vin Code" value="{{ $car->vin }}" />
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label>Mileage (ml)</label>
                                    <input name="mileage" placeholder="Mileage" value="{{ $car->mileage }}" />
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
                                    <input type="hidden" name="city" id="car_city" value="{{ $car->city_id }}">
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
                                    <input placeholder="Address" name="address" value="{{ $car->address }}" />
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label>Phone</label>
                                    <input placeholder="Phone" name="phone" value="{{ $car->phone }}" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <h4>
                                Car Features
                            </h4>
                            <div class="col selectAll">
                                <label class="checkbox">
                                    <input id="selectAll" type="checkbox" name="select_all" value="1" />
                                    Select All
                                </label>
                            </div>
                            <div class="row">
                                <div class="col featureBox">
                                    @foreach ($carFeatures->getAttributes() as $column => $value)
                                        @if ($column !== 'car_id')
                                            <label class="checkbox col-lg-5">
                                                <input type="checkbox" name="{{ $column }}"
                                                    value="{{ $value }}" {{ $value == 1 ? 'checked' : '' }} />
                                                {{ $column }}
                                            </label>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Detailed Description</label>
                            <textarea rows="10" name="description">
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

                </div>
                <div class="p-medium" style="width: 100%">
                    <div class="flex justify-end gap-1">

                        <button type="button" class="edit-btn-reset  btn btn-default">
                            <a href="{{ url()->current() }}">Reset</a>
                        </button>

                        <button class="btn btn-primary">Edit</button>
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

        setTimeout(function() {
            $('#modelSelect').val(modelID);
            $('#citiesSelect').val(cityID);
        }, 1000);

        @if (session('success'))
            toastr.success("{{ session('success') }}");
        @endif

        $('.image-preview-edit-delete').on('click', function() {
            const carID = $(this).attr('data-carid');
            const imageID = $(this).attr('data-imageid');

            console.log(carID);
            $('#car-form-image-preview-' + carID).remove();
            $('<input>').attr({
                type: 'hidden',
                name: 'deleted_images[]',
                value: imageID
            }).appendTo('form');

        })
        $('#selectAll').change(function() {
            var isChecked = $(this).is(':checked');
            $('.featureBox input[type="checkbox"]').prop('checked', isChecked);
        });


    })
</script>
