@extends('layouts/app')

@section('content')
<h1 class="d-flex justify-content-between align-items-center">
    Tutti i generi di videogiochi
    <span>
        <a href="{{ route('games.index') }}" class="btn btn-primary">Giochi</a>
        <a href="" class="btn btn-primary">Piattaforme</a>
        <a href="{{ route('genres.create') }}" class="btn btn-success">Nuovo genere</a>
    </span>
</h1>

<div class="row row-cols-1 row-cols-sm-2 row-cols-xl-3 g-4 mt-2">
    @foreach ($genres as $genre)
    <div class="col">
        <div class="card h-100">
            <div class="card-body">
                <h3>{{ $genre->name }}</h3>
                <p>{{ $genre->description }}</p>
            </div>
            <div class="card-footer d-flex justify-content-end pt-2">
                <a class="btn btn-warning me-2" href="{{ route('genres.edit', $genre->id) }}">Modifica</a>
                {{-- Button trigger modal --}}
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteGenreModal_{{$genre->id}}">Elimina</button>
            </div>
        </div>
    </div>

    {{-- Modal --}}
    <div class="modal fade" id="deleteGenreModal_{{$genre->id}}" tabindex="-1" aria-labelledby="deleteGenreModal_{{$genre->id}}_Label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content text-dark">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="deleteGenreModal_{{$genre->id}}_Label">Sei sicuro di voler eliminare questo genere?</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                {{-- <div class="modal-body"></div> --}}
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                    {{-- serve il form per poter usare il metodo delete --}}
                    <form action="{{ route('genres.destroy', $genre->id) }}" method="POST">
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