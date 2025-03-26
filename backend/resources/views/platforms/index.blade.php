@extends('layouts/app')

@section('content')
<h1 class="d-flex justify-content-between align-items-center">
    Tutte le piattaforme
    <span class="text-end">
        <a href="{{ route('games.index') }}" class="btn btn-primary">Giochi</a>
        <a href="{{ route('genres.index') }}" class="btn btn-primary">Generi</a>
        <a href="{{ route('platforms.create') }}" class="btn btn-success">Nuova piattaforma</a>
    </span>
</h1>

<div class="row row-cols-2 row-cols-xl-3 g-4 mt-2">
    @foreach ($platforms as $platform)
    <div class="col">
        <div class="card h-100">
            <div class="card-body">
                <h3>{{ $platform->name }}</h3>
                <p>Colore badge: {{ strtoupper($platform->color) }} <input type="color" value="{{ $platform->color }}" disabled></p>

            </div>
            <div class="card-footer d-flex justify-content-end pt-2">
                <a class="btn btn-warning me-2" href="{{ route('platforms.edit', $platform->id) }}">Modifica</a>
                {{-- Button trigger modal --}}
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deletePlatformModal_{{$platform->id}}">Elimina</button>
            </div>
        </div>
    </div>

    {{-- Modal --}}
    <div class="modal fade" id="deletePlatformModal_{{$platform->id}}" tabindex="-1" aria-labelledby="deletePlatformModal_{{$platform->id}}_Label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content text-dark">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="deletePlatformModal_{{$platform->id}}_Label">Sei sicuro di voler eliminare questa piattaforma?</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                {{-- <div class="modal-body"></div> --}}
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                    {{-- serve il form per poter usare il metodo delete --}}
                    <form action="{{ route('platforms.destroy', $platform->id) }}" method="POST">
                        @csrf
                        @method("DELETE")
                        <button type="submit" class="btn btn-danger">Elimina definitivamente</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @endforeach

</div>

@endsection