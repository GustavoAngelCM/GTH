<?php
$fecha=date( "d/m/Y");
include '../../model/conexion.php';
include '../../model/TipoNoticia.php';
include '../../model/TipoNoticiaConsulta.php';
include '../../model/TipoUsuario.php';
include '../../model/TipoUsuarioConsulta.php';
include '../../model/Noticia.php';
include '../../model/NoticiaConsulta.php';
include '../../model/CumpleConsulta.php';
include '../../controller/TipoUsuarioControlador.php';
include '../../controller/TipoNoticiaControlador.php';
include '../../controller/NoticiaControlador.php';

$conexion = new Conexion();

$tipoNoticiaManejador = new TipoNoticiaControlador($conexion);
$listaTipoNoticia = $tipoNoticiaManejador->listar();

$tipoUsuario = new TipoUsuarioControlador($conexion);
$listaTipoUsuario = $tipoUsuario->listar();

$noticias = new NoticiaControlador($conexion);
$listaNoticias = $noticias->listar();

$cumpleMes=new CumpleConsulta($conexion);
$listaCumples=$cumpleMes->listaDeCumpleaneroshoy();

?>
<div id="contenidoAll">

  <div class="row  border-bottom white-bg dashboard-header">

      <div class="col-sm-3 col-md-9">
          <h2>Bienvenido </h2>
          <small>A la oficina virtual!</small>

      </div>
        <!-- <button type="button" class="btn btn-primary btn-lg btn3d"> -->
      <div class="col-sm-3 col-md-3" style="background:#d5dce4" >

        <div class="text-center">
          <h2><?php echo $fecha; ?> </h2>
          <h3> FECHA <i class="fa fa-calendar"></i></h3>
        </div>
      </div>
      <!-- </button> -->

  </div>


  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8"><hr>
      <a id="verFrmPublicacion" class="btn btn-success btn-lg" style="width: 50px;height: 50px;padding: 10px 16px;font-size: 18px;line-height: 1.33;border-radius: 25px;" data-toggle="tooltip" title="Publicar"><i class="fa fa-newspaper-o"></i></a>
      <a id="cerrarFrmPublicacion" class="btn btn-danger btn-lg" style="width: 50px;height: 50px;padding: 10px 16px;font-size: 18px;line-height: 1.33;border-radius: 25px;" data-toggle="tooltip" title="Cerrar"><i class="fa fa-times"></i></a>
      <div id="publicarNoticia" class="wrapper wrapper-content animated fadeInRight">
        <form id="frmNuevaNoticia" class="ibox-content forum-post-container">
          <div class="row">
            <div class="col-sm-12 col-md-12">

              <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6">
                  <div class="form-group">
                    <label>Tipo de Publicación</label>
                    <select class="selectpicker form-control show-tick" name="tipoNoticia" title="Tipo de Publicacion" required>
                      <?php foreach ($listaTipoNoticia as $key => $tipoNoticia): ?>
                        <option value="<?php echo $tipoNoticia->IdTipoNoticia ?>"><?php echo $tipoNoticia->NombreTipoNoticia ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6">
                  <div class="form-group">
                    <label>Especificación de Usuario</label>
                    <select  class="selectpicker form-control show-tick" name="especificacionUsuario" title="Especificacion de Usuario" required>
                      <option value="0">Todos</option>
                      <?php foreach ($listaTipoUsuario as $listaTU): ?>
                        <?php if ($listaTU->IdTipoUsuario>2): ?>
                          <option value="<?php echo $listaTU->IdTipoUsuario; ?>"><?php echo $listaTU->NombreTipoUsuario; ?></option>
                        <?php endif; ?>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
              </div>

              <div class="row">

                <div class="col-sm-6 col-md-6 ">
                  <center>
                    <div class="imgFoto" style="cursor:pointer">
                      <input id="fotoPersonal" type="file" style="opacity:0" accept="image/*" class="form-control" name="rutaImagen" >
                    </div>
                  </center>
                  <h3 class="text-center"> Examinar Imágen (*jpg, *png)</h3>
                </div>
                <div class="col-sm-6 col-md-6">
                  <center>
                    <div class="repuesta" id="repuesta">
                      <center><img id="repuestaFoto" class="img-responsive img-rounded" width="200" height="150"></center>
                    </div>
                  </center>
                </div>

              </div>

              <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="form-group">
                    <label>Titulo</label> <labe> (Máximo 100)</label>
                    <input type="text" class="form-control" name="titulo" style="border-radius:8px" maxlength="99" required>
                  </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                  <input id="videoContenido" name="video" type="checkbox" data-toggle="toggle" data-on="Video On" data-off="Video Off" data-onstyle="success" data-offstyle="danger">
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="form-group">
                    <label>Contenido</label>
                    <textarea class="form-control" style="resize:none; border-radius:8px" id="contenidoText" name="contenido" rows="8" cols="80" required></textarea>
                  </div>
                </div>
              </div>
               <div class="pull-right">
                 <button type="submit" name="duardar" class="btn btn-primary">PUBLICAR</button>
               </div>
            </div>
          </div>
        </form>
      </div>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="ibox-content forum-post-container">
                <div class="forum-post-info">
                    <h4><span class="text-navy"><i class="fa fa-globe"></i> Publicaciones </span> /<span class="text-muted">Semana</span></h4>
                </div>
                <div  id="respuestaPublicacionesSemana">

                    <?php foreach ($listaNoticias as $key => $noticia): ?>
                      <div class="thumbnail">
                        <div class="row">
                          <?php if ($noticia->C_TipoNoticia == "COMUNICADO"): ?>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
                              <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                  <center><img src="../libs/multimedia/img/design/gth.png" alt="logo" width="160" height="80"></center>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                  <?php if ($noticia->RutaImagen): ?>
                                    <?php
                                    list($nada,$ruta) = explode("/wamp64/www/PersonalUAB/view/", $noticia->RutaImagen);
                                    ?>
                                    <center><img src="<?php echo "../".$ruta ?>" class="img-rounded" alt="logo" width="80" height="80"></center>
                                  <?php else: ?>
                                    <center><img src="../libs/multimedia/img/design/documents.png" alt="logo" width="80" height="80"></center>
                                  <?php endif; ?>
                                </div>
                              </div>
                              <div class="text-center">
                                    <h2><strong><?php echo $noticia->C_TipoNoticia ?></strong></h2>
                              </div>
                              <div class="text-center">
                                    <h3><strong style="line-height:25px; font-family: serif; font-size: 18pt;"><?php echo $noticia->Titulo ?></strong></h3>
                              </div>
                              <div class="contenidoNoticia" style="height:250px;overflow-y:scroll; ">
                                <?php echo "<p style='line-height:25px; font-family: serif; font-size: 13pt;'>{$noticia->Contenido}</p>" ?>
                              </div>
                              <div class="row">
                                <div class="col-xs-2 col-sm-2 col-md-3"></div>
                                <div class="col-xs-8 col-sm-8 col-md-6">
                                  <h2 class="text-center" style=""> <strong><u>MUCHAS GRACIAS</u></strong></h2>
                                  <h2 class="text-center" style=""> <strong><u><?php echo $noticia->FechaPublicacion ?> </u></strong> </h2>
                                </div>
                                <div class="col-xs-2 col-sm-2 col-md-3">
                                  <center><img src="../libs/multimedia/img/design/uabL.jpg" alt="logo" width="80" height="80"></center>
                                </div>
                              </div>

                            </div>
                          <?php else: ?>
                            <?php if ($noticia->RutaImagen): ?>
                              <?php
                              list($nada,$ruta) = explode("/wamp64/www/PersonalUAB/view/", $noticia->RutaImagen);
                              ?>
                              <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                <div class="text-center">
                                  <h4><i><?php echo $noticia->C_TipoNoticia ?></i></h4>
                                </div>
                                <center><img src="‪<?php echo "../../../".$ruta ?>" class="img img-responsive img-rounded" alt="imagen" height="100%" width="100%"></center>
                              </div>
                              <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                                <div class="text-center">
                                      <h3><strong style='line-height:25px; font-family: serif; font-size: 18pt;'><?php echo $noticia->Titulo ?></strong></h3>
                                </div>
                                <div class="contenidoNoticia" style="height:250px;overflow-y:scroll;">
                                  <?php
                                    list($textoVacio,$frame) = explode("videoFrameEmbed-", $noticia->Contenido);
                                    if ($frame)
                                    {
                                      ?>
                                      <div class="embed-responsive embed-responsive-16by9">
                                        <iframe class="embed-responsive-item" width="480" height="250" src="https://www.youtube.com/embed/<?php echo $frame; ?>" frameborder="0"></iframe>
                                      </div>
                                      <?php
                                    }
                                    else
                                    {
                                      echo "<p style='line-height:25px; font-family: serif; font-size: 13pt;'>{$noticia->Contenido}</p>";
                                    }
                                  ?>
                                </div>
                              </div>
                            <?php else: ?>
                              <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                <div class="text-center">
                                  <h4><i><?php echo $noticia->C_TipoNoticia ?></i></h4>
                                </div>
                                <center><img src="../libs/multimedia/img/design/newspaper.png" class="img img-responsive img-rounded" alt="imagen" height="100%" width="100%"></center>
                              </div>
                              <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                                <div class="text-center">
                                      <h3><strong style='line-height:25px; font-family: serif; font-size: 18pt;'><?php echo $noticia->Titulo ?></strong></h3>
                                </div>
                                <div class="contenidoNoticia" style="height:280px;overflow-y:scroll;">
                                  <?php
                                    list($textoVacio,$frame) = explode("videoFrameEmbed-", $noticia->Contenido);
                                    if ($frame)
                                    {
                                      ?>
                                      <div class="embed-responsive embed-responsive-16by9">
                                        <iframe class="embed-responsive-item" width="480" height="250" src="https://www.youtube.com/embed/<?php echo $frame; ?>" frameborder="0"></iframe>
                                      </div>
                                      <?php
                                    }
                                    else
                                    {
                                      echo "<p style='line-height:25px; font-family: serif; font-size: 13pt;'>{$noticia->Contenido}</p>";
                                    }
                                  ?>
                                </div>
                              </div>
                            <?php endif; ?>
                          <?php endif; ?>
                        </div>
                      </div>
                    <?php endforeach; ?>

                </div>
            </div>
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="ibox-content forum-post-container">
                <div class="forum-post-info">
                  <h4><span class="text-navy"><i class="fa fa-birthday-cake"></i> Cumpleañeros </span> /<span class="text-muted">hoy</span></h4>
                </div>
                <link href="../libs/css/font-awesome/css/miestilo.css" rel="stylesheet">
                  <div class="card hovercard">
                    <div class="cardheader">
                    </div>
                    <div class="avatar">
                      <img src="../libs/multimedia/img/design/torta.gif">
                    </div>
                    <div class="info text-center table-responsive" >
                      <table class="table table-hover" style="background:white">
                        <tbody>
                          <?php foreach ($listaCumples as $key => $persona): ?>
                            <?php if ($persona['idPersona'] != $_SESSION['idPersona']): ?>
                              <tr style="cursor:pointer;" data-toggle="modal" data-target="#cumple-<?php echo $persona['idPersonal']?>">
                                <td>
                                  <?php if ($persona['rutaFoto']): ?>
                                    <?php
                                      list($nada,$ruta) = explode("/wamp64/www/PersonalUAB/view/", $persona['rutaFoto']);
                                    ?>
                                    <center><img src="‪<?php echo "../../../".$ruta ?>" alt="persona" class=" img-circle" width="25" height="25"></center>
                                  <?php else: ?>
                                    <center><img src="../libs/multimedia/img/design/avatar.png" alt="persona" class=" img-circle" width="25" height="25"></center>
                                  <?php endif; ?>
                                </td>
                                <td data-toggle="tooltip" title="Felicitar a <?php echo $persona['primerNombre']?>">
                                  <?php echo "{$persona['primerNombre']} {$persona['apellidoPaterno']} {$persona['apellidoMaterno']}"; ?>
                                </td>
                              </tr>
                              <div class="modal fade" id="cumple-<?php echo $persona['idPersonal']?>" data-backdrop="static" data-keyboard="false">
                                <div class="modal-dialog">
                                  <div class="modal-content cumple-modal">
                                    <div class="modal-body">

                                      <div class="panel panel-success">
                                        <div class="panel-heading">
                                          <h1 class="panel-title text-center">Envia un mensaje de felicitación a <?php echo "{$persona['primerNombre']} {$persona['apellidoPaterno']} {$persona['apellidoMaterno']}"; ?></h1>
                                          <?php if ($persona['rutaFoto']): ?>
                                            <?php
                                              list($nada,$ruta) = explode("/wamp64/www/PersonalUAB/view/", $persona['rutaFoto']);
                                            ?>
                                            <center><img src="‪<?php echo "../../../".$ruta ?>" alt="persona" class=" img-circle" width="25" height="25"></center>
                                          <?php else: ?>
                                            <center><img src="../libs/multimedia/img/design/avatar.png" alt="persona" class=" img-circle" width="25" height="25"></center>
                                          <?php endif; ?>
                                        </div>
                                        <div class="panel-body">
                                          <form class="felicitarPersonal">
                                            <div class="form-group has-success has-feedback">
                                              <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                                <textarea class="form-control" name="mensajeFelicitacion" rows="3"  aria-describedby="inputGroupSuccess1Status"></textarea>
                                              </div>
                                            </div>
                                            <input type="hidden" name="idCumpleanero" class="idCumpleanero" value="<?php echo $persona['idPersonal']?>">
                                            <input type="hidden" name="nombreCumpleanero" class="nombreCumpleanero" value="<?php echo $persona['primerNombre']?>">
                                            <div class="pull-right">
                                              <button type="button" data-dismiss="modal" class="btn btn-danger" ><i class="fa fa-times"></i></button>
                                              <button type="reset" class="btn btn-default" ><i class="fa fa-refresh"></i></button>
                                              <button type="submit" name="guardar" class="btn btn-success"> <i class="fa fa-send"></i></button>
                                            </div>
                                          </form>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            <?php endif; ?>
                          <?php endforeach; ?>
                        </tbody>
                      </table>
                    </div>
                      <a href="Personal-Birthday.html" class="btn btn-primary"><span class="fa fa-birthday-cake"></span> MES</a><br>
                  </div>
            </div>
        </div>
    </div>

  </div>
</div>
