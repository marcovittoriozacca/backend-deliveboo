@extends('layouts.app')

@section('content')
<main class="container-fluid py-3 d-flex flex-column align-items-center vh-100" id="create_main">
    <h1 class="white mb-5 mt-2">Crea un nuovo piatto</h1>
    <div class="container container_form p-5" >
        <div class="d-flex justify-content-between gap-5">
            <div class="mb-3 w-100">
                <label for="exampleFormControlInput1" class="form-label">Name</label>
                <input type="name" class="form-control" id="exampleFormControlInput1" placeholder="inserisci il nome">
            </div>
            <div class="w-100">
                <label class="mb-2" for="form-select">Categoria</label>
                <select class="form-select" aria-label="Default select example">
                    <option selected>scegli una categoria</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
            </div>
        </div>
        <div class="my-3">
            <label for="exampleFormControlTextarea1" class="form-label">Descrizione</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="10" maxlength="1200"></textarea>
        </div>
        <div class="input-group my-5">
            <input type="file" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
            <button class="btn btn-outline-secondary" type="button" id="inputGroupFileAddon04">Carica</button>
        </div>
        <div class="mb-4">
            <div>
                <label for="priceTag" class="form-label">Prezzo</label>
                <input type="number" class="form-control" id="price">
            </div>
        </div>
        <div class="text-center w-100">
            <button type="button" class="btn btn-warning w-50 white">Aggiungi</button>
        </div>

    </div>

</main>

@endsection
