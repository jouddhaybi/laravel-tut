<x-adminApp-layout title="My Cars" bodyClass="page-my-cars">
    <div>
        @foreach ($users as $index => $user)
            <h1>{{ $user->name }}</h1>
        @endforeach ()
    </div>
</x-adminApp-layout>
