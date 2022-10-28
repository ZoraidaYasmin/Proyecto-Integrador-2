<?php
include("../Logica/action_page.php");
<<<<<<< HEAD
include("../Logica/conexion.php");
=======
>>>>>>> master

session_start();
$usuario= $_SESSION['usuario'];
if(!isset($usuario)){
    header("location: \cscomas\index.php");
}

$txthc=(isset($_POST['txtdni']))?$_POST['txtdni']:"";
$txtnom=(isset($_POST['txtnombre']))?$_POST['txtnombre']:"";
$txtape=(isset($_POST['txtapellidos']))?$_POST['txtapellidos']:"";
$txtmail=(isset($_POST['txtmail']))?$_POST['txtmail']:"";
$txtdir=(isset($_POST['txtdireccion']))?$_POST['txtdireccion']:"";
$txttel=(isset($_POST['txttelefono']))?$_POST['txttelefono']:"";
$txtcel=(isset($_POST['txtcelular']))?$_POST['txtcelular']:"";
$txtsex=(isset($_POST['txtsexo']))?$_POST['txtsexo']:"";
$txtfn=(isset($_POST['textfn']))?$_POST['textfn']:"";

$accion=(isset($_POST['accion']))?$_POST['accion']:"";

$accionAgregar="";
$accionCancelar="";
$accionModificar=$accionEliminar="disabled";
$mostrarModal=false;


