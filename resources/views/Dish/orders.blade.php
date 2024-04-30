@extends('layouts.app')

@section('title', 'Ordini')

@section('content')
<div class="d-flex flex-column container align-items-center">

    <div class="mb-5 mt-5 p-3 text-center w-50 bg-dark-subtle rounded-5">
        <h2>{{$restaurant->activity_name}}</h2>
        <h5>{{$restaurant->address}}</h5>
        <h6>{{$restaurant->piva}}</h6>
    </div>


    <div class="mt-5 w-100 pt-5">
        <div class="custom-table-container">
            <div class="rounded overflow-hidden dishes-container">
                <div class="table-responsive w-100">
                    <table class="table table-striped table-hover border">
                        <thead class="table-dark">
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
                            <tr class="">
                                <td class="align-middle ps-4"><a href="{{ route('orders.show', $order[0]->id) }}">{{ $order[0]->id }}</a></td>
                                <td class="align-middle ps-4">{{ $order[0]->email }}</td>
                                <td class="align-middle">{{ $order[0]->total_price }}€</td>
                                <td class="align-middle">{{ $order[0]->address }}</td>
                                <td class="align-middle">
                                @if($order[0]->status)
                                    <span class="badge rounded-pill text-bg-success">Consegnato</span>
                                @else
                                    <span class="badge rounded-pill text-bg-danger">Non Consegnato</span>
                                @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <a class="text-center btn-base-orange rounded w-25 py-2" href="{{ route('orders-chart') }}">Grafico Ordini</a>
</div>
@endsection
