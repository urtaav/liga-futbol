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
    <title>Productos</title>
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
                    $id_jug=$_GET['id_jug'];
                    $info_jug=  ejecutarSQL::consultar("SELECT * FROM jugadores WHERE id_equ='".$id_jug."'");
                    $sql=ejecutarSQL::consultar("SELECT * FROM equipos where id_equ='".$id_jug."'");
                     
                    while($fila=mysql_fetch_array($sql)){
                        if($fila['status']==1){
                            $activo="Activo";
                        }elseif($fila['status']==0){
                          $activo="Inactivo";
                        }
                        echo '
                        <div class="col-md-12 col-sm-6 ">
                        <div class="col-md-9 col-sm-6">
                        <h3 class="text-center">Información del equipo: <small class="tittles-pages-logo">'.$fila['nom_equ'].'</small></h3>
                        </div>
                         <div class="col-md-3 col-sm-2">
                         &nbsp;&nbsp;
                        <a href="infoProd.php" class="btn  btn-danger btn-block"><i class="fa fa-mail-reply"></i>;</a>

                         </div>
                        </div><br><br><br>
                            <div class="col-md-12 col-sm-12 bg-primary">
                                 <div class="col-md-3 col-sm-6">
                                <h4><strong>Nombre: </strong>'.$fila['nom_equ'].'</h4>
                                </div>
                                 <div class="col-md-3 col-sm-12">
                                <h4><strong>Creado en: </strong>'.$fila['f_inicio'].'</h4>
                                </div>
                                <div class="col-md-3 col-sm-12">
                                <h4>Status:&nbsp;&nbsp<span class="label label-sm label-success ">&nbsp;&nbsp'.$activo.'</span></h4>
                                 </div>
                                 <div class="col-md-3 col-sm-12">
                                 &nbsp;&nbsp
                                 <button value="'.$fila['CodigoProd'].'" class="btn  btn-success botonCarrito btn-block"><i class="fa fa-shopping-cart"></i>&nbsp;&nbsp; Añadir</button>&nbsp;&nbsp
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
                     <h1> Lista de Jugadores </h1> 
                     </div>
        <div>
                      <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                        <thead>
                          <tr>
                            <th>Nombre</th>
                            <th>Ap.Paterno</th>
                            <th class="">Ap.Materno</th>                           
                            <th class="hidden-480">Status</th>
                            <th>
                            <i class="ace-icon fa fa-clock-o bigger-110 hidden-480"></i>
                              Acciones
                            </th>
                          </tr>
                        </thead>
                             <?php while($fila2=mysql_fetch_array($info_jug)){
                              if($fila2['status']==1){
                                $fila2['status']='Activo';
                            $status='<span class="label label-sm label-success " title="'.$fila2['status'].'">'.$fila2['status'].'</span>';
                        }elseif($fila2['status']==0){
                           $fila2['status']='Inactivo';
                            $status='<span class="label label-sm label-danger " title="'.$fila2['status'].'">'.$fila2['status'].'</span>';
                        }
                        echo '
                        <tbody>
                          <tr>

                            <td>
                              '.$fila2['nom_jug'].'
                            </td>
                            <td>'.$fila2['ap_jug'].'</td>
                            <td class="">'.$fila2['am_jug'].'</td>
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
                    
                ?>
                            
                          </tr>

                        </tbody>
                      </table>

                    </div>
                 </div>
                            
                      
            </div>
        </div>
    </section>
    <?php include './inc/footer.php'; ?>
</body>
</html>