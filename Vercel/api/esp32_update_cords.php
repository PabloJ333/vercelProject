<?php
    include ("conexion.php");
    $conn = connection();

    if(isset($_GET['lat']) && isset($_GET['lng'])){
        $lat = $_GET['lat'];
        $lng = $_GET['lng'];

        $query = "UPDATE TABLE coordenadas SET longitud=$lng, latitud=$lat";

        if (mysqli_query($conn, $query)) {
            echo "Datos insertados correctamente";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        echo "Faltan parámetros de latitud o longitud";
    }
    
    // Cerrar la conexión
    mysqli_close($conn);
?>