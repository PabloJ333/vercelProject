<?php
include ("conexion.php");

$conn = connection();

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $estado = intval($_POST['estado']);
    
    $sql = "UPDATE aj_estado_led SET estado_bool = $estado WHERE id = 1";
    
    if ($conn->query($sql) === TRUE) {
        echo "LED actualizado correctamente.";
    } else {
        echo "Error actualizando LED: " . $conn->error;
    }
}

$conn->close();
?>
