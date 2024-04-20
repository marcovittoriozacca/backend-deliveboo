@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>Benvenuto {{ Auth::user()->name }}</h1>
            <h3>In questa pagina potrai gestire il tuo ristorante!</h3>
        </div>
        <div class="col-6 d-none d-lg-block">
            <img class="img-fluid" src="" alt="dashboard-banner">
        </div>
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
