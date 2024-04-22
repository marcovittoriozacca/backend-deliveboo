@extends('layouts.app')

@section('content')
<main class="container-fluid py-3 d-flex flex-column align-items-center v-100 create_main">
    <h1 class="text-center white mb-5 mt-2">Aggiungi un piatto</h1>
    <form action="{{ route('dishes.store') }}" method="POST">
        @csrf
        <div class="container container_form p-3 py-3 p-lg-5">
            <div class="d-flex justify-content-between gap-5 flex-column flex-lg-row">
                {{-- edit nome --}}
                <div class="mb-3 w-100">
                    <label for="name" class="form-label">Name</label>
                    <input 
                        name="name" 
                        type="text" 
                        class="form-control @error('name') is-invalid @enderror" 
                        id="name" 
                        required 
                        maxlength="255" 
                        placeholder="inserisci il nome" 
                        value="{{ old('name')? old('name') : '' }}"
                    >
                    @error ('name')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
    
                {{-- edit categorie - ancora da sistemare --}}
                <div class="w-100">
                    <label class="mb-2" for="form-select">Categoria</label>
                    <select class="form-select @error('category_id') is-invalid @enderror" name="category_id" required>
                        @foreach ($categories as $category)
                        <option 
                            value="{{ $category->id }}"
                            @if (old('category_id') == $category->id) selected @endif
                        >
                        {{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error ('category_id')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
    
            {{-- edit descrizione --}}
            <div class="my-3">
                <label for="description" class="form-label">Descrizione</label>
                <textarea 
                    name="description" 
                    class="form-control @error ('description') is-invalid @enderror" 
                    id="description" 
                    rows="10" 
                    required
                    maxlength="1200">{{ old('description')? old('description') : '' }}</textarea>
                    @error ('description')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
            </div>
    
            {{-- edit ingredienti --}}
            <div class="mb-3 w-100">
                <label for="ingredient" class="form-label">Ingredienti</label>
                <input 
                    name="ingredient" 
                    type="text" 
                    class="form-control @error ('ingredient') @enderror" 
                    id="ingredient" 
                    placeholder="inserisci il nome" 
                    required
                    maxlength="255"
                    value="{{ old('ingredient')? old('ingredient') : '' }}"
                >
                @error ('ingredient')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
    
            {{-- edit immagine - ancora da sistemare --}}
            <div class="input-group my-5">
                <input type="file" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                <button class="btn btn-outline-secondary" type="button" id="inputGroupFileAddon04">Carica</button>
            </div>
    
            {{-- edit prezzo --}}
            <div class="mb-4">
                <div>
                    <label for="price" class="form-label">Prezzo</label>
                    <input 
                        name="price" 
                        type="number"
                        step=".01" 
                        class="form-control @error ('price') is-invalid @enderror" 
                        id="price"
                        required
                        min="0"
                        value="{{ old('price')? old('price') : '' }}"
                    >
                    @error ('price')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="text-center w-100">
                <button type="submit" class="btn btn-warning w-50 white">Aggiungi</button>
            </div>
    
        </div>
    </form>

</main>
@endsection
