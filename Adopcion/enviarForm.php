<?php
require "../conexion.php";
require "Adopta.php"

if(isset($_POST['Enviar'])){

if(
strlen($_POST['nombre']) >=1&&
strlen($_POST['apellido_Paterno']) >=1
){

$idMascota= $_POST['id_Mascotas_fk'];
$nombreS= $_POST['nombre'];
$aPaterno= $_POST['apellido_Paterno'];
$aMaterno= $_POST['apellido_Materno'];
$domicilio = $_POST['domicilio'];
$edad= $_POST['edad'];
$ocupacion= $_POST['ocupacion'];
$colonia= $_POST['colonia'];
$municipio= $_POST['municipio'];
$correo= $_POST['correo'];
$celular= $_POST['celular'];
$nReferencia= $_POST['nReferencia'];
$numReferencia= $_POST['numReferencia'];
$p1= $_POST['p1'];
$p2= $_POST['p2'];
$p3= $_POST['p3'];
$p4= $_POST['p4'];
$p5= $_POST['p5'];
$p6= $_POST['p6'];
$p7= $_POST['p7'];
$p8= $_POST['p8'];
$p9= $_POST['p9'];
$p10= $_POST['p10'];
$p11= $_POST['p11'];
$p12= $_POST['p12'];
$p13= $_POST['p13'];
$p14= $_POST['p14'];
$p15= $_POST['p15'];
$p16= $_POST['p16'];
$p17= $_POST['p17'];
$p18= $_POST['p18'];
$p19= $_POST['p19'];
$p20= $_POST['p20'];


$nombreS= $_POST['nombre'];
$nombreS= $_POST['nombre'];





$estadoM = $_POST['estado'];
$nombreM =trim($_POST['nombre']);
$especieM = $_POST['especie'];
$color= trim($_POST['color']);
$tamanoM = $_POST['tamano'];
$edadM = $_POST['edad'];
$sexoM = $_POST['sexo'];
$vacunadoM = isset($_POST['vacunado']) ? $_POST['vacunado'] : 0;
$desparasitadoM = isset($_POST['desparasitado']) ? $_POST['desparasitado'] : 0;
$esterilizadoM = isset($_POST['esterilizado']) ? $_POST['esterilizado'] : 0;
$descripcionM = $_POST['descripcion'];
$cuidadoM = $_POST['cuidados'];
$historiaM = $_POST['historia'];

$db = new Database();
  $con = $db->conectar();
  $registro = $con ->prepare("INSERT INTO mascotas (id_Estado_fk, nombre, id_Especie_fk,
  color ,id_Tamano_fk, id_Edad_fk, id_Sexo_fk, vacunado,  desparasitado, esterilizado,
  descripcion, cuidados, historia_Rescate, foto) values (?,?,?,?,?,?, ?,?,?,?,?,?,?,?);");

  $registro->execute([$estadoM, $nombreM, $especieM, $color,$tamanoM, $edadM, $sexoM , $vacunadoM, $desparasitadoM ,$esterilizadoM, 
  $descripcionM,$cuidadoM, $historiaM,' ']);

}
}













?>