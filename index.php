<?php include 'session_handler.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ShopAuto - Concesionario de Vehiculos</title>
    <link rel="icon" href="carro.png" type="image/x-icon">
    <link rel="stylesheet" href="stayles.css">
</head>
<body>
    <header>
        <div class="logo">
            <img src="logo.jpg" alt="AutoVista">
        </div>
        <nav>
            <ul>
                <li><a href="#">Inicio</a></li>
                <li><a href="#">Vehículos</a></li>
                <li><a href="#">Contacto</a></li>
                <?php if($usuario): ?>
                    <li><a href="#"><?php echo $usuario; ?></a></li>
                    <li><a href="logout.php">Cerrar sesión</a></li>
                <?php else: ?>
                    <li><a href="login1.php">🚘Iniciar sesión</a></li>
                    <li><a href="register1.php">🚘Registrarse</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>
    <br>

<div class="MYV">
    <div class="box">
        <h2>MISION</h2>
        <p>En ShopAuto, nuestra misión es superar las expectativas de nuestros clientes en cada interacción. Nos esforzamos por proporcionar una selección incomparable de vehículos de calidad, junto con un servicio al cliente excepcional, transparencia total y precios competitivos. Nos dedicamos a crear relaciones sólidas y duraderas con nuestros clientes, basadas en la confianza mutua, la integridad y la satisfacción del cliente en cada paso del camino. Nuestro objetivo es hacer que la experiencia de compra de automóviles sea emocionante, sin complicaciones y gratificante para todos nuestros clientes.</p>
    </div>
    <div class="box2">
        <h2>VISION</h2>
        <p>En ShopAuto, visualizamos un futuro donde cada cliente experimenta la excelencia automotriz en un ambiente acogedor y orientado al cliente. Nos esforzamos por ser líderes en la industria, ofreciendo una gama diversa de vehículos de calidad superior, servicios excepcionales y una experiencia de compra sin igual. Nos comprometemos a ser el destino preferido para aquellos que buscan no solo un automóvil, sino una relación de confianza a largo plazo.</p>
    </div>
</div>
<main>
    <section class="hero">
        <h1>Bienvenido a AutoVista</h1>
        <p>Tu destino para encontrar el vehículo de tus sueños.</p>
        <a href="vehiculos.php" class="btn" >Ver Vehículos</a>
    </section>
    
</main>
<footer>
    <p>&copy; 2024 AutoVista - Todos los derechos reservados</p>
</footer>
</body>
</html>