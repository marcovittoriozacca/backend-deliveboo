@extends('layouts.app')

@section('title', 'Ordini')

@section('content')
<div class="d-flex flex-column gap-5 container-fluid px-0 position-relative bg-blue">

    <div class="text-center position-relative negative-index position-relative negative-index bg-base-orange" style="height: 400px">
        <div class="position-absolute top-50 start-50 w-75 text-center translate-middle restaurant-credentials text-white p-0 p-lg-3 px-lg-5 rounded" >
            <h1>Cliente: {{$orders[0]->full_name}}</h1>
            <h3>Email: {{$orders[0]->email}}</h3>
            <h3>Telefono: {{$orders[0]->tel_number}}</h3>
            <h4>Indirizzo: {{$orders[0]->address}}</h4>
            <h4>Data: {{$orders[0]->date}}</h4>
            <h4>Importo: {{$orders[0]->total_price}}€</h4>
        </div>
    </div>

    <div style="min-height:calc(100vh - 85.45px - 448px)">

        <div class="custom-table-container">
            <div class="rounded mx-auto overflow-hidden dishes-container">
                <div class="table-responsive w-100">
                    <table class="table table-warning mb-0">
                        <thead>
                            <tr>

                            <th scope="col" class="py-3 text-center" style="width: 200px">Nome</th>

                            <th scope="col" class="py-3 text-center" style="width: 200px">Quantità</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)

                                @foreach ($order->dishes as $dish)
                            <tr>
                                <td class="align-middle text-center">{{ $dish->name }}</td>
                                <td class="align-middle text-center">{{ $dish->pivot->quantity }}</td>
                            </tr>
                                @endforeach
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
