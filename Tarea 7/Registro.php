<?php
include('Manejo/utils.php');
include('Manejo/conexion.php');

if($_POST){

extract($_POST);

if(isset($_GET['edit'])){
  $sql = "update personas SET nombre='{$nombre}', apellido='{$apellido}', pasaporte='{$pasaporte}',correo='{$correo}',telefono='{$telefono}',pais='{$pais}',llegada='{$llegada}',salida='{$salida}',habitacion='{$habitacion}' WHERE id={$_GET['edit']}";
}else{

$sql = "insert into personas (nombre,apellido,pasaporte,correo,telefono,pais,llegada, salida,habitacion) 
values('{$nombre}','{$apellido}','{$pasaporte}','{$correo}','{$telefono}','{$pais}','{$llegada}','{$salida}','{$habitacion}')";
}
$rsid = conexion::ejecutar($sql,true);
header("Location:Reservaciones.php");
}

else if(isset($_GET['edit'])){

    $sql = "select * from personas where id =  {$_GET['edit']}";
 
 $objs = conexion::consulta_array($sql);
 
     if (count($objs) > 0){
         $data = $objs[0];
         $_POST = $data;
     }
 }
?>
<?php include('Manejo/encabezado.php');?>
<h3 class="text-center">Hotel Lincoln's</h3>
    <hr>  
    <form enctype = "multipart/form-data" class="needs-validation" class="col s12" method="post" novalidate>
      <?= asgInput('nombre','Nombre','');?>
      <?= asgInput('apellido','Apellido');?>
      <?= asgInput('pasaporte','Pasaporte');?>
      <?= asgInput('correo','Correo');?>
      <?= asgInput('telefono','Telefono','',['type'=>'number']);?>
      <?= asgInput('pais','Pais de origen');?>
      <?= asgInput('llegada','Fecha de llegada','',['type'=>'date']);?>
      <?= asgInput('salida','Fecha de salida','',['type'=>'date']);?>
      <?= asgInput('habitacion','Numero de habitacion','',['type'=>'number']);?>
      <div class="center-align">
      <center>
      <button class="btn btn-outline-primary" type="submit" name="action">Reservar</button> 
      </center>
     </form>