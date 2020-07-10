<?php
    include('Manejo/conexion.php');
    include('Manejo/utils.php');
    include('Manejo/encabezado.php');

    if($_POST){

      extract($_POST);
      
      $sql = "insert into usuarios (name,usarname,password,Tusuario) 
      values('{$name}','{$user}','{$password}','{$Tuser}')";

      $rsid = conexion::ejecutar($sql,true);
      header("Location:index.php");
      }
?>
<body><br>
<div class="container col-md-8 border border-secondary rounded">
<h3 class="text-center">Registrarse</h3><hr>
<form enctype = "multipart/form-data" method="post" class="needs-validation" novalidate>
  <div class="form-row">
    <div class="col-md-6 mb-3">
      <label for="name">Nombre</label>
      <input type="name" class="form-control" id="validationCustom01" name="name" required>
      <div class="valid-feedback">Perfecto!!!</div>
      <div class="invalid-feedback">Debes poner un Nombre</div>
    </div>
    <div class="col-md-6 mb-3">
      <label for="user">Usuario</label>
      <input type="text" class="form-control" id="validationCustom02" name="user" required>
      <div class="valid-feedback">Perfecto!!!</div>
      <div class="invalid-feedback">Debes poner un Usuario</div>
    </div>
  </div>
  <div class="form-row">
    <div class="col-md-9 mb-3">
      <label for="password">Contraseña</label>
      <input type="password" name="password" class="form-control" id="validationCustom03" required>
      <div class="valid-feedback">Perfecto!!!</div>
      <div class="invalid-feedback">Debes poner una Contraseña</div>
    </div>
    <div class="col-md-3 mb-3">
      <label for="Tuser">Rol</label>
      <select class="custom-select" name="Tuser" id="validationCustom04" required>
        <option value="Admin" >Administrador</option>
        <option value="User">Usuario</option>
      </select>
      <div class="valid-feedback">Perfecto!!!</div>
      <div class="invalid-feedback">Debes selecionar el rol de usuario</div>
    </div>
  </div>
  <center>
  <button class="btn btn-primary" type="submit">Guardar</button>
  </center>
</form>
</div>
</body>
</html>