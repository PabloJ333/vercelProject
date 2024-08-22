<?php
include ("conexion.php");

$conn = connection();

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $led_id = intval($_POST['check_LED_status']);
    
    $sql = "SELECT estado_bool FROM estado_led WHERE id = $led_id";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if ($row['estado_bool'] == 1) {
            echo "LED_is_on";
        } else {
            echo "LED_is_off";
        }
    } else {
        echo "Error al consultar el estado del LED.";
    }
}

$conn->close();
?>
