<?php
require "header.php";

?>

<main>

<h2> </h2><br> <h2></h2>
<div class="row justify-content-center">
<form class="col-md-6 border border-primary p-4" action="controladorA.php" enctype="multipart/form-data" method="post" >
<div class="mb-3">
<h2 class="text-center"><img src="imagenes/huella.png" alt="" width=45px height=45px>  MASCOTA</h2>
<br><br>
</div>
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

<div class="text-center">

  <button type="submit" class="btn btn-primary" value="Registrar" name="Subir">Agregar nueva mascota</button>
</div>

</form>

</main>

<?php require "footer.php";
?>