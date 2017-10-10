<?php
$fecha=date("Y/m/d");

include '../../model/conexion.php';

include '../../model/Responsabilidad.php';
include '../../model/ResponsabilidadConsulta.php';
include '../../model/TipoEmpleado.php';
include '../../model/TipoEmpleadoConsulta.php';

include '../../controller/ResponsabilidadControlador.php';
include '../../controller/TipoEmpleadoControlador.php';

include '../../model/Fax.php';
include '../../model/FaxConsulta.php';
include '../../model/TelefonoDepartamento.php';
include '../../model/TelefonoDepartamentoConsulta.php';
include '../../model/DepartamentoContacto.php';
include '../../model/DepartamentoContactoConsulta.php';
include '../../model/Contacto.php';
include '../../model/ContactoConsulta.php';
include '../../model/TelefonoContacto.php';
include '../../model/TelefonoContactoConsulta.php';

include '../../controller/FaxControlador.php';
include '../../controller/TelefonoDepartamentoControlador.php';
include '../../controller/DepartamentoContactoControlador.php';
include '../../controller/ContactoControlador.php';
include '../../controller/TelefonoContactoControlador.php';

$conexion = new Conexion();

//Recuperar datos del departamento
$departamentoContacto = new DepartamentoContactoControlador($conexion);

//enviando el ID del Tipo Departamento Contacto UB=1
$datosDepartamento = $departamentoContacto->datosDepartamentoContacto(1);
$listaDepartamentos = $departamentoContacto->listar();

$telefonosDepartamento = new TelefonoDepartamentoControlador($conexion);
$listaTelefonosDepartamento = $telefonosDepartamento->listaTelefonoDepartamento($datosDepartamento['idDepartamentoContacto']);

$faxDepartamento = new FaxControlador($conexion);
$listaFaxDepartamento = $faxDepartamento->listaFaxDepartamento($datosDepartamento['idDepartamentoContacto']);

// recuperar datos para el contacto
$contactoControlador = new ContactoControlador($conexion);
$listaDeContactosPorDepartamento = $contactoControlador->listaDeContactosPorDepartamento($datosDepartamento['idDepartamentoContacto']);

$telefonoContactoControlador = new TelefonoContactoControlador($conexion);

// para reg
$departamentoControlador = new DepartamentoContactoControlador($conexion);
$listaDepartamentoContacto=$departamentoControlador->listar();

$ResponsabilidadControlador=new ResponsabilidadControlador($conexion);
$listaResponsabilidad=$ResponsabilidadControlador->listar();

$tipoEmpleadoControlador=new TipoEmpleadoControlador($conexion);
$listaTipoEmpleado=$tipoEmpleadoControlador->listar();

?>

