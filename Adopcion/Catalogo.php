<?php
require "../conexion.php";
require "header.html";
require "configC.php";

$db = new Database();
$con = $db->conectar();

$sql = $con->prepare("SELECT id_Mascotas, foto, estado_Adopcion, nombre, tipo_Especie, color, edad, sexo, tamano 
                      FROM mascotas
                      INNER JOIN estado ON mascotas.id_Estado_fk = estado.id_Estado
                      INNER JOIN especie ON mascotas.id_Especie_fk = especie.id_Especie
                      INNER JOIN edad ON mascotas.id_Edad_fk = edad.id_Edad
                      INNER JOIN sexo ON mascotas.id_Sexo_fk = sexo.id_Sexo
                      INNER JOIN tamano ON mascotas.id_Tamano_fk = tamano.id_Tamano
                      ORDER BY id_Mascotas ASC;");
$sql->execute();
$resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
?>

<main>
    <section class="adopcion">
        <div class="container">
            <h1><i class="fas fa-paw"></i> ¡Encuentra a tu nuevo mejor amigo!</h1>
            <div class="container1">
                <div class="row">
                    <?php foreach ($resultado as $row) { ?>
                        <div class="col">
                            <div class="card">
                                <img src="../archivos/<?php echo $row['foto']; ?>" alt="Imagen de <?php echo $row['nombre']; ?>">
                                <div class="card-content">
                                    <h5 class="card-title"><i class="fas fa-dog"></i><?php echo $row['nombre']; ?></h5>
                                    <p class="card-text"><i class="fas fa-heart"></i>Estado de adopción: <?php echo $row['estado_Adopcion']; ?></p>
                                    <p class="card-text"><i class="fas fa-paw"></i>Especie: <?php echo $row['tipo_Especie']; ?></p>
                                    <p class="card-text"><i class="fas fa-palette"></i>Color: <?php echo $row['color']; ?></p>
                                    <p class="card-text"><i class="fas fa-birthday-cake"></i>Edad: <?php echo $row['edad']; ?></p>
                                    <p class="card-text"><i class="fas fa-venus-mars"></i>Sexo: <?php echo $row['sexo']; ?></p>
                                    <p class="card-text"><i class="fas fa-ruler"></i>Tamaño: <?php echo $row['tamano']; ?></p>
                                    <a href="Detalles.php?id_Mascotas=<?php echo $row['id_Mascotas']; ?>&token=<?php echo hash_hmac('sha1', $row['id_Mascotas'], KEY_TOKEN); ?>" class="ver-mas">
                                        <i class="fas fa-info-circle"></i> Ver más
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>
</main>


<?php
require "footer.html";
?>
