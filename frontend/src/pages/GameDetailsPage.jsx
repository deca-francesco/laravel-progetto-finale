import { useEffect, useState } from "react";
import { Link, useParams } from "react-router-dom";


export default function GameDetailsPage() {

    const { id } = useParams()
    const api_server = import.meta.env.VITE_API_SERVER
    const api_server_storage = import.meta.env.VITE_API_SERVER_STORAGE
    const [game, setGame] = useState({})

    function fetchGameDetails(url = `${api_server}/${id}`) {
        fetch(url)
            .then(res => res.json())
            .then(data => {
                console.log(data);
                setGame(data.data)
            }).catch(err => console.error(err))
    }

    useEffect(fetchGameDetails, [])

    return (
        <>
            <div className="container mb-5">
                <h1 className="d-flex justify-content-between align-items-center">
                    {game.title}
                    <Link to={"/games"} className="btn btn-secondary" >Indietro</Link>
                </h1>
                <p><strong>Sviluppatore: </strong>{game.developer}</p>
                <p><strong>Editore: </strong>{game.publisher}</p>
                <p><strong>Genere: </strong>{game.genre?.name}</p>
                <p>
                    <strong>Piattaforme: </strong>{game.platforms?.map(platform =>
                        <span className="badge me-2" key={platform.id} style={{ backgroundColor: platform.color }}> {platform.name}</span>
                    )}
                </p>
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
                <p><strong>Descrizione: </strong>{game.description}</p>
                {game.image ? (
                    <div>
                        <p>Anteprima: </p>
                        {/* costruzione url assoluto dal relativo delle API */}
                        <img src={`${api_server_storage}/${game.image}`} className="img-fluid" alt="copertina" />
                    </div>
                ) : ""}
            </div>
        </>
    )
}