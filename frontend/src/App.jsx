import { BrowserRouter, Route, Routes } from "react-router-dom"
import AppLayout from "./layouts/AppLayout"
import GamesPage from "./pages/GamesPage"
import GameDetailsPage from "./pages/GameDetailsPage"
import NotFound from "./pages/NotFound"


function App() {

  return (
    <>
      <BrowserRouter>
        <Routes>

          <Route element={<AppLayout />} >
            <Route index path="/games" element={<GamesPage />} />
            <Route path="/games/:id" element={<GameDetailsPage />} />

            <Route path='*' element={<NotFound />} />
          </Route>

        </Routes>
      </BrowserRouter>
    </>
  )
}

export default App
