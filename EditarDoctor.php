<?php
header('Access-Control-Allow-Origin: *'); 
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

$json = file_get_contents('php://input'); // Recibe el json de angular

$params = json_decode($json); // Decodifica el json

require("conexion.php"); // importa el archivo de la conexion a la BD
$conexion = conexion();

mysqli_query($conexion, "UPDATE doctores 
SET nomdoctor='$params->nomdoctor',  
teldoctor='$params->teldoctor'  
WHERE iddoctor=$params->iddoctor");

class Result {}

//Generar los datos de respuesta
$response = new Result();
$response->resultado = 'OK';
$response->mensaje = 'Doctor editado';

//Envio de informacion del JSON
header('Content-Type: application/json');
echo json_encode($response); // Muestra el json generado
?>