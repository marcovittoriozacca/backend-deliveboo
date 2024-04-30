@extends('layouts.app')

@section('title', 'Ordini')

@section('content')
<div class="d-flex flex-column">


    <div class="mb-5">
        <h1>{{$restaurant->activity_name}}</h1>
        <h2>{{$restaurant->address}}</h2>
        <h3>{{$restaurant->piva}}</h3>
    </div>


    <div class="mt-5">
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
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                            <tr class="">
                                <td class="align-middle ps-4"><a href="{{ route('orders.show', $order[0]->id) }}">{{ $order[0]->id }}</a></td>
                                <td class="align-middle ps-4">{{ $order[0]->email }}</td>
                                <td class="align-middle">{{ $order[0]->total_price }}€</td>
                                <td class="align-middle">{{ $order[0]->address }}€</td>
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
