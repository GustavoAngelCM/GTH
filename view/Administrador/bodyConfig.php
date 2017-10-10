<?php
include '../../model/conexion.php';
include '../../model/CargoPersona.php';
include '../../model/CargoPersonaConsulta.php';
include '../../model/Carrera.php';
include '../../model/CarreraConsulta.php';
include '../../model/Facultad.php';
include '../../model/FacultadConsulta.php';
include '../../model/Cargo.php';
include '../../model/CargoConsulta.php';
include '../../model/TipoArchivo.php';
include '../../model/TipoArchivoConsulta.php';
include '../../model/TipoUsuario.php';
include '../../model/ConfugurarRegistroDatos.php';
include '../../model/ConfugurarRegistroDatosConsulta.php';
include '../../model/TipoNoticia.php';
include '../../model/TipoNoticiaConsulta.php';
include '../../controller/TipoNoticiaControlador.php';
include '../../controller/CargoControlador.php';
include '../../controller/FacultadControlador.php';
include '../../controller/CargoPersonaControlador.php';
include '../../controller/CarreraControlador.php';
include '../../controller/TipoArchivoControlador.php';
include '../../controller/ConfugurarRegistroDatosControlador.php';

$conexion = new Conexion();

$faultadCarrera = new FacultadControlador($conexion);
$listaFacultadCarrera = $faultadCarrera->listar();

$cargoPersona = new CargoPersonaControlador($conexion);
$listaCargosPersona = $cargoPersona->listar();

$cargo = new CargoControlador($conexion);
$listaCargos = $cargo->listar();

$tipoArchivoManejador = new TipoArchivoControlador($conexion);
$listaTipoArchivo = $tipoArchivoManejador->listar();

$config = new ConfugurarRegistroDatosControlador($conexion);
$listaConfig = $config->listar();

$tipoNoticias = new TipoNoticiaControlador($conexion);
$listaTipoNoticia = $tipoNoticias->listar();

