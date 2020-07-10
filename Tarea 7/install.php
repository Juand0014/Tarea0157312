<?php
include('Manejo/conexion.php');
include('Manejo/utils.php');

if($_POST){

    $mycon = mysqli_connect($_POST['DB_HOST'],$_POST['DB_USER'],$_POST['DB_PASS']) or die(
        "
        <script>
        alert('Conexion invalida, por favor verificar los datos');
        window.location = 'install.php';
        </script>"

    );

    mysqli_query($mycon,"drop DATABASE`{$_POST['DB_NAME']}`");
    mysqli_query($mycon, "CREATE DATABASE `{$_POST['DB_NAME']}`");
    mysqli_query($mycon," USE `{$_POST['DB_NAME']}`");
    mysqli_query($mycon,"CREATE TABLE IF NOT EXISTS `personas` (
        `id` int(4) NOT NULL,
        `nombre` varchar(200) DEFAULT NULL,
        `apellido` varchar(200) DEFAULT NULL,
        `pasaporte` varchar(200) DEFAULT NULL,
        `correo` varchar(200) DEFAULT NULL,
        `telefono` varchar(50) DEFAULT NULL,
        `pais` varchar(100) DEFAULT NULL,
        `llegada` varchar(100) DEFAULT NULL,
        `salida` varchar(100) DEFAULT NULL,
        `habitacion` varchar(50) DEFAULT NULL
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;");

mysqli_query($mycon, "
ALTER TABLE `personas`
ADD PRIMARY KEY (`id`);");

mysqli_query($mycon, "
ALTER TABLE `personas`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;");

    
$archivo = <<<ARCHIVO

<?php

define('DB_HOST','{$_POST['DB_HOST']}');
define('DB_USER','{$_POST['DB_USER']}');
define('DB_PASS','{$_POST['DB_PASS']}');
define('DB_NAME','{$_POST['DB_NAME']}');

define('IS_DEBUG', true);

ARCHIVO;
    
file_put_contents('Manejo/config.php', $archivo);
    
echo "<script>
window.location = 'Reservaciones.php';
</script>";
    }

    include('Manejo/encabezado.php');
?>
<body><br>

<div container>
<div class="card">
  <div class="card-header">
  <h3 class="text-center">Intalador</h3>
  </div>
  <div class="card-body">
  <form method="post" action="" class="needs-validation" novalidate>
        <div class="form-group input-group">
        </div>
        <div>
        <?= asgInput('DB_USER','Usuario'); ?>
        </div>
        <div>
        <?= asgInput('DB_HOST','Servidor'); ?>
        </div>
        <div>
          <div class="container col-md-8">
              <div class="form-group">
                  <label  for="DB_PASS">Clave</label>
                  <input name = "DB_PASS" id="DB_PASS" type="password" class="form-control">
                  <div class="valid-feedback">Este es opcional!!!</div>
              </div>
          </div>
        </div>
        <div>
        <?= asgInput('DB_NAME','Nombre de la base de datos',''); ?>
        </div>
        <div class="text-center">
        <button type="submit" class="btn btn-dark btn-lg">Guardar</button>
        </div>
    </form>
  </div>
  <div class="card-footer text-muted text-center">
    Derechos Reservados <?= date("Y");?>
  </div>
</div>
</div>
</body>
</html>

