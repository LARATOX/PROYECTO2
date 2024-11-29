<?php
require "../conexion.php";

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if(isset($_POST['Subir'])){

if(
strlen($_POST['nombre']) >=1&&
strlen($_POST['color']) >=1

){

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


$imagen=$_FILES["foto"]["tmp_name"];
$nFoto=$_FILES["foto"]["name"];
$tipoImagen=strtolower(pathinfo($nFoto, PATHINFO_EXTENSION));
$tamImagen=$_FILES["foto"]["size"];
$directorio="../archivos/";

if($tipoImagen=="jpg" or $tipoImagen=="png" or $tipoImagen=="jpeg" ){

  $db = new Database();
  $con = $db->conectar();
  $registro = $con ->prepare("INSERT INTO mascotas (id_Estado_fk, nombre, id_Especie_fk,
  color ,id_Tamano_fk, id_Edad_fk, id_Sexo_fk, vacunado,  desparasitado, esterilizado,
  descripcion, cuidados, historia_Rescate, foto) values (?,?,?,?,?,?, ?,?,?,?,?,?,?,?);");

  $registro->execute([$estadoM, $nombreM, $especieM, $color,$tamanoM, $edadM, $sexoM , $vacunadoM, $desparasitadoM ,$esterilizadoM, 
  $descripcionM,$cuidadoM, $historiaM,' ']);
  $idRegistro=$con->lastInsertId();
  $ruta=$directorio.$idRegistro.".".$tipoImagen;
  $actualizarImagen=$con ->prepare("update mascotas set foto='$ruta' where id_Mascotas=$idRegistro");
  $actualizarImagen->execute();
  
   //almacenar imagen
   if(move_uploaded_file($imagen,$ruta)){
    require "agregarMascota.php";
   }else{
       echo "Error en guardar la imagen";
   }
}else{
  echo "No se acepta ese formato";
}
    
/*if($resultado){
    ?>
    <h3 class="sucess">Tu registro se ha completado</h3> 
    <?php
    } 
    
    else{
    
        ?>
    <h3 class="error">Ocurrio un error</h3> 
    
        <?php

    }
}
*/
}
}
?>