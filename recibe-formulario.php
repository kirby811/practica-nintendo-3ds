<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre           = $_POST["nombre"] ?? '';
    $correo           = $_POST["correo"] ?? '';
    $fecha_nacimiento = $_POST["fecha_nacimiento"] ?? '';

    // Datos de conexión
    $servidor  = "localhost";
    $usuario   = "root";
    $password  = ""; 
    $db_nombre = "horoscopo";

    $conexion = new mysqli($servidor, $usuario, $password, $db_nombre);

    if ($conexion->connect_error) {
        die("Error de conexión: " . $conexion->connect_error);
    }

    if (!empty($nombre) && !empty($correo) && !empty($fecha_nacimiento)) {
        // Preparamos la inserción con correo
        $stmt = $conexion->prepare("INSERT INTO usuarios (nombre, correo, fecha_nacimiento) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $nombre, $correo, $fecha_nacimiento);

        if ($stmt->execute()) {
            echo "¡Datos guardados correctamente!";
        } else {
            echo "Error al insertar: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Por favor llena todos los campos.";
    }

    $conexion->close();
}
?>