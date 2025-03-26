@extends('layouts/app')


@section('content')

<h1 class="mb-4 d-flex justify-content-between align-items-center">
    Modifica genere
    <a href="{{ route('genres.index') }}" class="btn btn-secondary">Indietro</a>
</h1>

<form action="{{ route('genres.update', $genre) }}" method="POST" class="text-light">
    @csrf {{-- token di autenticazione di laravel che controlla che la chiamata provenga da un form suo e dal tuo pc, browser ecc --}}
    @method("PUT") {{-- l'attributo method accetta solo get o post, ma visto che la rotta update è associata al metodo PUT lo specifichiamo qua --}}

    <div class="mb-3">
        <label for="name">Nome</label>
        <input type="text" class="form-control" name="name" id="name" value="{{ $genre->name }}" required>
    </div>
    <div class="mb-3">
        <label for="description">Descrizione</label>
        <textarea class="form-control" name="description" id="description" rows="4" required>{{ $genre->description }}</textarea>
    </div>
    <div><button type="submit" class="btn btn-success px-5">Aggiorna</button></div>
</form>



@endsection