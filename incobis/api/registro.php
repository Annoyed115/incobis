<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");

include '../conexion.php'; // Archivo de conexión a MySQL

$data = json_decode(file_get_contents("php://input"), true);

if (isset($data['nombre'], $data['correo'], $data['contrasena'])) {
    $nombre = $data['nombre'];
    $correo = $data['correo'];
    $password = password_hash($data['contrasena'], PASSWORD_DEFAULT); 

    $sql = "INSERT INTO usuarios (nombre, correo, password) VALUES ('$nombre', '$correo', '$password')";
    if ($conn->query($sql)) {
        echo json_encode(["message" => "Registro exitoso"]);
    } else {
        echo json_encode(["error" => "Error al registrar: " . $conn->error]);
    }
} else {
    echo json_encode(["error" => "Datos incompletos"]);
}

$conn->close();
?>
