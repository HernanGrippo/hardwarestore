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

// Realizar una consulta SELECT para obtener los registros de la tabla "herramientas"
$query = "SELECT * FROM herramientas";
$result = mysqli_query($connection, $query);

// Crear un arreglo para almacenar los datos
$data = array();

// Verificar si se obtuvieron resultados de la consulta
if ($result && mysqli_num_rows($result) > 0) {
    // Recorrer los resultados y almacenar los datos en el arreglo
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
}

// Cerrar la conexión a la base de datos
mysqli_close($connection);

// Devolver los datos en formato JSON
header('Content-Type: application/json');
echo json_encode($data);
?>
