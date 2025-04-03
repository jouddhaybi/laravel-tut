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
