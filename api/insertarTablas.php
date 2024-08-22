<?php
include("conexion.php");

// Conexión a la base de datos
$conexion = connection();

// Consulta SQL para crear la tabla ah_coordenadas
$sql1 = "CREATE TABLE IF NOT EXISTS aj_coordenadas (
  id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  longitud FLOAT NOT NULL,
  latitud FLOAT NOT NULL,
  fecha DATETIME NOT NULL,
  codigo INT(11) NOT NULL
);";

// Consulta SQL para crear la tabla aj_estado_led
$sql2 = "CREATE TABLE IF NOT EXISTS aj_estado_led (
  id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  estado_bool TINYINT(1) NOT NULL
);";

// Insertar datos en la tabla aj_estado_led
$sql3 = "INSERT INTO aj_estado_led (estado_bool) VALUES
(0);";

// Consulta SQL para crear la tabla aj_sensordis
$sql4 = "CREATE TABLE IF NOT EXISTS aj_sensordis (
  id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  distancia VARCHAR(30) NOT NULL,
  fecha_hora DATETIME NOT NULL
);";

// Función para ejecutar las consultas
function ejecutarConsulta($conexion, $sql) {
    if (mysqli_query($conexion, $sql)) {
        echo "Operación realizada correctamente<br>";
    } else {
        echo "Error: " . mysqli_error($conexion) . "<br>";
    }
}

// Ejecutar las consultas
ejecutarConsulta($conexion, $sql1);
ejecutarConsulta($conexion, $sql2);
ejecutarConsulta($conexion, $sql3);
ejecutarConsulta($conexion, $sql4);

// Cerrar la conexión
mysqli_close($conexion);
?>
