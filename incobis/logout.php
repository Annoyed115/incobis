<?php
session_start();
session_destroy(); // Cierra la sesión

// Redirigir al inicio de sesión
header("Location: login.php");
exit();
?>
