@extends('layouts.app')

@section('title', 'Menù')

@section('content')

<div class="create_main pb-5 position-relative">
    @if (count($dishes) < 1)
    <div class="position-relative negative-index">
        {{-- banner con l'immagine del ristorante che sarà dinamica --}}
        <figure class="mb-0 photo-max-h overflow-hidden m-0">
            @if ($restaurant->image && str_contains($restaurant->image, 'restaurant_images/'))
            <div style="background-image:url({{asset('/storage/'. $restaurant->image)}})" class="h-100 menu-restaurant-banner"></div>

            @elseif($restaurant->image && str_contains($restaurant->image, 'https://'))
            <div style="background-image:url({{ $restaurant->image }})" class="h-100 menu-restaurant-banner"></div>

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
                    p.iva: {{ $restaurant->piva }}
                </h4>
            </div>

            <div class="position-absolute start-50 translate-middle z-2 add_button">
                <a class="btn btn-base-orange text-dark fw-bolder" href="{{ route('dishes.create') }}">Aggiungi un piatto!</a>
            </div>

        </div>
    </div>

    @endif

    @if (count($dishes) > 0)

    <div class="position-relative negative-index">
        {{-- banner con l'immagine del ristorante che sarà dinamica --}}
        <figure class="mb-0 photo-max-h overflow-hidden m-0">
            @if ($dishes[0]->restaurant->image && str_contains($dishes[0]->restaurant->image, 'restaurant_images/'))
            <div style="background-image:url({{asset('/storage/'. $dishes[0]->restaurant->image)}})" class="h-100 menu-restaurant-banner"></div>

            @elseif($dishes[0]->restaurant->image && str_contains($dishes[0]->restaurant->image, 'https://'))
            <div style="background-image:url({{ $dishes[0]->restaurant->image }})" class="h-100 menu-restaurant-banner"></div>

            @else 
            <div style="background-image:url('/restaurant_bg_1.jpg')" class="h-100 menu-restaurant-banner"></div>
            @endif

        </figure>

        {{-- informazioni generali del ristoranti --}}
        <div class="position-absolute custom-top-banner start-50 w-75 text-center translate-middle restaurant-credentials text-white p-0 p-lg-3 px-lg-5 rounded py-2">
            <div>
                <h1 class="text-uppercase">
                    {{ $dishes[0]->restaurant->activity_name }}
                </h1>
                <h3>
                    {{ $dishes[0]->restaurant->address }}
                </h3>
                <h4>
                    p.iva: {{ $dishes[0]->restaurant->piva }}
                </h4>
            </div>

            <div class="position-absolute start-50 translate-middle z-2 add_button">
                <a class="btn btn-base-orange text-dark fw-bolder" href="{{ route('dishes.create') }}">Aggiungi un piatto!</a>
            </div>

        </div>
    </div>
    <div class="custom-table-container">
        <div class="rounded overflow-hidden dishes-container">
            <div class="table-responsive w-100">
                <table class="table table-warning mb-0">
                    <thead>
                        <tr>
                            <th scope="col" class="py-3" style="width: 200px">Immagine</th>
                            <th scope="col" class="ps-4 py-3" style="width: 150px">Nome</th>
                            <th scope="col" class="py-3" style="width: 450px">Descrizione</th>
                            <th scope="col" class="py-3" style="width: 200px">Categoria</th>
                            <th scope="col" class="py-3" style="width: 200px">Prezzo</th>
                            <th scope="col" class="py-3" style="width: 180px">Disponibilità</th>
                            <th scope="col" class="text-center pe-4 py-3" style="width: 150px">Azioni</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dishes as $dish)
                        <tr class="">

                            <td class="align-middle">
                                @if($dish->image)
                                <a target="_blank" href="{{asset('/storage/'. $dish->image)}}">
                                    <img class="table-dish-img rounded" src="{{asset('/storage/'. $dish->image)}}" alt="immagine-piatto">
                                </a>
                                @else
                                <img class="table-dish-img rounded" src="/template-dish.webp" alt="immagine-piatto">
                                @endif
                            </td>
                            <td class="align-middle ps-4">{{ $dish->name }}</td>
                            <td class="align-middle">{{ $dish->description }}</td>
                            <td class="align-middle">{{ $dish->category->name }}</td>
                            <td class="align-middle">{{ $dish->price }}€</td>
                            <td class="align-middle">
                                <div class="ms-4 d-flex justify-content-center available px-2 rounded-pill text-white text-center @if($dish->visible == 0) bg-danger @else bg-success @endif">
                                    <span>

                                    </span>
                                </div>
                            </td>

                            <td class="align-middle pe-4">
                                <div class="d-flex align-items-center justify-content-center column-gap-2">
                                    {{-- edit button --}}
                                    <a href="{{ route('dishes.edit', $dish->slug) }}" class="btn btn-warning">
                                        <i class="fas fa-pen-to-square text-white"></i>
                                    </a>

                                    {{-- delete modal + button --}}
                                    <button
                                    type="button"
                                    class="btn btn-danger text-center delete-button"
                                    data-bs-toggle="modal"
                                    data-bs-target="#delete-modal"
                                    data-delete-id='{{ $dish->id }}'
                                    data-delete-path='dishes'
                                    data-delete-name='{{ $dish->name }}'
                                    >
                                    <i class="fas fa-trash-can"></i>
                                    </button>
                                </div>
                            </td>


                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @include('partials.delete-modal')
    @endif

</div>
@endsection
