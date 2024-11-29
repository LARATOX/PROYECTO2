<?php
require "header.php";
require "../conexion.php";

$db = new Database();
$con = $db->conectar();

$sql = $con ->prepare("SELECT id_Mascotas, foto, estado_Adopcion, nombre from mascotas
inner join estado on mascotas.id_Estado_fk=Estado.id_Estado");
$sql->execute();
$resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
?>

<main>

<div class="container "> 
  <br>
<h1 class="text-center">Solicitudes</h1>

<BR></BR>

</div>


<div class="container">
   <div class="row justify-content-center P-5" >
   <div class="col-auto">
<table class="table">
<thead class="table-dark">
    <tr>
    <th scope="col">Id_Mascotas</th>
      <th scope="col">Foto</th>
      <th scope="col">Estado de adopción</th>
      <th scope="col">Nombre</th>
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

<td><a href="verSolicitud.php" class="btn btn-warning">Ver solicitudes</a></td>
</tr>


<?php } ?>
  </tbody>
</table>
</div>

    </div>
    </div>
    </div>
</main>


<?php require "footer.php"; ?>

