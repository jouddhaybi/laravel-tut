{{-- @extends('layout.resources')

@section('childContent')
    @include('layout.partials.header')
    @yield('content')
    @include('layout.partials.footer')
@endsection --}}

@props(['title' => '', 'bodyClass' => null])

<x-resource-layout :$title :$bodyClass>
    {{-- @include('layout.partials.header') --}}
    <x-layouts.header></x-layouts.header>
    {{ $slot }}
    <x-layouts.footer></x-layouts.footer>
</x-resource-layout>
<script>
    $(document).ready(function() {
    // alert('global');



    $('.btn-heart').on('click', function() {

            @guest
            toastr.error("Please Login. Or Create An Account if You Don't Have One.")
        @endguest

        @auth
        const carID = $(this).data('carid');
        // alert('click');
        $.ajax({
            url: "{{ route('car.addwatchlist') }}",
            type: 'POST',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                value: carID
            },
            success: function(response) {
                console.log(response);

                if (response.status == 201) {
                    //add car
                    toastr.success(response.message);
                    $('#emptyHeart' + carID).addClass('hidden');
                    $('#filledHeart' + carID).removeClass('hidden');

                }

                if (response.status == 200) {
                    //delete car
                    toastr.success(response.message)
                    $('#filledHeart' + carID).addClass('hidden');
                    $('#emptyHeart' + carID).removeClass('hidden');
                }
            },
            error: function(xhr, status, error) {
                console.log('Error:', error);
            }
        });
    @endauth

    })

    })
</script>
