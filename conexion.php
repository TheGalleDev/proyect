<?php 
$servername = "localhost"; // o el nombre de tu servidor
$username = "root"; // tu usuario de la base de datos
$password = ""; // tu contraseña de la base de datos
$dbname = "datosregistro"; // tu base de datos

$conexion = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conexion->connect_error) {
    die("No se ha podido conectar a la Base de Datos: " . $conexion->connect_error);
} else {
    echo 'Conectado exitosamente a la Base de Datos';
}
?>
