<?php
header('Access-Control-Allow-Origin: *'); 
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

require("conexion.php"); // importa el archivo de la conexion a la BD
$conexion = conexion();

$registros = mysqli_query($conexion, "SELECT DISTINCT * FROM historial h INNER JOIN  pacientes p ON h.idpaciente = p.idpaciente ORDER BY h.idhistorial DESC");

//recorre el resultado y lo guarda en un array
while( $resultado = $registros -> fetch_assoc()) {
    $datos[] = $resultado;
}

$json = json_encode($datos); // Genera el json con los datos obtenidos

//Envio de informacion del JSON
header('Content-Type: application/json; charset=utf-8');
echo $json;

?>