<?php
session_start();
include '../library/configServer.php';
include '../library/consulSQL.php';

sleep(5);
$name= $_POST['name'];

$status=$_POST['status'];

$id_torn=$_POST['id_torn'];


if(!$name=="" ){
    $verificar=  ejecutarSQL::consultar("select * from jugadores where nom_jug='".$name."'");
    $verificaltotal = mysql_num_rows($verificar);
    if($verificaltotal<=0){
        if(consultasSQL::InsertSQL("equipos", "nom_equ,status,id_torn", "'$name','$status','$id_torn'")){
            echo '<img src="assets/img/correcto.png" class="center-all-contens"><br><p class="lead text-center">Proveedor añadido éxitosamente</p>';
        }else{
           echo '<img src="assets/img/incorrecto.png" class="center-all-contens"><br><p class="lead text-center">Ha ocurrido un error.<br>Por favor intente nuevamente</p>'; 
        }
    }else{
        echo '<img src="assets/img/incorrecto.png" class="center-all-contens"><br><p class="lead text-center">El nombre  que ha ingresado ya existe.<br>Por favor ingrese otro nombre</p>';
    }
}else {
    echo '<img src="assets/img/incorrecto.png" class="center-all-contens"><br><p class="lead text-center">Error los campos no deben de estar vacíos</p>';
}
