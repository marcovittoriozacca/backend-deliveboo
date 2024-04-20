@extends('layouts.app')

@section('content')
@if (count($dishes) > 0)

@foreach ($dishes as $dish)
    <div class="bg-body-tertiary p-3 rounded">
        <p>{{ $dish->name }}</p>
        <p>{{ $dish->description }}</p>
        <p>{{ $dish->ingredient }}</p>
        <img src="{{ $dish->image }}" alt="immagine-piatto-quando-verrà-aggiunta">
        <p>{{ $dish->price }}</p>
    </div>
@endforeach

@endif


@endsection
