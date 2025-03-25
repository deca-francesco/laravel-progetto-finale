@extends('./layouts/app')

@section('content')

<h1 class="mb-4 d-flex justify-content-between align-items-center">
    {{ $game->title }}
    <span>
        <a class="btn btn-secondary" href="{{ route('games.index') }}">Indietro</a>
        <a class="btn btn-warning" href="{{ route('games.edit', $game) }}">Modifica</a>

        {{-- Button trigger modal --}}
        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteGameModal">Elimina</button>
    </span>
</h1>

<div class="row row-cols-1">
    <div class="col">
        <p><strong>Sviluppatore: </strong>{{ $game->developer }}</p>
        <p><strong>Editore: </strong>{{ $game->publisher }}</p>
        <p><strong>Data rilascio: </strong>{{ $game->release_date }}</p>
        <p><strong>Prezzo: </strong>{{ $game->price != "" ? "$game->price €" : "Non disponibile"}}</p>
        <p><strong>Valutazione: </strong>{{ $game->rating != "" ? $game->rating . "/10" : "Non disponibile"}}</p>
        <p><strong>Numero recensioni: </strong>{{ $game->reviews != "" ? $game->reviews : "Non disponibile"}}</p>
        <p><strong>Descrizione: </strong>{{ $game->description }}</p>
        {{-- <p><strong>Piattaforme: </strong>

            @forelse ($game->platforms as $platform)
            <span class="badge" style="background-color: {{ $platform->color }}">{{ $platform->name }}</span>
            @empty
            Nessuna piattaforma selezionata
            @endforelse

        </p> --}}

        {{-- @if ($game->image)
        <p>Anteprima:</p>
        {{-- va costruito il percorso assoluto partendo da quello relativo del db --}}
        {{-- <img src="{{ asset('storage/' . $game->image) }}" style="max-width: 100%" alt="copertina">
        @endif --}}

    </div>
</div>

@endsection


{{-- Modal --}}
<div class="modal fade" id="deleteGameModal" tabindex="-1" aria-labelledby="deleteGameModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content text-dark">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="deleteGameModalLabel">Sei sicuro di voler eliminare il gioco?</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            {{-- <div class="modal-body"></div> --}}
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                {{-- serve il form per poter usare il metodo delete --}}
                <form action="{{ route('games.destroy', $game) }}" method="POST">
                    @csrf
                    @method("DELETE")
                    <button type="submit" class="btn btn-danger">Elimina definitivamente</button>
                </form>
            </div>
        </div>
    </div>
</div>