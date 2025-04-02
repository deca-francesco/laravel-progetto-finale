import { useEffect, useState } from "react"
import GameCard from "../components/GameCard";



export default function GamesPage() {

    const api_server = import.meta.env.VITE_API_SERVER
    const [games, setGames] = useState([])

    function fetchGames(url = api_server) {
        fetch(url)
            .then(res => res.json())
            .then(data => {
                console.log(data);
                setGames(data.data)
            }).catch(err => console.error(err))
    }

    useEffect(fetchGames, [])   // con le dipendenze vuote lo esegue una volta al caricamento della pagina

    return (
        <>
            <div className="container">
                <h1>Tutti i giochi</h1>
                <div className="row row-cols-1 row-cols-xl-2 g-5 mt-1 mb-5">
                    {games?.map(game => <GameCard key={game.id} game={game} />)}
                </div>
            </div>
        </>
    )
}