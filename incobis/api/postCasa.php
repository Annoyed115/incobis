<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Content-Type: application/json");

include '../conexion.php';

$data = json_decode(file_get_contents("php://input"), true);

if (isset($data['titulo'], $data['descripcion'], $data['precio'], $data['imagen'], $data['ubicacion'])) {
    $titulo = $data['titulo'];
    $descripcion = $data['descripcion'];
    $precio = $data['precio'];
    $imagen = $data['imagen'];
    $ubicacion = $data['ubicacion'];

    $sql = "INSERT INTO casas (titulo, descripcion, precio, imagen, ubicacion) VALUES ('$titulo', '$descripcion', $precio, '$imagen', '$ubicacion')";
    if ($conn->query($sql) === TRUE) {
        echo json_encode(["message" => "Casa agregada correctamente"]);
    } else {
        echo json_encode(["error" => $conn->error]);
    }
} else {
    echo json_encode(["error" => "Datos incompletos"]);
}

$conn->close();
?>
