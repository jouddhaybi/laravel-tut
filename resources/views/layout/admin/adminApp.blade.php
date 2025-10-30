@props(['title' => '', 'bodyClass' => null])

<x-adminResource-layout :$title :$bodyClass>
    {{-- @include('layout.partials.header') --}}
    {{-- <x-layouts.adminHeader></x-layouts.adminHeader> --}}
    <x-layouts.admin.adminHeader />
    {{ $slot }}
</x-adminResource-layout>
<script></script>
