import React, { useState } from 'react';
import './Formulario.css';

const Formulario = ({ type }) => {
    const [formData, setFormData] = useState({
        email: '',
        password: '',
        nombre: ''
    });

    const handleChange = (e) => {
        const { name, value } = e.target;
        setFormData({ ...formData, [name]: value });
    };

    const handleSubmit = (e) => {
        e.preventDefault();
        console.log(formData);
        // Aquí enviarías los datos al backend (PHP)
        fetch(type === "login" ? "http://localhost/incobis/login.php" : "http://localhost/incobis/registro.php", {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify(formData),
        });
    };

    return (
        <form onSubmit={handleSubmit}>
            {type === "register" && (
                <div>
                    <label>Nombre:</label>
                    <input type="text" name="nombre" onChange={handleChange} required />
                </div>
            )}
            <div>
                <label>Email:</label>
                <input type="email" name="email" onChange={handleChange} required />
            </div>
            <div>
                <label>Contraseña:</label>
                <input type="password" name="password" onChange={handleChange} required />
            </div>
            <button type="submit">
                {type === "login" ? "Iniciar Sesión" : "Registrarse"}
            </button>
        </form>
    );
};

export default Formulario;
