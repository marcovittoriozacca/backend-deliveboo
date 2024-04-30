@extends('layouts.app')

@section('title', 'Ordini')

@section('content')
<div class="d-flex flex-column container-fluid">


    <div class="mb-5 text-center">
        <h1>{{$orders[0]->full_name}}</h1>
        <h2>{{$orders[0]->email}}</h2>
        <h3>{{$orders[0]->tel_number}}</h3>
        <h4>{{$orders[0]->address}}</h4>
    </div>

    <div class="mt-5">

        <div class="custom-table-container">
            <div class="rounded overflow-hidden dishes-container">
                <div class="table-responsive w-100">
                    <table class="table table-warning mb-0">
                        <thead>
                            <tr>

                                <th scope="col" class="ps-4 py-3" style="width: 150px">Id piatto</th>
                                <th scope="col" class="py-3" style="width: 200px">Nome</th>
                                <th scope="col" class="py-3" style="width: 200px">Prezzo</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                @foreach ($order->dishes as $dish)
                            <tr class="">
                                <td class="align-middle ps-4">{{ $dish->id }}</a></td>
                                <td class="align-middle ps-4">{{ $dish->name }}</td>
                                <td class="align-middle ps-4">{{ $dish->price }}</td>
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
