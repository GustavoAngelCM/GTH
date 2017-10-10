<?php
include '../../model/conexion.php';
include '../../model/TablaMeritosDocenteProfesor.php';
include '../../model/TablaMeritosDocenteProfesorConsulta.php';
include '../../controller/TablaMeritosDocenteProfesorControlador.php';

$conexion = new Conexion();

$tablaMeritosManejador = new TablaMeritosDocenteProfesorControlador($conexion);
$listaTablaMeritos = $tablaMeritosManejador->listar();

?>
<div class="container" id="contenidoAll">

  <div class="row  border-bottom white-bg dashboard-header">

      <div class="col-sm-12">
          <h2>Tablas de Meritos-UAB </h2>
      </div>

  </div>

  <div class="row">
    <div class="col-lg-12">
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="ibox-content forum-post-container">
                <div class="forum-post-info">
                    <h4><span class="text-navy"><i class="fa fa-globe"></i> Lista </span> /<span class="text-muted">Usuario</span></h4>
                </div>
                <br><br>
                <div class="">
                  <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">

                      <div class="panel panel-primary">
                        <div class="panel-heading">
                          <h2 class="panel-title">Acciones Posibles</h2>
                          <div class="pull-right">
                            <a href="Meritos-Registrar.html"  class="btn btn-success"><i class="fa fa-plus" title="Añadir Nueva Tabla de Meritos" data-toggle="tooltip"></i></a>
                            <span class="clickable filter btn btn-info efec" data-toggle="tooltip" title="Click aqui para buscar un Merito" data-container="body">
                              <i class="fa fa-search"></i>
                            </span>
                          </div><br><br>
                          <div class="table-responsive">
                            <table class="table">
                              <thead class="desk">
                                <tr>
                                  <th class="text-center">ID</th>
                                  <th class="text-center">Version</th>
                                  <th class="text-center">Tipo de Merito</th>
                                  <th class="text-center">Fecha de Creacion</th>
                                  <th class="text-center">Ver</th>
                                  <th class="text-center">Dar de Baja</th>
                                </tr>
                              </thead>
                            </table>
                          </div>

                        </div>
                        <div class="panel-body" style="display:none">
                          <input type="text" class="form-control"  id="dev-table-filter" data-action="filter" data-filters="#dev-table" placeholder="Buscar Merito" />
                        </div>
                        <div class="table-responsive" style="height:350px;overflow-y:scroll;;">
                          <table class="table table-hover" id="dev-table" >
                            <tbody class="text-center">
                              <?php foreach ($listaTablaMeritos as $key => $item): ?>
                                <tr>
                                  <td><?php echo $item->IdTablaMeritosDocenteProfesor ?></td>
                                  <td><?php echo $item->Version ?></td>
                                  <td><?php echo $item->TipoMerito ?></td>
                                  <td><?php echo $item->FechaCreacion ?></td>
                                  <td>
                                    <form class="verTablaMeritos">
                                      <input type="hidden" name="idTablaMerito" value="<?php echo $item->IdTablaMeritosDocenteProfesor ?>">
                                      <button type="submit" class="btn btn-danger"><i class="fa fa-eye"></i></button>
                                    </form>
                                  </td>
                                  <td>
                                    <?php if ($item->Activo == 1): ?>
                                      <form action="Meritos-Down.html" method="post">
                                        <input type="hidden" name="id" value="<?php echo $item->IdTablaMeritosDocenteProfesor ?>">
                                        <button type="submit" class="btn btn-success"><i class="fa fa-toggle-on"></i></button>
                                      </form>
                                    <?php else: ?>
                                      <form action="Meritos-Up.html" method="post">
                                        <input type="hidden" name="id" value="<?php echo $item->IdTablaMeritosDocenteProfesor ?>">
                                        <button type="submit" class="btn btn-danger"><i class="fa fa-toggle-off"></i></button>
                                      </form>
                                    <?php endif; ?>
                                  </td>
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

<div class="modal fade" id="contenidoTablaMeritosModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" name="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3 class="modal-title text-center"> <i class="fa fa-user"></i> Tabla de Meritos</h3>
      </div>
      <div class="modal-body">
        <div class="contenidoTablaMeritos" id="contenidoTablaMeritos">
          <i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
          <span class="sr-only">Cargando...</span>
        </div>
      </div>
      <div class="modal-footer">
        <div class="pull-right">
          <button class="btn btn-danger" data-dismiss="modal">Cerrar <i class="fa fa-times"></i></button>
        </div>
      </div>
    </div>
  </div>
</div>
