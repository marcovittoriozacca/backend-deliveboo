@extends('layouts.app')

@section('content')
<div class="create_main pb-5">

    <div class="position-relative">

        {{-- banner con l'immagine del ristorante che sarà dinamica --}}
        <figure class="mb-0 photo-max-h overflow-hidden">
            <div style="background-image:url({{ $restaurant->image }})" class="h-100 menu-restaurant-banner"></div>
        </figure>

        {{-- informazioni generali del ristoranti --}}
        <div class="position-absolute top-50 start-50 translate-middle bg-danger p-3 rounded ">
            <h1>
                {{ $restaurant->activity_name }}
            </h1>
            <h3>
                {{ $restaurant->address }}
            </h3>
        </div>
    </div>

    {{-- sezione piatti --}}
    <div class="container">
        <div class="row row-gap-4">
            @for ($i = 0; $i < 5; $i++)    
            <div class="col-12">
                {{-- piatto --}}
                <div class="bg-primary p-3 rounded">
                    <figure class="mb-0">
                        {{-- <img src="{{ $dishes->image }}" alt="immagine-piatto"> --}}
                        <img class="img-fluid" src="/pizza_card.webp" alt="immagine-piatto">
                    </figure>

                    <div class="d-flex align-items-center justify-content-between">
                        <h3 class="mb-0">
                            {{ $dishes[0]->name }}
                        </h3>
                        <p class="mb-0">
                            {{ $dishes[0]->price }}
                        </p>
                    </div>

                    <div>
                        <p class="mb-0">{{ $dishes[0]->description }}</p>
                    </div>
                    <div>
                        <p class="mb-0">{{ $dishes[0]->ingredient }}</p>
                    </div>

                    <div class="row row-gap-3">
                        <div class="col-12">
                            <a href="{{ route('dishes.edit', [$restaurant->id, $dishes[0]->id]) }}">
                                <div class="btn-base-gray py-3 text-center rounded">
                                    Modifica Piatto
                                </div>
                            </a>
                        </div>
                        <div class="col-12">
                            {{-- ancora da modificare e ultimare --}}
                            <a class="btn btn-danger w-100" href="{{ route('dishes.edit', [$restaurant->id, $dishes[0]->id]) }}">
                                <div class=" py-2 text-center rounded">
                                    Modifica Piatto
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endfor
        </div>
    </div>

</div>
@endsection
