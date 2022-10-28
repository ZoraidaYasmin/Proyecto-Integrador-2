<?php
include("../Logica/action_page.php");

$txthc=(isset($_POST['txtdni']))?$_POST['txtdni']:"";
$txtnom=(isset($_POST['txtnombre']))?$_POST['txtnombre']:"";
$txtape=(isset($_POST['txtapellidos']))?$_POST['txtapellidos']:"";
$txtmail=(isset($_POST['txtmail']))?$_POST['txtmail']:"";
$txtdir=(isset($_POST['txtdireccion']))?$_POST['txtdireccion']:"";
$txttel=(isset($_POST['txttelefono']))?$_POST['txttelefono']:"";
$txtcel=(isset($_POST['txtcelular']))?$_POST['txtcelular']:"";
$txtsex=(isset($_POST['txtsexo']))?$_POST['txtsexo']:"";
$txtfn=(isset($_POST['textfn']))?$_POST['textfn']:"";


        $est=(int)"1";
        $sentencia=$pdo->prepare("UPDATE paciente SET
        nom_paciente=:nom_paciente, 
        ape_personal=:ape_personal, 
        mail_paciente=:mail_paciente, 
        est_paciente=:est_paciente, 
        dir_paciente=:dir_paciente, 
        tel_paciente=:tel_paciente, 
        cel_paciente=:cel_paciente, 
        sex_paciente=:sex_paciente, 
        fn_paciente=:fn_paciente
        WHERE hc_paciente= :hc_paciente");
        $sentencia->bindParam(':hc_paciente',$txthc);
        $sentencia->bindParam(':nom_paciente',$txtnom);
        $sentencia->bindParam(':ape_personal',$txtape);
        $sentencia->bindParam(':mail_paciente',$txtmail);
        $sentencia->bindParam(':est_paciente',$est);
        $sentencia->bindParam(':dir_paciente',$txtdir);
        $sentencia->bindParam(':tel_paciente',$txttel);
        $sentencia->bindParam(':cel_paciente',$txtcel);
        $sentencia->bindParam(':sex_paciente',$txtsex);
        $sentencia->bindParam(':fn_paciente',$txtfn);
        $sentencia->execute();
        
        header("location: ../Admision/MenuAdmision.php");

?>