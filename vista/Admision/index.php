<?php
require_once("layouts/header.php");
include("vista/Logica/action_page.php");



$sentencia=$pdo->prepare("select * from paciente");
$sentencia->execute();
$listadoPaciente=$sentencia->fetchAll(PDO::FETCH_ASSOC);

?>

<div class="container text-center my-1 py-1">

        <a href="index.php?opcion=agregarpaciente" class="btn btn-primary"> AGREGAR PACIENTE + </a>
</div>


    <div class="container text-center my-1 py-1">


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
        <?php foreach($listadoPaciente as $paciente){?>
        <tr>
                <td><?php echo $paciente['hc_paciente']; ?></td>
                <td><?php echo $paciente['nom_paciente']; ?></td>
                <td><?php echo $paciente['ape_personal']; ?></td>

                <td><?php echo $paciente['dir_paciente']; ?></td>

                <td><?php echo $paciente['fn_paciente']; ?></td>
                <td><?php
                $var=$paciente['est_paciente'];
                if($var=1){
                    echo "ACTIVO";
                }else{
                    echo "INACTIVO";
                } ?></td>
                <td>
                    <form action="" method="post" name=form2>   
                        <input type="hidden" name="txtdni" value="<?php echo $paciente['hc_paciente']; ?>">
                        <input type="hidden" name="txtnombre" value="<?php echo $paciente['nom_paciente']; ?>">
                        <input type="hidden" name="txtapellidos" value="<?php echo $paciente['ape_personal'];?>">
                        <input type="hidden" name="txtmail" value="<?php echo $paciente['mail_paciente']; ?>">
                        <input type="hidden" name="txtdireccion" value="<?php echo $paciente['dir_paciente']; ?>">
                        <input type="hidden" name="txttelefono" value="<?php echo $paciente['tel_paciente']; ?>">
                        <input type="hidden" name="txtcelular" value="<?php echo $paciente['cel_paciente']; ?>">
                        <input type="hidden" name="txtsexo" value="<?php echo $paciente['sex_paciente']; ?>">
                        <input type="hidden" name="textfn" value="<?php echo $paciente['fn_paciente']; ?>">

                        <button  value="btnModificar"type="submit" class="btn btn-warning" name="accion" >Modificar</button>
                        <button value="btnEliminar" class="btn btn-danger" type="submit" name="accion">Eliminar</button></td>

                    </form> 
            </tr>
        <?php } ?>    
       </table>
    </div>

    </div>
<?php
require_once("layouts/footer.php");
?>