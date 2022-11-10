<?php
require_once("modelo/index.php");

class modelocontroller{
    private $model;

    public function __construct(){
        $this->model=new Modelo();
    }

    //

    static function index(){

        require_once("vista/Admision/index.php");
    }
    

//------------------------------------------------------------------------------------
//USUARIO
//------------------------------------------------------------------------------------    
static function agregarusuario(){
    require_once("vista/Admision/nuevopaciente.php");
}

//GUARDAR USUARIO
static function guardarusuario(){

    $txtid=$_REQUEST['txtid'];
    $txtper=$_REQUEST['txtper'];
    $txtrol=$_REQUEST['txtrol'];
    $txtmail=$_REQUEST['txtmail'];
    $txtpass=$_REQUEST['txtpass'];
    $txtdes=$_REQUEST['txtdes'];
    $txtest=(int)"1";

    $dato ="'".$txtid."',".$txtper.",".$txtrol.",'".$txtmail."','".md5($txtpass)."','".$txtdes."',".$txtest."";
    $usuario=new Modelo();
    $data=$usuario->insertar("usuario",$dato);
    header("location:".urlsite);
}

//MODIFICAR USUARIO
static function modificarusuario(){

    $txtid=$_REQUEST['txtid'];
    $txtper=$_REQUEST['txtper'];
    $txtrol=$_REQUEST['txtrol'];
    $txtmail=$_REQUEST['txtmail'];
    $txtpass=$_REQUEST['txtpass'];
    $txtdes=$_REQUEST['txtdes'];
    $txtest=$_REQUEST['txtest'];

    $dato ="".$txtper.",".$txtrol.",'".$txtmail."','".md5($txtpass)."','".$txtdes."',".$txtest."";
    $usuario=new Modelo();
    $data=$usuario->actualizar("usuario",$dato,$txtid);
    header("location:".urlsite);

}

    //ELIMINAR USUARIO
static function eliminarusuario(){

    $txtid=$_REQUEST['txtid'];

    $dato ="'".$txtid."'";
    $usuario=new Modelo();
    $data=$usuario->eliminar("usuario",$dato);
    header("location:".urlsite);
}



}