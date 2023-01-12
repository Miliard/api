<?php 
  header('Access-Control-Allow-Origin: *'); 
  header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
  
  $json = file_get_contents('php://input'); // RECIBE EL JSON DE ANGULAR
 
  $params = json_decode($json); // DECODIFICA EL JSON Y LO GUARADA EN LA VARIABLE
  

  
  require("conexion.php"); // IMPORTA EL ARCHIVO CON LA CONEXION A LA DB
  $conexion = conexion(); // CREA LA CONEXION
  
  // REALIZA LA QUERY A LA DB
  mysqli_query($conexion, "INSERT INTO historial(
                                                  pesohistorial, 
                                                  tallahistorial,
                                                  fchistorial,
                                                  frhistorial,
                                                  ahhistorial,
                                                  apnphistorial,
                                                  hemotipohistorial,
                                                  alergiashistorial,
                                                  apphistorial,
                                                  citahistorial,
                                                  idpaciente,
                                                  fechahistorial,
                                                  diagnostico) VALUES
                  ( '$params->pesohistorial', 
                    '$params->tallahistorial',
                    '$params->fchistorial',
                    '$params->frhistorial',
                    '$params->ahhistorial',
                    '$params->apnphistorial',
                    '$params->hemotipohistorial',
                    '$params->alergiashistorial',
                    '$params->apphistorial',
                    '$params->citahistorial',
                    '$params->idpaciente',
                    '$params->fechahistorial',
                    '$params->diagnostico')");     
  
  class Result {}
  // GENERA LOS DATOS DE RESPUESTA
  $response = new Result();
  $response->resultado = 'OK';
  $response->mensaje = 'SE REGISTRO EXITOSAMENTE EL NUEVO HISTORIAL';
  echo json_encode($response); // MUESTRA EL JSON GENERADO
  header('Content-Type: application/json');
?>