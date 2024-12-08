<?php
include 'conexion.php';

$sql = "SELECT * FROM propiedades";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "Título: " . $row['titulo'] . " - Precio: $" . $row['precio'] . "<br>";
    }
} else {
    echo "No hay propiedades disponibles.";
}
?>
