<?php
include ("conexion.php");

$conn = connection();

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$sql = "SELECT id, distancia, fecha_hora FROM sensordis ORDER BY fecha_hora DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["distancia"] . " cm</td>";
        echo "<td>" . $row["fecha_hora"] . "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='3'>No hay datos disponibles</td></tr>";
}

$conn->close();
?>