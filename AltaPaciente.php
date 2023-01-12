<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

$json = file_get_contents('php://input'); //resive el json de angular

$params = json_decode($json); //Decodifica el json

require("conexion.php"); // importa el archivo de la conexion  a la bd

$conexion = conexion();

mysqli_query($conexion,"INSERT INTO pacientes(nompaciente, edadpaciente, telpaciente, dirpaciente) VALUES 
('$params->nompaciente',
'$params->edadpaciente',
'$params->telpaciente',
'$params->dirpaciente')");

class Result{}

//generar los datos de respuesta
$response = new Result();
$response->resultado = 'OK';
$response->mensaje = 'SE REGISTRO EXITOSAMENTE EL USUARIO';
echo json_encode($response);//muestra el json generado

//Envio de informacion de json
header('Content-Type: application/json');
?>