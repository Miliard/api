<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");


require("conexion.php"); // importa el archivo de la conexion  a la bd

$conexion = conexion();

$registros = mysqli_query($conexion,"SELECT * FROM pacientes ORDER BY idpaciente DESC
");


//recorre el resultado y lo guarda en un array
while($resultado = $registros->fetch_assoc()){
    $datos[]=$resultado;
}
$json = json_encode($datos); //genera el json con los datos obtenidos



//Envio de informacion de json
header('Content-Type: application/json; charset=utf-8');
echo $json;
?>