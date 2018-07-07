<!--====================================
     Designer and developers
 -Ismael López Mejía: Developer
 -Luis Alfredo Hernández: Developer
 -Carlos Eduardo Alfaro: Designer
************CopyRight 2014****************
=======================================-->
<?php
include './library/configServer.php';
include './library/consulSQL.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>fixture</title>
    <?php include './inc/link.php'; ?>
</head>
<body id="container-page-product">
    <?php include './inc/navbar.php'; ?>
    <section id="infoproduct">
        <div class="container">
            <div class="row">
                <div class="page-header">
                    <h1>Gestor de <small class="tittles-pages-logo">Ligas</small></h1>
                </div>
                <?php 
                    $CodigoProducto=$_GET['CodigoProd'];
                    $productoinfo=  ejecutarSQL::consultar("select * from torneo where id_tor='".$CodigoProducto."'");
                    $sql=ejecutarSQL::consultar("select * from equipos where id_torn='".$CodigoProducto."'");



                     
                    while($fila=mysql_fetch_array($productoinfo)){
                        if($fila['status']==1){
                            $activo="Activo";
                        }
                        echo '
                        <div class="col-md-12 col-sm-6 ">
                        <div class="col-md-9 col-sm-6">
                        <h3 class="text-center">Información del Torneo: <small class="tittles-pages-logo">'.$fila['nom_tor'].'</small> </h3>
                        </div>
                         <div class="col-md-3 col-sm-2">
                         &nbsp;&nbsp;
                        <a href="product.php" class="btn  btn-danger btn-block"><i class="fa fa-mail-reply"></i>;</a>

                         </div>
                        </div><br><br><br>
                            <div class="col-md-12 col-sm-12 bg-primary">
                                 <div class="col-md-3 col-sm-6">
                                <h4><strong>Nombre: </strong>'.$fila['nom_tor'].'</h4>
                                </div>
                                 <div class="col-md-3 col-sm-12">
                                <h4><strong>Creado en: </strong>'.$fila['f_inicio'].'</h4>
                                </div>
                                <div class="col-md-3 col-sm-12">
                                <h4>Status:&nbsp;&nbsp<span class="label label-sm label-success ">&nbsp;&nbsp'.$activo.'</span></h4>
                                 </div>
                                 <div class="col-md-3 col-sm-12">
                                 &nbsp;
                                 <button class="btn btn-success  btn-block" title="Agregar Nuevo Torneo"  data-toggle="modal" data-target="#miModal"> Agregar
                          </button>&nbsp;
                                  </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 text-center">
                                
                                <div class="col-md-12 ">
                                
                                
                            </div>
                            </div>
                            
                           
                      ';
                         
                    }?>
                    
                     <div class="col-md-12 col-sm-6">
                               <div clss="table-header bg-primary">
                     <h1> Lista de equipos </h1> 
                     </div>
        <div>
                      <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                        <thead>
                          <tr>
                            <th>Nombre</th>
                            <th>Numero Jugadores</th>
                            <th class="">Aniadido</th>                           
                            <th class="hidden-480">Status</th>
                            <th>
                            <i class="ace-icon fa fa-clock-o bigger-110 hidden-480"></i>
                              Acciones
                            </th>
                          </tr>
                        </thead>


                             <?php while($fila2=mysql_fetch_array($sql)){
                               if($fila2['status']==1){
                            $status="<span class='label label-sm label-primary ' title='Activo'>Activo</span>";
                        }else{
                           $status="<span class='label label-sm label-danger' title='Inactivo'>Inactivo</span>";
                        }
                          $jug=ejecutarSQL::consultar("select count(id_jug) from jugadores where id_equ='".$fila2['id_equ']."'");
                                while($fila3=mysql_fetch_array($jug)){
                                  $juga=$fila3['id_jug'];
                                }
                        echo '
                        <tbody>
                          <tr>

                            <td>
                              <a href="jugadores.php?id_jug='.$fila2['id_equ'].'">'.$fila2['nom_equ'].'</a>
                            </td>
                            <td>'.$juga.'</td>
                            <td class="">pendiente</td>
                            <td class="hidden-480">'.$status.'</td>

                        <td>
                            <div class="hidden-sm hidden-xs btn-group">
                              <button class="btn btn-xs btn-success">
                                <i class="ace-icon fa fa-check bigger-120"></i>
                              </button>

                              <button class="btn btn-xs btn-info">
                                <i class="ace-icon fa fa-pencil bigger-120"></i>
                              </button>

                              <button class="btn btn-xs btn-danger">
                                <i class="ace-icon fa fa-trash-o bigger-120"></i>
                              </button>

                              <button class="btn btn-xs btn-warning">
                                <i class="ace-icon fa fa-flag bigger-120"></i>
                              </button>
                            </div>

                            <div class="hidden-md hidden-lg">
                              <div class="inline pos-rel">
                                <button class="btn btn-minier btn-primary dropdown-toggle" data-toggle="dropdown" data-position="auto">
                                  <i class="ace-icon fa fa-cog icon-only bigger-110"></i>
                                </button>

                                <ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
                                  <li>
                                    <a href="#" class="tooltip-info" data-rel="tooltip" title="View">
                                      <span class="blue">
                                        <i class="ace-icon fa fa-search-plus bigger-120"></i>
                                      </span>
                                    </a>
                                  </li>

                                  <li>
                                    <a href="#" class="tooltip-success" data-rel="tooltip" title="Edit">
                                      <span class="green">
                                        <i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
                                      </span>
                                    </a>
                                  </li>

                                  <li>
                                    <a href="#" class="tooltip-error" data-rel="tooltip" title="Delete">
                                      <span class="red">
                                        <i class="ace-icon fa fa-trash-o bigger-120"></i>
                                      </span>
                                    </a>
                                  </li>
                                </ul>
                              </div>
                            </div>
                          </td>

                            ';
                    }
                   // function dias_transcurridos($fecha_i,$fecha_f)
