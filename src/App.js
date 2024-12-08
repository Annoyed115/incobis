import React from 'react';
import { BrowserRouter as Router, Route, Routes } from 'react-router-dom';
import Navbar from './components/Navbar';
import Formulario from './components/Formulario';
import ListaCasas from './components/ListaCasas';

const App = () => {
    return (
        <Router>
            <Navbar />
            <Routes>
                <Route path="/" element={<h1>Bienvenido a INCOBIS</h1>} />
                <Route path="/casas" element={<ListaCasas />} />
                <Route path="/login" element={<Formulario type="login" />} />
                <Route path="/registro" element={<Formulario type="register" />} />
            </Routes>
        </Router>
    );
};

export default App;
