<?php
include('Manejo/utils.php');
include('Manejo/encabezado.php');
include('Manejo/conexion.php');


 if(isset($_GET['del'])){
  $sql = "delete from personas where id = '{$_GET['del']}'";
  $rsid = conexion::ejecutar($sql,true);
}

?>
<head><br>
<div class="card text-center ">
  <div class="card-header">
  <h4 class="text-center">Reservaciones Guardadas</h4>
  </div>
  <div class="card-body">
  <div class="container col-md-12">
<table class="table"> 
<thead class="thead-dark">
    <tr>
        <th>#</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Pasaporte</th>
        <th>correo</th>
        <th>telefono</th>
        <th>Pais</th>
        <th>Llegada</th>
        <th>Salida</th>
        <th># habitacion</th>
        <th>Opciones</th>
    </tr>
</thead>
<tbody class="striped">
<?php
$datos = conexion::consulta_array('select * from personas');

foreach ($datos as $data)
{
   
        echo "
        <tr>
        <th scope='row'>{$data['id']}</th>
        <td>{$data['nombre']}</td>
        <td>{$data['apellido']}</td>
        <td>{$data['pasaporte']}</td>
        <td>{$data['correo']}</td>
        <td>{$data['telefono']}</td>
        <td>{$data['pais']}</td>
        <td>{$data['llegada']}</td>
        <td>{$data['salida']}</td>
        <td>{$data['habitacion']}</td>
        <td>
            <a href='Reservaciones.php?del={$data['id']}' class='btn btn-outline-danger'>Eliminar</a>
            <a href='Registro.php?edit={$data['id']}' class='btn btn-outline-success'>Editar</a>
        </td>
        </tr>";
    }

?>
</tbody>
</table>
</div>
<a href="Registro.php" class="btnNuevo btn btn-outline-primary">Agregar</a>
  </div>
  <div class="card-footer text-muted">
        Derechos Reservados <?= date("Y");?>
  </div>
</div>