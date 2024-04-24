@extends('layouts.app')

@section('title', 'Menù')

@section('content')

<div class="create_main pb-5 position-relative">
    @if (count($dishes) < 1)
    <div class="position-relative negative-index">
        {{-- banner con l'immagine del ristorante che sarà dinamica --}}
        <figure class="mb-0 photo-max-h overflow-hidden m-0">
            @if ($restaurant->image )
            <div style="background-image:url({{asset('/storage/'. $restaurant->image)}})" class="h-100 menu-restaurant-banner"></div>
            @else
            <div style="background-image:url('/restaurant_bg_1.jpg')" class="h-100 menu-restaurant-banner"></div>
            @endif
        </figure>

        {{-- informazioni generali del ristoranti --}}
        <div class="position-absolute top-50 start-50 w-75 text-center translate-middle restaurant-credentials text-white p-0 p-lg-3 px-lg-5 rounded">
            <div>
                <h1 class="text-uppercase">
                    {{ $restaurant->activity_name }}
                </h1>
                <h3>
                    {{ $restaurant->address }}
                </h3>
                <h4>
                    p.iva:{{ $restaurant->piva }}
                </h4>
            </div>

            <div class="position-absolute start-50 translate-middle z-2 add_button">
                <a class="btn btn-base-orange" href="{{ route('dishes.create') }}">Aggiungi un piatto!</a>
            </div>

        </div>
    </div>

    @endif

    @if (count($dishes) > 0)

    <div class="position-relative negative-index">
        {{-- banner con l'immagine del ristorante che sarà dinamica --}}
        <figure class="mb-0 photo-max-h overflow-hidden m-0">
            @if ($dishes[0]->restaurant->image)
            <div style="background-image:url({{asset('/storage/'. $dishes[0]->restaurant->image)}})" class="h-100 menu-restaurant-banner"></div>
            @else
            <div style="background-image:url('/restaurant_bg_1.jpg')" class="h-100 menu-restaurant-banner"></div>
            @endif
        </figure>

        {{-- informazioni generali del ristoranti --}}
        <div class="position-absolute custom-top-banner start-50 w-75 text-center translate-middle restaurant-credentials text-white p-0 p-lg-3 px-lg-5 rounded">
            <div>
                <h1 class="text-uppercase">
                    {{ $dishes[0]->restaurant->activity_name }}
                </h1>
                <h3>
                    {{ $dishes[0]->restaurant->address }}
                </h3>
                <h4>
                    p.iva:{{ $dishes[0]->restaurant->piva }}
                </h4>
            </div>

            <div class="position-absolute start-50 translate-middle z-2 add_button">
                <a class="btn btn-base-orange" href="{{ route('dishes.create') }}">Aggiungi un piatto!</a>
            </div>

        </div>
    </div>


    {{-- sezione piatti --}}
    <div class="container dishes-container">
        <div class="row row-gap-4 py-3">
            @foreach ($dishes as $dish)
                
                    <div class="col-12 col-md-6 col-lg-4">
                        {{-- piatto --}}
                        <div class="bg_card p-4 rounded-3 h-100 d-flex flex-column  row-gap-2 justify-content-between">
                            <figure class="mb-0 figure_plate">
                                @if($dish->image)
                                    <img class=" rounded-2 dish-image" src="{{asset('/storage/'. $dish->image)}}" alt="immagine-piatto">
                                @else
                                    <img class="img-fluid rounded-2" src="/template-dish.webp" alt="immagine-piatto">
                                @endif
                            </figure>

                            <div class="d-flex align-items-center justify-content-between my-2">
                                <h3 class="mb-0 text-white">
                                    {{ $dish->name }}
                                </h3>
                                <p class="mb-0 text-white">
                                    {{ $dish->price }}€
                                </p>
                            </div>

                            <div class="bg-body-tertiary text-dark rounded-2 my-2 py-2 text-center">
                                {{-- limitare campo a 255 --}}
                                <p class="mb-0 text-truncate">{{ $dish->description }}</p>
                            </div>
                            <div>
                                <p class="mb-0 text-secondary">Ingredienti: <span class="text-white">{{ $dish->ingredient }}</span></p>
                            </div>

                            <div class="my-3 d-flex align-items-center justify-content-between ">
                                <p class="mb-0 d-inline-block rounded-pill py-1 px-2 text-white bg-base-orange">{{ $dish->category->name }}</p>
                                <div class="rounded-pill px-4 py-1 @if($dish->visible == 0) bg-danger text-white @else bg-success @endif">
                                    {{ ($dish->visible)? 'Disponibile' : 'Non Disponibile' }}
                                </div>
                            </div>

                            <div class="row row-gap-3 mt-auto">
                                <div class="col-12 col-xl-6">
                                    <a href="{{ route('dishes.edit', $dish->slug) }}">
                                        <div class="btn-base-gray py-3 text-center rounded">
                                            Modifica Piatto
                                        </div>
                                    </a>
                                </div>
                                <div class="col-12 col-xl-6">
                                    {{-- ancora da modificare e ultimare --}}
                                    <button
                                        type="button"
                                        class="btn btn-danger w-100 py-3 text-center delete-button"
                                        data-bs-toggle="modal"
                                        data-bs-target="#delete-modal"
                                        data-delete-id='{{ $dish->id }}'
                                        data-delete-path='dishes'
                                        data-delete-name='{{ $dish->name }}'
                                    >
                                    Rimuovi Piatto
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                
            @endforeach
        </div>
    </div>

    @include('partials.delete-modal');
    @endif

</div>
@endsection
