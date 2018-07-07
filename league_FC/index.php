<!DOCTYPE html>
<html lang="es">
<head>
    <title>Inicio</title>
    <?php include './inc/link.php'; ?>
</head>
<body id="container-page-index">
    <?php include './inc/navbar.php'; ?>
    <div class="jumbotron" id="jumbotron-index">
      <h1><span class="tittles-pages-logo">Gestor de ligas</span> <small style="color: #fff;"></small></h1>
      <p>
          Bienvenido 
      </p>
    </div>
    <section id="new-prod-index">
         <div class="container">
            <div class="page-header">
              <div class="col-md-6"><h1>AQUI PODRAS CREAR TUS TORNEOS <small>de manera Facil</small></h1></div>
                
                <div class="col-md-6">
                   <button class="btn btn-white btn-success btn-block" title="Agregar Nuevo Torneo" style="height: 10em;" data-toggle="modal" data-target="#miModal"> 
                            
                            <h3>Agregar</h3>
                          
                            <P>( torneo)</P>
                          </button><br><br><br>
                </div>
            </div>
            <div class="row">
              <a href=""></a>
              <?php
                  include 'library/configServer.php';
                  include 'library/consulSQL.php';
                  $consulta= ejecutarSQL::consultar("select * from torneo where status=1");
                  $t_torneos = mysql_num_rows($consulta);
                  if($t_torneos>0){
                      while($fila=mysql_fetch_array($consulta)){
                         echo '
                        <div class="col-xs-12 col-sm-6 col-md-4">
                             <div class="thumbnail bg-dark">
                               
                               <div class="caption">
                                  <a href=""infoProd.php?CodigoProd='.$fila['id_tor'].'">'.$fila['nom_tor'].'</a>
                                 <p class="text-right">
                                     <a href="infoProd.php?CodigoProd='.$fila['id_tor'].'" class="btn btn-primary btn-sm" title="'.$fila['nom_tor'].'"><i class="fa fa-plus"></i>&nbsp; Detalles</a>&nbsp;&nbsp;
                                     
                                 </p>

                               </div>
                             </div>
                         </div>     
                         ';
                     }   
                  }else{
                      echo '<h2>No hay torneos aun</h2>';
                  }  
              ?>  
            </div>
        
    </section>
    <section id="reg-info-index">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-6 text-center">
                   <article style="margin-top:20%;">
                        <p><i class="fa fa-users fa-4x"></i></p>
                        <h3>Registrate</h3>
                        <p>Registrese y use <span class="tittles-pages-logo">Gestor de Ligas</span> para controlar  de mejor manera sus torneos.</p>
                        <p><a href="registration.php" class="btn btn-info btn-block">Registrarme</a></p>   
                   </article>
                </div>
                <div class="col-xs-12 col-sm-6">
                    <img src="assets/img/boys.png" alt="Smart-TV" class="img-responsive">
                </div>
            </div>
        </div>
    </section>
      <?php include './inc/footer.php'; ?>
</body>
<div class="modal fade" id="miModal" tabindex="-1" role="dialog" aria-labelledby="miModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-color-global">
        <h5 class="modal-title" id="exampleModalLabel" style="color: #fff;">Nuevo Torneo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="process/reg_torneo.php" role="form" method="post" data-form="save">
          <div class="form-group">
            <label for="recipient-name" class="form-control-label">Nombre</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="@ futboleros">
          </div>
          <div class="form-group">
            <label for="message-text" class="form-control-label">Fecha</label>
            <div class="input-group">
               <!-- html comment 
                 <input class='form-control' type='date'   id='fecha' name='fecha'><span class='input-group-addon'>
      <i class='fa fa-calendar bigger-110'></i>
      </span>-->
      </div>
          </div>
          <button type="subtmit" class="btn btn-primary"><i class="ace-icon fa fa-floppy-o "></i>guardar</button>
        </form>

      </div>
      <div class="modal-footer t">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="subtmit" class="btn btn-primary"><i class="ace-icon fa fa-floppy-o "></i>guardar</button>
      </div>
    </div>
  </div>
</div>
</html>