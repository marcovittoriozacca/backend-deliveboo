@extends('layouts.app')

@section('title', 'Deliveboo')


@section('content')

<div class="jumbotron mb-4 d-flex">
    <div class="content container">
        <h1 class="welcome-title display-5 fw-bold">
            Deliveboo
        </h1>

        <p class="col-md-8 fs-5 mb-5">
            🌟 Scopri i vantaggi di essere partner di Deliveboo!🌟
            <br>

            Espandi il tuo mercato, aumenta le vendite e goditi una maggiore visibilità. Con flessibilità operativa e feedback preziosi dai clienti. Diventa partner oggi e porta il tuo business al prossimo livello! 🚀🍔🌮
        </p>
        @guest
        <a class="btn-register btn btn-lg" href="{{ route('register') }}">{{ __('Registrati') }}</a>
        @else
        <a class="btn-register btn btn-lg" href="{{ route('dishes.index') }}">{{ __('Osserva i tuoi piatti!') }}</a>
        @endguest
        {{-- stima delle statistiche --}}
        <div class="m-5 d-flex align-items-center m-xs-0 estimateContainer gap-3">
            <div class="d-flex row">
                <span class="estimate-number">20k+</span>
                <span>Ordini completati</span>
            </div>
            <div class="vl"></div>
            <div  class="d-flex row">
                <span class="estimate-number">10k+</span>
                <span>Utenti attivi</span>
            </div>
            <div class="vl"></div>
            <div  class="d-flex row">
                <span class="estimate-number">30k+</span>
                <span>Clienti soddisfatti</span>
            </div>
        </div>
    </div>
    {{-- foto laterale --}}
    <div  class="side-photo">
        <figure>
            <img src="/welcome-side-photo.jpg" alt="-welcome-side-photo" class="responsive">
        </figure>
    </div>
</div>
{{-- seconda sezione (come funziona) --}}
<div class="welcomeSection2 p-4 text-center">
    <h1>Come funziona</h1>
    <p>Con deliveboo, puoi ordinare cibo da ristoranti locali direttamente dal tuo dispositivo, pagare online e ricevere consegne comodamente a casa tua.
    </p>
    <div class="cardContainer d-flex justify-content-center mt-5 p-5">
        {{-- prima card --}}
        <div class="cardNavy">
            <div class="tools">
              <div class="circle">
                <span class="red box"></span>
              </div>
              <div class="circle">
                <span class="yellow box"></span>
              </div>
              <div class="circle">
                <span class="green box"></span>
              </div>
            </div>
            <div class="card__content pt-3">
                <i class="fa-solid fa-address-card" style="color: #000000;"></i>
                <h3 class="py-3">Registrazione</h3>
                <p>Registrati e accedi al sito web o all'applicazione del servizio</p>
            </div>
          </div>
          {{-- seconda card --}}
          <div class="cardOrange">
            <div class="tools">
              <div class="circle">
                <span class="red box"></span>
              </div>
              <div class="circle">
                <span class="yellow box"></span>
              </div>
              <div class="circle">
                <span class="green box"></span>
              </div>
            </div>
            <div class="card__content pt-3">
                <i class="fa-solid fa-utensils"></i>
                <h3 class="py-3">Crea il profilo</h3>
                <p>Inserisci le informazioni del ristorante</p>
            </div>
          </div>
          {{-- terza card  --}}
          <div class="cardNavy">
            <div class="tools">
              <div class="circle">
                <span class="red box"></span>
              </div>
              <div class="circle">
                <span class="yellow box"></span>
              </div>
              <div class="circle">
                <span class="green box"></span>
              </div>
            </div>
            <div class="card__content align-items-center pt-3">
                <i class="fa-solid fa-handshake-simple" style="color: #000000;"></i>
                <h3 class="py-3">Ordini</h3>
                <p>Ora sei partner ufficiale e puoi ricevere ordini</p>
            </div>
          </div>
    </div>
</div>
@endsection
