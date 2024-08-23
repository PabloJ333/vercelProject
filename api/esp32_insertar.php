<?php
include("conexion.php");
$conexion = connection();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['distancia']) && isset($_POST['fecha_hora'])) {
        $distancia = $_POST['distancia'];
        $fecha_hora = $_POST['fecha_hora'];

        $sql = "INSERT INTO sensordis aj_(distancia, fecha_hora) VALUES ('$distancia', NOW())";

        if (mysqli_query($conexion, $sql)) {
            http_response_code(200); 
            echo "Datos insertados correctamente";
        } else {
            http_response_code(500);
            echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
        }

        mysqli_close($conexion);
    } else {
        http_response_code(400); 
        echo "Faltan parámetros de POST";
    }
} else {
    http_response_code(405); 
    echo "Método de solicitud inválido";
}
?>
