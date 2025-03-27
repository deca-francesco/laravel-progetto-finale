import { Link } from "react-router-dom";


export default function AppHeader() {

    return (
        <>
            <header className="bg-dark">
                <div className="container h-100 d-flex align-items-center">
                    <Link to={"/games"} ><img src="/src/assets/logo-no-background.png" alt="logo" width={150} /></Link>
                </div>
            </header>
        </>
    )
}