<div id="contenidoAll">

  <div class="row  border-bottom white-bg dashboard-header">

      <div class="col-sm-3">
          <h2>Directorio de Contactos </h2>
      </div>


  </div>

  <div class="row">
    <div class="col-lg-12">
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="ibox-content forum-post-container">
                <div class="forum-post-info">
                    <h4><span class="text-navy"><i class="fa fa-globe"></i> Directorio </span> /<span class="text-muted">Contactos</span></h4>
                </div><br>

                <div class="pull-left">
                  <a data-toggle="modal" data-target="#addInstitucion" class="btn btn-success btn-lg efec"><i class="fa fa-building"> Agregar</i></a>
                  <a data-toggle="modal" data-target="#addContacto" class="btn btn-success btn-lg efec"><i class="fa fa-address-book"> Agregar</i></a>
                </div>

                <br><br><br><br><br><br>

                <div>
                    <!--Primer TAB  UB -->
                    <div class="panel with-nav-tabs panel-info" id="containerContact">

                        <div class="panel-heading" style="background:rgb(26, 74, 101)">
                            <ul class="nav nav-tabs">
                              <?php $i = 0; foreach ($listaDepartamentos as $key => $departamento): ?>
                                <?php if ($i == 0): ?>
                                  <li class="active" id="ListaContactos<?php echo $departamento->idDepartamentoContacto; ?>LI">
                                    <a style="color:white" href="#ListaContactos<?php echo $departamento->idDepartamentoContacto; ?>" data-toggle="tab" class="tabClick" >
                                      <?php echo utf8_encode($departamento->nombre); ?>
                                      <input type="hidden" class="inputA" name="id" value="<?php echo $departamento->idDepartamentoContacto; ?>">
                                    </a>
                                  </li>
                                <?php else: ?>
                                  <li id="ListaContactos<?php echo $departamento->idDepartamentoContacto; ?>LI">
                                    <a style="color:white" href="#ListaContactos<?php echo $departamento->idDepartamentoContacto; ?>" data-toggle="tab" class="tabClick" >
                                      <?php echo utf8_encode($departamento->nombre); ?>
                                      <input type="hidden" class="inputA" name="id" value="<?php echo $departamento->idDepartamentoContacto; ?>">
                                    </a>
                                  </li>
                                <?php endif; ?>
                              <?php $i++; endforeach; ?>
                            </ul>
                        </div>

                        <div style="display: block;">
                            <div class="tab-content">

                              <?php $i = 0; foreach ($listaDepartamentos as $key => $departamento): ?>
                                <?php if ($i == 0): ?>
                                  <div class="tab-pane active" id="ListaContactos<?php echo $departamento->idDepartamentoContacto; ?>">
                                    <div class="thumbnail">
                                      <div class="container">
                                        <div class="row">
                                          <!-- <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div> -->
                                          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <div class="row">
                                              <div class="col-xs-1 col-sm-1 col-md-2 col-lg-2"></div>
                                              <div class="col-xs-10 col-sm-10 col-md-8 col-lg-8">
                                                <div class=" panel panel-primary">
                                                  <div class="text-center panel-heading">
                                                    <h3><?php echo utf8_encode($departamento->nombre); ?></h3>
                                                  </div>
                                                  <div class="table-responsive">
                                                    <table class="table table-hover table-bordered">
                                                      <tr>
                                                        <td><label>Dirección:</label></td>
                                                        <td><?php echo utf8_encode($departamento->direccion);?></td>
                                                        <td><label>Web:</label></td>
                                                        <td><?php echo utf8_encode($departamento->direccionWeb);?></td>
                                                      </tr>
                                                      <tr>
                                                        <td><label>Teléfono:</label></td>
                                                        <td>
                                                            <?php
                                                            $listaTelefonosDepartamento = $telefonosDepartamento->listaTelefonoDepartamento($departamento->idDepartamentoContacto);
                                                              $i = 0;
                                                              foreach ($listaTelefonosDepartamento as $regTelfDpto): $i++;

                                                              ?>
                                                              <?php echo "[{$regTelfDpto->numero}] "; ?>

                                                            <?php endforeach; ?>
                                                        </td>
                                                        <td><label>Casilla Postal:</label></td>
                                                        <td><?php echo $departamento->casillaPostal;?></td>
                                                      </tr>
                                                      <tr>
                                                        <td><label>Fax:</label></td>
                                                        <td>
                                                           <?php
                                                           $listaFaxDepartamento = $faxDepartamento->listaFaxDepartamento($departamento->idDepartamentoContacto);
                                                              $i = 0;
                                                              foreach ($listaFaxDepartamento as $regFaxDpto): $i++;
                                                              ?>
                                                              <?php echo "[{$regFaxDpto->numero}] "; ?>

                                                            <?php endforeach; ?>
                                                        </td>
                                                        <td><label>E-Mail</label></td>
                                                        <td><?php echo $departamento->email;?></td>
                                                      </tr>
                                                    </table>
                                                  </div>
                                                </div>
                                              </div>
                                              <div class="col-xs-1 col-sm-1 col-md-2 col-lg-2"></div>
                                            </div>

                                            <div class="panel panel-primary">
                                              <div class="panel-heading">
                                                <h2 class="panel-title">Acciones Posibles</h2>
                                                <div class="pull-right">
                                                  <span class="clickable filter btn btn-info efec" data-toggle="tooltip" title="Click aqui para buscar un Contacto" data-container="body">
                                                    <i class="fa fa-search"></i>
                                                  </span>
                                                </div><br><br>
                                                <div class="table-responsive">
                                                  <table class="table">
                                                    <thead class="desk">
                                                      <tr>
                                                          <th>#</th>
                                                          <th class="text-left">NOMBRE COMPLETO</th>
                                                          <th class="text-center">RESPONSABILIDAD</th>
                                                          <th class="text-center">TELEFONO(S)</th>
                                                      </tr>
                                                    </thead>
                                                  </table>
                                                </div>
                                              </div>
                                              <div class="panel-body" style="display:none">
                                                <input type="text" class="form-control"  id="dev-table<?php echo $departamento->idDepartamentoContacto ?>-filter" data-action="filter" data-filters="#dev-table<?php echo $departamento->idDepartamentoContacto ?>" placeholder="Buscar Contacto" />
                                              </div>
                                              <div class="table-responsive" style="height:350px;overflow-y:scroll;;">
                                                <table class="table table-hover table-bordered table-condensed" id="dev-table<?php echo $departamento->idDepartamentoContacto ?>" >
                                                  <tbody class="text-center">

                                                    <?php
                                                    $listaDeContactosPorDepartamento = $contactoControlador->listaDeContactosPorDepartamento($departamento->idDepartamentoContacto);
                                                      $i = 0;
                                                      foreach ($listaDeContactosPorDepartamento as $registroContacto): $i++;
                                                    ?>

                                                    <tr data-toggle="modal" data-target="#contacto<?php echo $registroContacto->idContacto ?>" style="cursor:pointer">
                                                      <td><?php echo $i ?></td>
                                                      <td>
                                                          <?php
                                                            if($registroContacto->sexo == 'M'){
                                                            echo utf8_encode($registroContacto->apellidoPaterno.' '.$registroContacto->apellidoMaterno.' '.$registroContacto->primerNombre.' '.$registroContacto->segundoNombre) ;
                                                            }else{

                                                                echo utf8_encode($registroContacto->apellidoPaterno.' '.$registroContacto->primerNombre) ;

                                                              }

                                                          ?>
                                                      </td>
                                                      <td ><?php echo utf8_encode($registroContacto->nombreResponsabilidad)?></td>
                                                      <?php
                                                          $listaTelefonoContacto = $telefonoContactoControlador->listarTelefonoContacto($registroContacto->idContacto);
                                                          foreach ($listaTelefonoContacto as $registroTelefono):
                                                              if($registroTelefono->tipoTelefono == 'Celular'){
                                                      ?>
                                                                  <td><?php echo $registroTelefono->numero.'<BR>' ?></td>
                                                      <?php
                                                              }else{
                                                      ?>
                                                                  <td><?php echo $registroTelefono->numero.'<BR>' ?></td>
                                                      <?php
                                                                    }
                                                          endforeach;
                                                      ?>
                                                    </tr>

                                                  <div class="modal fade" id="contacto<?php echo $registroContacto->idContacto ?>">
                                                    <div class="modal-dialog">
                                                      <div class="modal-content" style="border-radius:20px">
                                                        <div class="modal-header">
                                                          <button type="button" name="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                        </div>
                                                        <div class="modal-body">
                                                          <div class="panel panel-primary">
                                                            <div class="panel-heading">
                                                              <h3 class="modal-title text-center">Datos Contacto</h3>
                                                            </div>
                                                            <div class="panel-body">
                                                              <p><strong>Nombre Completo: </strong> <?php echo utf8_encode($registroContacto->apellidoPaterno.' '.$registroContacto->apellidoMaterno.' '.$registroContacto->primerNombre.' '.$registroContacto->segundoNombre); ?></p><hr>
                                                              <p><strong>Tipo de Empleado: </strong> <?php echo utf8_encode($registroContacto->nombreTipoEmpleado) ?></p><hr>
                                                              <p><strong>Cargo/Responsabilidad: </strong> <?php echo utf8_encode($registroContacto->nombreResponsabilidad) ?></p><hr>
                                                              <p><strong>Interno: </strong> <?php echo utf8_encode($registroContacto->interno) ?> </p><hr>
                                                              <p><strong>Voip: </strong> <?php echo utf8_encode($registroContacto->voip) ?> </p><hr>
                                                              <p><strong>Telefonos: </strong>
                                                                <?php
                                                                    $listaTelefonoContacto = $telefonoContactoControlador->listarTelefonoContacto($registroContacto->idContacto);
                                                                    foreach ($listaTelefonoContacto as $registroTelefono):
                                                                        if($registroTelefono->tipoTelefono == 'Celular'){
                                                                ?>
                                                                            <?php echo $registroTelefono->numero.' ' ?>
                                                                <?php
                                                                        }else{
                                                                ?>
                                                                            <?php echo $registroTelefono->numero.' ' ?>
                                                                <?php
                                                                              }
                                                                    endforeach;
                                                                ?>
                                                              </p><hr>
                                                              <p><strong>Fecha de Nacimiento: </strong><?php echo $registroContacto->fechaNacimiento ?></p><hr>
                                                              <p><strong>Email: </strong> <?php echo $registroContacto->emailInstitucional.'  '.$registroContacto->emailPersonal ?> </p><hr>
                                                            </div>
                                                          </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                          <div class="pull-right">
                                                            <button class="btn btn-danger" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times-circle"> Cerrar</i></button>
                                                          </div>
                                                        </div>
                                                      </div>
                                                    </div>
                                                  </div>

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
                                <?php else: ?>
                                  <div class="tab-pane" id="ListaContactos<?php echo $departamento->idDepartamentoContacto; ?>">
                                    <div class="thumbnail">
                                      <div class="container">
                                        <div class="row">
                                          <!-- <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div> -->
                                          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <div class="row">
                                              <div class="col-xs-1 col-sm-1 col-md-2 col-lg-2"></div>
                                              <div class="col-xs-10 col-sm-10 col-md-8 col-lg-8">
                                                <div class=" panel panel-primary">
                                                  <div class="text-center panel-heading">
                                                    <h3><?php echo utf8_encode($departamento->nombre); ?></h3>
                                                  </div>
                                                  <div class="table-responsive">
                                                    <table class="table table-hover table-bordered">
                                                      <tr>
                                                        <td><label>Dirección:</label></td>
                                                        <td><?php echo utf8_encode($departamento->direccion);?></td>
                                                        <td><label>Web:</label></td>
                                                        <td><?php echo utf8_encode($departamento->direccionWeb);?></td>
                                                      </tr>
                                                      <tr>
                                                        <td><label>Teléfono:</label></td>
                                                        <td>
                                                            <?php
                                                            $listaTelefonosDepartamento = $telefonosDepartamento->listaTelefonoDepartamento($departamento->idDepartamentoContacto);
                                                              $i = 0;
                                                              foreach ($listaTelefonosDepartamento as $regTelfDpto): $i++;

                                                              ?>
                                                              <?php echo "[{$regTelfDpto->numero}] "; ?>

                                                            <?php endforeach; ?>
                                                        </td>
                                                        <td><label>Casilla Postal:</label></td>
                                                        <td><?php echo $departamento->casillaPostal;?></td>
                                                      </tr>
                                                      <tr>
                                                        <td><label>Fax:</label></td>
                                                        <td>
                                                           <?php
                                                           $listaFaxDepartamento = $faxDepartamento->listaFaxDepartamento($departamento->idDepartamentoContacto);
                                                              $i = 0;
                                                              foreach ($listaFaxDepartamento as $regFaxDpto): $i++;
                                                              ?>
                                                              <?php echo "[{$regFaxDpto->numero}] "; ?>

                                                            <?php endforeach; ?>
                                                        </td>
                                                        <td><label>E-Mail</label></td>
                                                        <td><?php echo $departamento->email;?></td>
                                                      </tr>
                                                    </table>
                                                  </div>
                                                </div>
                                              </div>
                                              <div class="col-xs-1 col-sm-1 col-md-2 col-lg-2"></div>
                                            </div>

                                            <div class="panel panel-primary">
                                              <div class="panel-heading">
                                                <h2 class="panel-title">Acciones Posibles</h2>
                                                <div class="pull-right">
                                                  <span class="clickable filter btn btn-info efec" data-toggle="tooltip" title="Click aqui para buscar un Contacto" data-container="body">
                                                    <i class="fa fa-search"></i>
                                                  </span>
                                                </div><br><br>
                                                <div class="table-responsive">
                                                  <table class="table">
                                                    <thead class="desk">
                                                      <tr>
                                                          <th>#</th>
                                                          <th class="text-left">NOMBRE COMPLETO</th>
                                                          <th class="text-center">RESPONSABILIDAD</th>
                                                          <th class="text-center">TELEFONO(S)</th>
                                                      </tr>
                                                    </thead>
                                                  </table>
                                                </div>
                                              </div>
                                              <div class="panel-body" style="display:none">
                                                <input type="text" class="form-control"  id="dev-table<?php echo $departamento->idDepartamentoContacto ?>-filter" data-action="filter" data-filters="#dev-table<?php echo $departamento->idDepartamentoContacto ?>" placeholder="Buscar Contacto" />
                                              </div>
                                              <div class="table-responsive" style="height:350px;overflow-y:scroll;;">
                                                <table class="table table-hover table-bordered table-condensed" id="dev-table<?php echo $departamento->idDepartamentoContacto ?>" >
                                                  <tbody class="text-center">

                                                    <?php
                                                    $listaDeContactosPorDepartamento = $contactoControlador->listaDeContactosPorDepartamento($departamento->idDepartamentoContacto);
                                                      $i = 0;
                                                      foreach ($listaDeContactosPorDepartamento as $registroContacto): $i++;
                                                    ?>

                                                    <tr data-toggle="modal" data-target="#contacto<?php echo $registroContacto->idContacto ?>" style="cursor:pointer">
                                                      <td><?php echo $i ?></td>
                                                      <td>
                                                          <?php
                                                            if($registroContacto->sexo == 'M'){
                                                            echo utf8_encode($registroContacto->apellidoPaterno.' '.$registroContacto->apellidoMaterno.' '.$registroContacto->primerNombre.' '.$registroContacto->segundoNombre) ;
                                                            }else{

                                                                echo utf8_encode($registroContacto->apellidoPaterno.' '.$registroContacto->primerNombre) ;

                                                              }

                                                          ?>
                                                      </td>
                                                      <td ><?php echo utf8_encode($registroContacto->nombreResponsabilidad)?></td>
                                                      <?php
                                                          $listaTelefonoContacto = $telefonoContactoControlador->listarTelefonoContacto($registroContacto->idContacto);
                                                          foreach ($listaTelefonoContacto as $registroTelefono):
                                                              if($registroTelefono->tipoTelefono == 'Celular'){
                                                      ?>
                                                                  <td><?php echo $registroTelefono->numero.'<BR>' ?></td>
                                                      <?php
                                                              }else{
                                                      ?>
                                                                  <td><?php echo $registroTelefono->numero.'<BR>' ?></td>
                                                      <?php
                                                                    }
                                                          endforeach;
                                                      ?>
                                                    </tr>

                                                  <div class="modal fade" id="contacto<?php echo $registroContacto->idContacto ?>">
                                                    <div class="modal-dialog">
                                                      <div class="modal-content" style="border-radius:20px">
                                                        <div class="modal-header">
                                                          <button type="button" name="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                        </div>
                                                        <div class="modal-body">
                                                          <div class="panel panel-primary">
                                                            <div class="panel-heading">
                                                              <h3 class="modal-title text-center">Datos Contacto</h3>
                                                            </div>
                                                            <div class="panel-body">
                                                              <p><strong>Nombre Completo: </strong> <?php echo utf8_encode($registroContacto->apellidoPaterno.' '.$registroContacto->apellidoMaterno.' '.$registroContacto->primerNombre.' '.$registroContacto->segundoNombre); ?></p><hr>
                                                              <p><strong>Tipo de Empleado: </strong> <?php echo utf8_encode($registroContacto->nombreTipoEmpleado) ?></p><hr>
                                                              <p><strong>Cargo/Responsabilidad: </strong> <?php echo utf8_encode($registroContacto->nombreResponsabilidad) ?></p><hr>
                                                              <p><strong>Interno: </strong> <?php echo utf8_encode($registroContacto->interno) ?> </p><hr>
                                                              <p><strong>Voip: </strong> <?php echo utf8_encode($registroContacto->voip) ?> </p><hr>
                                                              <p><strong>Telefonos: </strong>
                                                                <?php
                                                                    $listaTelefonoContacto = $telefonoContactoControlador->listarTelefonoContacto($registroContacto->idContacto);
                                                                    foreach ($listaTelefonoContacto as $registroTelefono):
                                                                        if($registroTelefono->tipoTelefono == 'Celular'){
                                                                ?>
                                                                            <?php echo $registroTelefono->numero.' ' ?>
                                                                <?php
                                                                        }else{
                                                                ?>
                                                                            <?php echo $registroTelefono->numero.' ' ?>
                                                                <?php
                                                                              }
                                                                    endforeach;
                                                                ?>
                                                              </p><hr>
                                                              <p><strong>Fecha de Nacimiento: </strong><?php echo $registroContacto->fechaNacimiento ?></p><hr>
                                                              <p><strong>Email: </strong> <?php echo $registroContacto->emailInstitucional.'  '.$registroContacto->emailPersonal ?> </p><hr>
                                                            </div>
                                                          </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                          <div class="pull-right">
                                                            <button class="btn btn-danger" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times-circle"> Cerrar</i></button>
                                                          </div>
                                                        </div>
                                                      </div>
                                                    </div>
                                                  </div>

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
                                <?php endif; ?>

                              <?php $i++; endforeach; ?>

                            </div>
                        </div>

                </div> <!--DIV antes del TAB-->

            </div><!--<div class="ibox-content forum-post-container">-->
    </div><!--<div class="col-lg-12">-->
