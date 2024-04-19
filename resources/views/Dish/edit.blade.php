@extends('layouts.app')

@section('content')
<main class="container py-3">
    <h1>Modifica (elemento)</h1>
    <div class="d-flex">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Name</label>
            <input type="name" class="form-control" id="exampleFormControlInput1" placeholder="inserisci il nome">
        </div>
        <select class="form-select" aria-label="Default select example">
            <option selected>scegli una categoria</option>
            <option value="1">One</option>
            <option value="2">Two</option>
            <option value="3">Three</option>
          </select>
    </div>
    <div>
        <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
    </div>
    <div class="input-group">
        <input type="file" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
        <button class="btn btn-outline-secondary" type="button" id="inputGroupFileAddon04">Carica</button>
    </div>
    <div>
        <div class="mb-3">
            <label for="priceTag" class="form-label">Prezzo</label>
            <input type="price" class="form-control" id="price">
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
            <label class="form-check-label" for="flexCheckChecked">
              Disponibilità
            </label>
          </div>
    </div>
    <div class="text-center">
        <button type="button" class="btn btn-warning">Modifica</button>
    </div>
</main>
@endsection
