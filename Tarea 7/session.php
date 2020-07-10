<?php
include("Manejo/config.php");
include("Manejo/conexion.php");

session_start();

$user_check=$_SESSION['login_user_sys'];

$ses_sql=mysqli_query($con, "select usarname from usuarion where usarname='$user_check'");
$row = mysqli_fetch_assoc($ses_sql);
$login_session =$row['usarname'];
if(!isset($login_session)){
mysqli_close($con);
header('Location: index.php');
}
?>