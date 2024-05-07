@extends('layouts.app')

@section('title', 'Ordini')

@section('content')
<div class="d-flex flex-column position-relative create_main pb-5">


    <div class="text-center position-relative negative-index position-relative negative-index">
        <figure class="mb-0 photo-max-h overflow-hidden m-0">
            @if ($restaurant->image && str_contains($restaurant->image, 'restaurant_images/'))
            <div style="background-image:url({{asset('/storage/'. $restaurant->image)}})" class="h-100 menu-restaurant-banner"></div>

            @elseif($restaurant->image && str_contains($restaurant->image, 'https://'))
            <div style="background-image:url({{ $restaurant->image }})" class="h-100 menu-restaurant-banner"></div>

            @else
            <div style="background-image:url('/restaurant_bg_1.jpg')" class="h-100 menu-restaurant-banner"></div>

            @endif
        </figure>


        <div class="position-absolute top-50 start-50 w-75 text-center translate-middle restaurant-credentials text-white p-0 p-lg-3 px-lg-5 rounded">
            <h1 class="text-uppercase">{{$restaurant->activity_name}}</h1>
            <h3>{{$restaurant->address}}</h3>
            <h4 class="mb-3">p.iva: {{$restaurant->piva}}</h4>
            <a class="text-center btn-base-orange rounded px-5 m-0 m-auto py-2" href="{{ route('orders-chart') }}">Grafico Ordini</a>
        </div>
    </div>


    <div>

        <div class="custom-table-container">
            <div class="rounded overflow-hidden dishes-container">
                <div class="table-responsive w-100">
                    <h4 class="text-center bg-base-orange py-3 mb-0">Totale ordini: <span>{{count($orders)}}</span></h4>
                    <table class="table table-warning mb-0">
                        <thead>
                            <tr>
                                <th scope="col" class="py-3" style="width: 200px">Nome</th>
                                <th scope="col" class="ps-4 py-3 d-none d-sm-table-cell" style="width: 150px">Email</th>
                                <th scope="col" class="ps-4 py-3" style="width: 150px">Telefono</th>
                                <th scope="col" class="py-3 d-none d-sm-table-cell" style="width: 200px">Prezzo totale</th>
                                <th scope="col" class="py-3 d-none d-sm-table-cell" style="width: 180px">Indirizzo</th>
                                <th scope="col" class="py-3 d-none d-sm-table-cell" style="width: 180px">Data</th>
                                <th scope="col" class="py-3 d-none d-sm-table-cell" style="width: 100px">Ordine</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                            <tr>

                                <td class="align-middle ps-4 d-none d-sm-table-cell">{{ $order->full_name }}</td>

                                    <td class="align-middle ps-4 d-sm-none d-table-cell">
                                        <a class="h3 text-primary" href="{{ route('orders.show', $order->id) }}">
                                            {{ $order->full_name }}
                                        </a>
                                    </td>
                                <td class="align-middle ps-4 d-none d-sm-table-cell">{{ $order->email }}</td>
                                <td class="align-middle ps-4">{{ $order->tel_number }}</td>
                                <td class="align-middle d-none d-sm-table-cell">{{ $order->total_price }}€</td>
                                <td class="align-middle d-none d-sm-table-cell">{{ $order->address }}</td>

                                <td class="align-middle d-none d-sm-table-cell">{{ $order->date }}</td>
                                <td class="align-middle ps-4 d-none d-sm-table-cell">
                                    <a class="h3" href="{{ route('orders.show', $order->id) }}">
                                        <i class="fas fa-square-arrow-up-right"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
