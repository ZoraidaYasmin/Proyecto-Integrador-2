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
//PACIENTES
//------------------------------------------------------------------------------------ 
   
    //AGREGAR PACIENTES
    static function agregarpaciente(){
        require_once("vista/Admision/nuevopaciente.php");
    }


    //GUARDAR PACIENTES
    static function guardarpaciente(){
        $txthc=$_REQUEST['txtdni'];
        $txtnom=$_REQUEST['txtnombre'];
        $txtape=$_REQUEST['txtapellidos'];
        $txtmail=$_REQUEST['txtmail'];
        $est=(int)"1";
        $txtdir=$_REQUEST['txtdireccion'];
        $txttel=$_REQUEST['txttelefono'];
        $txtcel=$_REQUEST['txtcelular'];
        $txtsex=$_REQUEST['txtsexo'];
        $txtfn=$_REQUEST['textfn'];

        $dato ="'".$txthc."','".$txtnom."','".$txtape."','".$txtmail."',".$est.",'".$txtdir."','".$txttel."','".$txtcel."','".$txtsex."','".$txtfn."'";
        $paciente=new Modelo();
        $data=$paciente->insertar("paciente",$dato);
        header("location:".urlsite);
    }

    //MODIFICAR PACIENTES
    static function modificarpaciente(){

        $txthc=$_REQUEST['txtdni'];
        $txtnom=$_REQUEST['txtnombre'];
        $txtape=$_REQUEST['txtapellidos'];
        $txtmail=$_REQUEST['txtmail'];
        $est=(int)"1";
        $txtdir=$_REQUEST['txtdireccion'];
        $txttel=$_REQUEST['txttelefono'];
        $txtcel=$_REQUEST['txtcelular'];
        $txtsex=$_REQUEST['txtsexo'];
        $txtfn=$_REQUEST['textfn'];

        $dato ="'".$txtnom."','".$txtape."','".$txtmail."',".$est.",'".$txtdir."','".$txttel."','".$txtcel."','".$txtsex."','".$txtfn."'";
        $dato2 ="'".$txthc."'";
        $paciente=new Modelo();
        $data=$paciente->actualizar("paciente",$dato,$dato2);
        header("location:".urlsite);
    }

        //ELIMINAR PACIENTES
    static function eliminarpaciente(){

        $txthc=$_REQUEST['txtdni'];

        $dato ="'".$txthc."'";
        $paciente=new Modelo();
        $data=$paciente->eliminar("paciente",$dato);
        header("location:".urlsite);
    }

}