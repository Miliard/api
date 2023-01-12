<?php 

function conexion () {
   $conexion = mysqli_connect("localhost","root", "", "gastro");
   
   return $conexion;
}