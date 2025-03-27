import { Link } from "react-router-dom";


export default function GameCard({ game }) {

    return (
        <>
            <div className="col">
                <div className="card h-100">
                    <div className="card-header">
                        <h4>{game.title}</h4>
                    </div>
                    <div className="card-body">
                        <p><strong>Sviluppatore: </strong>{game.developer}</p>
                        <p><strong>Editore: </strong>{game.publisher}</p>
                        <p><strong>Genere: </strong>{game.genre.name}</p>
                        <p><strong>Data rilascio: </strong>{game.release_date}</p>
                        <p>
                            <strong>Prezzo: </strong>
                            {game.price && game.price !== "0.00"
                                ? `${game.price} €`
                                : game.price === "0.00"
                                    ? "Gratis"
                                    : "Non disponibile"}
                        </p>
                        <p><strong>Valutazione: </strong>{game.rating != "" ? game.rating + "/10" : "Non disponibile"}</p>
                        <p><strong>Numero recensioni: </strong>{game.reviews != "" ? game.reviews + " €" : "Non disponibile"}</p>
                    </div>
                    <div className="card-footer pt-2">
                        <Link to={`/games/${game.id}`} className="btn btn-primary">Dettagli</Link>
                    </div>
                </div>
            </div>
        </>
    )
}