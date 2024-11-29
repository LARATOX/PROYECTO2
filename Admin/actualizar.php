<?php
require "../conexion.php";

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$db = new Database();
$con = $db->conectar();

if(isset($_POST['actualizar'])){

    
$id=$_POST["id"];
$nombre=$_POST["ruta"];
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

if(is_file($imagen)){

    if($tipoImagen=="jpg" or $tipoImagen=="png" or $tipoImagen=="jpeg" ){
     
        //Eliminar imagen anterior
   try {
        unlink($nombre);
        
   } catch (\Throwable $th) {
    //throw $th;
   }
   
   $ruta=$directorio.$id."N.".$tipoImagen;

    if(move_uploaded_file($imagen,$ruta)){
    
    $actualizar=$con ->prepare("update mascotas set id_Estado_fk=$estadoM, nombre='$nombreM', id_Especie_fk=$especieM,
   color='$color' ,id_Tamano_fk=$tamanoM, id_Edad_fk=$edadM, id_Sexo_fk=$sexoM, vacunado=$vacunadoM,  
   desparasitado=$desparasitadoM, esterilizado=$esterilizadoM,
   descripcion='$descripcionM', cuidados='$cuidadoM', historia_Rescate='$historiaM', foto='$ruta' where id_Mascotas=$id");
    $actualizar->execute();  
    echo "se actualizo";

}else{
      echo "<div class='alert alert-info'>Error al subir la imagen al servidor</div>";

    }

}else{

    echo "<div class='alert alert-info'>Solo se aceptan formatos de imagen</div>";
}
}

}
?>