<?php
setlocale(LC_TIME, "es_ES");

$mes=date( "m");

include '../../model/conexion.php';
include '../../model/CumpleConsulta.php';
$conexion = new Conexion();
$cumpleMes=new CumpleConsulta($conexion);
$listaCumples=$cumpleMes->listaDeCumples($mes);

 ?>
<div id="contenidoAll">

  <div class="row  border-bottom white-bg dashboard-header">

      <div class="col-sm-6">
          <h2>Cumpleañeros del Mes</h2>
      </div>

  </div>
  <div class="row">
    <div class="col-lg-12" >
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="ibox-content forum-post-container">
                <div class="forum-post-info">
                  <h4><span class="text-navy"><i class="fa fa-birthday-cake"></i> Cumpleañeros </span> /<span class="text-muted">Personal</span></h4>
                </div>
                <div class="panel panel-primary">
                  <div class="panel-body table-responsive">
                    <?php foreach ($listaCumples as $listaC ):
                      $date = date_create($listaC['fechaNacimiento']);
                    ?>
                    <table class="table efec">
                      <tr>
                        <td style="width: 250px">
                          <div class="row">
                            <div class="col-xs-1 col-sm-1 col-md-4 col-lg-4"></div>
                            <div class="col-xs-11 col-sm-11 col-md-8 col-lg-8">
                              <?php if ($listaC['rutaFoto']): ?>
                                <?php
                                  list($nada,$ruta) = explode("/wamp64/www/PersonalUAB/view/", $listaC['rutaFoto']);
                                ?>
                                <center><img src="‪<?php echo "../../../".$ruta ?>" alt="persona" class="img-circle efec" height="80px" width="80px"></center>
                              <?php else: ?>
                                <center><img class="img-circle efec" src="../libs/multimedia/img/design/user-6.png" alt="persona" height="80px" width="80px"></center>
                              <?php endif; ?>
                            </div>
                          </div>
                        </td>
                        <td>
                          <div class="row">
                            <div class="col-xs-1 col-sm-1 col-md-2 col-lg-2"></div>
                            <div class="col-xs-11 col-sm-11 col-md-10 col-lg-10">
                              <strong><h2><?php echo date_format($date, 'M-d'); ?></h2></strong>
                              <h2 class="media-heading" style="color:black"><?php echo $listaC['primerNombre']." ".$listaC['apellidoPaterno']." ".$listaC['apellidoMaterno'] ?></h2>
                              <?php if ($listaC['email']): ?>
                                <h4><strong>E-mail: </strong><?php echo $listaC['email'];?></h4>
                              <?php endif; ?>
                              <h3 class="media-heading" style="color:black"><?php echo $listaC['nombreTipoPersonal'];?></h3>
                            </div>
                          </div>
                        </td>
                      </tr>
                    </table>
                  <?php endforeach; ?>
                  </div>
                </div>
            </div>
        </div>
    </div>
  </div>
</div>
