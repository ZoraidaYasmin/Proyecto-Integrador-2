<?php 

require_once("config.php");
require_once("controlador/index.php");
if(isset($_GET['']))
modelocontroller::index();

if(isset($_GET['opcion'])):
    if(method_exists("modeloController",$_GET['opcion'])):
        modeloController::{$_GET['opcion']}();
    endif;
else:
    modeloController::index();
endif;