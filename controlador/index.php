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
}
