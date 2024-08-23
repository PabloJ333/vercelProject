<?php
include ("conexion.php");

$conn = connection();

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$sql = "SELECT id, longitud, latitud, fecha, codigo FROM aj_coordenadas ORDER BY fecha DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<div class='mostrarCords'>";
        echo "<p>" . $row["id"] . "</p>";
        echo "<p>" . $row["longitud"] . " </p>";
        echo "<p>" . $row["latitud"] . "</p>";
        echo "<p>" . $row["fecha"] . "</p>";
        echo "</div>";
    }
} else {
    echo "<tr><td colspan='3'>No hay datos disponibles</td></tr>";
}

$conn->close();
?>
