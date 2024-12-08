import React from 'react';
import './Navbar.css';

const Navbar = () => {
    return (
        <nav className="navbar">
            <div className="logo">
                <img src="assets/imagenes/pixelcut-export2.png" alt="Logo INCOBIS" width="100" />
            </div>
            <ul className="nav-links">
                <li><a href="/">Inicio</a></li>
                <li><a href="/casas">Casas Disponibles</a></li>
                <li><a href="/login">Iniciar Sesión</a></li>
                <li><a href="/registro">Registrarse</a></li>
            </ul>
        </nav>
    );
};

export default Navbar;
