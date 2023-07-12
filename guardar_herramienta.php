<?php
$host = "localhost";
$username = "lorenzo";
$password = "surf20";
$database = "bd_herramientas";

// Establecer la conexión a la base de datos
$connection = mysqli_connect($host, $username, $password, $database);

// Verificar si la conexión fue exitosa
if (!$connection) {
    die("Error al conectar a la base de datos: " . mysqli_connect_error());
}

// Verificar si se enviaron los datos del formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $cantidad = $_POST['cantidad'];

    // Realizar las validaciones necesarias en los datos ingresados

    // Preparar la consulta INSERT con marcadores de posición
    $query = "INSERT INTO herramientas (nombre, descripcion, cantidad) VALUES (?, ?, ?)";
    $statement = mysqli_prepare($connection, $query);

    // Vincular los valores a los marcadores de posición y ejecutar la consulta
    mysqli_stmt_bind_param($statement, "ssi", $nombre, $descripcion, $cantidad);
    $result = mysqli_stmt_execute($statement);

    if ($result) {
        echo "Herramienta guardada correctamente.";
    } else {
        echo "Error al guardar la herramienta: " . mysqli_error($connection);
    }

    // Cerrar la declaración preparada
    mysqli_stmt_close($statement);
}

// Cerrar la conexión a la base de datos
mysqli_close($connection);
?>
