<?php 
include 'conexion.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['submit'])) {
        // Obtener y sanitizar los valores del formulario
        $Nombre = mysqli_real_escape_string($conexion, $_POST["Nom_Pri"]);
        $Email = mysqli_real_escape_string($conexion, $_POST["Email"]);
        $telefono = mysqli_real_escape_string($conexion, $_POST["Telefono"]);
        $direccion = mysqli_real_escape_string($conexion, $_POST["Direccion"]);
        $ciudad = mysqli_real_escape_string($conexion, $_POST["Ciudad"]);
        $fecha_de_nacimiento = mysqli_real_escape_string($conexion, $_POST["Fecha_de_nacimiento"]);
        $username = mysqli_real_escape_string($conexion, $_POST["username"]);
        $password = mysqli_real_escape_string($conexion, $_POST["password"]);

        // Preparar la consulta SQL con marcadores de posición
        $query = "INSERT INTO datosregistropw (Nombre, Email, telefono, direccion, ciudad, fecha_de_nacimiento, username, password) VALUES ('$Nombre', '$Email', '$telefono', '$direccion', '$ciudad', '$fecha_de_nacimiento', '$username', '$password')";

        // Verificar que el correo no se repita
        $verificar_correo = mysqli_query($conexion, "SELECT * FROM datosregistropw WHERE Email = '$Email' ");
        if(mysqli_num_rows($verificar_correo) > 0) {
            echo '<script>alert("El correo electrónico ya está registrado"); window.location = "login.php";</script>';
            exit(); 
        }

        // Verificar que el usuario no se repita
        $verificar_usuario = mysqli_query($conexion, "SELECT * FROM datosregistropw WHERE username = '$username' ");
        if(mysqli_num_rows($verificar_usuario) > 0) {
            echo '<script>alert("El usuario ya está registrado"); window.location = "login.php";</script>';
            exit(); 
        }

        // Ejecutar la consulta utilizando la función mysqli_query()
        $ejecutar = mysqli_query($conexion, $query);

        // Verificar si la consulta se ejecutó correctamente
        if($ejecutar){
            echo '<script>alert("Usuario registrado exitosamente"); window.location = "login1.html";</script>';
        } else {
            echo '<script>alert("Error al registrar el usuario, intente de nuevo"); window.location = "register.php";</script>';
        }

        // Cerrar la conexión
        mysqli_close($conexion);
    }
}
?>