</div><!--<div class="row">-->

<div class="modal fade" id="addContacto">
  <div class="modal-dialog">
    <div class="modal-content" style="border-radius:20px">

      <div class="modal-body">

        <form id="addContactoFrm">

          <div class="well">
              <div class="modal-header">
                <h3 class="text-center"><strong>Ingrese Datos del Contacto</strong></h3>
              </div><br>

              <div class="form-group">
                <label>Institucíon</label>
                <div class="input-group selector">
                  <span class="input-group-addon" style="background: red; color:white" id="sizing-addon2"><i class="fa fa-linode"></i></span>
                  <select class="selectpicker form-control" data-live-search="true" data-size="7" name="departamentoContacto"  data-width="400px" title="Selecciona" required>
                    <?php foreach ($listaDepartamentos as $key => $departamento): ?>
                      <option value="<?php echo $departamento->idDepartamentoContacto; ?>" data-tokens="<?php echo utf8_encode($departamento->nombre); ?>"><?php echo utf8_encode($departamento->nombre); ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
                <div class="input-group selector-mobile">
                  <span class="input-group-addon" style="background: red; color:white"  id="sizing-addon2"><i class="fa fa-linode"></i></span>
                  <select class="form-control" name="departamentoContacto"  required>
                    <option value="" disabled selected hidden>Selecciona Institucíon</option>
                    <?php foreach ($listaDepartamentos as $key => $departamento): ?>
                      <option value="<?php echo $departamento->idDepartamentoContacto; ?>"><?php echo utf8_encode($departamento->nombre); ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>

              <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6">
                  <div class="form-group">
                    <label>Tipo Empleado</label>
                    <div class="input-group selector">
                      <span class="input-group-addon" style="background: red; color:white" id="sizing-addon2"><i class="fa fa-linode"></i></span>
                      <select class="selectpicker form-control" data-live-search="true" data-size="7" name="tipoEmpleado" id="tipoEmpleado" data-width="200px" title="Selecciona">
                        <?php foreach ($listaTipoEmpleado as $listaTipoEmp): ?>
                          <option value="<?php echo $listaTipoEmp->idTipoEmpleado; ?>" data-tokens="<?php echo utf8_encode($listaTipoEmp->nombre); ?>"><?php echo utf8_encode($listaTipoEmp->nombre); ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                    <div class="input-group selector-mobile">
                      <span class="input-group-addon" style="background: red; color:white"  id="sizing-addon2"><i class="fa fa-linode"></i></span>
                      <select class="form-control" name="tipoEmpleado" id="tipoEmpleado">
                        <option value="" disabled selected hidden>Selecciona Tipo Empleado</option>
                        <?php foreach ($listaTipoEmpleado as $listaTipoEmp): ?>
                          <option value="<?php echo $listaTipoEmp->idTipoEmpleado; ?>"><?php echo utf8_encode($listaTipoEmp->nombre); ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6">
                  <div class="form-group">
                    <label>Responsabilidad</label>
                    <div class="input-group selector">
                      <span class="input-group-addon" style="background: red; color:white" id="sizing-addon2"><i class="fa fa-linode"></i></span>
                      <select class="selectpicker form-control" data-live-search="true" data-size="7" name="responsabilidad" data-width="200px" id="responsabilidad" title="Selecciona">
                        <?php foreach ($listaResponsabilidad as $listaResp): ?>
                          <option value="<?php echo $listaResp->idResponsabilidad; ?>" data-tokens="<?php echo utf8_encode($listaResp->nombre); ?>"><?php echo utf8_encode($listaResp->nombre); ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                    <div class="input-group selector-mobile">
                      <span class="input-group-addon" style="background: red; color:white"  id="sizing-addon2"><i class="fa fa-linode"></i></span>
                      <select class="form-control" name="responsabilidad" id="responsabilidad">
                        <option value="" disabled selected hidden>Selecciona</option>
                        <?php foreach ($listaResponsabilidad as $listaResp): ?>
                          <option value="<?php echo $listaResp->idResponsabilidad; ?>"><?php echo utf8_encode($listaResp->nombre); ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6">
                  <div class="form-group">
                    <label>Primer Nombre</label>
                    <div class="input-group">
                      <span class="input-group-addon" style="background: red; color:white" id="sizing-addon2"><i class="fa fa-user"></i></span>
                      <input id="primerNombreRef" type="text" class="form-control" placeholder="Primer Nombre: " aria-describedby="sizing-addon2" name="primerNombre" required>
                    </div>
                  </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6">
                  <div class="form-group">
                    <label>Segundo Nombre</label>
                    <div class="input-group">
                      <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-user"></i></span>
                      <input id="segundoNombreRef" type="text" class="form-control" placeholder="Segundo Nombre: " aria-describedby="sizing-addon2" name="segundoNombre">
                    </div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6">
                  <div class="form-group">
                    <label>Apellido Paterno</label>
                    <div class="input-group">
                      <span class="input-group-addon" style="background: red; color:white" id="sizing-addon2"><i class="fa fa-user"></i></span>
                      <input id="apellidoPaternoRef" type="text" class="form-control" placeholder="Apellido Paterno: " aria-describedby="sizing-addon2" name="apellidoPaterno" required>
                    </div>
                  </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6">
                  <div class="form-group">
                    <label>Apellido Materno</label>
                    <div class="input-group">
                      <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-user"></i></span>
                      <input id="apellidoMaternoRef" type="text" class="form-control" placeholder="Apellido Materno: " aria-describedby="sizing-addon2" name="apellidoMaterno">
                    </div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-xs-12 col-sm-12 col-m">
                  <div class="form-group">
                    <label>Fecha de Nacimiento</label>
                    <div class="input-group" >
                      <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-calendar"></i></span>
                      <input id="fechaNac" type="text" class="form-control datepicker" data-date-format="yyyy/mm/dd" placeholder="Fecha de Nacimiento:  AAAA/MM/DD" aria-describedby="sizing-addon2" name="fechaNac">
                    </div>
                  </div>
                </div>
              </div>

              <div class="form-group" data-toggle="buttons">
                <label class="btn btn-danger"> <i class="fa fa-venus-mars"></i> Sexo: </label>
                <label class="btn btn-info btn-outline sexo">
                    <input type="radio" class="sexo" name="sexo" value="F"><i class="fa fa-female">  Femenino</i>
                </label>
                <label class="btn btn-info btn-outline sexo">
                    <input type="radio" class="sexo" name="sexo" value="M"><i class="fa fa-male">  Masculino</i>
                </label>
              </div>

              <div class="row">
                 <div class="col-xs-12 col-sm-12 col-md-6">
                   <div class="form-group">
                     <label>Interno</label>
                     <div class="input-group">
                       <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-phone"></i></span>
                       <input id="interno" type="text" class="form-control" placeholder="Interno " aria-describedby="sizing-addon2" name="interno">
                     </div>
                   </div>
                 </div>
                 <div class="col-xs-12 col-sm-12 col-md-6">
                   <div class="form-group">
                     <label>Voip</label>
                     <div class="input-group">
                       <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-phone"></i></span>
                       <input id="voip" type="text" class="form-control" placeholder="Voip " aria-describedby="sizing-addon2" name="voip">
                     </div>
                   </div>
                 </div>
               </div>

              <div class="row">
                 <div class="col-xs-12 col-sm-12 col-md-6">
                   <div class="form-group">
                     <label>Correo Institucional</label>
                     <div class="input-group">
                       <span class="input-group-addon" style="background: red; color:white" id="sizing-addon2"><i class="fa fa-envelope"></i></span>
                       <input type="email" class="form-control" placeholder="E-mail Institucional" aria-describedby="sizing-addon2" id="emailInstitucional" name="emailInstitucional" required>
                     </div>
                   </div>
                 </div>
                 <div class="col-xs-12 col-sm-12 col-md-6">
                   <div class="form-group">
                     <label>Correo Personal</label>
                     <div class="input-group">
                       <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-envelope"></i></span>
                       <input type="email" class="form-control" placeholder="E-mail Personal " aria-describedby="sizing-addon2" id="email" name="emailPersonal">
                     </div>
                   </div>
                 </div>
                 <div class="col-xs-12 col-sm-12 col-md-12">
                   <div class="form-group">
                     <label>Número Teléfono</label>
                     <div class="input-group">
                       <span class="input-group-addon" style="background: red; color:white" id="sizing-addon2"><i class="fa fa-phone"></i></span>
                       <input  type="text" class="form-control solo-numero" placeholder="Número" aria-describedby="sizing-addon2" name="numero1">
                     </div>
                   </div>
                 </div>
               </div>

               <div id="mensajeContacto"></div>

               <div class="pull-right">
                <button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Cancelar <i class="fa fa-times-circle"></i></button>
                <button type="reset" value="Reset" name="reset" class="btn btn-default">Limpiar <span class="fa fa-refresh"></span></button>
                <button type="submit" class="btn btn-success">Guardar <i class="fa fa-check-circle"></i></button>
               </div>

            </div>

        </form>

      </div>

    </div>
  </div>
