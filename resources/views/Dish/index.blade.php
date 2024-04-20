@extends('layouts.app')

@section('content')

    <div class="p-2">
        @if (count($dishes) > 0)


            @foreach ($dishes as $dish)


            <div class="bg_card rounded-4">



                <figure class="p-3 img_plate">
                    {{-- <img src="{{ $dish->image }}" alt="No Image Found"> --}}
                    <img src="/pizza_card.webp" alt="No Image Found">
                </figure>

                <div class="p-3 rounded text-light">
                    <div class="d-flex justify-content-between">
                        <p>{{ $dish->name }}</p>
                        <p>{{ $dish->price }}</p>
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
            @endforeach
            <a href="{{ route('dishes.create', $restaurant->id) }}">crea</a>
        @endif

    </div>




@endsection
