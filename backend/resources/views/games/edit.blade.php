@extends('layouts/app')

@section('content')

<h1 class="mb-4 d-flex justify-content-between align-items-center">
    Modifica gioco
    <a href="{{ url()->previous() }}" class="btn btn-secondary">Indietro</a>
</h1>

<form action="{{ route('games.update', $game) }}" method="POST" enctype="multipart/form-data" class="text-light"> {{-- enctype serve per poter inviare file --}}
    @csrf {{-- token di autenticazione di laravel che controlla che la chiamata provenga da un form suo e dal tuo pc, browser ecc --}}
    @method("PUT") {{-- l'attributo method accetta solo get o post, ma visto che la rotta update è associata al metodo PUT lo specifichiamo qua --}}

    <div class="mb-3">
        <label for="title">Titolo gioco</label>
        <input type="text" class="form-control" name="title" id="title" value="{{ $game->title }}" required>
    </div>
    <div class="mb-3">
        <label for="developer">Sviluppatore</label>
        <input type="text" class="form-control" name="developer" id="developer" value="{{ $game->developer }}" required>
    </div>
    <div class="mb-3">
        <label for="publisher">Editore</label>
        <input type="text" class="form-control" name="publisher" id="publisher" value="{{ $game->publisher }}" required>
    </div>

    <div class="mb-3">
        <label for="genre_id">Genere</label>
        <select class="form-select" name="genre_id" id="genre_id" required>
            @foreach ($genres as $genre)
            {{-- faccio in modo di avere già selzionato il genre attuale del game --}}
            <option value="{{ $genre->id }}" {{ $genre->id === $game->genre_id ? "selected" : "" }}>{{ $genre->name }}</option>
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
                {{-- faccio in modo di checkare le platforms che aveva il game --}}
                {{-- <input type="checkbox" name="platforms[]" value="{{ $platform->id }}" id="platform_{{ $platform->id }}" {{ $game->platforms->contains($platform->id) ? "checked" : "" }}>
                <label for="platform_{{ $platform->id }}" class="me-2">{{ $platform->name }}</label>
            </div>
            @endforeach
        </div>
    </div> --}}

    <div class="mb-3">
        <label for="release_date">Data rilascio</label>
        <input type="date" class="form-control" name="release_date" id="release_date" value="{{ $game->release_date }}" required>
    </div>
    <div class="mb-3">
        <label for="price">Prezzo</label>
        <input type="number" class="form-control" name="price" id="price" step=".01" min="0" max="100.00" value="{{ $game->price }}">
    </div>
    <div class="mb-3">
        <label for="rating">Valutazione</label>
        <input type="number" class="form-control" name="rating" id="rating" step=".1" min="0" max="10" value="{{ $game->rating }}">
    </div>
    <div class="mb-3">
        <label for="reviews">Numero recensioni</label>
        <input type="number" class="form-control" name="reviews" id="reviews" min="0" max="1000000" value="{{ $game->reviews }}">
    </div>

    {{-- <div class="mb-3">
        <label for="image">Immagine gioco</label>
        <input type="file" class="form-control" name="image" id="image">

        @if ($game->image)
        <div>Immagine corrente:</div>
        {{-- va costruito il percorso assoluto partendo da quello relativo del db --}}
        {{-- <img src="{{ asset('storage/' . $game->image) }}" class="img-fluid w-25" alt="copertina">
        @endif
    </div> --}}

    <div class="mb-3">
        <label for="description">Descrizione gioco</label>
        <textarea class="form-control" name="description" id="description" rows="10" required>{{ $game->description }}</textarea>
    </div>
    <div><button type="submit" class="btn btn-success px-5">Aggiorna</button></div>
</form>

@endsection