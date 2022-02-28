<?php
include ("conexion.php");


$nombre = $_POST["nombre"];
$apellido = $_POST["apellidos"];
$matricula = $_POST["matricula"];
$edad = $_POST["edad"];


$insertar="INSERT INTO registro (nombre, apellidos, matricula, edad) VALUES ('$nombre','$apellido','$matricula','$edad')";

if ($conn->query($insertar) === TRUE) {
  echo "<script> alert ('se guardaron los datos con exito '); window.location='../index.html '";
} else{
   echo "<script> alert ('ocurrio un problema, intente nuevamente '); window.location='../index.html '";

}
?>
