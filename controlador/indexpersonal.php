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
//EMPLEADOS
//------------------------------------------------------------------------------------    
static function agregarpersonal(){
    require_once("vista/Admision/nuevopaciente.php");
}

//GUARDAR PERSONAL
static function guardarpersonal(){

    $txtdni=$_REQUEST['txtdni'];
    $txtnom=$_REQUEST['txtnombres'];
    $txtmail=$_REQUEST['txtmail'];
    $txtlocal=$_REQUEST['txtlocal'];
    $est=(int)"1";
    $txtdir=$_REQUEST['txtdireccion'];
    $txttel=$_REQUEST['txttelefono'];
    $txtcel=$_REQUEST['txtcelular'];
    $txtsex=$_REQUEST['txtsexo'];
    $txtfn=$_REQUEST['textfn'];
    $txtfi=$_REQUEST['textfi'];
    $dato ="'".$txtdni."','".$txtnom."','".$txtmail."',".$txtlocal."',".$est.",'".$txtdir."','".$txttel."','".$txtcel."','".$txtsex."','".$txtfn."','".$txtfi."'";
    $personal=new Modelo();
    $data=$personal->insertar("personal",$dato);
    header("location:".urlsite);
}

//MODIFICAR PERSONAL
static function modificarpersonal(){

    $txtid=$_REQUEST['txtid'];
    $txtdni=$_REQUEST['txtdni'];
    $txtnom=$_REQUEST['txtnombres'];
    $txtmail=$_REQUEST['txtmail'];
    $txtlocal=$_REQUEST['txtlocal'];
    $est=(int)"1";
    $txtdir=$_REQUEST['txtdireccion'];
    $txttel=$_REQUEST['txttelefono'];
    $txtcel=$_REQUEST['txtcelular'];
    $txtsex=$_REQUEST['txtsexo'];
    $txtfn=$_REQUEST['textfn'];
    $txtfi=$_REQUEST['textfi'];
    $dato ="'".$txtdni."','".$txtnom."','".$txtmail."',".$txtlocal."',".$est.",'".$txtdir."','".$txttel."','".$txtcel."','".$txtsex."','".$txtfn."','".$txtfi."'";
    $dato2=$txtid;
    $personal=new Modelo();
    $data=$personal->actualizar("personal",$dato,$dato2);
    header("location:".urlsite);
}

    //ELIMINAR PERSONAL
static function eliminarempleado(){

    $txthc=$_REQUEST['txtdni'];

    $dato ="'".$txtid."'";
    $personal=new Modelo();
    $data=$personal->eliminar("personal",$dato);
    header("location:".urlsite);
}



}