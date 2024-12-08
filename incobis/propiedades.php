<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $ubicacion = $_POST['ubicacion'];

    $sql = "INSERT INTO propiedades (titulo, descripcion, precio, ubicacion) 
            VALUES ('$titulo', '$descripcion', '$precio', '$ubicacion')";

    if ($conn->query($sql) === TRUE) {
        echo "Propiedad agregada correctamente.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Agregar Propiedades</title>
    <link rel="stylesheet" href="assets/css/registro.css">
</head>
<body>
    <h1>Agregar Propiedad</h1>
    <form method="POST">
        <label>Título:</label>
        <input type="text" name="titulo" required><br>
        <label>Descripción:</label>
        <textarea name="descripcion" required></textarea><br>
        <label>Precio:</label>
        <input type="number" step="0.01" name="precio" required><br>
        <label>Ubicación:</label>
        <input type="text" name="ubicacion" required><br>
        <button type="submit">Agregar</button>
    </form>
</body>
</html>
