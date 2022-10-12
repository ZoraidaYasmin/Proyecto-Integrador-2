<?php
require 'conexion.php';

session_start();
$usuario=$_POST['correo'];
$clave=md5($_POST['contaseña']);

$senten = "SELECT * FROM usuario WHERE mail_usuario = '".$usuario."'";

  $result = mysqli_query($conexion, $senten);
  if ($data = mysqli_fetch_array($result))
  {
    session_start();
    $correo = $data['mail_usuario'];
    $rol = $data['id_rol'];
    #$id_value = $data['id_rol'];
    $_SESSION["usuario"] =$correo;
    $_SESSION["rol"] =$rol;
    switch ($rol) {
        case 0:
            header("Location: \cscomas\Administracion\MenuAdmin.php");
            break;
        case 1:
            header("Location: \cscomas\Admision\MenuAdmision.php");
            break;
        case 2:
            header("Location: .\Doctor\index.php");
            break;
    
        }
  }
?>