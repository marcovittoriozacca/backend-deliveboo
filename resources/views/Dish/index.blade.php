@extends('layouts.app')

@section('content')
    <main class="container-fluid index_main">


        <div class="container">






                    @foreach ($dishes as $dish)
                <div class="row row-cols-1 row-cols-md-3 mx-3 mx-sm-5 ">

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
                                    <div class="button_edit rounded-3 text-center py-1">
                                        <a class="text-decoration-none text-light " href="{{ route('dishes.edit', [$restaurant->id, $dish->id]) }}">EDIT</a>
                                    </div>
                                    <div class="button_delete rounded-3 text-center py-1">
                                        <a class="text-decoration-none text-light " href="{{ route('dishes.edit', [$restaurant->id, $dish->id]) }}">REMOVE</a>
                                    </div>
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
                                    <div class="button_edit rounded-3 text-center py-1">
                                        <a class="text-decoration-none text-light " href="{{ route('dishes.edit', [$restaurant->id, $dish->id]) }}">EDIT</a>
                                    </div>
                                    <div class="button_delete rounded-3 text-center py-1">
                                        <a class="text-decoration-none text-light " href="{{ route('dishes.edit', [$restaurant->id, $dish->id]) }}">REMOVE</a>
                                    </div>
                                </div>

                        </div>



                        </div>



                    </div>


                </div>
                    @endforeach




                <div>
                    <a href="{{ route('dishes.create', $restaurant->id) }}">CREA</a>
                </div>

    </main>





@endsection
