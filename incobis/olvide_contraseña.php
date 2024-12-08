<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo = $_POST['correo'];
    $sql = "SELECT * FROM usuarios WHERE correo = '$correo'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<script>alert('Se ha enviado un enlace de recuperación a su correo electrónico.');</script>";
    } else {
        echo "<script>alert('Correo no encontrado.');</script>";
    }
}
?>

<!-- Integración del HTML con estilos -->
<?php include 'olvide_contrase.html'; ?>
