<?php
$servername = "localhost";
$username = "root";
$password = "Passw0rd!";
$dbname = "locallygrown";

// Crea la conexión
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Comprueba si se envió el formulario de registro
if(isset($_POST['registrate'])) {
    // Obtén los datos del formulario
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $contraseña = $_POST['contraseña'];
    
    // Crea la consulta SQL para insertar los datos en la tabla de usuarios
    $sql = "INSERT INTO usuarios (nombre, correo, contraseña) VALUES ('$nombre', '$correo', '$contraseña')";
    
    // Ejecuta la consulta
    if (mysqli_query($conn, $sql)) {
        echo "Registro exitoso";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

// Comprueba si se envió el formulario de inicio de sesión
if(isset($_POST['login'])) {
    // Obtén los datos del formulario
    $correo = $_POST['correo'];
    $contraseña = $_POST['contraseña'];
    
    // Crea la consulta SQL para buscar un usuario con el correo y la contraseña especificados
    $sql = "SELECT * FROM usuarios WHERE correo='$correo' AND contraseña='$contraseña'";
    
    // Ejecuta la consulta
    $result = mysqli_query($conn, $sql);
    
    // Verifica si se encontró un usuario con los datos proporcionados
    if (mysqli_num_rows($result) > 0) {
        // El usuario ha iniciado sesión correctamente
        echo "Inicio de sesión exitoso";
    } else {
        // Los datos proporcionados son incorrectos
        echo "Inicio de sesión fallido";
    }
}
?>