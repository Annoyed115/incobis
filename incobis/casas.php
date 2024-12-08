<?php
include 'conexion.php'; // Conexión a la base de datos

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $experiencia = $_POST['experiencia'];
    $area = $_POST['area-aseo'];
    $comentarioArea = $_POST['comentarioArea'] ?? '';
    $contrato = $_POST['tipo-contrato'];
    $profesion = $_POST['profesion'];
    $comentario = $_POST['comentario'];

    // Insertar los datos en la base de datos
    $sql = "INSERT INTO casas (titulo, descripcion, ubicacion, precio) 
            VALUES ('Formulario de Solicitud', 
                    'Área: $area, Comentario Área: $comentarioArea, Tipo de Contrato: $contrato, Nivel Profesional: $profesion', 
                    '$comentario', $experiencia)";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Formulario enviado correctamente.'); window.location.href = 'incobis.html';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Solicitud</title>
    <style>

        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            margin: 0;
        }
        .containerMenu {
            width: 100%;
            background-color: #001256;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1000;
            display: flex;
            align-items: center;
        }
        .logo2 {
            border: 2px solid #002c44;
            border-radius: 30px;
            padding: 5px;
        }
        .menu-items {
            list-style-type: none;
            margin-left: 820px;
            padding: 5px;
        }
        .container {
            width: 40%;
            margin: 8% auto;
            background-color: #fffbfb;
            padding: 80px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
        }
        h2 { text-align: center; margin-top: 15px; }
        label { display: block; margin-bottom: 10px; }
        input, select, textarea {
            width: 100%; padding: 10px; margin-bottom: 10px;
            border: 1px solid #ccc; border-radius: 4px;
        }
        .btn-submit {
            background-color: #85d8fc; color: white;
            border: none; border-radius: 5px;
            padding: 10px 20px; font-size: 16px;
            cursor: pointer;
        }
        .btn-submit:hover { background-color: #bfc0c0; }
    </style>
</head>
<body>
    <header>
        <nav>
            <div class="containerMenu">
                <img class="logo2" src="assets/imagenes/pixelcut-export2.png" alt="logo de incobis" width="130" height="75">
                <ul class="menu-items"> 
                    <a type="button" class="btn-submit" onclick="location.href='incobis.html'">Atrás</a>
                </ul>
            </div>
        </nav>
    </header>
    <div class="container">
        <h2>Formulario de Solicitud</h2>
        <form method="POST" action="casas.php">
            <div class="form-group">
                <label for="experiencia">Experiencia (en meses):</label>
                <input type="number" id="experiencia" name="experiencia" min="0" required>
            </div>
            <div class="form-group">
                <label for="area-aseo">Área de Aseo:</label>
                <select id="area-aseo" name="area-aseo" required>
                    <option value="general">General</option>
                    <option value="Cocina">Cocina</option>
                    <option value="piscina">Piscina</option>
                    <option value="muebles">Muebles</option>
                    <option value="habitaciones">Habitaciones</option>
                    <option value="otros">Otros</option>
                </select>
            </div>
            <div class="form-group">
                <label for="tipo-contrato">Tipo de Contrato:</label>
                <select id="tipo-contrato" name="tipo-contrato" required>
                    <option value="temporal">Temporal</option>
                    <option value="indefinido">Indefinido</option>
                    <option value="contrato-por-obra">Contrato por Obra</option>
                </select>
            </div>
            <div class="form-group">
                <label for="profesion">Nivel profesional:</label>
                <select id="profesion" name="profesion" required>
                    <option value="tecnico">Técnico</option>
                    <option value="tecnologo">Tecnólogo</option>
                    <option value="experiencia">Con experiencia certificada</option>
                </select>
            </div>
            <div class="form-group">
                <label for="comentario">Comentario:</label>
                <textarea id="comentario" name="comentario" rows="4" placeholder="Escribe aquí tus comentarios..." required></textarea>
            </div>
            <button type="submit" class="btn-submit">Enviar Solicitud</button>
        </form>
    </div>
</body>
</html>
