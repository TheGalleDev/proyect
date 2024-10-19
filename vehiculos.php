<?php
session_start();

// // Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['usuario'])) {
    // Redirigir al usuario al formulario de inicio de sesión si no ha iniciado sesión
    header("Location: login.php");
    exit();
}

// // Función para generar el recibo de compra y almacenar en la base de datos
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

//     // Obtener datos del usuario de la sesión
    $nombreUsuario = $_SESSION['usuario'];

//     // Calcular el total a pagar
    $totalpagar = $precio; // Solo el precio del vehículo por ahora

    // Conectar a la base de datos
    $servername = "localhost"; // o el nombre de tu servidor
    $username = "root"; // tu usuario de la base de datos
    $password = ""; // tu contraseña de la base de datos
    $dbname = "datosregistro"; // tu base de datos

    // Crear conexión
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Insertar datos de la compra en la base de datos
    $sql = "INSERT INTO ventas (usuario, vehiculo, precio, totalpagar) VALUES ('$nombreUsuario', '$car', $precio, $totalpagar)";

    if ($conn->query($sql) === TRUE) {
        // Generar el recibo de compra
        $recibo = "Usuario: $nombreUsuario\n";
        $recibo .= "Vehículo: $car\n";
        $recibo .= "Precio: $precio\n";
        $recibo .= "Total a pagar: $totalpagar\n";
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="vehiculos.css">
    <title>Vehiculos</title>
</head>
<body>
    
    <div class="container">
      <h1>Compra de Vehículos</h1>
      <form id="carForm" method="post">
        <label for="carSelect">Selecciona un vehículo:</label>
        <select id="carSelect" name="car">
              <option value="Nissan GT-R">Nissan GT-R</option>
              <option value="Toyota Supra">Toyota Supra</option>
              <option value="Honda NSX">Honda NSX</option>
              <option value="FORD MUSTANG SHELBY">FORD MUSTANG SHELBY</option>
              <option value="AUDI R8">AUDI R8</option>
            </select>
            <button type="submit">Generar Recibo de Compra</button>
        </form>
    </div>
    <h1>Vehiculos Disponibles:</h1>
    <div class="card">
        <img src="GTR.webp" alt="NISSAN">
        <div class="card__content">
          <p class="card__title">NISSAN GT-R </p>
          <p class="card__description">Una combinación inigualable de potencia y alma: el Nissan GT-R. Disfruta del singular superauto que esculpe el viento con una aerodinámica optimizada para mejorar la conducción y el manejo en 2024.</p>
          <p class="card__price">PRECIO : $100.000.000</p>
            
        </div>
      </div>
      <br>
      <div class="card">
        <img src="supra.webp" alt="TOYOTA SUPRA">
        <div class="card__content">
          <p class="card__title">TOYOTA SUPRA </p>
          <p class="card__description">Luego de 17 años desde que finalizara su producción, el  Toyota Supra está de regreso con una nueva generación que trae al presente el concepto deportivo de este legendario modelo, incluyendo además la más reciente tecnología.</p>
          <p class="card__price">PRECIO : $180.000.000</p>
            
        </div>
      </div>
      <br>
      <div class="card">
        <img src="NSX21-002-source.webp" alt="Honda NSX">
        <div class="card__content">
          <p class="card__title">Honda NSX </p>
          <p class="card__description">en Honda convertimos los sueños en retos, se quiso poner en práctica nuestro lema con un monocasco de aluminio. Todo un hito de ingeniería</p>
          <p class="card__price">PRECIO : $250.000.000</p>
            
        </div>
      </div>
        <div class="card">
        <img src="mustang.jpg" alt="FORD MUSTANG SHELBY">
        <div class="card__content">
          <p class="card__title">FORD MUSTANG SHELBY </p>
          <p class="card__description">El Paquete Performance agrega equipamiento que mejora su desempeño deportivo y apariencia, ideal para los entusiastas de una conducción dinámica y deportiva. Enamórate de las líneas de su espectacular rediseño y descubre cada elemento que ofrece este poderoso auto.</p>
          <p class="card__price">PRECIO : $250.000.000</p>
            
        </div>
    </div>
    <br>
    <div class="card">
        <img src="r8.jpeg" alt="AUDI R8">
        <div class="card__content">
          <p class="card__title">AUDI R8 </p>
          <p class="card__description">El Audi R8 es un automóvil deportivo de motor central del fabricante automotriz Audi presentado al público en septiembre de 2006.1​ El vehículo de serie se basa en el exitoso prototipo de Audi, Le Mans cuyo nombre originó de la carrera de las 24 Horas de Le Mans.</p>
          <p class="card__price">PRECIO : $450.000.000</p>
            
        </div>
      </div>
   
        <div id="recibo
