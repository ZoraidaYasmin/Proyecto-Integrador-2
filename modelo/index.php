<?php
class Modelo{
    private $Modelo;
    private $db;
    private $listado;

    public function __construct(){
        $this->Modelo=array();
        $this->db=new PDO('mysql:host=localhost;dbname=cscomasdb',"top_admin","12345678");
    }

    public function insertar($tabla,$data){

        $consul="INSERT INTO ".$tabla." VALUES (".$data.")";
        $result=$this->db->query($consul);
        if($result){
            return true;
        }else{
            return false;
        }
    }

    public function listar($tabla){

        $consulta="SELECT * FROM ".$tabla."limit 50;";
        $resu=$this->db->query($consulta);
        while($filas=$resu->FETCHALL(PDO::FETCH_ASSOC)){
            $this->listado[]=$filas;
        }
        return $this->listado;
        
    }

    public function buscar($tabla,$condicion){

        $consulta="SELECT * FROM ".$tabla." where ".$condicion.";";
        $resu=$this->db->query($consulta);
        while($filas=$resu->FETCHALL(PDO::FETCH_ASSOC)){
            $this->listado[]=$filas;
        }
        return $this->listado;
        
    }

    public function actualizar($tabla,$data,$condicion){
        $consult="UPDATE ".$tabla." set ".$data." where ".$condicion;
        $resultad=$this->db->query($consult);
        if($resultad){
            return true;
        }else{
            return false;
        }
    }

    public function eliminar($tabla,$condicion){

        $consulta="delete from ".$tabla." WHERE ".$condicion;
        $resulta=$this->db->query($consulta);
        if($resulta){
            return true;
        }else{
            return false;
        }
        
    }
}