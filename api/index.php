<?php
include ("conexion.php");

$conn = connection();
?>
<html>
<style>
    .btn-on {
        background-color: #009879;
        color: white;
        border:none;
        padding: 10px;
        margin: 20px;
    }
    
    .btn-off {
        background-color: red;
        color: white;
        border:none;
        padding: 10px;
        margin: 20px;
    }
</style>

	<head>
		<header>
			<h1>CONTROL DE ESP32</h2>
			<link rel="stylesheet" type="text/css" href="estilos.css" />
		</header>
	</head>
    <form action="insertarTablas.php" method="get">
        <input type="submit">
    </form>
	<body>
	<div class="controlLed">
    	<button id="btnLed" onclick="estadoLed()" >Encender LED</button>
	</div>
    <script>
    let ledState = false;

    function estadoLed() {
        // Cambia el estado del LED
        ledState = !ledState;

        // Actualiza el texto del botón según el estado
        const stateText = ledState ? 'Apagar LED' : 'Encender LED';
        const button = document.getElementById('btnLed');
        button.innerText = stateText;

        // Actualiza la clase del botón según el estado
        if (ledState) {
            button.classList.remove('btn-off');
            button.classList.add('btn-on');
        } else {
            button.classList.remove('btn-on');
            button.classList.add('btn-off');
        }

        // Envía la solicitud para cambiar el estado del LED
        const xhr = new XMLHttpRequest();
        xhr.open('POST', 'led_control.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.send('estado=' + (ledState ? 1 : 0));
    }
</script>

	<h2>Datos de la Tabla</h2>
    <table border="1" id="data-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Distancia</th>
                <th>Fecha y Hora</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        function loadData() {
            $.ajax({
                url: "obtener_datos.php",
                method: "GET",
                success: function(response) {
                    $('#data-table tbody').empty();

                    $('#data-table tbody').append(response);
                },
                error: function(xhr, status, error) {
                    console.error("Error al obtener los datos: " + error);
                }
            });
        }
		$(document).ready(function(){
            loadData();
            setInterval(loadData, 5000); 
        });
    </script>

		<h1>Coordenadas GPS</h1>
    <button id="cargarCoordenadas">Cargar Coordenadas</button>
    <div id="coordenadasContainer">
        <!-- Aquí se mostrarán las coordenadas -->
    </div>

    <script>
        $(document).ready(function(){
            $("#cargarCoordenadas").on("click", function(){
                $.ajax({
                    url: "obtener_cords.php", 
                    method: "GET",
                    success: function(response){
                        $("#coordenadasContainer").html(response);
                    },
                    error: function(jqXHR, textStatus, errorThrown){
                        console.log("Error: " + textStatus + " " + errorThrown);
                        $("#coordenadasContainer").html("<p>Error al cargar los datos</p>");
                    }
                });
            });
        });
    </script>
	</body>
</html>
