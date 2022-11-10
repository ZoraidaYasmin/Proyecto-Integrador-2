<?php
include("C:/xampp/htdocs/cscomas/Logica/action_page.php");

$accion=(isset($_POST['accion']))?$_POST['accion']:"";

$txtid=(isset($_POST['txtid']))?$_POST['txtid']:"";
$txtdni=(isset($_POST['txtdni']))?$_POST['txtdni']:"";
$txtnombres=(isset($_POST['txtnombres']))?$_POST['txtnombres']:"";
$txtmail=(isset($_POST['txtmail']))?$_POST['txtmail']:"";
$txtlocal=(isset($_POST['txtlocal']))?$_POST['txtlocal']:"";
$txtestado=(isset($_POST['txtestado']))?$_POST['txtestado']:"";
$txtdireccion=(isset($_POST['txtdireccion']))?$_POST['txtdireccion']:"";
$txttelefono=(isset($_POST['txttelefono']))?$_POST['txttelefono']:"";
$txtcelular=(isset($_POST['txtcelular']))?$_POST['txtcelular']:"";
$txtsexo=(isset($_POST['txtsexo']))?$_POST['txtsexo']:"";
$textfn=(isset($_POST['textfn']))?$_POST['textfn']:"";
$textfi=(isset($_POST['textfi']))?$_POST['textfi']:"";