?>
<div id="contenidoAll">
  <div class="row  border-bottom white-bg dashboard-header">
    <div class="col-sm-12 col-md-12">
      <h2>Configuraciones </h2>
      <small>Lista de Elementos.</small>
    </div>
  </div>
  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
      <div class="wrapper wrapper-content animated fadeInRight">
        <div class="ibox-content forum-post-container">
          <div class="row">
            <div class="col-xs-1 col-sm-1 col-md-2 col-lg-2"></div>
            <div class="col-xs-11 col-sm-11 col-md-8 col-lg-8">
              <div class="panel panel-primary">
                <div class="panel-heading">
                  <h3 class="panel-tittle">Configurar Fecha Límite por Tipo de Personal</h3>
                </div>
                <div class="panel-body" style="height:350px;overflow-y:scroll;">
                  <hr>
                  <div class="table-responsive" >
                    <table class="table table-bordered table-hover">
                      <thead>
                        <tr class="info">
                          <th class="text-center">#</th>
                          <th class="text-center">Tipo Personal</th>
                          <th class="text-center">Fecha Limite</th>
                          <th class="text-center">Cambiar</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $i = 0; foreach ($listaConfig as $key => $value): $i++;?>
                          <tr>
                            <td><?php echo $i ?></td>
                            <td><?php echo $value->C_TipoUsuario->NombreTipoUsuario ?></td>
                            <form action="Configuraciones-Editar.html" method="post">
                              <input type="hidden" name="id" value="<?php echo $value->IdConfugurarRegistroDatos ?>">
                              <td><input type="text" name="fechaLimite" value="<?php echo $value->FechaLimite ?>" class="form-control datepicker" data-date-format="yyyy/mm/dd" required></td>
                              <td><button type="submit" name="button" class="btn btn-success"> <i class="fa fa-check"></i> Cambiar</button></td>
                            </form>
                          </tr>
                        <?php endforeach; ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xs-1 col-sm-1 col-md-2 col-lg-2"></div>
          </div>
          <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
              <div class="panel panel-primary">
                <div class="panel-heading">
                  <h3 class="panel-tittle">Tipo Archivo</h3>
                </div>
                <div class="panel-body" style="height:350px;overflow-y:scroll;">
                  <form id="tipoArchivoFrm" class="form-inline">
                    <input type="text"  style="text-transform:uppercase;" name="nombre" id="tipoArchivoConf" class="form-control solo-letra" placeholder="Tipo de Archivo" required>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                  </form>
                  <hr>
                  <div class="table-responsive" id="tipoArchivoTable">
                    <table class="table table-bordered table-hover">
                      <thead>
                        <tr class="info">
                          <th class="text-center">Nombre</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($listaTipoArchivo as $key => $tipoArchivo): ?>
                          <tr>
                            <td class="text-center"><?php echo $tipoArchivo->NombreTipoArchivo ?></td>
                          </tr>
                        <?php endforeach; ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
              <div class="panel panel-primary">
                <div class="panel-heading">
                  <h3 class="panel-tittle">Facultades</h3>
                </div>
                <div class="panel-body" style="height:350px;overflow-y:scroll;">
                  <form id="facultadFrm" class="form-inline">
                    <input type="text"  style="text-transform:uppercase;" name="nombre" id="facultadConf" class="form-control solo-letra" placeholder="Facultad" required>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                  </form>
                  <hr>
                  <div class="table-responsive" id="facultadTable">
                    <table class="table table-bordered table-hover">
                      <thead>
                        <tr class="info">
                          <th class="text-center">Facultad</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($listaFacultadCarrera as $key => $facultad): ?>
                          <tr>
                            <td class="text-center"><?php echo $facultad->NombreFacultad ?></td>
                          </tr>
                        <?php endforeach; ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
              <div class="panel panel-primary">
                <div class="panel-heading">
                  <h3 class="panel-tittle">Carreras</h3>
                </div>
                <div class="panel-body" style="height:350px;overflow-y:scroll;">
                  <form id="carreraFrm" class="form-inline">
                    <input type="text" style="text-transform:uppercase;" name="nombre" id="carreraConf" class="form-control solo-letra" placeholder="Carrera" required>
                    <br>
                    <select class="form-control show-tick selectpicker"  name="facultad" title="Facultad">
                      <?php foreach ($listaFacultadCarrera as $key => $facultad): ?>
                        <option value="<?php echo $facultad->IdFacultad ?>"><?php echo $facultad->NombreFacultad ?></option>
                      <?php endforeach; ?>
                    </select>
                    <br>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                  </form>
                  <hr>
                  <div class="table-responsive" id="carreraTable">
                    <table class="table table-bordered table-hover">
                      <thead>
                        <tr class="info">
                          <th class="text-center">Facultad</th>
                          <th class="text-center">Carrera</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($listaFacultadCarrera as $listaFC): ?>
                          <?php if ($listaFC->getListaCarreras()): ?>
                            <?php foreach ($listaFC->getListaCarreras() as $listaCa): ?>
                              <tr>
                                <td class="text-center"><?php echo $listaFC->NombreFacultad; ?></td>
                                <td class="text-center"><?php echo $listaCa->NombreCarrera; ?></td>
                              </tr>
                            <?php endforeach; ?>
                          <?php endif; ?>
                        <?php endforeach; ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
              <div class="panel panel-primary">
                <div class="panel-heading">
                  <h3 class="panel-tittle">Cargos Personal Académico</h3>
                </div>
                <div class="panel-body" style="height:350px;overflow-y:scroll;">
                  <form id="cargosPersonalFrm" class="form-inline">
                    <input type="text" style="text-transform:uppercase;" id="cargosPersonalConf" name="nombre" class="form-control solo-letra" placeholder="Cargos Personal" required>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                  </form>
                  <hr>
                  <div class="table-responsive" id="cargosPersonalTable">
                    <table class="table table-bordered table-hover">
                      <thead>
                        <tr class="info">
                          <th class="text-center">Nombre</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($listaCargosPersona as $key => $cargoPersona): ?>
                          <tr>
                            <td class="text-center"><?php echo $cargoPersona->NombreCargoPersona ?></td>
                          </tr>
                        <?php endforeach; ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
              <div class="panel panel-primary">
                <div class="panel-heading">
                  <h3 class="panel-tittle">Cargos/Roles</h3>
                </div>
                <div class="panel-body" style="height:350px;overflow-y:scroll;">
                  <form id="cargosFrm"  class="form-inline">
                    <input type="text" style="text-transform:uppercase;" id="cargosConf"  name="nombre" class="form-control solo-letra" placeholder="Cargos o Roles" required>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                  </form>
                  <hr>
                  <div class="table-responsive" id="cargosTable">
                    <table class="table table-bordered table-hover">
                      <thead>
                        <tr class="info">
                          <th class="text-center">Nombre</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($listaCargos as $key => $cargo): ?>
                          <tr>
                            <td class="text-center"><?php echo $cargo->NombreCargo ?></td>
                          </tr>
                        <?php endforeach; ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
              <div class="panel panel-primary">
                <div class="panel-heading">
                  <h3 class="panel-tittle">Tipo de Noticia</h3>
                </div>
                <div class="panel-body" style="height:350px;overflow-y:scroll;">
                  <form id="tipoNoticiaFrm"  class="form-inline">
                    <input type="text" style="text-transform:uppercase;" id="tipoNoticiaConf"  name="nombre" class="form-control solo-letra" placeholder="Tipo de Noticia" required>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                  </form>
                  <hr>
                  <div class="table-responsive" id="tipoNoticiaTable">
                    <table class="table table-bordered table-hover">
                      <thead>
                        <tr class="info">
                          <th class="text-center">Nombre</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($listaTipoNoticia as $key => $tipoNoticia): ?>
                          <tr>
                            <td class="text-center"><?php echo $tipoNoticia->NombreTipoNoticia ?></td>
                          </tr>
                        <?php endforeach; ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
