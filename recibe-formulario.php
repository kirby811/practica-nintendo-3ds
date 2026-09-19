<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recibe Formulario</title>
</head>
<body>
    <h1>
        <p>
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $nombre = $_POST["nombre"] ?? '';
                $correo = $_POST["correo"] ?? '';
                $fecha_nacimiento = $_POST["fecha_nacimiento"] ?? '';

                echo "Nombre: " . htmlspecialchars($nombre) . "<br>";
                echo "Correo: " . htmlspecialchars($correo) . "<br>";
                echo "Fecha de Nacimiento: " . htmlspecialchars($fecha_nacimiento) . "<br>";
            } else {
                echo "No se recibieron datos del formulario.";
            }
            ?>
        </p>
</body>
</html>