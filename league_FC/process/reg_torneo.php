<?php
include '../library/configServer.php';
include '../library/consulSQL.php';

sleep(3);
$name= $_POST['name'];
$hoy = date("Y-m-d");  
$fecha= $hoy;
$status= 1;

function dias_transcurridos($fecha_i,$fecha_f)
{
    $dias   = (strtotime($fecha_i)-strtotime($fecha_f))/86400;
    $dias   = abs($dias); $dias = floor($dias);     
    return $dias;
}
// Ejemplo de uso:
echo dias_transcurridos('2012-07-01','2012-07-18');
// Salida : 17

if(!$name=="" && !$fecha==""){
$verificar=  ejecutarSQL::consultar("select * from torneo where nom_tor='".$name."'");
    $verificaltotal = mysql_num_rows($verificar);
    if($verificaltotal<=0){
        if(consultasSQL::InsertSQL("torneo", "nom_tor, f_inicio, status",
                                            "'$name','$fecha','$status'")){
           
            header("Location:../index.php");
             echo '<img src="assets/img/ok.png" class="center-all-contens"><br><p class="lead text-center">torneo añadido éxitosamente</p>';
        }else{
           echo '<img src="assets/img/incorrecto.png" class="center-all-contens"><br><p class="lead text-center">Ha ocurrido un error.<br>Por favor intente nuevamente</p>'; 
            header("Location:../index.php");
        }
    }else{
        echo '<img src="assets/img/incorrecto.png" class="center-all-contens"><br><p class="lead text-center">El nombre del torneo que ha ingresado ya existe.<br>Por favor ingrese otro nombre </p>';
        header("Location:../index.php");
    }
}else {
    echo '<img src="assets/img/incorrecto.png" class="center-all-contens"><br><p class="lead text-center">Error los campos no deben de estar vacíos</p>';
       header("Location:../index.php");
}


