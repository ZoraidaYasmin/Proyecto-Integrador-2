<?php
require_once("layouts/header.php");
?>
  <div class="page-hero bg-image overlay-secondary" style="background-image: url(assets/img/fondo-2-01.webp);">
    <div class="hero-section">
      <div class="container text-center wow zoomIn">
        <span class="subhead" style="color: #3a3a3a ;">TU SALUD EN LA MEJORES MANOS</span>
        <h1 class="display-3" style="color: #3a3a3a ;">Centro de Salud Comunitario - Comas</h1>
        <div class="row">

        <img src="images\Logo_Essalud_Pediatrico2.jpeg">

        <div class="well col-md-5 center login-box">

        
            <div class="alert alert-info">
                POR FAVOR INGRESE SU USUARIO Y CONTRASEÑA.
            </div>
            

            <form class="form-horizontal" action="vista/Logica/loguear.php" method="post">
            
                <fieldset>
                    <div class="input-group input-group-lg">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user red"></i></span>
                        <input name="correo" type="text" class="form-control" placeholder="Usuario">
                    </div>
                    <div class="clearfix"></div><br>

                    <div class="input-group input-group-lg">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock red"></i></span>
                        <input name="contraseña" type="password" class="form-control" placeholder="Contraseña">
                    </div>
                    <div class="clearfix"></div>
                    <p >
                    </p>
                    <p >
                    </p>
                    <p class="center col-md-5">
                        <button type="submit" class="btn btn-primary">Ingresar</button>
                    </p>
                </fieldset>
            </form>
        </div>    
        
        
        
      </div>

    </div>
  </div>

<?php
require_once("layouts/footer.php");
?>