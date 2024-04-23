@extends('layouts.app')
@section('content')

<div class="jumbotron mb-4 d-flex">
    <div class="content container">
        <h1 class="welcome-title display-5 fw-bold">
            Deliveboo
        </h1>

        <p class="col-md-8 fs-5 mb-5">Scopri il gusto a domicilio: ordina il meglio della cucina direttamente a casa tua. Esperienze culinarie uniche, comodamente servite sulla tua tavola. Semplice, veloce, delizioso!
        </p>
        <a class="btn-register btn btn-lg" href="{{ route('register') }}">{{ __('Register') }}</a>
        {{-- stima delle statistiche --}}
        <div class="m-5 d-flex align-items-center">
            <div class="d-flex row">
                <span class="estimate-number">20k+</span>
                <span>orders completed</span>
            </div>
            <div class="vl"></div>
            <div  class="d-flex row">
                <span class="estimate-number">10k+</span>
                <span>regular visitor</span>
            </div>
            <div class="vl"></div>
            <div  class="d-flex row">
                <span class="estimate-number">30k+</span>
                <span>Happy customers</span>
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
    <h1>how it works</h1>
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
                <i class="fa-solid fa-location-dot" style="color: #000000"></i>
                <h3 class="py-3">Metti la tua posizione</h3>
                <p>Inserisci il luogo in cui desideri ricevere l'ordine</p>
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
                <h3 class="py-3">Scegli cosa mangiare</h3>
                <p>scegli tra tutte le centinaia di ristoranti partner</p>
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
                <i class="fa-solid fa-credit-card" style="color: #000000"></i>
                <h3 class="py-3">Fai il pagamento</h3>
                <p>Effetua il pagamento per ricevere l'ordine a casa</p>
            </div>
          </div>
    </div>
</div>
@endsection
