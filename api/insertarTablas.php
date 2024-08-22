<?php
include ("conexion.php");
$conexion = connection();
$sql1 = "CREATE TABLE ah_coordenadas (
  id int(11) NOT NULL,
  longitud float NOT NULL,
  latitud float NOT NULL,
  fecha datetime NOT NULL,
  codigo int()
);
";
$sql2="CREATE TABLE aj_estado_led (
  id int(11) NOT NULL,
  estado_bool tinyint(1) NOT NULL
);";
$sql3="INSERT INTO aj_estado_led (id, estado_bool) VALUES
(1, 0);
";
$sql4="CREATE TABLE aj_sensordis (
  id int(11) NOT NULL,
  distancia varchar(30) NOT NULL,
  fecha_hora datetime NOT NULL
);";
if (mysqli_query($conexion, $sql1)) {
    http_response_code(200); 
    echo "Datos insertados correctamente";
} else {
    http_response_code(500);
    echo "Error: " . $sql1 . "<br>" . mysqli_error($conexion);
}
if (mysqli_query($conexion, $sql2)) {
    http_response_code(200); 
    echo "Datos insertados correctamente";
} else {
    http_response_code(500);
    echo "Error: " . $sql2 . "<br>" . mysqli_error($conexion);
}
if (mysqli_query($conexion, $sql3)) {
    http_response_code(200); 
    echo "Datos insertados correctamente";
} else {
    http_response_code(500);
    echo "Error: " . $sql3 . "<br>" . mysqli_error($conexion);
}
if (mysqli_query($conexion, $sql4)) {
    http_response_code(200); 
    echo "Datos insertados correctamente";
} else {
    http_response_code(500);
    echo "Error: " . $sql4 . "<br>" . mysqli_error($conexion);
}
?>