</div>

<div class="modal fade" id="addInstitucion">
  <div class="modal-dialog">
    <div class="modal-content" style="border-radius:20px">

      <div class="modal-body">

        <form id="addInstitucionFrm">

          <div class="well">

               <div class="modal-header">
                 <h3 class="text-center"><strong>Ingrese Datos de Institucíon</strong></h3>
               </div><br>

               <div class="form-group">
                 <label>Nombre Institucíon</label>
                 <div class="input-group">
                   <span class="input-group-addon"style="background: red; color:white" ><i class="fa fa-building"></i></span>
                   <input type="text" class="form-control" placeholder="Nombre Institucíon" name="nombre" required>
                 </div>
               </div>

               <div class="form-group">
                 <label>Dirección</label>
                 <div class="input-group">
                   <span class="input-group-addon"style="background: red; color:white" ><i class="fa fa-building"></i></span>
                   <input type="text" class="form-control" placeholder="Dirección" name="direccion" required>
                 </div>
               </div>

               <div class="form-group">
                 <label>Email</label>
                 <div class="input-group">
                   <span class="input-group-addon" ><i class="fa fa-envelope"></i></span>
                   <input type="text" class="form-control" placeholder="Email" name="email" >
                 </div>
               </div>

               <div class="form-group">
                 <label>Dirección Web</label>
                 <div class="input-group">
                   <span class="input-group-addon" ><i class="fa fa-internet-explorer"></i></span>
                   <input type="text" class="form-control" placeholder="Dirección Web" name="web" >
                 </div>
               </div>

               <div class="form-group">
                 <label>Casilla Postal</label>
                 <div class="input-group">
                   <span class="input-group-addon" ><i class="fa fa-sort-numeric-asc"></i></span>
                   <input type="text" class="form-control" placeholder="Casilla Postal" name="postal" >
                 </div>
               </div>

               <div class="form-group">
                 <label>Teléfono</label>
                 <div class="input-group">
                   <span class="input-group-addon" ><i class="fa fa-phone"></i></span>
                   <input type="text" class="form-control solo-numero" placeholder="Teléfono" name="telefono" >
                 </div>
               </div>

               <div class="form-group">
                 <label>Fax</label>
                 <div class="input-group">
                   <span class="input-group-addon" ><i class="fa fa-phone"></i></span>
                   <input type="text" class="form-control" placeholder="Fax" name="fax" >
                 </div>
               </div>

               <div id="mensajeInstitucion"></div>

               <div class="pull-right">
                <button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Cancelar <i class="fa fa-times-circle"></i></button>
                <button type="reset" value="Reset" name="reset" class="btn btn-default">Limpiar <span class="fa fa-refresh"></span></button>
                <button type="submit" class="btn btn-success">Guardar <i class="fa fa-check-circle"></i></button>
               </div>

            </div>

        </form>

      </div>

    </div>
  </div>
</div>
