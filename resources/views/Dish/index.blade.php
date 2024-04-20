@extends('layouts.app')

@section('content')
    <main class="container-fluid  px-0 position-relative">

            <div class="">
                <figure class="mb-0 immagine_qualcosa" style="width: 99%">
                    <img class="img-fluid blur w-100" src="/restaurant_bg_1.jpg" alt="a">
                </figure>
            </div>












        <div class="container-fluid position-absolute index_main card_block">

                    @foreach ($dishes as $dish)
                <div class="row row-cols-1 g-4 row-cols-md-5 mx-3 mx-sm-5">

                    <div class="col">

                        <div class="bg_card rounded-4 single_card">
                            <figure class="p-3 img_plate mb-0">
                                {{-- <img src="{{ $dish->image }}" alt="No Image Found"> --}}
                                <img class="rounded-4" src="/pizza_card.webp" alt="No Image Found">
                            </figure>

                            <div class="p-3 rounded text-light pt-0">
                                <div class="d-flex justify-content-between">
                                    <h2 class="text-capitalize">{{ $dish->name }}</h2>
                                    <span>{{ $dish->price }}€</span>
                                </div>


                                <div class="mb-3">
                                    <span class="type px-5 py-1 rounded-4">{{$dish->category->name}}</span>
                                </div>




                                <div class="d-flex flex-column gap-2">
                                    <a class="text-center w-100 rounded-3 button_edit text-decoration-none text-light py-1" href="{{ route('dishes.edit', [$restaurant->id, $dish->id]) }}">EDIT</a>
                                    <a class="text-center button_delete w-100 rounded-3 button_edit text-decoration-none text-light py-1" href="{{ route('dishes.edit', [$restaurant->id, $dish->id]) }}">REMOVE</a>
                                </div>

                        </div>



                        </div>



                    </div>

                    <div class="col">

                        <div class="bg_card rounded-4 single_card">
                            <figure class="p-3 img_plate mb-0">
                                {{-- <img src="{{ $dish->image }}" alt="No Image Found"> --}}
                                <img class="rounded-4" src="/pizza_card.webp" alt="No Image Found">
                            </figure>

                            <div class="p-3 rounded text-light pt-0">
                                <div class="d-flex justify-content-between">
                                    <h2 class="text-capitalize">{{ $dish->name }}</h2>
                                    <span>{{ $dish->price }}€</span>
                                </div>


                                <div class="mb-3">
                                    <span class="type px-5 py-1 rounded-4">{{$dish->category->name}}</span>
                                </div>




                                <div class="d-flex flex-column gap-2">
                                        <a class="text-center w-100 rounded-3 button_edit text-decoration-none text-light py-1" href="{{ route('dishes.edit', [$restaurant->id, $dish->id]) }}">EDIT</a>
                                        <a class="text-center button_delete w-100 rounded-3 button_edit text-decoration-none text-light py-1" href="{{ route('dishes.edit', [$restaurant->id, $dish->id]) }}">REMOVE</a>
                                </div>

                        </div>



                        </div>



                    </div>


                </div>
                    @endforeach
                    <div>
                        <a class="btn-base-orange p-3 rounded-4" href="{{ route('dishes.create', $restaurant->id) }}">AGGIUNGI PIATTO</a>
                    </div>

    </main>





@endsection
