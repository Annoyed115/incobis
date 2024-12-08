<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *"); // Permitir acceso a cualquier origen

include '../conexion.php'; // Conexión a la base de datos

// Consulta para obtener las casas
$sql = "SELECT id, titulo, descripcion, precio, imagen, ubicacion FROM casas";
$result = $conn->query($sql);

$casas = [];
if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $casas[] = $row;
    }
}

echo json_encode($casas);
$conn->close();
?>
