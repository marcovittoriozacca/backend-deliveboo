@extends('layouts.app')

@section('content')
<div class="container">
    <div class="my-lg-5">
        <div class="row align-items-center">
            <div class="col-12 col-lg-6 py-4">
                <div class="text-center text-lg-start bg-dark-navy-blue rounded p-3 text-white">
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

    <div class="py-lg-5">
        <div class="row bg-dark-navy-blue px-3 py-4 rounded-2">
            <div class="col-12 col-lg-6 order-lg-1">
                <div class="d-lg-flex flex-column row-gap-3">
                    <div class="bg-base-orange p-3 text-white mb-3 mb-lg-0 rounded">
                        <h4>Nome Attività: {{ $restaurants[0]->activity_name }}</h4>
                        <p>Indirizzo: {{ $restaurants[0]->address }}</p>
                        <p>Partita IVA: {{ $restaurants[0]->piva }}</p>
                        <h5>Proprietario: {{ Auth::user()->name . ' ' . Auth::user()->surname }} </h5>
                    </div>

                    <div class="d-none d-lg-block">
                        <a class="d-lg-block text-center btn-base-orange rounded py-3" href="{{ route('dishes.index', $restaurants[0]->id) }}">Gestisci il tuo menù</a>
                    </div>

                    <div class="d-none d-lg-block">
                        <a class="d-lg-block text-center btn-base-orange rounded py-3" href="{{ route('dishes.index', $restaurants[0]->id) }}">Gestisci il tuo menù</a>
                    </div>

                </div>
            </div>
            <div class="col-12  col-lg-6">
                <div>
                    <figure class="mb-0 position-relative d-flex justify-content-center align-items-center">
                        <img class="img-fluid rounded" src="/trashcan.jpg" alt="">
                        <a class="d-lg-none text-center btn-base-orange rounded w-75 py-2 position-absolute" href="{{ route('dishes.index', $restaurants[0]->id) }}">Gestisci il tuo menù</a>
                        <a class="d-lg-none text-center btn-base-orange rounded w-75 py-2 position-absolute dashboard_links_mt" href="{{ route('dishes.index', $restaurants[0]->id) }}">Osserva gli ordini</a>
                    </figure>
                </div>
            </div>
        </div>
    </div>

    
    
</div>
@endsection
