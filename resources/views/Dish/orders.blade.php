@extends('layouts.app')

@section('title', 'Ordini')

@section('content')
<div class="d-flex flex-column position-relative create_main pb-5">


    <div class="text-center position-relative negative-index position-relative negative-index">
        <figure class="mb-0 photo-max-h overflow-hidden m-0">
            @if ($restaurant->image )
            <div style="background-image:url({{asset('/storage/'. $restaurant->image)}})" class="h-100 menu-restaurant-banner"></div>
            @else
            <div style="background-image:url('/restaurant_bg_1.jpg')" class="h-100 menu-restaurant-banner"></div>
            @endif
        </figure>


        <div class="position-absolute top-50 start-50 w-75 text-center translate-middle restaurant-credentials text-white p-0 p-lg-3 px-lg-5 rounded">
            <h1 class="text-uppercase">{{$restaurant->activity_name}}</h1>
            <h3>{{$restaurant->address}}</h3>
            <h4>p.iva:{{$restaurant->piva}}</h4>

        </div>
    </div>


    <div>
        <div class="custom-table-container">
            <div class="rounded overflow-hidden dishes-container">
                <div class="table-responsive w-100">
                    <table class="table table-warning mb-0">
                        <thead>
                            <tr>
                                <th scope="col" class="py-3" style="width: 200px">Id</th>
                                <th scope="col" class="ps-4 py-3" style="width: 150px">Nome</th>
                                <th scope="col" class="py-3" style="width: 200px">Prezzo totale</th>
                                <th scope="col" class="py-3" style="width: 180px">Address</th>
                                <th scope="col" class="py-3" style="width: 180px">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                            <tr>


                                <td class="align-middle ps-4"><a style="text-decoration:underline; color:blue"  href="{{ route('orders.show', $order[0]->id) }}">{{ $order[0]->id }}</a></td>
                                <td class="align-middle ps-4">{{ $order[0]->email }}</td>
                                <td class="align-middle">{{ $order[0]->total_price }}€</td>
                                <td class="align-middle" rel="reply-to" >{{ $order[0]->address }}</td>

                                <td class="align-middle">
                                    <div class="ms-2 d-flex justify-content-center available px-2 rounded-pill text-white text-center @if($order[0]->status == 0) bg-danger @else bg-success @endif">
                                        <span>

                                        </span>
                                    </div>
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
