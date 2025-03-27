import { Outlet } from "react-router-dom";
import AppHeader from "../components/AppHeader";
import AppFooter from "../components/AppFooter";



export default function AppLayout() {

    return (
        <div className="bg-dark text-light">
            <AppHeader />
            <main>
                <Outlet />
            </main>
            <AppFooter />
        </div>
    )
}