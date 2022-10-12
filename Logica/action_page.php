<?php
$servidor="mysql:dbname=cscomasdb;host=127.0.0.1";
$usuario="top_admin";
$password="12345678";
try{

    $pdo=new PDO($servidor,$usuario,$password,array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8"));

}catch(PDOException $e){

    echo "Conexion Fall:()".$e->getMessage();
}

?>