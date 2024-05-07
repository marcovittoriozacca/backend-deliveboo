@extends('layouts.app')

@section('title', $restaurant->activity_name)

@section('content')
<div class="create_main">
    <div class="container">
        <div class="mb-lg-5 pt-lg-5">
            <div class="row align-items-center">
                <div class="col-12 col-lg-6 py-4">
                    <div class="text-center text-lg-start bg-dark-navy-blue rounded p-3 text-white shadow-lg">
                        <h1>Benvenuto {{ Auth::user()->name }}!</h1>
                        <h3>In questa pagina potrai gestire il tuo ristorante!</h3>
                    </div>
                </div>
                <div class="col-6 d-none d-lg-block">
                    <div class="position-relative">
                        <figure class="mb-0">
                            <img class="img-fluid position-absolute" src="/dashboard-girl-on-chair.svg" alt="dashboard-banner">
                            <img class="img-fluid pt-5" src="/orange-bg.png" alt="dashboard-banner">
                        </figure>
                    </div>
                </div>
            </div>
        </div>

        <div class="pb-5 py-lg-5">
            <div class="row bg-dark-navy-blue px-3 py-4 rounded-2">
                <div class="col-12 col-lg-6 order-lg-1">
                    <div class="d-lg-flex flex-column justify-content-evenly h-100 row-gap-3">
                        <div class="bg-base-orange p-3 mb-3 mb-lg-0 rounded text-center text-lg-start ">
                            <h4>Nome Attività: <span class="fw-bolder h2">{{ $restaurant->activity_name }}</span></h4>
                            <p>Indirizzo: {{ $restaurant->address }}</p>
                            <p>Partita IVA: {{ $restaurant->piva }}</p>
                            <h5>Proprietario: <span class="fw-bolder h3">{{ Auth::user()->name . ' ' . Auth::user()->surname }}</span> </h5>
                        </div>

                        <div class="d-flex flex-column gap-3">

                            <div class="d-none d-lg-block">
                                <a class="d-lg-block text-center btn-base-orange rounded py-3 text-dark fw-bolder" href="{{ route('dishes.index') }}">Gestisci il tuo menù</a>
                            </div>

                            <div class="d-none d-lg-block">
                                <a class="d-lg-block text-center btn-base-orange rounded py-3 text-dark fw-bolder" href="/orders">Osserva gli ordini</a>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-12  col-lg-6">
                    <div>
                        <figure class="mb-0 position-relative d-flex justify-content-center align-items-center m-0">
                            @if ($restaurant->image && str_contains($restaurant->image, 'restaurant_images/'))
                            <img class="img-fluid rounded" src="{{asset('/storage/'. $restaurant->image)}}" alt="restaurant-img">
                            @elseif($restaurant->image && str_contains($restaurant->image, 'https://'))
                            <img class="img-fluid rounded" src="{{ $restaurant->image }}" alt="restaurant-img">
                            @else
                            <img class="img-fluid rounded" src="/restaurant_bg_1.jpg" alt="restaurant-img">
                            @endif
                            <a class="d-lg-none text-center btn-base-orange rounded w-75 py-2 position-absolute" href="{{ route('dishes.index') }}">Menù</a>
                            <a class="d-lg-none text-center btn-base-orange rounded w-75 py-2 position-absolute dashboard_links_mt" href="/orders">Ordini</a>
                        </figure>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
