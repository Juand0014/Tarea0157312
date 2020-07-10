<?php
session_start();
$error='';
if (isset($_POST['submit'])) {
    if (empty($_POST['username']) || empty($_POST['password'])) {
    $error = "Username or Password is invalid";
    }
    else
    {

        $username=$_POST['username'];
        $password=$_POST['password'];

        include("Manejo/config.php");
        include("Manejo/conexion.php");

        $username    = mysqli_real_escape_string($con,(strip_tags($username,ENT_QUOTES)));
        $password =  sha1($password);

        $sql = "SELECT usarname, password FROM usuarios WHERE usarname = '" . $username . "' and password='".$password."';";
        $query=mysqli_query($con,$sql);
        $counter=mysqli_num_rows($query);
        if (count($counter)!=0){
                $_SESSION['login_user_sys']=$username;
                header("location: Reservaciones.php");
        } else {
        $error = "El correo electrónico o la contraseña es inválida.";	
        }
    }
}
?>