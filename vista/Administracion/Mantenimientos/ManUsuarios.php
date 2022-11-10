<?php
include("C:/xampp/htdocs/cscomas/Logica/action_page.php");
include("C:/xampp/htdocs/cscomas/Logica/conexion.php");

session_start();
$usuario= $_SESSION['usuario'];
if(!isset($usuario)){
    header("location: \cscomas\index.php");
}

$accion=(isset($_POST['accion']))?$_POST['accion']:"";

$txtid=(isset($_POST['txtid']))?$_POST['txtid']:"";
$txtper=(isset($_POST['txtper']))?$_POST['txtper']:"";
$txtrol=(isset($_POST['txtrol']))?$_POST['txtrol']:"";
$txtmail=(isset($_POST['txtmail']))?$_POST['txtmail']:"";
$txtpass=(isset($_POST['txtpass']))?$_POST['txtpass']:"";
$txtdes=(isset($_POST['txtdes']))?$_POST['txtdes']:"";
$txtest=(isset($_POST['txtest']))?$_POST['txtest']:"";

switch($accion){
    case "btnAgregar":
        $est=(int)"1";
        $sentencia2="SELECT COUNT(*) FROM usuario";
        $consulta2=mysqli_query($conexion,$sentencia2);
        $fila=mysqli_fetch_row($consulta2);
        $id=(int)$fila[0];
        $sentencia=$pdo->prepare("INSERT INTO usuario(id_usuario,id_personal,id_rol,mail_usuario,pas_personal,des_usuario,est_usuario) 
        VALUES (:id_usuario,:id_personal,:id_rol,:mail_usuario,:pas_personal,:des_usuario,:est_usuario)");
        $sentencia->bindParam(':id_usuario',$id);
        $sentencia->bindParam(':id_personal',$txtper);
        $sentencia->bindParam(':id_rol',$txtrol);
        $sentencia->bindParam(':mail_usuario',$txtmail);
        $sentencia->bindParam(':pas_personal',MD5($txtpass));
        $sentencia->bindParam(':des_usuario',$txtdes);
        $sentencia->bindParam(':est_usuario',$txtest);
        $sentencia->execute();

        $txtid="";
        $txtper="";
        $txtrol="";
        $txtmail="";
        $txtpass="";
        $txtdes="";
        $txtest="";
        echo'<script type="text/javascript"> alert("Usuario Guardado");</script>';
        header("location: ../Mantenimientos/ManUsuarios.php");
        
    break;
    case "btnModificar":

        header("location: ../Mantenimientos/ModUsuarios.php?id=$txtid");
    
    break;

    case "btnEliminar":
        $sentencia=$pdo->prepare(" DELETE FROM usuario WHERE id_usuario=:id_usuario");
        $sentencia->bindParam(':id_usuario',$txtid);
        
        if (!$sentencia->execute()) {

            echo       
              '<META HTTP-EQUIV="Refresh" CONTENT="0; URL=http://localhost/Aeroasistencia/Administracion/edicionCliente.php">
             <script>
                 alert("El cliente NO  fue eliminado EXITOSAMENTE");
             </script>';
 
         }else{
 
             echo        
             '<META HTTP-EQUIV="Refresh" CONTENT="0; URL=http://localhost/Aeroasistencia/Administracion/edicionCliente.php">
             <script>
                  alert("El cliente fue eliminada EXITOSAMENTE");
             </script>';
 
         }

        header("location: ../Mantenimientos/ManUsuarios.php");
    break;

    case "btnCancelar":
        header("location: ../Mantenimientos/ManUsuarios.php");
    break;

}


$sentencia=$pdo->prepare("SELECT u.id_usuario,u.id_personal,u.pas_personal,u.des_usuario,u.mail_usuario,u.id_rol,p.nom_personal,u.est_usuario,r.des_rol FROM usuario u,personal p,rol r 
WHERE p.id_personal= u.id_personal and r.id_rol=u.id_rol limit 10");
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

    <!-- Header Start -->
    <div class="container text-center my-1 py-1">


<form action="" method="post">


        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">AGREGAR USUARIO</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <div class="form-row">


                        <div class="form-group col-md-12">
                        <label for="">NOMBRE O ALIAS:</label>
                        <input type="text" class="form-control" name="txtdes" required value="<?php echo $txtdes;?>" placeholder="" id="txtnombres" requiere="">
                        <br>
                        </div>

                        <div class="form-group col-md-12">
                        <label for="">Email:</label>
                        <input type="email" class="form-control" name="txtmail" required value="<?php echo $txtmail;?>" placeholder="" id="txtmail" requiere="">
                        <br>
                        </div>

                        <div class="form-group col-md-12">
                        <label for="">CONTRASEÑA:</label>
                        <input type="text" class="form-control" name="txtpass" required value="<?php echo $txtpass;?>" placeholder="" id="txtpass" requiere="">
                        <br>
                        </div>

                        <div class="form-group col-md-12">
                        <label for="">PERSONAL:</label>
                        <input type="text" class="form-control" name="txtper" required value="<?php echo $txtper;?>" placeholder="" id="txtper" requiere="">
                        <br>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="">ROL:</label>
                            <input type="text" class="form-control" name="txtrol" required value="<?php echo $txtrol;?>" placeholder="" id="txtrol" requiere="">
                            <br>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="">Telefono:</label>
                            <input type="text" class="form-control" name="txtest" required value="<?php echo $txtest;?>" placeholder="" id="txtest" requiere="">
                            <br>
                        </div>


                </div>
            </div>
            <div class="modal-footer">

                        <button value="btnAgregar" class="btn btn-success" type="submit" name="accion" >Agregar</button>
                        <button value="btnCancelar"  class="btn btn-primary" type="submit" name="accion">Cancelar</button>
                    
            </div>
            </div>
        </div>
        </div>
        <!-- Button trigger modal echo $accionCancelar;-->
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        AGREGAR USUARIO +
        </button>
</form>         

        </div>


    <div class="container text-center my-1 py-1">

    <h1>LISTADO DE USUARIOS</h1>

    <div class="row">
       <table class="table table-striped" style="white-space: nowrap; overflow-x: auto;">
        <thead class="table-success table-striped">
            <tr>
                <th>USUARIO</th>
                <th>CORREO</th>
                <th>ROL</th>
                <th>PERSONAL</th>
                <th>Estado</th>
                <th>Accion</th>
            </tr>
        </thead>
        <?php foreach($listadoPaciente as $paciente){?>
        <tr>
                <td><?php echo $paciente['des_usuario']; ?></td>
                <td><?php echo $paciente['mail_usuario']; ?></td>
                <td><?php echo $paciente['des_rol']; ?></td>
                <td><?php echo $paciente['nom_personal']; ?></td>
                <td><?php
                $var=$paciente['est_usuario'];
                if($var=1){
                    echo "ACTIVO";
                }else{
                    echo "INACTIVO";
                } ?></td>
                <td>
                    <form action="" method="post">  
                        <input type="hidden" name="txtid" value="<?php echo $paciente['id_usuario'];?>">
                        <button value="btnModificar" type="submit" class="btn btn-warning" name="accion" >Modificar</button>
                        <button value="btnEliminar" class="btn btn-danger" type="submit" name="accion">Eliminar</button></td>
                    </form> 
            </tr>
        <?php } ?>    
       </table>

    <?php


    ?>
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
