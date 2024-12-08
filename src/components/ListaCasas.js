import React, { useEffect, useState } from 'react';
import axios from 'axios';
import './ListaCasas.css';

const ListaCasas = () => {
    const [casas, setCasas] = useState([]);

    useEffect(() => {
        // Llamada a la API PHP
        axios.get("http://localhost/incobis/api/getCasas.php")
            .then(response => {
                setCasas(response.data);
            })
            .catch(error => {
                console.error("Error al obtener datos:", error);
            });
    }, []);

    return (
        <div>
            <h2>Casas Disponibles</h2>
            <div className="casas-container">
                {casas.map((casa) => (
                    <div key={casa.id} className="casa-card">
                        <h3>{casa.titulo}</h3>
                        {casa.imagen ? (
                            <img src={casa.imagen} alt={casa.titulo} width="300" />
                        ) : (
                            <p>[Sin Imagen Disponible]</p>
                        )}
                        <p>{casa.descripcion}</p>
                        <p><strong>Precio:</strong> ${casa.precio}</p>
                        <p><strong>Ubicación:</strong> {casa.ubicacion}</p>
                    </div>
                ))}
            </div>
        </div>
    );
};

export default ListaCasas;
