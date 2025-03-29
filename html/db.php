<?php
$conexion = new mysqli("base_datos_pdf", "usuario", "clave", "sistema_reportes");

if ($conexion->connect_errno) {
    die("Error de conexión a la base de datos: " . $conexion->connect_error);
}
?>
