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

$accion=(isset($_POST['accion']))?$_POST['accion']:"";

<<<<<<< HEAD

switch($accion){
    case "btnAgregar":
        $est=(int)"1";
        $sentencia2="SELECT COUNT(*) FROM personal";
        $consulta2=mysqli_query($conexion,$sentencia2);
        $fila=mysqli_fetch_row($consulta2);
        $id=(int)$fila[0];
        $id=$id+1;

        $sentencia=$pdo->prepare("INSERT INTO personal(id_personal,dni_personal,nom_personal,mail_personal,loc_personal,est_personal,dir_personal,tel_casa,cel_personal,sex_personal,fn_personal,fi_personal) 
        VALUES (:id_personal,:dni_personal,:nom_personal,:mail_personal,:loc_personal,:est_personal,:dir_personal,:tel_casa,:cel_personal,:sex_personal,:fn_personal,:fi_personal)");
        $sentencia->bindParam(':id_personal',$id);
        $sentencia->bindParam(':dni_personal',$txtdni);
        $sentencia->bindParam(':nom_personal',$txtnombres);
        $sentencia->bindParam(':mail_personal',$txtmail);
        $sentencia->bindParam(':loc_personal',$txtlocal);
        $sentencia->bindParam(':est_personal',$txtestado);
        $sentencia->bindParam(':dir_personal',$txtdireccion);
        $sentencia->bindParam(':tel_casa',$txttelefono);
        $sentencia->bindParam(':cel_personal',$txtcelular);
        $sentencia->bindParam(':sex_personal',$txtsexo);
        $sentencia->bindParam(':fn_personal',$txtfn);
        $sentencia->bindParam(':fi_personal',$txtfi);
        $sentencia->execute();


=======
$accionAgregar="";
$accionCancelar="";
$mostrarModal=false;
switch($accion){
    case "btnAgregar":
        $est=(int)"1";
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

        $txthc="";
        $txtnom="";
        $txtape="";
        $txtmail="";
        $txtdir="";
        $txttel="";
        $txtcel="";
        $txtsex="";
        $txtfn="";
>>>>>>> master
        echo'<script type="text/javascript"> alert("Tarea Guardada");</script>';

    break;
    case "btnModificar":
<<<<<<< HEAD

        header("location: ../Administracion/ModificarEmpleado.php?id=$txtid");
=======
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
>>>>>>> master
    
    break;

    case "btnEliminar":
<<<<<<< HEAD
        $sentencia=$pdo->prepare(" DELETE FROM personal WHERE id_personal=:id_personal");
        $sentencia->bindParam(':id_personal',$txtid);
=======
        $sentencia=$pdo->prepare(" DELETE FROM paciente WHERE hc_paciente=:hc_paciente");
        $sentencia->bindParam(':hc_paciente',$txthc);
>>>>>>> master
        
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

        header("location: ../Admision/MenuAdmision.php");
    break;

    case "btnCancelar":
        header("location: ../Admision/MenuAdmision.php");
    break;

}


$sentencia=$pdo->prepare("select * from personal");
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
<<<<<<< HEAD
                    <a href="\cscomas\Administracion\MenuAdmin.php" class="nav-item nav-link active">Principal</a>
                    <a href="\cscomas\Administracion\ReportePersonal.php" class="nav-item nav-link">Reporte</a>
                    <a href="\cscomas\Administracion\ReportePaciente.php" class="nav-item nav-link">Pacientes</a>
                    <a href="\cscomas\Administracion\ReporteMedicos.php" class="nav-item nav-link">Medicos</a>
=======
                    <a href="\cscomas\Admision\MenuAdmision.php" class="nav-item nav-link active">Principal</a>
                    <a href="\cscomas\Admision\ReportePaciente.php" class="nav-item nav-link">Reporte</a>
                    <a href="\cscomas\Admision\ReportePaciente.php" class="nav-item nav-link">Pacientes</a>
                    <a href="\cscomas\Admision\ReportePaciente.php" class="nav-item nav-link">Medicos</a>
>>>>>>> master
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


<<<<<<< HEAD
<form action="" method="post">
=======
<form action="" method="post" name=form1>
>>>>>>> master


        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
<<<<<<< HEAD
                <h1 class="modal-title fs-5" id="exampleModalLabel">AGREGAR PERSONAL</h1>
=======
                <h1 class="modal-title fs-5" id="exampleModalLabel">PACIENTE</h1>
>>>>>>> master
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <div class="form-row">
                        <div class="form-group col-md-12">
                        <label for="">ID:</label>
<<<<<<< HEAD
                        <input type="text" class="form-control" name="txtid" required value="<?php echo $txtid;?>" placeholder="" id="txtid" requiere="">
                        <br>
                        </div>
                        <div class="form-group col-md-12">
                        <label for="">DNI:</label>
                        <input type="text" class="form-control" name="txtdni" required value="<?php echo $txtdni;?>" placeholder="" id="txtdni" requiere="">
=======
                        <input type="text" class="form-control" name="txtid" required value="<?php echo $txthc;?>" placeholder="" id="txtid" requiere="">
                        <br>
                        </div>

                        <div class="form-group col-md-12">
                        <label for="">DNI:</label>
                        <input type="text" class="form-control" name="txtdni" required value="<?php echo $txthc;?>" placeholder="" id="txtdni" requiere="">
>>>>>>> master
                        <br>
                        </div>

                        <div class="form-group col-md-12">
                        <label for="">Trabajados:</label>
<<<<<<< HEAD
                        <input type="text" class="form-control" name="txtnombres" required value="<?php echo $txtnombres;?>" placeholder="" id="txtnombres" requiere="">
=======
                        <input type="text" class="form-control" name="txtnombres" required value="<?php echo $txtnom;?>" placeholder="" id="txtnombres" requiere="">
>>>>>>> master
                        <br>
                        </div>

                        <div class="form-group col-md-12">
                        <label for="">Email:</label>
<<<<<<< HEAD
                        <input type="email" class="form-control" name="txtmail" required value="<?php echo $txtmail;?>" placeholder="" id="txtmail" requiere="">
=======
                        <input type="text" class="form-control" name="txtmail" required value="<?php echo $txtape;?>" placeholder="" id="txtmail" requiere="">
>>>>>>> master
                        <br>
                        </div>

                        <div class="form-group col-md-12">
                        <label for="">Local:</label>
<<<<<<< HEAD
                        <input type="text" class="form-control" name="txtlocal" required value="<?php echo $txtlocal;?>" placeholder="" id="txtlocal" requiere="">
=======
                        <input type="email" class="form-control" name="txtlocal" required value="<?php echo $txtmail;?>" placeholder="" id="txtlocal" requiere="">
>>>>>>> master
                        <br>
                        </div>

                        <div class="form-group col-md-12">
                        <label for="">Estado:</label>
<<<<<<< HEAD
                        <input type="text" class="form-control" name="txtestado" required value="<?php echo $txtestado;?>" placeholder="" id="txtestado" requiere="">
=======
                        <input type="text" class="form-control" name="txtestado" required value="<?php echo $txtdir;?>" placeholder="" id="txtestado" requiere="">
>>>>>>> master
                        <br>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="">Direccion:</label>
<<<<<<< HEAD
                            <input type="text" class="form-control" name="txtdireccion" required value="<?php echo $txtdireccion;?>" placeholder="" id="txtdireccion" requiere="">
=======
                            <input type="text" class="form-control" name="txtdireccion" required value="<?php echo $txttel;?>" placeholder="" id="txtdireccion" requiere="">
>>>>>>> master
                            <br>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="">Telefono:</label>
<<<<<<< HEAD
                            <input type="text" class="form-control" name="txttelefono" required value="<?php echo $txttelefono;?>" placeholder="" id="txttelefono" requiere="">
=======
                            <input type="text" class="form-control" name="txttelefono" required value="<?php echo $txtcel;?>" placeholder="" id="txttelefono" requiere="">
>>>>>>> master
                            <br>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="">Celular:</label>
<<<<<<< HEAD
                            <input type="text" class="form-control" name="txtcelular" required value="<?php echo $txtcelular;?>" placeholder="" id="txtcelular" requiere="">
=======
                            <input type="text" class="form-control" name="txtcelular" required value="<?php echo $txtcel;?>" placeholder="" id="txtcelular" requiere="">
>>>>>>> master
                            <br>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="">Sexo:</label>
<<<<<<< HEAD
                            <input type="text" class="form-control" name="txtsexo" required value="<?php echo $txtsexo;?>" placeholder="" id="txtsexo" requiere="">
=======
                            <input type="text" class="form-control" name="txtsexo" required value="<?php echo $txtsex;?>" placeholder="" id="txtsexo" requiere="">
>>>>>>> master
                            <br>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="">Fecha Nacimiento:</label>
<<<<<<< HEAD
                            <input type="text" class="form-control" name="textfn" required value="<?php echo $textfn;?>" placeholder="" id="textfn" requiere="">
=======
                            <input type="textfn" class="form-control" name="textfn" required value="<?php echo $txtfn;?>" placeholder="" id="textfn" requiere="">
>>>>>>> master
                            <br>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="">Fecha Ingreso:</label>
<<<<<<< HEAD
                            <input type="text" class="form-control" name="textfi" required value="<?php echo $textfi;?>" placeholder="" id="textfi" requiere="">
=======
                            <input type="textfn" class="form-control" name="textfi" required value="<?php echo $txtfn;?>" placeholder="" id="textfi" requiere="">
>>>>>>> master
                            <br>
                        </div>

                </div>
            </div>
            <div class="modal-footer">

<<<<<<< HEAD
                        <button value="btnAgregar" class="btn btn-success" type="submit" name="accion" >Agregar</button>
                        <button value="btnCancelar"  class="btn btn-primary" type="submit" name="accion">Cancelar</button>
=======
                        <button value="btnAgregar" <?php echo $accionAgregar; ?> class="btn btn-success" type="submit" name="accion" >Agregar</button>
                        <button value="btnCancelar" <?php echo $accionCancelar; ?> class="btn btn-primary" type="submit" name="accion">Cancelar</button>
>>>>>>> master
                    
            </div>
            </div>
        </div>
        </div>
<<<<<<< HEAD
        <!-- Button trigger modal echo $accionCancelar;-->
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        AGREGAR PERSONAL +
        </button>
=======
        <!-- Button trigger modal -->
        <!-- Button trigger modal 
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        AGREGAR PACIENTE +
        </button>-->
>>>>>>> master
</form>         

        </div>


    <div class="container text-center my-1 py-1">

    <h1>LISTADO DE PERSONAL</h1>

    <div class="row">
       <table class="table table-striped" style="white-space: nowrap; overflow-x: auto;">
        <thead class="table-success table-striped">
            <tr>
                <th>DNI</th>
                <th>Nombres Y Apellidos</th>
                <th>direccion</th>
                <th>Celular</th>
                <th>Fecha Ingreso</th>
                <th>Estado</th>
                <th>Accion</th>
            </tr>
        </thead>
        <?php foreach($listadoPaciente as $paciente){?>
        <tr>
                <td><?php echo $paciente['dni_personal']; ?></td>
                <td><?php echo $paciente['nom_personal']; ?></td>
                <td><?php echo $paciente['dir_personal']; ?></td>
                <td><?php echo $paciente['cel_personal']; ?></td>
                <td><?php echo $paciente['fi_personal']; ?></td>
                <td><?php
                $var=$paciente['est_personal'];
                if($var=1){
                    echo "ACTIVO";
                }else{
                    echo "INACTIVO";
                } ?></td>
                <td>
<<<<<<< HEAD
                    <form action="" method="post">  

                        <input type="hidden" name="txtid" value="<?php echo $paciente['id_personal'];?>">

                        
                        <button value="btnModificar" type="submit" class="btn btn-warning" name="accion" >Modificar</button>
                        <button value="btnEliminar" class="btn btn-danger" type="submit" name="accion">Eliminar</button></td>
=======
                    <form action="" method="post" name=form2>   
                       <!-- <input type="hidden" name="txtdni" value="<?php echo $paciente['hc_paciente']; ?>">
                        <input type="hidden" name="txtnombre" value="<?php echo $paciente['nom_paciente']; ?>">
                        <input type="hidden" name="txtapellidos" value="<?php echo $paciente['ape_personal'];?>">
                        <input type="hidden" name="txtmail" value="<?php echo $paciente['mail_paciente']; ?>">
                        <input type="hidden" name="txtdireccion" value="<?php echo $paciente['dir_paciente']; ?>">
                        <input type="hidden" name="txttelefono" value="<?php echo $paciente['tel_paciente']; ?>">
                        <input type="hidden" name="txtcelular" value="<?php echo $paciente['cel_paciente']; ?>">
                        <input type="hidden" name="txtsexo" value="<?php echo $paciente['sex_paciente']; ?>">
                        <input type="hidden" name="textfn" value="<?php echo $paciente['fn_paciente']; ?>">

                                                     Modal -->
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

                        <button value="btnModificar" <?php echo $accionModificar; ?> class="btn btn-warning" type="submit" name="accion" >Modificar</button>
                        <button value="btnCancelar" <?php echo $accionCancelar; ?> class="btn btn-primary" type="submit" name="accion">Cancelar</button>
                    
            </div>
            </div>
        </div>
        </div>



                        <button type="submit"  type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal" >Modificar</button>
                        <button value="btnEliminar" class="btn btn-danger" type="submit" name="accion">Eliminar</button></td>

>>>>>>> master
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
