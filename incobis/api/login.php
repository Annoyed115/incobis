<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");

include '../conexion.php'; // Archivo de conexión a MySQL

$data = json_decode(file_get_contents("php://input"), true);

if (isset($data['correo'], $data['contrasena'])) { // Clave JSON sigue siendo 'contrasena'
    $correo = $data['correo'];
    $contrasena = $data['contrasena']; // Valor enviado en JSON

    // Consulta para buscar el correo en la base de datos
    $sql = "SELECT * FROM usuarios WHERE correo = '$correo'";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $user = $result->fetch_assoc();
        // Verificar la contraseña con la columna 'password' de la base de datos
        if (password_verify($contrasena, $user['password'])) {
            echo json_encode(["message" => "Autenticación satisfactoria"]);
        } else {
            echo json_encode(["error" => "Contraseña incorrecta"]);
        }
    } else {
        echo json_encode(["error" => "Usuario no encontrado"]);
    }
} else {
    echo json_encode(["error" => "Datos incompletos"]);
}

$conn->close();
?>
