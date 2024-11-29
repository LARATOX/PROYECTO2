<?php
require "header.php";
require "../conexion.php";
require "eliminar.php";

$db = new Database();
$con = $db->conectar();

$sql = $con ->prepare("SELECT id_Mascotas, foto, estado_Adopcion, nombre, tipo_Especie,color, tamano, edad, sexo, vacunado,
desparasitado, esterilizado, descripcion, cuidados, historia_Rescate from mascotas
inner join estado on mascotas.id_Estado_fk=estado.id_Estado
inner join especie on mascotas.id_Especie_fk=especie.id_Especie
inner join edad on mascotas.id_Edad_fk=edad.id_Edad
inner join sexo on mascotas.id_Sexo_fk=sexo.id_Sexo
inner join tamano on mascotas.id_Tamano_fk=tamano.id_Tamano;");
$sql->execute();
$resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
?>

<main>

<div class="container "> 
  <br>
<h1 class="text-center">LISTA DE MASCOTAS</h1>

<BR></BR>

</div>


<div class="container">
   <div class="row justify-content-center P-5" >
   <div class="col-auto">
<table class="table">
<thead class="table-dark">
    <tr>
    <th scope="col">Id_mascota</th>
      <th scope="col">Foto</th>
      <th scope="col">Estado de adopción</th>
      <th scope="col">Nombre</th>
      <th scope="col">Especie</th>
      <th scope="col">Color</th>
      <th scope="col">Tamaño</th>
      <th scope="col">Edad</th>
      <th scope="col">Sexo</th>
      <th scope="col">Vacunado</th>
      <th scope="col">Desparasitado</th>
      <th scope="col">Esterilizado</th>
      <th scope="col">Descripcion</th>
      <th scope="col">Cuidados</th>
      <th scope="col">Historia de rescate</th>
      <th scope="col"></th>
      <th scope="col"></th>


    </tr>
  </thead>
  <tbody>
    <tr>
    
    <?php foreach($resultado as $filas){ ?>
<td><?php echo $filas['id_Mascotas'] ?></td>
<td><img width="80" src="<?php echo $filas['foto'] ?>" ></td>
<td><?php echo $filas['estado_Adopcion'] ?></td>
<td><?php echo $filas['nombre'] ?></td>
<td><?php echo $filas['tipo_Especie'] ?></td>
<td><?php echo $filas['color'] ?></td>
<td><?php echo $filas['tamano'] ?></td>
<td><?php echo $filas['edad'] ?></td>
<td><?php echo $filas['sexo'] ?></td>
<td><?php if($filas['vacunado']==1){ 
echo "Si";} 
else{echo "No";} ?></td>

<td><?php if($filas['desparasitado']==1){ 
echo "Si";} 
else{echo "No";} ?></td>

<td><?php if($filas['esterilizado']==1){ 
echo "Si";} 
else{echo "No";} ?></td>

<td><?php echo $filas['descripcion'] ?></td>
<td><?php echo $filas['cuidados'] ?></td>
<td><?php echo $filas['historia_Rescate'] ?></td>



<td><a  class="btn btn-primary-warning" data-bs-toggle="modal" data-bs-target="#staticBackdrop<?=$filas['id_Mascotas']?>">
  Actualizar
</a></td>
<td><a href="listaMascotas.php?id=<?=$filas['id_Mascotas']?>&nombre=<?=$filas['foto']?>" class="btn btn-danger">Eliminar</a></td>
</tr>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop<?=$filas['id_Mascotas']?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Actualizar datos</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

<div class="row justify-content-center">
<form class="col-md-6 " action="actualizar.php" enctype="multipart/form-data" method="post" >

<input type="hidden" value="<?=$filas['id_Mascotas']?>" name="id">
<input type="hidden" value="<?=$filas['foto']?>" name="ruta">

  <div class="mb-3">
  <label for="formFile" class="form-label">Foto</label>
  <input class="form-control" type="file" id="formFile" name="foto">
  </div>

  <div  class="mb-3"><label for="exampleInputText" class="form-label">Estado de adopcion:</label></div>
  <div>

  <div class="form-check">
  <input class="form-check-input" type="radio" name="estado" value="1" id="flexRadioDefault1">
  <label class="form-check-label" for="flexRadioDefault1">Disponible</label>
</div>

<div class="form-check">
  <input class="form-check-input" type="radio" name="estado" value="2" id="flexRadioDefault1">
  <label class="form-check-label" for="flexRadioDefault1">En proceso</label>
</div>

<div class="form-check">
  <input class="form-check-input" type="radio" name="estado" value="3" id="flexRadioDefault1">
  <label class="form-check-label" for="flexRadioDefault1">Adoptado</label>
</div>

<br>
  <div class="mb-3">
    <label for="exampleInputText" class="form-label">Nombre:</label>
    <input type="text" class="form-control" id="exampleInputText" name="nombre">
  </div>


  <div  class="mb-3"><label for="exampleInputText" class="form-label">Especie:</label></div>
  <div>

  <div class="form-check">
  <input class="form-check-input" type="radio" name="especie" value="1" id="flexRadioDefault1">
  <label class="form-check-label" for="flexRadioDefault1">Perro</label>
</div>

<div class="form-check">
  <input class="form-check-input" type="radio" name="especie" value="2" id="flexRadioDefault1">
  <label class="form-check-label" for="flexRadioDefault1">Gato</label>
</div>
<br>
  <div class="mb-3">
    <label for="exampleInputText" class="form-label">Color:</label>
    <input type="text" class="form-control" id="exampleInputText" name="color">
  </div>

  <div  class="mb-3"><label for="exampleInputText" class="form-label">Tamaño:</label></div>
  <div>

<div class="form-check">
  <input class="form-check-input" type="radio" name="tamano" id="tamano" value="1">
  <label class="form-check-label" for="Tamano"> Pequeño </label>
  </div>
  <div class="form-check">
  <input class="form-check-input" type="radio" name="tamano" id="tamano" value="2">
  <label class="form-check-label" for="Tamano"> Mediano </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="tamano" id="tamano" value="3">
  <label class="form-check-label" for="Tamano"> Grande </label>
</div>

<br>

  <div  class="mb-3"><label for="exampleInputText" class="form-label">Edad:</label></div>
  <div>

<div class="form-check">
  <input class="form-check-input" type="radio" name="edad" value="1" id="flexRadioDefault1">
  <label class="form-check-label" for="flexRadioDefault1">Cachorro</label>
</div>

<div class="form-check">
<input class="form-check-input" type="radio" name="edad" value="2" id="flexRadioDefault2">
  <label class="form-check-label" for="flexRadioDefault2">Adulto</label>
</div>
<br>

<div  class="mb-3"><label for="exampleInputText" class="form-label">Sexo:</label></div>
  <div>

<div class="form-check">
  <input class="form-check-input" type="radio" name="sexo" value="1" id="flexRadioDefault1">
  <label class="form-check-label" for="flexRadioDefault1">Macho</label>
</div>

<div class="form-check">
<input class="form-check-input" type="radio" name="sexo" value="2" id="flexRadioDefault2">
  <label class="form-check-label" for="flexRadioDefault2">Hembra</label>
</div>
<br>


<br>
<div  class="mb-3"><label for="exampleInputText" class="form-label">Protocolo de salud:</label></div>

  <div class="form-check">
  <label for="exampleInputText" class="form-label"></label>
  <input class="form-check-input" type="checkbox" name="vacunado" value="1" id="flexCheckDefault">
  <label class="form-check-label" for="flexCheckDefault">Vacunado</label>  
</div>

  <div class="form-check">
  <input class="form-check-input" type="checkbox" name="desparasitado" value="1" id="flexCheckDefault">
  <label class="form-check-label" for="flexCheckDefault">Desparasitado</label>  
</div>

  <div class="form-check">
  <input class="form-check-input" type="checkbox" name="esterilizado" value="1" id="flexCheckDefault">
  <label class="form-check-label" for="flexCheckDefault">Esterilizado</label>
</div>
<br>

<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Descripcion:</label>
  <textarea class="form-control" name="descripcion"id="exampleFormControlTextarea1" rows="4"></textarea>
</div>

<br>

<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Cuidados especiales:</label>
  <textarea class="form-control" name="cuidados"id="exampleFormControlTextarea1" rows="4"></textarea>
</div>

<br>

<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Historia de rescate:</label>
  <textarea class="form-control" name="historia"id="exampleFormControlTextarea1" rows="4"></textarea>
</div>

<input type="submit" value="Actualizar" name="actualizar" class="form-control btn btn-success">

</form>




<?php } ?>
  </tbody>
</table>
</div>

    </div>
    </div>
    </div>
</main>


<?php require "footer.php"; ?>