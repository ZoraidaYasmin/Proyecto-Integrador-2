<?php

class Usuario{

    private $Modelo;
    private $db;
    private $listado;
    private $consulta1 = "select * FROM usuario";
    public function __construct(){
        $this->Modelo=array();
        $this->db=new PDO('mysql:host=localhost;dbname=cscomasdb','top_admin','12345678');
    }
    

    public function insertar($tabla,$data){

        $consul="INSERT INTO ".$tabla." VALUES (".$data.")";
        $result=$this->db->query($consul);
        if($result){
            return true;
        }else{
            return false;
        }
        return $tabla;
    }

    public function listar($tabla){

        $consulta="SELECT * FROM ".$tabla." limit 50;";
        $resu=$this->db->query($consulta);
        while($filas=$resu->FETCHALL(PDO::FETCH_ASSOC)){
            $listado1[]=$filas;
        }
        return $tabla;
    }

    public function buscar($tabla,$condicion){

        $consulta="SELECT * FROM ".$tabla." where id_usuario=".$condicion.";";
        $resu=$this->db->query($consulta);
        while($filas=$resu->FETCHALL(PDO::FETCH_ASSOC)){
            $this->listado[]=$filas;
        }
        return $tabla;
    }

    public function actualizar($tabla,$data,$condicion){
        $consult="UPDATE ".$tabla." set ".$data." where id_usuario=".$condicion.";";
        $resultad=$this->db->query($consult);
        if($resultad){
            return true;
        }else{
            return false;
        }
        return $tabla;
    }

    public function eliminar($tabla,$condicion){

        $consulta="DELETE FROM ".$tabla." WHERE id_usuario=".$condicion.";";
        $resulta=$this->db->query($consulta);
        if($resulta){
            return true;
        }else{
            return false;
        }
        return $tabla;
    }
}