//{
 // $dias = (strtotime($fecha_i)-strtotime($fecha_f))/86400;
  //$dias   = abs($dias); $dias = floor($dias);   
  //return $dias;
//}
// Ejemplo de uso:
//echo dias_transcurridos('2012-07-01','2012-07-18');
// Salida : 17
                    
                ?>
                            
                          </tr>

                        </tbody>
                      </table>

                    </div>
                 </div>
                            
                      
            </div>
        </div>
    </section>
 
       <section id="new-prod-index">
         <div class="container">
            <div class="page-header">
              <div class="col-md-6"><h1>AQUI PODRAS CREAR TUS TORNEOS <small>de manera Facil</small></h1></div>
                <div class="col-md-6">
                  <div class="panel-group" id="accordion">
                      <div class="panel panel-default">
                        <div class="panel-heading">
                          <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
                            Ver Calendario</a>
                          </h4>
                        </div>
                        <div id="collapse1" class="panel-collapse collapse in">
                          <div class="panel-body">
                                                                   <?php 

  function roundRobin( array $teams ){

    if (count($teams)%2 != 0){
        array_push($teams,"bye");
    }
    $away = array_splice($teams,(count($teams)/2));
    $home = $teams;
    for ($i=0; $i < count($home)+count($away)-1; $i++)
    {
        for ($j=0; $j<count($home); $j++)
        {
            $round[$i][$j]["Home"]=$home[$j];
            $round[$i][$j]["Away"]=$away[$j];
        }
        if(count($home)+count($away)-1 > 2)
        {
            $s = array_splice( $home, 1, 1 );
            $slice = array_shift( $s  );
            array_unshift($away,$slice );
            array_push( $home, array_pop($away ) );
        }
    }
    return $round;
}
$datos = array();
$sql=ejecutarSQL::consultar("select * from equipos where id_torn=1");

while ($fila = mysql_fetch_array($sql)) {

   $menber = array_push($datos,$fila['nom_equ']);

     }

// create an array of teams
$members =$datos;    
// do the rounds
$rounds = roundRobin($members);

 
  echo "
 <!--Table-->
<table class='table table-hover table-responsive-md'>

    <!--Table head-->
    <thead>
        <tr>
            
            <th class='th-lg text-center'><b>Nombre</b></th>
            <th class='th-lg text-center'><b>VS</b></th>
            <th class='th-lg text-center'><b>Nombre</b></th>

        </tr>
    </thead>
    <!--Table head-->
    
    <!--Table body-->
    <tbody>
        <tr>";
        $table ='';
        foreach($rounds as $round => $games){
  
                   $table.="  <tr class='bg-primary'>
            
            <th class='th-lg text-center'><b></b></th>
            <th class='th-lg text-center '><b>Ronda: ".($round+1)."</b></th>
            <th class='th-lg text-center'><b></b></th>

        </tr>";
    foreach($games as $play){
       $table .="<td>".$play["Home"]."</td>";
        $table .="<td class='text-center'><button class='btn btn-primary'>VS</button></td>";
        

        $table .="<td>".$play["Away"]."</td>";
        $table .="</tr>";
   }
}   
       $table .="</tbody>
    <!--Table body-->
</table>
<!--Table-->
</div>
  </div>
</div>";
echo $table;
?>
</div>
                          </div>
                        </div>
                      </div>
                </div>
            </div>
            <div class="row">
              <a href=""></a>
             
            </div>
        
    </section>
    <?php include './inc/footer.php'; ?>
</body>

</html>

<script type="text/javascript">
  
var load = new cargarContenido();

function cargarContenido()
{


  var status= document.getElementBynName("status").value;

  $.ajax({
      url:"regequ.php",
      method:"POST",
      data:{"status":status},
      success:function(data){
      alert(data);
      }
      });
}



$('#status').on('change', function()
{
  cargarContenido();
});


</script>