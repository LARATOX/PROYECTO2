<?php
require "../conexion.php";
require "header.html";
require "configC.php";

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$id = isset($_GET['id_Mascotas']) ? $_GET['id_Mascotas'] : '';
$token = isset($_GET['token']) ? $_GET['token'] : '';

if ($id == '' || $token == '') {
    echo 'Error al procesar la petición';
    exit;
} else {
    $token_tmp = hash_hmac('sha1', $id, KEY_TOKEN);
    if ($token == $token_tmp) {
        $db = new Database();
        $con = $db->conectar();
        $sql = $con->prepare("SELECT count(id_Mascotas) FROM mascotas WHERE id_Mascotas=?");
        $sql->execute([$id]);
        $count = $sql->fetchColumn();

        if ($count > 0) {
            $sql = $con->prepare("SELECT id_Mascotas, foto, estado_Adopcion, nombre, tipo_Especie, color, tamano, edad, sexo, vacunado, desparasitado,
            esterilizado, descripcion, cuidados, historia_Rescate 
            FROM mascotas
            INNER JOIN estado ON mascotas.id_Estado_fk=estado.id_Estado
            INNER JOIN especie ON mascotas.id_Especie_fk=especie.id_Especie
            INNER JOIN edad ON mascotas.id_Edad_fk = edad.id_Edad
            INNER JOIN sexo ON mascotas.id_Sexo_fk = sexo.id_Sexo
            INNER JOIN tamano ON mascotas.id_Tamano_fk = tamano.id_Tamano
            WHERE id_Mascotas = ? LIMIT 1");
            $sql->execute([$id]);
            $resultado = $sql->fetch(PDO::FETCH_ASSOC);

            $foto = $resultado['foto'];
            $estado = $resultado['estado_Adopcion'];
            $nombre = $resultado['nombre'];
            $especie = $resultado['tipo_Especie'];
            $color = $resultado['color'];
            $tamano = $resultado['tamano'];
            $edad = $resultado['edad'];
            $sexo = $resultado['sexo'];
            $vacunado = $resultado['vacunado'];
            $desparasitado = $resultado['desparasitado'];
            $esterilizado = $resultado['esterilizado'];
            $descripcion = $resultado['descripcion'];
            $cuidados = $resultado['cuidados'];
            $historia = $resultado['historia_Rescate'];
        } else {
            echo 'Error al procesar la petición';
            exit;
        }
    }
}
?>

<section class="detalle-mascota">
    <div class="container">
        <!-- Título -->
        <div class="titulo">
            <h2>¡Hola, soy <?php echo $nombre ?>!</h2>
        </div>
        
        <!-- Imagen -->
        <div class="imagen">
            <img src="<?php echo $foto ?>" alt="Foto de <?php echo $nombre ?>">
        </div>
        
        <!-- Detalles -->
        <div class="detalles">
            <h4><strong>Estado de adopción:</strong> <?php echo $estado ?></h4>
            <h4><strong>Especie:</strong> <?php echo $especie ?></h4>
            <h4><strong>Color:</strong> <?php echo $color ?></h4>
            <h4><strong>Tamaño:</strong> <?php echo $tamano ?></h4>
            <h4><strong>Edad:</strong> <?php echo $edad ?></h4>
            <h4><strong>Sexo:</strong> <?php echo $sexo ?></h4>
            
            <h4><strong>Salud:</strong></h4>
            <?php if ($vacunado == 1) { ?>
                <h4><img src="img/mascotas.png" alt="Vacunado" width="50px"> Vacunado</h4>
            <?php } ?>
            <?php if ($desparasitado == 1) { ?>
                <h4><img src="img/perro.png" alt="Desparasitado" width="50px"> Desparasitado</h4>
            <?php } ?>
            <?php if ($esterilizado == 1) { ?>
                <h4><img src="img/cuidado-de-mascotas.png" alt="Esterilizado" width="50px"> Esterilizado</h4>
            <?php } ?>
            
            <h4><strong>Descripción:</strong> <?php echo $descripcion ?></h4>
            <h4><strong>Cuidados especiales:</strong> <?php echo $cuidados ?></h4>
            <h4><strong>Historia de rescate:</strong> <?php echo $historia ?></h4>
            
            <a href="Adopta.php" class="btn btn-warning">Adoptar</a>
        </div>
    </div>
</section>

