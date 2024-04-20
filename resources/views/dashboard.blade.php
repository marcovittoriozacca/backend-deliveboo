@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @foreach ($restaurants as $restaurant)
        <div class="col-12">
            <p>{{ $restaurant->activity_name }}</p>
            <img src="{{ $restaurant->image }}" alt="immagine-ristorante-quando-ci-sarà">
            <p>{{ $restaurant->address }}</p>
            <p>{{ $restaurant->piva }}</p>

            <a href="{{ route('dishes.index', $restaurant->id) }}">Menù</a>
        </div>
        @endforeach
    </div>
</div>
@endsection
