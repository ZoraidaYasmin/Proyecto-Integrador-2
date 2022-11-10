<?php
require_once("layouts/header.php");
?>

<div class="container text-center my-1 py-1">


<form action="" method="get">

            <div class="form-row">
                        <div class="form-group col-md-12">
                        <label for="">DNI:</label>
                        <input type="text" class="form-control" name="txtdni" placeholder="" id="txtdni" requiere="">
                        <br>
                        </div>

                        <div class="form-group col-md-12">
                        <label for="">Nombres:</label>
                        <input type="text" class="form-control" name="txtnombre" placeholder="" id="txtnombre" requiere="">
                        <br>
                        </div>

                        <div class="form-group col-md-12">
                        <label for="">Apellidos:</label>
                        <input type="text" class="form-control" name="txtapellidos" placeholder="" id="txtapellidos" requiere="">
                        <br>
                        </div>

                        <div class="form-group col-md-12">
                        <label for="">Email:</label>
                        <input type="email" class="form-control" name="txtmail"  placeholder="" id="txtmail" requiere="">
                        <br>
                        </div>

                        <div class="form-group col-md-12">
                        <label for="">Direccion:</label>
                        <input type="text" class="form-control" name="txtdireccion"  placeholder="" id="txtdireccion" requiere="">
                        <br>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="">Telefono Fijo:</label>
                            <input type="text" class="form-control" name="txttelefono"  placeholder="" id="txttelefono" requiere="">
                            <br>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="">Celular:</label>
                            <input type="text" class="form-control" name="txtcelular"  placeholder="" id="txtcelular" requiere="">
                            <br>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Sexo:</label>
                            <input type="text" class="form-control" name="txtsexo"  placeholder="" id="txtsexo" requiere="">
                            <br>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="">Fecha Nacimiento:</label>
                            <input type="textfn" class="form-control" name="textfn"  placeholder="" id="textfn" requiere="">
                            <br>
                        </div>

                        <input type="submit" name="btn" class="btn btn-primary">
	                    <input type="hidden" name="m" value="guardarpaciente">

        </div>
</form>         

       
<?php
require_once("layouts/footer.php");
?>