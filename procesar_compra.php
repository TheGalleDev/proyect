<?php
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['usuario'])) {
    // Redirigir al usuario al formulario de inicio de sesión si no ha iniciado sesión
    header("Location: login.php");
    exit();
}

// Función para generar el recibo de compra y almacenar en la base de datos
function generarRecibo($car) {
    $precio = 0;

    // Obtener el precio del vehículo seleccionado
    switch ($car) {
        case "Nissan GT-R":
            $precio = 100000000;
            break;
        case "Toyota Supra":
            $precio = 180000000;
            break;
        case "Honda NSX":
            $precio = 250000000;
            break;
        case "FORD MUSTANG SHELBY":
            $precio = 250000000;
            break;
        case "AUDI R8":
            $precio = 450000000;
            break;
        default:
            $precio = 0;
    }

    // Obtener datos del usuario de la sesión
    $nombreUsuario = $_SESSION['usuario'];
    // Aquí deberías obtener los demás datos del usuario de la base de datos, según sea necesario

    // Calcular el total a pagar
    $total = $precio; // Solo el precio del vehículo por ahora

    // Conectar a la base de datos
    $servername = "localhost";
    $username = "Juancachofas"; // Cambia esto por tu usuario de la base de datos
    $password = "123"; // Cambia esto por tu contraseña de la base de datos
    $dbname = "registroventas"; // Cambia esto por el nombre de tu base de datos

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Insertar datos de la compra en la base de datos
    $sql = "INSERT INTO compras (usuario, vehiculo, precio, total) VALUES ('$nombreUsuario', '$car', $precio, $total)";

    if ($conn->query($sql) === TRUE) {
        // Generar el recibo de compra
        $recibo = "Usuario: $nombreUsuario\n";
        $recibo .= "Vehículo: $car\n";
        $recibo .= "Precio: $precio\n";
        $recibo .= "Total a pagar: $total\n";
    } else {
        $recibo = "Error al guardar la compra: " . $conn->error;
    }

    // Cerrar la conexión
    $conn->close();

    return $recibo;
}

// Procesar el formulario si se reciben datos
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['car'])) {
    // Obtener el vehículo seleccionado
    $car = $_POST['car'];

    // Generar el recibo de compra
    $recibo = generarRecibo($car);

    // Mostrar el recibo de compra
    echo "<h2>Recibo de Compra</h2>";
    echo "<p>" . nl2br($recibo) . "</p>";
    exit(); // Terminar la ejecución del script después de mostrar el recibo
}
?>

<script src="script.js"></script>
