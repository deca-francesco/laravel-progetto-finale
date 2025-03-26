@extends('layouts/app')

@section('content')


<h1 class="mb-4 d-flex justify-content-between align-items-center">
    Nuovo gioco
    <a href="{{ route('games.index') }}" class="btn btn-secondary">Indietro</a>
</h1>


{{-- se non specifichiamo il metodo ci porta alla index con i valori degli input nell'url --}}
{{-- index e store hanno lo stesso URI ma cambia il metodo --}}
<form action="{{ route('games.store') }}" method="POST" enctype="multipart/form-data" class="text-light"> {{-- enctype serve per poter inviare file --}}
    @csrf {{-- csrf è il token di autenticazione di laravel che controlla che la chiamata provenga da un form di questo sito --}}
    <div class="mb-3">
        <label for="title">Titolo gioco</label>
        <input type="text" class="form-control" name="title" id="title" required>
    </div>
    <div class="mb-3">
        <label for="developer">Sviluppatore</label>
        <input type="text" class="form-control" name="developer" id="developer" required>
    </div>
    <div class="mb-3">
        <label for="publisher">Editore</label>
        <input type="text" class="form-control" name="publisher" id="publisher" required>
    </div>

    <div class="mb-3">
        <label for="genre_id">Genere</label>
        <select class="form-select" name="genre_id" id="genre_id" required>
            @foreach ($genres as $genre)
            <option value="{{ $genre->id }}">{{ $genre->name }}</option>
            @endforeach
        </select>
    </div>

    {{-- <div class="mb-3">
        <label for="">Piattaforme</label>
        <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 g-2">
            @foreach ($platforms as $platform)
            <div class="col">
                {{-- se mettiamo name="platform_{{ $platform->id }}" invierà una platform per ogni checkbox selezionata.
                Con name="platforms[]" e value="{{ $platform->id }}" inviamo un array $platforms con elementi gli id delle platforms selezionate --}}
                {{-- <input type="checkbox" name="platforms[]" value="{{ $platform->id }}" id="platform_{{ $platform->id }}">
                <label for="platform_{{ $platform->id }}" class="me-2">{{ $platform->name }}</label>
            </div>
            @endforeach
        </div>
    </div> --}}

    <div class="mb-3">
        <label for="release_date">Data rilascio</label>
        <input type="date" class="form-control" name="release_date" id="release_date" value="{{ date('Y-m-d') }}" required>
    </div>
    <div class="mb-3">
        <label for="price">Prezzo</label>
        <input type="number" class="form-control" name="price" id="price" step=".01" min="0" max="100.00">
    </div>
    <div class="mb-3">
        <label for="rating">Valutazione</label>
        <input type="number" class="form-control" name="rating" id="rating" step=".1" min="0" max="10">
    </div>
    <div class="mb-3">
        <label for="reviews">Numero recensioni</label>
        <input type="number" class="form-control" name="reviews" id="reviews" min="0" max="1000000">
    </div>

    {{-- <div class="mb-3">
        <label for="image">Immagine gioco</label>
        <input type="file" class="form-control" name="image" id="image">
    </div> --}}

    <div class="mb-3">
        <label for="description">Descrizione gioco</label>
        <textarea class="form-control" name="description" id="description" rows="5" required></textarea>
    </div>
    <div><button type="submit" class="btn btn-success px-5">Salva</button></div>
</form>

@endsection