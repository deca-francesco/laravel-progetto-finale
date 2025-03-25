<!-- Life is available only in the present moment. - Thich Nhat Hanh -->
<div class="card h-100">
    <div class="card-body">
        <h4>{{ $title }}</h4>
        <p><strong>Sviluppatore: </strong>{{ $developer }}</p>
        <p><strong>Editore: </strong>{{ $publisher }}</p>
        <p><strong>Data rilascio: </strong>{{ $release_date }}</p>
        <p><strong>Prezzo: </strong>{{ $price != "" ? "$price €" : "Non disponibile"}}</p>
        <p><strong>Valutazione: </strong>{{ $rating != "" ? $rating . "/10" : "Non disponibile"}}</p>
        <p><strong>Numero recensioni: </strong>{{ $reviews != "" ? $reviews : "Non disponibile"}}</p>
        {{-- <p><strong>Descrizione: </strong>{{ $description }}</p> --}}
        <div class="card-footer d-flex justify-content-end pt-4">
            <a class="btn btn-primary me-2" href="{{ route('games.show', $id) }}">Dettagli</a>
            <a class="btn btn-warning me-2" href="">Modifica</a>
            {{-- Button trigger modal --}}
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteGameModal_{{$id}}">Elimina</button>
        </div>
    </div>
</div>

{{-- Modal --}}
<div class="modal fade" id="deleteGameModal_{{$id}}" tabindex="-1" aria-labelledby="deleteGameModal_{{$id}}_Label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content text-dark">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="deleteGameModal_{{$id}}_Label">Sei sicuro di voler eliminare il gioco?</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            {{-- <div class="modal-body"></div> --}}
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                {{-- serve il form per poter usare il metodo delete --}}
                <form action="{{ route('games.destroy', $id) }}" method="POST">
                    @csrf
                    @method("DELETE")
                    <button type="submit" class="btn btn-danger">Elimina definitivamente</button>
                </form>
            </div>
        </div>
    </div>
</div>