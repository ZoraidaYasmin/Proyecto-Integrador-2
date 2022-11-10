<?php
include("C:/xampp/htdocs/cscomas/Logica/action_page.php");

$id=(isset($_GET['id']))?$_GET['id']:"";

$accion=(isset($_POST['accion']))?$_POST['accion']:"";

$txtdes_usuario=(isset($_POST['txtdes_usuario']))?$_POST['txtdes_usuario']:"";
$txtid_personal=(isset($_POST['txtid_personal']))?$_POST['txtid_personal']:"";
$txtid_rol=(isset($_POST['txtid_rol']))?$_POST['txtid_rol']:"";
$txtid_usuario=(isset($_POST['txtid_usuario']))?$_POST['txtid_usuario']:"";
$txtmail_usuario=(isset($_POST['txtmail_usuario']))?$_POST['txtmail_usuario']:"";
$txtpas_personal=(isset($_POST['txtpas_personal']))?$_POST['txtpas_personal']:"";

switch($accion){
    case "btnModificar":
        $est=(int)"1";
        $sentencia=$pdo->prepare("UPDATE usuario SET
        des_usuario=:des_usuario, 
        id_personal=:id_personal, 
        id_rol=:id_rol, 
        mail_usuario=:mail_usuario,
        pas_personal=:pas_personal,
        est_usuario=:est_usuario
        WHERE id_usuario=:id_usuario");
        $sentencia->bindParam(':id_usuario',$txtid_usuario);
        $sentencia->bindParam(':id_personal',$txtid_personal);
        $sentencia->bindParam(':id_rol',$txtid_rol);
        $sentencia->bindParam(':mail_usuario',$txtmail_usuario);
        $sentencia->bindParam(':pas_personal',MD5($txtpas_personal));
        $sentencia->bindParam(':des_usuario',$txtdes_usuario);
        $sentencia->bindParam(':est_usuario',$est);
        $sentencia->execute();
        echo'<script type="text/javascript"> alert("Usuario Actualizado");</script>';
        header("location: ../Mantenimientos/ManUsuarios.php");
    
    break;
    case "btnCancelar":
        header("location: ../Mantenimientos/ManUsuarios.php");
    break;

}

$id=(isset($_GET['id']))?$_GET['id']:"";

$sentencia=$pdo->prepare("select * from usuario where id_usuario= :id_usuario");
$sentencia->bindParam(':id_usuario',$id);
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
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Mantenimiento</a>
                        <div class="dropdown-menu m-0">
                            <a href="\cscomas\Administracion\Mantenimientos\ManPacientes.php" class="dropdown-item">Paciente</a>
                            <a href="\cscomas\Administracion\Mantenimientos\ManPersonal.php" class="dropdown-item">Personal</a>
                            <a href="\cscomas\Administracion\Mantenimientos\ManMedico.php" class="dropdown-item">Medico</a>
                            <a href="\cscomas\Administracion\Mantenimientos\ManCitas.php" class="dropdown-item">Citas</a>
                            <a href="\cscomas\Administracion\Mantenimientos\ManUsuarios.php" class="dropdown-item">usuarios</a>
                        </div>
                    </div>

                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Reporte</a>
                        <div class="dropdown-menu m-0">
                            <a href="\cscomas\Administracion\Reportes\ReportPacientes.php" class="dropdown-item">Paciente</a>
                            <a href="\cscomas\Administracion\Reportes\ReportPersonal.php" class="dropdown-item">Personal</a>
                            <a href="\cscomas\Administracion\Reportes\ReportMedico.php" class="dropdown-item">Medico</a>
                            <a href="\cscomas\Administracion\Reportes\ReportCitas.php" class="dropdown-item">Citas</a>
                            <a href="\cscomas\Administracion\Reportes\ReportUsuarios.php" class="dropdown-item">usuarios</a>
                        </div>
                    </div>
                    <a href="\cscomas\Administracion\ReportePersonal.php" class="nav-item nav-link">Programacion</a>

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
                        
                        <h1 class="modal-title fs-5" id="exampleModalLabel">MODIFICAR PACIENTE</h1>
                        <div class="form-group col-md-12">
                        <label for="">DESCRIPCION O ALIAS:</label>
                        <input type="text" class="form-control" name="txtdes_usuario" required value="<?php echo $paciente['des_usuario'];?>" placeholder="" id="txtdes_usuario" requiere="">
                        <br>
                        </div>

                        <div class="form-group col-md-12">
                        <label for="">PERSONAL:</label>
                        <input type="text" class="form-control" name="txtid_personal" required value="<?php echo $paciente['id_personal'];?>" placeholder="" id="txtid_personal" requiere="">
                        <br>
                        </div>

                        <div class="form-group col-md-12">
                        <label for="">ROL:</label>
                        <input type="text" class="form-control" name="txtid_rol" required value="<?php echo $paciente['id_rol'];?>" placeholder="" id="txtid_rol" requiere="">
                        <br>
                        </div>

                        <div class="form-group col-md-12">
                        <label for="">Email:</label>
                        <input type="email" class="form-control" name="txtmail_usuario" required value="<?php echo $paciente['mail_usuario'];?>" placeholder="" id="txtmail_usuario" requiere="">
                        <br>
                        </div>

                        <div class="form-group col-md-12">
                        <label for="">NUEVA CONTRASEÑA:</label>
                        <input type="text" class="form-control" name="txtpas_personal"  value="<?php echo "";?>" placeholder="" id="txtpas_personal" requiere="">
                        <br>
                        </div>

                        <input type="hidden" name="txtid_usuario" value="<?php echo $paciente['id_usuario']; ?>">
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
