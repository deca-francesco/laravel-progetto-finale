@extends('layouts/app')

@section('content')


<h1 class="mb-4 d-flex justify-content-between align-items-center">
    Nuovo genere
    <a href="{{ route('genres.index') }}" class="btn btn-secondary">Indietro</a>
</h1>

{{-- se non specifichiamo il metodo ci porta alla index con i valori degli input nell'url --}}
{{-- index e store hanno lo stesso URI ma cambia il metodo --}}
<form action="{{ route('genres.store') }}" method="POST" class="text-light">
    @csrf
    {{-- csrf è il token di autenticazione di laravel che controlla che la chiamata provenga da un form suo e dal tuo pc, browser ecc --}}
    <div class="mb-3">
        <label for="name">Nome</label>
        <input type="text" class="form-control" name="name" id="name" required>
    </div>
    <div class="mb-3">
        <label for="description">Descrizione</label>
        <textarea class="form-control" name="description" id="description" rows="4" required></textarea>
    </div>
    <div><button type="submit" class="btn btn-success px-5">Salva</button></div>
</form>

@endsection