switch($accion){
    case "btnAgregar":
        $est=(int)"1";
<<<<<<< HEAD

=======
>>>>>>> master
        $sentencia=$pdo->prepare("INSERT INTO paciente(hc_paciente, nom_paciente, ape_personal, mail_paciente, est_paciente, dir_paciente, tel_paciente, cel_paciente, sex_paciente, fn_paciente) 
        VALUES (:hc_paciente, :nom_paciente, :ape_personal, :mail_paciente, :est_paciente, :dir_paciente, :tel_paciente, :cel_paciente, :sex_paciente, :fn_paciente)");
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
        
    break;
    case "btnModificar":
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
    
    break;

    case "btnEliminar":
        $sentencia=$pdo->prepare(" DELETE FROM paciente WHERE hc_paciente=:hc_paciente");
        $sentencia->bindParam(':hc_paciente',$txthc);
        $sentencia->execute();
        header("location: ../Admision/MenuAdmision.php");
    break;

    case "btnCancelar":
        header("location: ../Admision/MenuAdmision.php");
    break;

    case "Seleccionar":
        $accionAgregar="disabled";
        $accionModificar=$accionEliminar=$accionCancelar="";
        break;
}


$sentencia=$pdo->prepare("select * from paciente");
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
                    <a href="\cscomas\Admision\MenuAdmision.php" class="nav-item nav-link active">Principal</a>
                    <a href="\cscomas\Admision\ReportePaciente.php" class="nav-item nav-link">Reporte</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Mantenimiento</a>
                        <div class="dropdown-menu m-0">
                            <a href="\cscomas\Admision\NuevoPaciente.php" class="dropdown-item">Nuevo</a>
                            <a href="\cscomas\Admision\ModificarPaciente.php" class="dropdown-item">Modificar</a>
                            <a href="\cscomas\Admision\EliminarPaciente.php" class="dropdown-item">Eliminar</a>
                            <a href="\cscomas\Admision\ListadoPacientes.php" class="dropdown-item">Listado Pacientes</a>
                        </div>
                    </div>
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
        <h1 class="modal-title fs-5" id="exampleModalLabel">PACIENTE</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="form-row">
                <div class="form-group col-md-12">
                <label for="">DNI:</label>
                <input type="text" class="form-control" name="txtdni" required value="<?php echo $txthc;?>" placeholder="" id="txtdni" requiere="">
                <br>
                </div>

                <div class="form-group col-md-12">
                <label for="">Nombres:</label>
                <input type="text" class="form-control" name="txtnombre" required value="<?php echo $txtnom;?>" placeholder="" id="txtnombre" requiere="">
                <br>
                </div>

                <div class="form-group col-md-12">
                <label for="">Apellidos:</label>
                <input type="text" class="form-control" name="txtapellidos" required value="<?php echo $txtape;?>" placeholder="" id="txtapellidos" requiere="">
                <br>
                </div>

                <div class="form-group col-md-12">
                <label for="">Email:</label>
                <input type="email" class="form-control" name="txtmail" required value="<?php echo $txtmail;?>" placeholder="" id="txtmail" requiere="">
                <br>
                </div>

                <div class="form-group col-md-12">
                <label for="">Direccion:</label>
                <input type="text" class="form-control" name="txtdireccion" required value="<?php echo $txtdir;?>" placeholder="" id="txtdireccion" requiere="">
                <br>
                </div>

                <div class="form-group col-md-6">
                    <label for="">Telefono Fijo:</label>
                    <input type="text" class="form-control" name="txttelefono" required value="<?php echo $txttel;?>" placeholder="" id="txttelefono" requiere="">
                    <br>
                </div>

                <div class="form-group col-md-6">
                    <label for="">Celular:</label>
                    <input type="text" class="form-control" name="txtcelular" required value="<?php echo $txtcel;?>" placeholder="" id="txtcelular" requiere="">
                    <br>
                </div>
                <div class="form-group col-md-6">
                    <label for="">Sexo:</label>
                    <input type="text" class="form-control" name="txtsexo" required value="<?php echo $txtsex;?>" placeholder="" id="txtsexo" requiere="">
                    <br>
                </div>

                <div class="form-group col-md-6">
                    <label for="">Fecha Nacimiento:</label>
                    <input type="textfn" class="form-control" name="textfn" required value="<?php echo $txtfn;?>" placeholder="" id="textfn" requiere="">
                    <br>
                </div>

        </div>
      </div>
      <div class="modal-footer">

                <button value="btnAgregar" <?php echo $accionAgregar; ?> class="btn btn-success" type="submit" name="accion" >Agregar</button>
                <button value="btnModificar" <?php echo $accionModificar; ?> class="btn btn-warning" type="submit" name="accion">Modificar</button>
                <button value="btnEliminar" <?php echo $accionEliminar; ?> class="btn btn-danger" type="submit" name="accion">Eliminar</button>
                <button value="btnCancelar" <?php echo $accionCancelar; ?> class="btn btn-primary" type="submit" name="accion">Cancelar</button>
            
      </div>
    </div>
  </div>
</div>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  AGREGAR PACIENTE +
</button>

            </form>         

        </div>


    <div class="container text-center my-1 py-1">


    <div class="row">
       <table class="table">
        <thead>
            <tr>
                <th>DNI</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Email</th>
                <th>Direccion</th>
                <th>Telefono</th>
                <th>Celular</th>
                <th>Sexo</th>
                <th>Fecha Nacimiento</th>
                <th>Estado</th>
                <th>Accion</th>
            </tr>
        </thead>
        <?php foreach($listadoPaciente as $paciente){?>
        <tr>
                <td><?php echo $paciente['hc_paciente']; ?></td>
                <td><?php echo $paciente['nom_paciente']; ?></td>
                <td><?php echo $paciente['ape_personal']; ?></td>
                <td><?php echo $paciente['mail_paciente']; ?></td>
                <td><?php echo $paciente['dir_paciente']; ?></td>
                <td><?php echo $paciente['tel_paciente']; ?></td>
                <td><?php echo $paciente['cel_paciente']; ?></td>
                <td><?php echo $paciente['sex_paciente']; ?></td>
                <td><?php echo $paciente['fn_paciente']; ?></td>
                <td><?php
                $var=$paciente['est_paciente'];
                if($var=1){
                    echo "ACTIVO";
                }else{
                    echo "INACTIVO";
                } ?></td>
                <td>
                    <form action="" method="post">   
                        <input type="hidden" name="txtdni" value="<?php echo $paciente['hc_paciente']; ?>">
                        <input type="hidden" name="txtnombre" value="<?php echo $paciente['nom_paciente']; ?>">
                        <input type="hidden" name="txtapellidos" value="<?php echo $paciente['ape_personal'];?>">
                        <input type="hidden" name="txtmail" value="<?php echo $paciente['mail_paciente']; ?>">
                        <input type="hidden" name="txtdireccion" value="<?php echo $paciente['dir_paciente']; ?>">
                        <input type="hidden" name="txttelefono" value="<?php echo $paciente['tel_paciente']; ?>">
                        <input type="hidden" name="txtcelular" value="<?php echo $paciente['cel_paciente']; ?>">
                        <input type="hidden" name="txtsexo" value="<?php echo $paciente['sex_paciente']; ?>">
                        <input type="hidden" name="textfn" value="<?php echo $paciente['fn_paciente']; ?>">

                        <input type="submit" value="Seleccionar" name="accion">
<<<<<<< HEAD
                    </form> 
                    <button value="btnEliminar" <?php echo $accionEliminar; ?> class="btn btn-danger" type="submit" name="accion">Eliminar</button></td>
=======
                        <button value="btnEliminar" <?php echo $accionEliminar; ?> class="btn btn-danger" type="submit" name="accion">Eliminar</button></td>

                    </form> 
>>>>>>> master
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