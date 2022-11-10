<?php
include("../Logica/action_page.php");
include("../Logica/conexion.php");

session_start();
$usuario= $_SESSION['usuario'];
if(!isset($usuario)){
    header("location: \cscomas\index.php");
}

$accion=(isset($_POST['accion']))?$_POST['accion']:"";

switch($accion){
    case "btnVer":
        $txthc=(isset($_POST['busqueda']))?$_POST['busqueda']:"";
        $consulta=$pdo->prepare("SELECT e.des_especialidad,pa.hc_paciente,pa.nom_paciente,pa.ape_personal,pa.dir_paciente,pa.fn_paciente,pa.est_paciente, c.id_cita,h.fec_horario,h.hor_horario,p.nom_personal,c.consultorio,t.peso,t.temperatura,t.presion FROM triaje t,citas c,horario h,doctor d, personal p,paciente pa,especialidad e WHERE c.id_cita=t.id_cita AND c.id_horario=h.id_horario AND pa.hc_paciente=c.hc_paciente AND e.id_especialidad=h.id_especialidad AND d.id_doctor=h.id_doctor AND d.id_personal=p.id_personal and c.hc_paciente like'$txthc%'");
        $consulta->execute();
        $listadoPaciente=$consulta->fetchAll(PDO::FETCH_ASSOC); 

        $sentencia2="SELECT e.des_especialidad,pa.hc_paciente,pa.nom_paciente,pa.ape_personal,pa.dir_paciente,pa.fn_paciente,pa.est_paciente, c.id_cita,h.fec_horario,h.hor_horario,p.nom_personal,c.consultorio,t.peso,t.temperatura,t.presion FROM triaje t,citas c,horario h,doctor d, personal p,paciente pa,especialidad e WHERE c.id_cita=t.id_cita AND c.id_horario=h.id_horario AND pa.hc_paciente=c.hc_paciente AND e.id_especialidad=h.id_especialidad AND d.id_doctor=h.id_doctor AND d.id_personal=p.id_personal and c.hc_paciente like'$txthc%'";
        $consulta2=mysqli_query($conexion,$sentencia2);
        $fila=mysqli_fetch_row($consulta2);
    break;

    case "btnModificar":
        $txthc=(isset($_POST['busqueda']))?$_POST['busqueda']:"";
        //window.location.replace("../Admision/VistaReporte.php?id=$txthc");
        header("location: ../Admision/VistaReporte.php?id=$txthc");
    
    break;
}   
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Centro Salud Comas</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

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
                    <a href="\cscomas\Admision\MenuAdmision.php" class="nav-item nav-link ">Principal</a>
                    <a href="\cscomas\Admision\ReportePaciente.php" class="nav-item nav-link active">Reporte</a>
                    <a href="\cscomas\Admision\ReportePaciente.php" class="nav-item nav-link">Citas</a>
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
                <h1 class="text-white mt-4 mb-4">Busca un paciente</h1>
                    <div class="input-group">
                        <input type="text" class="form-control border-light" name="busqueda" style="padding: 30px 25px;" placeholder="Ingrese Pacientes"> 
                        <div class="input-group-append">
                            <button name="accion" value="btnVer" class="btn btn-secondary px-4 px-lg-5">Buscar</button>
                        </div>
                    </div>

                    <p></p>
        
        <?php if(isset($_POST['accion'])){?>

        <div class="row">
            <table class="table table-striped" style="white-space: nowrap; overflow-x: auto;">
                <thead class="table-success table-striped">
                    <tr>
                        <th>DNI</th>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Direccion</th>
                        <th>Fecha Nacimiento</th>
                        <th>Estado</th>
                        <th>Accion</th>
                    </tr>
                </thead>
                
                <tr>
                <?php 
                $vari=$fila[1];
                if($vari==""){
                    $hc="NO EXISTE";
                    $nom="NO EXISTE";
                    $ape="NO EXISTE";
                    $dir="NO EXISTE";
                    $fn="NO EXISTE";
                    $act=0;

                    }else{
                        $hc=$fila[1];
                        $nom=$fila[2];
                        $ape=$fila[3];
                        $dir=$fila[4];
                        $fn=$fila[5];
                        $act=$fila[6];

                    }
                ?>




                        <td><?php echo $hc; ?></td>
                        <td><?php echo $nom; ?></td>
                        <td><?php echo $ape; ?></td>

                        <td><?php echo $dir; ?></td>

                        <td><?php echo $fn; ?></td>
                        <td><?php
                        //$var=$act;
                        if($act=1){
                            echo "ACTIVO";
                        }else{
                            echo "INACTIVO";
                        } ?></td>
                                <td>

                                <a class="btn btn-success" href="../Admision/VistaReporte.php?id="$fila[1]  target="_blank" rel="noopener noreferrer">Imprimir Lista</a>  
                                
                        </tr>
            </table>
        </div>








    <div class="row">
       <table class="table table-striped" style="white-space: nowrap; overflow-x: auto;">
        <thead class="table-success table-striped">
            <tr>
                <th>ESPECIALIDAD</th>
                <th>FECHA</th>
                <th>HORA</th>
                <th>DOCTOR</th>
                <th>CONSULTORIO</th>
                <th>PESO</th>
                <th>TEMPERATURA</th>
                <th>PRESION</th>
            </tr>
        </thead>
        <?php foreach($listadoPaciente as $paciente){?>
        <tr>
        
                <td><?php echo $paciente['des_especialidad']; ?></td>
                <td><?php echo $paciente['fec_horario']; ?></td>
                <td><?php echo $paciente['hor_horario']; ?></td>
                <td><?php echo $paciente['nom_personal']; ?></td>
                <td><?php echo $paciente['consultorio']; ?></td>
                <td><?php echo $paciente['peso']; ?></td>
                <td><?php echo $paciente['temperatura']; ?></td>
                <td><?php echo $paciente['presion']; ?></td>
                

            </tr>

            <?php } 
        } 
    ?>  
       </table>
    </div>
    

        </form>
    </div>

    </div>


    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary rounded-0 btn-lg-square back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
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