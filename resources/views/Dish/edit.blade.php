@extends('layouts.app')

@section('title', $dish->slug)

@section('content')
<main class="container-fluid py-3 d-flex flex-column align-items-center v-100 create_main">
    <h1 class="text-center white mb-5 mt-2">Modifica: {{ $dish->name }}</h1>
    <form id="dish-form" action="{{ route('dishes.update', $dish->slug) }}" method="POST" enctype="multipart/form-data" autocomplete="off">
        @csrf
        @method('PUT')
        <div class="container container_form p-3 py-3 p-lg-5">
            <div class="d-flex justify-content-between gap-5 flex-column flex-lg-row">
                {{-- edit nome --}}
                <div class="mb-3 w-100">
                    <label for="name" class="form-label">Name<span class="text-danger"> *</span></label>
                    <input
                        name="name"
                        type="text"
                        class="form-control @error('name') is-invalid @enderror"
                        id="name"
                        required
                        maxlength="255"
                        placeholder="inserisci il nome"
                        value="{{ old('name', $dish->name) }}"
                        autocomplete="off"
                    >
                    <div id="nameError" class="d-none text-danger" role="alert"></div>
                    @error ('name')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                {{-- edit categorie - ancora da sistemare --}}
                <div class="w-100">
                    <label class="mb-2" for="category">Categoria<span class="text-danger"> *</span></label>
                    <select class="form-select @error('category_id') is-invalid @enderror" name="category_id" id="category" required autocomplete="off">
                        @foreach ($categories as $category)
                        @if (old('category_id'))
                        @endif
                        <option
                            value="{{ $category->id }}"
                            class="category-option"
                            @if (old('category_id', $dish->category_id) == $category->id) selected @endif
                        >
                        {{ $category->name }}
                        </option>
                            {{ $category->name }}</option>
                        @endforeach
                    </select>
                    <div id="categoryError" class="d-none text-danger" role="alert"></div>
                    @error ('category_id')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            {{-- edit descrizione --}}
            <div class="my-3">
                <label for="description" class="form-label">Descrizione<span class="text-danger"> *</span></label>
                <textarea
                    name="description"
                    class="form-control @error ('description') is-invalid @enderror"
                    id="description"
                    rows="10"
                    required
                    autocomplete="off"
                    maxlength="255">{{ old('description', $dish->description) }}</textarea>
                    <div id="descriptionError" class="d-none text-danger" role="alert"></div>
                    @error ('description')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
            </div>

            {{-- edit ingredienti --}}
            <div class="mb-3 w-100">
                <label for="ingredient" class="form-label">Ingredienti<span class="text-danger"> *</span></label>
                <input
                    name="ingredient"
                    type="text"
                    class="form-control @error ('ingredient') @enderror"
                    id="ingredient"
                    placeholder="inserisci il nome"
                    required
                    maxlength="255"
                    autocomplete="off"
                    value="{{ old('ingredient', $dish->ingredient) }}"
                >
                <div id="ingredientError" class="d-none text-danger" role="alert"></div>
                @error ('ingredient')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            {{-- edit immagine --}}
            <div class="input-group my-5 d-flex flex-column">
                <label for="image" class="mb-2">Immagine</label>
                <input type="file" class="form-control w-100 rounded" id="image" aria-describedby="inputGroupFileAddon04" autocomplete="off" name="image" aria-label="Upload">
                <div id="imageError" class="d-none text-danger" role="alert"></div>
            </div>

            {{-- edit prezzo --}}
            <div class="mb-4">
                <div>
                    <label for="price" class="form-label">Prezzo<span class="text-danger"> *</span></label>
                    <input
                        name="price"
                        type="number"
                        step=".01"
                        class="form-control @error ('price') is-invalid @enderror"
                        id="price"
                        required
                        min="0"
                        autocomplete="off"
                        value="{{ old('price', $dish->price) }}"
                    >
                    <div id="priceError" class="d-none text-danger" role="alert"></div>
                    @error ('price')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>


            {{-- visibile / disponibilità del prodotto --}}
            <div class="mb-4">
                <label class="form-check-label" for="dish-visible"> Piatto Disponibile </label>
                    <div class="form-check mb-2">
                        <input
                            class="form-check-input"
                            type="checkbox"
                            value="1"
                            id="dish-visible"
                            name="visible"
                            @if(old('visible', $dish->visible) == 1) checked @endif
                        />
                    </div>
            </div>

            <div class="text-center w-100">
                <button type="submit" class="btn btn-warning w-50 fw-bold">Modifica</button>
            </div>

        </div>
    </form>

</main>
@endsection