switch($accion){
    case "btnModificar":
        $est=(int)"1";
        $sentencia=$pdo->prepare("UPDATE personal SET
        dni_personal=:dni_personal, 
        nom_personal=:nom_personal, 
        mail_personal=:mail_personal, 
        loc_personal=:loc_personal, 
        est_personal=:est_personal, 
        dir_personal=:dir_personal, 
        tel_casa=:tel_casa, 
        cel_personal=:cel_personal,
        sex_personal=:sex_personal,
        fn_personal=:fn_personal,  
        fi_personal=:fi_personal
        WHERE id_personal= :id_personal");
        $sentencia->bindParam(':id_personal',$txtid);
        $sentencia->bindParam(':dni_personal',$txtdni);
        $sentencia->bindParam(':nom_personal',$txtnombres);
        $sentencia->bindParam(':mail_personal',$txtmail);
        $sentencia->bindParam(':loc_personal',$txtlocal);
        $sentencia->bindParam(':est_personal',$txtestado);
        $sentencia->bindParam(':dir_personal',$txtdireccion);
        $sentencia->bindParam(':tel_casa',$txttelefono);
        $sentencia->bindParam(':cel_personal',$txtcelular);
        $sentencia->bindParam(':sex_personal',$txtsexo);
        $sentencia->bindParam(':fn_personal',$textfn);
        $sentencia->bindParam(':fi_personal',$textfi);
        $sentencia->execute();
        echo'<script type="text/javascript"> alert("Personal Actualizado");</script>';
        header("location: ../Mantenimientos/ManPersonal.php");
    
    
    break;
    case "btnCancelar":
        header("location: ../Mantenimientos/ManPersonal.php");
    break;

}

$id=(isset($_GET['id']))?$_GET['id']:"";

$sentencia=$pdo->prepare("select * from personal where id_personal= :id_personal");
$sentencia->bindParam(':id_personal',$id);
$sentencia->execute();
$listadoPaciente=$sentencia->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Centro Salud Comas</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600;700&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="/cscomas/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="/cscomas/css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid bg-dark">
        <div class="row py-2 px-lg-5">
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg bg-white navbar-light py-3 py-lg-0 px-lg-5">
                <h1 class="m-0 text-uppercase text-primary">CENTRO DE SALUD COMAS</h1>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between px-lg-3" id="navbarCollapse">
                <div class="navbar-nav mx-auto py-0">
                    <a href="\cscomas\Administracion\MenuAdmin.php" class="nav-item nav-link active">Principal</a>
                    <a href="\cscomas\Administracion\ReportePersonal.php" class="nav-item nav-link">Reporte</a>
                    <a href="\cscomas\Administracion\ReportePaciente.php" class="nav-item nav-link">Pacientes</a>
                    <a href="\cscomas\Administracion\ReporteMedicos.php" class="nav-item nav-link">Medicos</a>
                </div>
                <a href="\cscomas\Logica\salir.php" class="btn btn-primary py-2 px-4 d-none d-lg-block">Cerrar Sesion</a>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->
    <div class="container-fluid bg-dark">
        <div class="row py-2 px-lg-5">
        </div>
    </div>
    <form action="" method="post">
    <!-- Header Start -->
    <div class="container text-center my-1 py-1">

                <?php foreach($listadoPaciente as $paciente){?>
                        
                        <h1 class="modal-title fs-5" id="exampleModalLabel">MODIFICAR PERSONAL</h1>

                        <div class="form-group col-md-12">
                        <label for="">ID:</label>
                        <input type="text" class="form-control" name="txtid" required value="<?php echo $paciente['id_personal'];?>" placeholder="" id="txtid" requiere="">
                        <br>
                        </div>
                        <div class="form-group col-md-12">
                        <label for="">DNI:</label>
                        <input type="text" class="form-control" name="txtdni" required value="<?php echo $paciente['dni_personal'];?>" placeholder="" id="txtdni" requiere="">
                        <br>
                        </div>

                        <div class="form-group col-md-12">
                        <label for="">Trabajador:</label>
                        <input type="text" class="form-control" name="txtnombres" required value="<?php echo $paciente['nom_personal'];?>" placeholder="" id="txtnombres" requiere="">
                        <br>
                        </div>

                        <div class="form-group col-md-12">
                        <label for="">Email:</label>
                        <input type="email" class="form-control" name="txtmail" required value="<?php echo $paciente['mail_personal'];?>" placeholder="" id="txtmail" requiere="">
                        <br>
                        </div>

                        <div class="form-group col-md-12">
                        <label for="">Local:</label>
                        <input type="text" class="form-control" name="txtlocal" required value="<?php echo $paciente['loc_personal'];?>" placeholder="" id="txtlocal" requiere="">
                        <br>
                        </div>

                        <div class="form-group col-md-12">
                        <label for="">Estado:</label>
                        <input type="text" class="form-control" name="txtestado" required value="<?php echo $paciente['est_personal'];?>" placeholder="" id="txtestado" requiere="">
                        <br>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="">Direccion:</label>
                            <input type="text" class="form-control" name="txtdireccion" required value="<?php echo $paciente['dir_personal'];?>" placeholder="" id="txtdireccion" requiere="">
                            <br>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="">Telefono:</label>
                            <input type="text" class="form-control" name="txttelefono" required value="<?php echo $paciente['tel_casa'];?>" placeholder="" id="txttelefono" requiere="">
                            <br>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="">Celular:</label>
                            <input type="text" class="form-control" name="txtcelular" required value="<?php echo $paciente['cel_personal'];?>" placeholder="" id="txtcelular" requiere="">
                            <br>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="">Sexo:</label>
                            <input type="text" class="form-control" name="txtsexo" required value="<?php echo $paciente['sex_personal'];?>" placeholder="" id="txtsexo" requiere="">
                            <br>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="">Fecha Nacimiento:</label>
                            <input type="text" class="form-control" name="textfn" required value="<?php echo $paciente['fn_personal'];?>" placeholder="" id="textfn" requiere="">
                            <br>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="">Fecha Ingreso:</label>
                            <input type="text" class="form-control" name="textfi" required value="<?php echo $paciente['fi_personal'];?>" placeholder="" id="textfi" requiere="">
                            <br>
                        </div>
                        
                <?php }?>

                        <button value="btnModificar"  class="btn btn-warning" type="submit" name="accion" >Modificar</button>
                        <button value="btnCancelar"  class="btn btn-primary" type="submit" name="accion">Cancelar</button>
                    
            
           
        </div>
        </div>
        <!-- Button trigger modal ../Admision/Update.php  -->
        <!-- Button trigger modal 
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        AGREGAR PACIENTE +
        </button>-->
</form>         

        </div>


    <div class="container text-center my-1 py-1">


    </div>

    </div>
    <!-- Header End -->

    <!-- About Start -->

    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary rounded-0 btn-lg-square back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="/cscomas/lib/easing/easing.min.js"></script>
    <script src="/cscomas/lib/waypoints/waypoints.min.js"></script>
    <script src="/cscomas/lib/counterup/counterup.min.js"></script>
    <script src="/cscomas/lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="/cscomas/js/main.js"></script>
</body>

</html>
