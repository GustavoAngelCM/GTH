<?php
include '../../model/conexion.php';
include '../../model/Persona.php';
include '../../model/Cargo.php';
include '../../model/Enfermedad.php';
include '../../model/Deporte.php';
include '../../model/Personal.php';
include '../../model/PersonaConsulta.php';
include '../../model/PersonalConsulta.php';
include '../../model/ReferenciaPersonal.php';
include '../../model/ReferenciaPersonalConsulta.php';
include '../../model/ConyuguePersonal.php';
include '../../model/ConyuguePersonalConsulta.php';
include '../../model/CursoEstudiado.php';
include '../../model/CursoEstudiadoConsulta.php';
include '../../model/HijosPersonal.php';
include '../../model/HijosPersonalConsulta.php';
include '../../model/Telefono.php';
include '../../model/TelefonoConsulta.php';
include '../../model/TituloProfesional.php';
include '../../model/TituloProfesionalConsulta.php';
include '../../model/ExperienciaLaboral.php';
include '../../model/ExperienciaLaboralConsulta.php';
include '../../controller/PersonaControlador.php';
include '../../controller/PersonalControlador.php';
include '../../controller/ReferenciaPersonalControlador.php';
include '../../controller/TelefonoControlador.php';
include '../../controller/ConyuguePersonalControlador.php';
include '../../controller/HijosPersonalControlador.php';
include '../../controller/CursoEstudiadoControlador.php';
include '../../controller/TituloProfesionalControlador.php';
include '../../controller/ExperienciaLaboralControlador.php';

include '../../model/EstadoCivil.php';
include '../../model/EstadoCivilConsulta.php';
include '../../model/LugarExpedicion.php';
include '../../model/LugarExpedicionConsulta.php';
include '../../model/Nacion.php';
include '../../model/NacionConsulta.php';
include '../../model/TipoPersonal.php';
include '../../model/TipoPersonalConsulta.php';
include '../../model/Carrera.php';
include '../../model/CarreraConsulta.php';
include '../../model/Ciudad.php';
include '../../model/CiudadConsulta.php';
include '../../model/Facultad.php';
include '../../model/FacultadConsulta.php';
include '../../model/Religion.php';
include '../../model/ReligionConsulta.php';
include '../../model/Seguro.php';
include '../../model/SeguroConsulta.php';
include '../../model/Afp.php';
include '../../model/AfpConsulta.php';
include '../../model/CargoConsulta.php';
include '../../model/CargoPersona.php';
include '../../model/CargoPersonaConsulta.php';
include '../../model/DeporteConsulta.php';
include '../../model/EnfermedadConsulta.php';
include '../../model/TipoTituloProfesional.php';
include '../../model/TipoTituloProfesionalConsulta.php';
include '../../model/DocumentoPersonal.php';
include '../../model/DocumentoPersonalConsulta.php';
include '../../controller/DocumentoPersonalControlador.php';
include '../../controller/NacionControlador.php';
include '../../controller/CtrEstadoCivil.php';
include '../../controller/CtrLugarExpedicion.php';
include '../../controller/TipoPersonalControlador.php';
include '../../controller/FacultadControlador.php';
include '../../controller/CiudadControlador.php';
include '../../controller/ReligionControlador.php';
include '../../controller/SeguroControlador.php';
include '../../controller/AfpControlador.php';
include '../../controller/CargoControlador.php';
include '../../controller/CargoPersonaControlador.php';
include '../../controller/DeporteControlador.php';
include '../../controller/EnfermedadControlador.php';
include '../../controller/TipoTituloProfesionalControlador.php';



$conexion = new Conexion();
$consulta = new PersonaConsulta($conexion);

$idPersona = $consulta->obtenerIdPersona($_POST['ciPersonal']);

$personalManejador = new PersonalControlador($conexion);

$personal = $personalManejador->ver($idPersona['idPersona']);

$estadoCivil = new CtrEstadoCivil($conexion);
$listaEstadoCivil = $estadoCivil->listar();

$lugarExpedicion = new CtrLugarExpedicion($conexion);
$listaLugarExpedicion = $lugarExpedicion->listar();

$nacionalidad = new NacionControlador($conexion);
$listaNaciones = $nacionalidad->listar();

$tipoPersonal = new TipoPersonalControlador($conexion);
$listaTipoPersonal = $tipoPersonal->listar();

$faultadCarrera = new FacultadControlador($conexion);
$listaFacultadCarrera = $faultadCarrera->listar();

$ciudad = new CiudadControlador($conexion);
$listaCiudades = $ciudad->listar();

$religion = new ReligionControlador($conexion);
$listaReligion = $religion->listar();

$seguro = new SeguroControlador($conexion);
$listaSeguros = $seguro->listar();

$afp = new AfpControlador($conexion);
$listaAfps = $afp->listar();

$cargo = new CargoControlador($conexion);
$listaCargos = $cargo->listar();

$cargoPersona = new CargoPersonaControlador($conexion);
$listaCargosPersona = $cargoPersona->listar();

$deporte = new DeporteControlador($conexion);
$listaDeportes = $deporte->listar();

$enfermedad = new EnfermedadControlador($conexion);
$listaEnfermedades = $enfermedad->listar();

$tipoTituloProfesional = new TipoTituloProfesionalControlador($conexion);
$listaTipoTituloProfesional = $tipoTituloProfesional->listar();

$documentosPersonal = new DocumentoPersonalControlador($conexion);

?>

<div id="contenidoAll">

  <div class="row  border-bottom white-bg dashboard-header">
    <div class="col-sm-3">
      <h2>Personal-UAB </h2>
    </div>
    <div class="col-sm-9 text-center">
      <h3><p style="color:red"><strong>POR FAVOR VERIFIQUE BIEN SUS DATOS ANTES DE EDITAR</strong></p></h3>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-12">
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="ibox-content forum-post-container">
              <a href="Personal-Lista.html" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Atras</a><br><br>
                <div class="forum-post-info">
                    <h4><span class="text-navy"><i class="fa fa-globe"></i> Edición </span> /<span class="text-muted">Personal</span></h4>
                    <div class="pull-right" id="listoAll">
                      <form id="detallePersonal">
                        <input type="hidden" name="datos" value="1">
                        <?php if ($personal->IdPersona->CI): ?>
                          <input type="hidden" name="ciPersonalDetalle" id="ciPersonalDetalle" value="<?php echo $personal->IdPersona->CI; ?>">
                        <?php else: ?>
                          <input type="hidden" name="ciPersonalDetalle" id="ciPersonalDetalle" value="1">
                        <?php endif; ?>
                        <button type="submit" class="btn btn-success" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-send"> VER</i></button>
                      </form>
                    </div>
                </div>

                <div>

                    <div class="panel with-nav-tabs panel-info">
                      <div class="panel-heading" style="background:rgb(26, 74, 101)">
                        <ul class="nav nav-tabs" >
                            <li class="active" id="GeneralLI"><a style="color:white" href="#General" data-toggle="tab" >Datos personales</a></li>
                            <li id="PersonalLI"><a style="color:white" href="#Personal" data-toggle="tab">Datos generales</a></li>
                            <li id="FamiliaresLI"><a style="color:white" href="#Familiares" data-toggle="tab">Familiares</a></li>
                            <li id="HojaVidaLI"><a style="color:white" href="#HojaVida" data-toggle="tab">Hoja de Vida</a></li>
                            <li id="DocumentosLI"><a style="color:white" href="#Documentos" data-toggle="tab">Documentos personales</a></li>
                        </ul>
                      </div>
                      <div class="panel-body" style="display: block;">
                          <div class="tab-content">
                              <div class="tab-pane fade in active" id="General">
                                <div class="thumbnail">
                                  <div class="text-center">
                                    <h3>Datos personales</h3>
                                  </div>
                                    <form id="frmPersonaEditar">

                                      <div class="row">

                                        <div class="col-sm-1 col-md-2"></div>
                                        <div class="col-sm-10 col-md-8">

                                          <div class="form-group">
                                            <label>Primer Nombre</label>
                                            <div class="input-group">
                                              <span class="input-group-addon" style="background: red; color:white" id="sizing-addon2"><i class="fa fa-user"></i></span>
                                              <input id="primerNombre" type="text" class="form-control solo-letra" placeholder="Primer Nombre: " aria-describedby="sizing-addon2" name="primerNombre" value=<?php echo $personal->IdPersona->PrimerNombre ?> required>
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label>Segundo Nombre</label>
                                            <div class="input-group">
                                              <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-user"></i></span>
                                              <input id="segundoNombre" type="text" class="form-control solo-letra" placeholder="Segundo Nombre: " aria-describedby="sizing-addon2" name="segundoNombre" value=<?php echo $personal->IdPersona->SegundoNombre ?>>
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label>Apellido Paterno</label>
                                            <div class="input-group">
                                              <span class="input-group-addon" style="background: red; color:white" id="sizing-addon2"><i class="fa fa-user"></i></span>
                                              <input id="apellidoPaterno" type="text" class="form-control solo-letra" placeholder="Apellido Paterno: " aria-describedby="sizing-addon2" name="apellidoPaterno" value=<?php echo $personal->IdPersona->ApellidoPaterno ?> required>
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label>Apellido Materno</label>
                                            <div class="input-group">
                                              <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-user"></i></span>
                                              <input id="apellidoMaterno" type="text" class="form-control solo-letra" placeholder="Apellido Materno: " aria-describedby="sizing-addon2" name="apellidoMaterno" value=<?php echo $personal->IdPersona->ApellidoMaterno ?>>
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label>CI</label>
                                            <div class="input-group">
                                              <span class="input-group-addon" style="background: red; color:white" id="sizing-addon2"><i class="fa fa-user"></i></span>
                                              <input id="ciNit" type="text" class="form-control" placeholder="CI/NIT: " aria-describedby="sizing-addon2" name="ciNit" value='<?php echo $personal->IdPersona->CI ?>' required>
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label>Lugar de Expedición CI</label>
                                            <div class="input-group selector lugarExpedicionNew">
                                              <span class="input-group-addon" style="background: red; color:white" id="sizing-addon2"><a class="btn btn-xs btn-default lugarExpedicionAdd" data-toggle="modal" data-target="#addNewLugExpedi"><i class="fa fa-address-card"></i></a></span>
                                              <select class="selectpicker form-control" name="lugarExpedicion" id="lugarExpedicion" title="Seleccione Lugar de Expedicion CI" required>
                                                <?php foreach ($listaLugarExpedicion as $listaLE): ?>
                                                  <?php if ($personal->IdPersona->LugarExpedicion == $listaLE->NombreLugarExpedicion): ?>
                                                    <option value="<?php echo $listaLE->IdLugarExpedicion; ?>" selected><?php echo $listaLE->NombreLugarExpedicion; ?></option>
                                                  <?php else: ?>
                                                    <option value="<?php echo $listaLE->IdLugarExpedicion; ?>"><?php echo $listaLE->NombreLugarExpedicion; ?></option>
                                                  <?php endif; ?>

                                                <?php endforeach; ?>
                                              </select>
                                            </div>
                                            <div class="input-group selector-mobile lugarExpedicionNew">
                                              <span class="input-group-addon" style="background: red; color:white" id="sizing-addon2"><a class="btn btn-xs btn-default lugarExpedicionAdd" data-toggle="modal" data-target="#addNewLugExpedi"><i class="fa fa-address-card"></i></a></span>
                                              <select class="form-control" name="lugarExpedicion" id="lugarExpedicion" title="Seleccione Lugar de Expedicion CI" required>
                                                <option value="" disabled selected hidden>Seleccione Lugar de Expedición CI</option>
                                                <?php foreach ($listaLugarExpedicion as $listaLE): ?>
                                                  <?php if ($personal->IdPersona->LugarExpedicion == $listaLE->NombreLugarExpedicion): ?>
                                                    <option value="<?php echo $listaLE->IdLugarExpedicion; ?>" selected><?php echo $listaLE->NombreLugarExpedicion; ?></option>
                                                  <?php else: ?>
                                                    <option value="<?php echo $listaLE->IdLugarExpedicion; ?>"><?php echo $listaLE->NombreLugarExpedicion; ?></option>
                                                  <?php endif; ?>
                                                <?php endforeach; ?>
                                              </select>
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label>Fecha de Nacimiento</label>
                                            <div class="input-group" >
                                              <span class="input-group-addon" style="background: red; color:white" id="sizing-addon2"><i class="fa fa-calendar"></i></span>
                                              <input id="fechaNac" type="text" class="form-control datepicker" data-date-format="yyyy/mm/dd"  placeholder="Fecha de Nacimiento:  AAAA/MM/DD" aria-describedby="sizing-addon2" name="fechaNac" value=<?php echo $personal->IdPersona->FechaNacimiento ?> required>
                                            </div>
                                          </div>

                                          <div class="form-group" data-toggle="buttons">
                                            <label class="btn btn-danger"> <i class="fa fa-venus-mars"></i> Sexo: </label>
                                            <?php if ($personal->IdPersona->Sexo == 'F'): ?>
                                              <label class="btn btn-info btn-outline active focus sexo">
                                                  <input type="radio" class="sexo" name="sexo" value="F" checked><i class="fa fa-female">  Femenino</i>
                                              </label>
                                              <label class="btn btn-info btn-outline sexo">
                                                  <input type="radio" class="sexo" name="sexo" value="M"><i class="fa fa-male">  Masculino</i>
                                              </label>
                                            <?php else: ?>
                                              <label class="btn btn-info btn-outline sexo">
                                                  <input type="radio" class="sexo" name="sexo" value="F"><i class="fa fa-female">  Femenino</i>
                                              </label>
                                              <label class="btn btn-info btn-outline active focus sexo">
                                                  <input type="radio" class="sexo" name="sexo" value="M" checked><i class="fa fa-male">  Masculino</i>
                                              </label>
                                            <?php endif; ?>

                                         </div>

                                         <div class="form-group">
                                           <label>Estado Civil</label>
                                           <div class="input-group selector">
                                             <span class="input-group-addon" style="background: red; color:white" id="sizing-addon2"><i class="fa fa-handshake-o"></i></span>
                                             <select class="selectpicker form-control" name="estadoCivil" id="estadoCivil" title="Seleccionar Estado Civil" required>
                                               <?php foreach ($listaEstadoCivil as $listaEC): ?>
                                                 <?php if ($personal->IdPersona->EstadoCivil == $listaEC->NombreEstadoCivil): ?>
                                                   <option value="<?php echo $listaEC->IdEstadoCivil; ?>" selected><?php echo $listaEC->NombreEstadoCivil; ?></option>
                                                 <?php else: ?>
                                                   <option value="<?php echo $listaEC->IdEstadoCivil; ?>"><?php echo $listaEC->NombreEstadoCivil; ?></option>
                                                 <?php endif; ?>
                                               <?php endforeach; ?>
                                             </select>
                                           </div>
                                           <div class="input-group selector-mobile">
                                             <span class="input-group-addon" style="background: red; color:white" id="sizing-addon2"><i class="fa fa-handshake-o"></i></span>
                                             <select class="form-control" name="estadoCivil" id="estadoCivil" title="Seleccionar Estado Civil" required>
                                               <?php foreach ($listaEstadoCivil as $listaEC): ?>
                                                 <?php if ($personal->IdPersona->EstadoCivil == $listaEC->NombreEstadoCivil): ?>
                                                   <option value="<?php echo $listaEC->IdEstadoCivil; ?>" selected><?php echo $listaEC->NombreEstadoCivil; ?></option>
                                                 <?php else: ?>
                                                   <option value="<?php echo $listaEC->IdEstadoCivil; ?>"><?php echo $listaEC->NombreEstadoCivil; ?></option>
                                                 <?php endif; ?>
                                               <?php endforeach; ?>
                                             </select>
                                           </div>
                                         </div>

                                         <input type="hidden" name="datos" value="1">
                                         <input type="hidden" name="persona" value='<?php echo $personal->IdPersona->CI?>'>

                                         <div id="mesajePersona"></div>

                                         <div class="pull-right">
                                           <button type="submit" name="guardarPersona" id="guardarPersona" class="btn btn-primary">Guardar</button>
                                         </div>

                                         <br><br>

                                        </div>
                                        <div class="col-sm-1 col-md-2"></div>

                                      </div>

                                    </form>

                                    <div class="row">
                                      <div class="col-xs-1 col-sm-1 col-md-2"></div>
                                      <div class="col-xs-10 col-sm-10 col-md-8">
                                        <br><br>
                                        <div class="text-center">
                                          <h3>Teléfonos</h3>
                                        </div>
                                        <div class="pull-left thumbnail" id="formTelefono" style="background: rgb(136, 183, 231)">
                                          <form id="newTelefono" class="form-inline">
                                            <input type="text" id='inputPhone' name="telefono" value="" class="form-control solo-numero" required>
                                            <input type="hidden" name="idPersona" value="<?php echo $personal->IdPersona->IdPersona ?>">
                                            <button type="submit" class="btn btn-success"><i class="fa fa-check"></i></button>
                                          </form>
                                        </div>
                                        <br>
                                        <div class="pull-right">
                                          <a class="btn btn-danger" id="hideTelefono"><i class="fa fa-times"></i></a>
                                          <a class="btn btn-success" id="addTelefono"><i class="fa fa-plus"></i></a>
                                        </div>
                                        <br><br>
                                        <br>
                                        <div class="table-responsive" id='tablaRespuesta'>
                                          <table class="table table-hover table-condensed">
                                            <thead>
                                              <tr class="info">
                                                <th class="text-center">Número</th>
                                                <th class="text-center">Borrar</th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                              <?php foreach ($personal->IdPersona->ListaTelefonos as $key => $telefono): ?>
                                                <tr>
                                                  <td class="text-center"><?php echo $telefono ?></td>
                                                  <td class="text-center">
                                                    <form class="telefonoBorrar">
                                                      <input type="hidden" name="telefono" value="<?php echo $telefono ?>">
                                                      <input type="hidden" name="idPersona" value="<?php echo $personal->IdPersona->IdPersona ?>">
                                                      <button type="submit" name="borrarTelefono" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                                                    </form>
                                                  </td>
                                                </tr>
                                              <?php endforeach; ?>
                                            </tbody>
                                          </table>
                                        </div>
                                      </div>
                                      <div class="col-xs-1 col-sm-1 col-md-2"></div>
                                    </div>
                                </div>
                              </div>
                              <div class="tab-pane fade" id="Personal">
                                <div class="thumbnail">
                                  <div class="text-center">
                                    <h3>Datos generales</h3>
                                  </div>
                                  <form id="frmPersonalEditar">

                                    <div class="row">
                                      <div class="col-sm-1 col-md-2"></div>
                                      <div class="col-sm-10 col-md-8">

                                        <div class="row">

                                          <div class="col-sm-6 col-md-6">
                                            <center>
                                              <div class="imgFoto" id="editarFotoPersonal">
                                                <input id="fotoPersonal" type="file" style="opacity:0" class="form-control personalInputCtr" name="fotoPersonal">
                                              </div>
                                            </center>
                                            <h3 class="text-center"> Examinar Imágen</h3>
                                          </div>
                                          <div class="col-sm-6 col-md-6">
                                            <center>
                                              <div class="repuesta" id="repuesta" >

                                                <center>
                                                  <?php if ( $personal->Ruta): ?>
                                                    <?php
                                                      list($nada,$ruta) = explode("/wamp64/www/PersonalUAB/view/", $personal->Ruta);
                                                    ?>
                                                    <img id="repuestaFoto" src="‪<?php echo "../../../".$ruta ?>" class="img-responsive img-rounded" width="200" height="150">
                                                  <?php else: ?>
                                                    <img id="repuestaFoto" class="img-responsive img-rounded" width="200" height="150">
                                                  <?php endif; ?>
                                                </center>
                                              </div>
                                            </center>
                                          </div>

                                        </div>
                                        <div class="form-group">
                                          <label>Nacionalidad</label>
                                          <div class="input-group selector nacionalidadNew">
                                            <span class="input-group-addon" style="background: red; color:white" id="sizing-addon2"> <a class="btn btn-default btn-xs" data-toggle="modal" data-target="#addNewNacionalidad"><i class="fa fa-building"></i></a></span>
                                            <select class="selectpicker form-control personalInputCtr" name="nacionalidad" id="nacionalidad" title="Seleccione Nacionalidad" required>
                                              <?php foreach ($listaNaciones as $listaN): ?>
                                                <?php if ($personal->IdNacion == $listaN->NombreNacion): ?>
                                                  <option value="<?php echo $listaN->IdNacion; ?>" selected><?php echo $listaN->NombreNacion; ?></option>
                                                <?php else: ?>
                                                  <option value="<?php echo $listaN->IdNacion; ?>"><?php echo $listaN->NombreNacion; ?></option>
                                                <?php endif; ?>
                                              <?php endforeach; ?>
                                            </select>
                                          </div>
                                          <div class="input-group selector-mobile nacionalidadNew">
                                            <span class="input-group-addon" style="background: red; color:white" id="sizing-addon2"> <a class="btn btn-default btn-xs" data-toggle="modal" data-target="#addNewNacionalidad"><i class="fa fa-building"></i></a></span>
                                            <select class="form-control personalInputCtr" name="nacionalidad" id="nacionalidad" required>
                                              <?php foreach ($listaNaciones as $listaN): ?>
                                                <?php if ($personal->IdNacion == $listaN->NombreNacion): ?>
                                                  <option value="<?php echo $listaN->IdNacion; ?>" selected><?php echo $listaN->NombreNacion; ?></option>
                                                <?php else: ?>
                                                  <option value="<?php echo $listaN->IdNacion; ?>"><?php echo $listaN->NombreNacion; ?></option>
                                                <?php endif; ?>
                                              <?php endforeach; ?>
                                            </select>
                                          </div>
                                        </div>

                                        <div class="form-group">
                                          <label>Tipo Personal</label>
                                          <div class="input-group">
                                            <span class="input-group-addon" style="background: red; color:white" id="sizing-addon2"><i class="fa fa-linode"></i></span>
                                            <select class="selectpicker form-control personalInputCtr" name="tipoPersonal" id="tipoPersonal" title="Tipo de Personal" required>
                                              <?php foreach ($listaTipoPersonal as $listaTP): ?>
                                                <?php if ($personal->IdTipoPersonal == $listaTP->NombreTipoPersonal): ?>
                                                  <option value="<?php echo $listaTP->IdTipoPersonal; ?>" selected><?php echo $listaTP->NombreTipoPersonal; ?></option>
                                                <?php else: ?>
                                                  <option value="<?php echo $listaTP->IdTipoPersonal; ?>"><?php echo $listaTP->NombreTipoPersonal; ?></option>
                                                <?php endif; ?>
                                              <?php endforeach; ?>
                                            </select>
                                          </div>
                                        </div>

                                        <div class="form-group" id="cargoPersonalSelect">
                                          <label>Cargo</label>
                                          <div class="input-group selector">
                                            <span class="input-group-addon" style="background: red; color:white" id="sizing-addon2"><i class="fa fa-briefcase"></i></span>
                                            <select class="selectpicker form-control personalInputCtr" name="cargoPersonal" id="cargoPersonal" title="Seleccione Cargo">
                                              <?php $existe = false; foreach ($listaCargosPersona as $listaC): ?>
                                                <?php if ($personal->IdCargo == $listaC->NombreCargoPersona): ?>
                                                  <option value="<?php echo $listaC->IdCargoPersona; ?>" selected><?php echo $listaC->NombreCargoPersona; ?></option>
                                                <?php $existe = true; else: ?>
                                                  <option value="<?php echo $listaC->IdCargoPersona; ?>"><?php echo $listaC->NombreCargoPersona; ?></option>
                                                <?php endif; ?>
                                              <?php endforeach; ?>
                                              <?php if ($existe == false): ?>
                                                <option value="" selected hidden>Seleccione Cargo</option>
                                              <?php endif; ?>
                                            </select>
                                          </div>
                                          <div class="input-group selector-mobile">
                                            <span class="input-group-addon" style="background: red; color:white" id="sizing-addon2"><i class="fa fa-briefcase"></i></span>
                                            <select class="form-control personalInputCtr" name="cargoPersonal" id="cargoPersonal-mobi">
                                              <?php $existe = false; foreach ($listaCargosPersona as $listaC): ?>
                                                <?php if ($personal->IdCargo == $listaC->NombreCargoPersona): ?>
                                                  <option value="<?php echo $listaC->IdCargoPersona; ?>" selected><?php echo $listaC->NombreCargoPersona; ?></option>
                                                <?php $existe = true; else: ?>
                                                  <option value="<?php echo $listaC->IdCargoPersona; ?>"><?php echo $listaC->NombreCargoPersona; ?></option>
                                                <?php endif; ?>
                                              <?php endforeach; ?>
                                              <?php if ($existe == false): ?>
                                                <option value="" selected hidden>Seleccione Cargo</option>
                                              <?php endif; ?>
                                            </select>
                                          </div>
                                        </div>

                                        <input type="hidden" id="cargoEditarPersonal" name="cargoEditarPersonal" value="<?php echo $personal->IdCargo ?>">
                                        <input type="hidden" id="carreraEditarPersonal" name="carreraEditarPersonal" value="<?php echo $personal->IdCarrera ?>">

                                        <div class="form-group" id="carreraPersonalSelect">
                                          <label>Facultad Carrera</label>
                                          <div class="input-group selector">
                                            <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-linode"></i></span>
                                            <select class="selectpicker form-control personalInputCtr show-tick" name="carrera" id="carrera" title="Seleccione Carrera" data-container="body">
                                              <?php foreach ($listaFacultadCarrera as $listaFC): ?>
                                                <optgroup label="<?php echo $listaFC->NombreFacultad ?>">
                                                <?php foreach ($listaFC->getListaCarreras() as $listaCa): ?>
                                                  <?php if ($personal->IdCarrera == $listaCa->NombreCarrera): ?>
                                                    <option value="<?php echo $listaCa->IdCarrera; ?>"selected><?php echo $listaCa->NombreCarrera; ?></option>
                                                  <?php else: ?>
                                                    <option value="<?php echo $listaCa->IdCarrera; ?>"><?php echo $listaCa->NombreCarrera; ?></option>
                                                  <?php endif; ?>
                                                <?php endforeach; ?>
                                                </optgroup>
                                              <?php endforeach; ?>
                                            </select>
                                          </div>
                                          <div class="input-group selector-mobile">
                                            <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-linode"></i></span>
                                            <select class="form-control personalInputCtr" name="carrera" id="carrera-mobi">
                                              <option value="" selected hidden>Seleccione Carrera</option>
                                              <?php foreach ($listaFacultadCarrera as $listaFC): ?>
                                                <optgroup label="<?php echo $listaFC->NombreFacultad ?>">
                                                <?php foreach ($listaFC->getListaCarreras() as $listaCa): ?>
                                                  <?php if ($personal->IdCarrera == $listaCa->NombreCarrera): ?>
                                                    <option value="<?php echo $listaCa->IdCarrera; ?>"selected><?php echo $listaCa->NombreCarrera; ?></option>
                                                  <?php else: ?>
                                                    <option value="<?php echo $listaCa->IdCarrera; ?>"><?php echo $listaCa->NombreCarrera; ?></option>
                                                  <?php endif; ?>
                                                <?php endforeach; ?>
                                                </optgroup>
                                              <?php endforeach; ?>
                                            </select>
                                          </div>
                                        </div>

                                        <div class="form-group">
                                          <label>Dirección</label>
                                          <div class="input-group">
                                            <span class="input-group-addon" style="background: red; color:white" id="sizing-addon2"><i class="fa fa-map-marker"></i></span>
                                            <input type="text" class="form-control personalInputCtr" placeholder="Direccion: " aria-describedby="sizing-addon2" id="direccion" name="direccion" value="<?php echo $personal->Direccion ?>" required>
                                          </div>
                                        </div>

                                        <div class="form-group">
                                          <label>Correo Electrónico</label>
                                          <div class="input-group">
                                            <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-envelope"></i></span>
                                            <input type="email" class="form-control personalInputCtr" placeholder="E-mail: " aria-describedby="sizing-addon2" id="email" name="email" value=<?php echo $personal->Email ?>>
                                          </div>
                                        </div>

                                        <div class="form-group">
                                          <label>Ciudad Nacimiento </label>
                                          <div class="input-group selector ciudadNew">
                                            <span class="input-group-addon" style="background: red; color:white" id="sizing-addon2"> <a class="btn btn-default btn-xs" data-toggle="modal" data-target="#addNewCiudad" ><i class="fa fa-building"></i></a> </span>
                                            <select class="selectpicker form-control personalInputCtr" name="ciudad" id="ciudad" title="Seleccione Ciudad de Nacimiento" required>
                                              <?php foreach ($listaCiudades as $listaC): ?>
                                                <?php if ($personal->IdCiudadNacimiento == $listaC->NombreCiudad): ?>
                                                  <option value="<?php echo $listaC->IdCiudad; ?>"selected><?php echo $listaC->NombreCiudad; ?></option>
                                                <?php else: ?>
                                                  <option value="<?php echo $listaC->IdCiudad; ?>"><?php echo $listaC->NombreCiudad; ?></option>
                                                <?php endif; ?>
                                              <?php endforeach; ?>
                                            </select>
                                          </div>
                                          <div class="input-group selector-mobile ciudadNew">
                                            <span class="input-group-addon" style="background: red; color:white" id="sizing-addon2"> <a class="btn btn-default btn-xs" data-toggle="modal" data-target="#addNewCiudad" ><i class="fa fa-building"></i></a> </span>
                                            <select class="form-control personalInputCtr" name="ciudad" id="ciudad" required>
                                              <?php foreach ($listaCiudades as $listaC): ?>
                                                <?php if ($personal->IdCiudadNacimiento == $listaC->NombreCiudad): ?>
                                                  <option value="<?php echo $listaC->IdCiudad; ?>"selected><?php echo $listaC->NombreCiudad; ?></option>
                                                <?php else: ?>
                                                  <option value="<?php echo $listaC->IdCiudad; ?>"><?php echo $listaC->NombreCiudad; ?></option>
                                                <?php endif; ?>
                                              <?php endforeach; ?>
                                            </select>
                                          </div>
                                        </div>

                                        <div class="form-group">
                                          <label>Religión</label>
                                          <div class="input-group selector religionNew">
                                            <span class="input-group-addon" id="sizing-addon2"> <a class="btn btn-default btn-xs" data-toggle="modal" data-target="#addNewReligion"><i class="fa fa-cube"></i></a></span>
                                            <select class="selectpicker form-control personalInputCtr" name="religion" id="religion" title="Seleccione Religion">
                                              <?php foreach ($listaReligion as $listaR): ?>
                                                <?php if ($personal->IdReligion == $listaR->NombreReligion): ?>
                                                  <option value="<?php echo $listaR->IdReligion; ?>" selected><?php echo $listaR->NombreReligion; ?></option>
                                                <?php else: ?>
                                                  <option value="<?php echo $listaR->IdReligion; ?>"><?php echo $listaR->NombreReligion; ?></option>
                                                <?php endif; ?>
                                              <?php endforeach; ?>
                                            </select>
                                          </div>
                                          <div class="input-group selector-mobile religionNew">
                                            <span class="input-group-addon" id="sizing-addon2"> <a class="btn btn-default btn-xs" data-toggle="modal" data-target="#addNewReligion"><i class="fa fa-cube"></i></a></span>
                                            <select class="form-control personalInputCtr" name="religion" id="religion">
                                              <?php foreach ($listaReligion as $listaR): ?>
                                                <?php if ($personal->IdReligion == $listaR->NombreReligion): ?>
                                                  <option value="<?php echo $listaR->IdReligion; ?>" selected><?php echo $listaR->NombreReligion; ?></option>
                                                <?php else: ?>
                                                  <option value="<?php echo $listaR->IdReligion; ?>"><?php echo $listaR->NombreReligion; ?></option>
                                                <?php endif; ?>
                                              <?php endforeach; ?>
                                            </select>
                                          </div>
                                        </div>

                                        <div class="form-group">
                                          <label>Fecha de Bautismo</label>
                                          <div class="input-group" >
                                            <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-calendar"></i></span>
                                            <input id="fechaBau" type="text" class="form-control personalInputCtr datepicker" data-date-format="yyyy/mm/dd" placeholder="Fecha de Bautizmo:  AAAA/MM/DD" aria-describedby="sizing-addon2" name="fechaBau" value=<?php echo $personal->FechaBautizmo ?>>
                                          </div>
                                        </div>

                                        <div class="form-group">
                                          <label>Seguro: Empresa aseguradora de salud</label>
                                          <div class="input-group selector seguroNew">
                                            <span class="input-group-addon" id="sizing-addon2"> <a class="btn btn-default btn-xs" data-toggle="modal" data-target="#addNewSeguro"><i class="fa fa-cube"></i></a> </span>
                                            <select class="selectpicker form-control personalInputCtr" name="seguro" id="seguro" title="Seleccione Empresa Aseguradora">
                                              <?php foreach ($listaSeguros as $listaS): ?>
                                                <?php if ($personal->IdSeguro == $listaS->NombreSeguro): ?>
                                                  <option value="<?php echo $listaS->IdSeguro; ?>"selected><?php echo $listaS->NombreSeguro; ?></option>
                                                <?php else: ?>
                                                  <option value="<?php echo $listaS->IdSeguro; ?>"><?php echo $listaS->NombreSeguro; ?></option>
                                                <?php endif; ?>
                                              <?php endforeach; ?>
                                            </select>
                                          </div>
                                          <div class="input-group selector-mobile seguroNew">
                                            <span class="input-group-addon" id="sizing-addon2"> <a class="btn btn-default btn-xs" data-toggle="modal" data-target="#addNewSeguro"><i class="fa fa-cube"></i></a> </span>
                                            <select class="form-control personalInputCtr" name="seguro" id="seguro">
                                              <?php foreach ($listaSeguros as $listaS): ?>
                                                <?php if ($personal->IdSeguro == $listaS->NombreSeguro): ?>
                                                  <option value="<?php echo $listaS->IdSeguro; ?>"selected><?php echo $listaS->NombreSeguro; ?></option>
                                                <?php else: ?>
                                                  <option value="<?php echo $listaS->IdSeguro; ?>"><?php echo $listaS->NombreSeguro; ?></option>
                                                <?php endif; ?>
                                              <?php endforeach; ?>
                                            </select>
                                          </div>
                                        </div>

                                        <div class="form-group">
                                          <label>Número de Seguro</label>
                                          <div class="input-group" >
                                            <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-sort-numeric-asc"></i></span>
                                            <input id="numSeguro" type="text" class="form-control personalInputCtr solo-numero" placeholder="Numero de Seguro" name="numSeguro" value=<?php echo $personal->NumeroSeguro ?>>
                                          </div>
                                        </div>

                                        <div class="form-group">
                                          <label>AFP</label>
                                          <div class="input-group selector afpNew">
                                            <span class="input-group-addon" id="sizing-addon2"> <a class="btn btn-default btn-xs" data-toggle="modal" data-target="#addNewAfp"><i class="fa fa-cube"></i></a> </span>
                                            <select class="selectpicker form-control personalInputCtr" name="afp" id="afp" title="Seleccione AFP">
                                              <?php foreach ($listaAfps as $listaA): ?>
                                                <?php if ($personal->IdAfp == $listaA->NombreAfp): ?>
                                                  <option value="<?php echo $listaA->IdAfp; ?>"selected><?php echo $listaA->NombreAfp; ?></option>
                                                <?php else: ?>
                                                  <option value="<?php echo $listaA->IdAfp; ?>"><?php echo $listaA->NombreAfp; ?></option>
                                                <?php endif; ?>
                                              <?php endforeach; ?>
                                            </select>
                                          </div>
                                          <div class="input-group selector-mobile afpNew">
                                            <span class="input-group-addon" id="sizing-addon2"> <a class="btn btn-default btn-xs" data-toggle="modal" data-target="#addNewAfp"><i class="fa fa-cube"></i></a> </span>
                                            <select class="form-control personalInputCtr" name="afp" id="afp">
                                              <?php foreach ($listaAfps as $listaA): ?>
                                                <?php if ($personal->IdAfp == $listaA->NombreAfp): ?>
                                                  <option value="<?php echo $listaA->IdAfp; ?>"selected><?php echo $listaA->NombreAfp; ?></option>
                                                <?php else: ?>
                                                  <option value="<?php echo $listaA->IdAfp; ?>"><?php echo $listaA->NombreAfp; ?></option>
                                                <?php endif; ?>
                                              <?php endforeach; ?>
                                            </select>
                                          </div>
                                        </div>

                                        <div class="form-group">
                                          <label>Número de AFP</label>
                                          <div class="input-group" >
                                            <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-sort-numeric-asc"></i></span>
                                            <input id="numAfp" type="text" class="form-control personalInputCtr solo-numero" placeholder="Numero de AFP" name="numAfp" value=<?php echo $personal->NumeroAfp ?>>
                                          </div>
                                        </div>

                                        <div class="form-group">
                                          <label>Número de Libreta Militar</label>
                                          <div class="input-group" >
                                            <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-sort-numeric-asc"></i></span>
                                            <input id="numLibMilitar" type="text" class="form-control personalInputCtr solo-numero" placeholder="Numero de Libreta Familiar" name="numLibMilitar" value=<?php echo $personal->NumeroLibretaMilitar ?>>
                                          </div>
                                        </div>

                                        <div class="form-group">
                                          <label>Número de Pasaporte</label>
                                          <div class="input-group" >
                                            <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-sort-numeric-asc"></i></span>
                                            <input id="numPasaporte" type="text" class="form-control personalInputCtr" placeholder="Numero de Pasaporte" name="numPasaporte" value=<?php echo $personal->NumeroPasaporte ?>>
                                          </div>
                                        </div>

                                        <div class="form-group">
                                          <label>Tipo Sangre</label>
                                          <div class="input-group" >
                                            <span class="input-group-addon" style="background: red; color:white" id="sizing-addon2"><i class="fa fa-tumblr-square"></i></span>
                                            <select class="selectpicker form-control personalInputCtr" name="tipoSangre" id="tipoSangre" title="Tipo de Sangre" required>
                                              <?php if ($personal->TipoSangre == "ORH+"): ?>
                                                <option value="ORH+"selected>O+</option>
                                              <?php else: ?>
                                                <option value="ORH+">O+</option>
                                              <?php endif; ?>
                                              <?php if ($personal->TipoSangre == "ORH-"): ?>
                                                <option value="ORH-"selected>O-</option>
                                              <?php else: ?>
                                                <option value="ORH-">O-</option>
                                              <?php endif; ?>
                                              <?php if ($personal->TipoSangre == "AB+"): ?>
                                                <option value="AB+"selected>AB+</option>
                                              <?php else: ?>
                                                <option value="AB+">AB+</option>
                                              <?php endif; ?>
                                              <?php if ($personal->TipoSangre == "AB-"): ?>
                                                <option value="AB-"selected>AB-</option>
                                              <?php else: ?>
                                                <option value="AB-">AB-</option>
                                              <?php endif; ?>
                                              <?php if ($personal->TipoSangre == "A+"): ?>
                                                <option value="A+"selected>A+</option>
                                              <?php else: ?>
                                                <option value="A+">A+</option>
                                              <?php endif; ?>
                                              <?php if ($personal->TipoSangre == "A-"): ?>
                                                <option value="A-"selected>A-</option>
                                              <?php else: ?>
                                                <option value="A-">A-</option>
                                              <?php endif; ?>
                                              <?php if ($personal->TipoSangre == "B+"): ?>
                                                <option value="B+"selected>B+</option>
                                              <?php else: ?>
                                                <option value="B+">B+</option>
                                              <?php endif; ?>
                                              <?php if ($personal->TipoSangre == "B-"): ?>
                                                <option value="B-"selected>B-</option>
                                              <?php else: ?>
                                                <option value="B-">B-</option>
                                              <?php endif; ?>
                                            </select>
                                          </div>
                                        </div>

                                        <div class="form-group">
                                          <label>Hobby</label>
                                          <div class="input-group" >
                                            <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-cube"></i></span>
                                            <input id="hobby" type="text" class="form-control personalInputCtr" placeholder="Hobby:" name="hobby" value="<?php echo $personal->Hobby ?>">
                                          </div>
                                        </div>

                                        <div class="form-group">
                                          <label>Número de registro profesional</label>
                                          <div class="input-group" >
                                            <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-sort-numeric-asc"></i></span>
                                            <input id="numeroRegProfesional" type="text" class="form-control personalInputCtr" placeholder="Numero de Registro Profesional:" name="numeroRegProfesional" value="<?php echo $personal->NumeroRegistroProfesional ?>">
                                          </div>
                                        </div>

                                        <div class="form-group">
                                          <label>Lectura Preferencial</label>
                                          <div class="input-group" >
                                            <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-cube"></i></span>
                                            <textarea name="lecturaP" style="resize:none;" id="lecturaP" class="form-control personalInputCtr" placeholder="Lectura Preferencial:" rows="3" cols="100"><?php echo $personal->LecturaPreferencial ?></textarea>
                                          </div>
                                        </div>

                                        <div class="form-group">
                                          <label>Fecha de Ingreso UAB</label>
                                          <div class="input-group" >
                                            <span class="input-group-addon" style="background: red; color:white" id="sizing-addon2"><i class="fa fa-calendar"></i></span>
                                            <input id="fechaIngres" type="text" class="form-control personalInputCtr datepicker" data-date-format="yyyy/mm/dd" placeholder="Fecha de Ingreso UAB:  AAAA/MM/DD" name="fechaIngres" value="<?php echo $personal->FechaIngreso ?>" required>
                                          </div>
                                        </div>

                                        <div class="row">
                                          <div class="col-xs-12 col-sm-12 col-md-4">
                                            <div class="form-group">
                                              <label>Cargos/Roles</label>
                                              <div class="input-group">
                                                <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-briefcase"></i></span>
                                                <select class="selectpicker form-control personalInputCtr" data-width="150px" multiple name="cargos[]" id="cargos">
                                                  <?php foreach ($listaCargos as $listaC):
                                                    $existe = false;
                                                     foreach ($personal->ListaCargos as $cargo):
                                                       if ($cargo->NombreCargo == $listaC->NombreCargo):
                                                         $existe = true; break;
                                                       else:
                                                         $existe = false;
                                                        endif;
                                                      endforeach;
                                                      if ($existe == true): ?>
                                                      <option value="<?php echo $listaC->IdCargo; ?>"selected><?php echo $listaC->NombreCargo; ?></option>
                                                    <?php else: ?>
                                                      <option value="<?php echo $listaC->IdCargo; ?>"><?php echo $listaC->NombreCargo; ?></option>
                                                    <?php endif; ?>
                                                  <?php endforeach; ?>
                                                </select>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="col-xs-12 col-sm-12 col-md-4">
                                            <div class="form-group">
                                              <label>Alergias / Enfermedades</label>
                                              <div class="input-group enfermedadNew">
                                                <span class="input-group-addon" id="sizing-addon2"> <a class="btn btn-default btn-xs" data-toggle="modal" data-target="#addNewEnfermedad" ><i class="fa fa-medkit"></i></a> </span>
                                                <select class="selectpicker form-control personalInputCtr" data-width="150px" multiple name="enfermedades[]" id="enfermedades">
                                                  <?php foreach ($listaEnfermedades as $listaE):
                                                    $existe = false;
                                                     foreach ($personal->ListaEnfermedades as $enfermedad):
                                                       if ($enfermedad->NombreEnfermedad == $listaE->NombreEnfermedad):
                                                         $existe = true; break;
                                                       else:
                                                         $existe = false;
                                                        endif;
                                                      endforeach;
                                                      if ($existe == true): ?>
                                                      <option value="<?php echo $listaE->IdEnfermedad; ?>"selected><?php echo $listaE->NombreEnfermedad; ?></option>
                                                    <?php else: ?>
                                                      <option value="<?php echo $listaE->IdEnfermedad; ?>"><?php echo $listaE->NombreEnfermedad; ?></option>
                                                    <?php endif; ?>
                                                  <?php endforeach; ?>
                                                </select>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="col-xs-12 col-sm-12 col-md-4">
                                            <div class="form-group">
                                              <label>Deportes</label>
                                              <div class="input-group deporteNew">
                                                <span class="input-group-addon" id="sizing-addon2"> <a class="btn btn-default btn-xs" data-toggle="modal" data-target="#addNewDeporte" ><i class="fa fa-star"></i></a></span>
                                                <select class="selectpicker form-control personalInputCtr" data-width="150px" multiple name="deportes[]" id="deportes">
                                                  <?php foreach ($listaDeportes as $listaD):
                                                    $existe = false;
                                                     foreach ($personal->ListaDeportes as $deporte):
                                                       if ($deporte->NombreDeporte == $listaD->NombreDeporte):
                                                         $existe = true; break;
                                                       else:
                                                         $existe = false;
                                                        endif;
                                                      endforeach;
                                                      if ($existe == true): ?>
                                                      <option value="<?php echo $listaD->IdDeporte; ?>"selected><?php echo $listaD->NombreDeporte; ?></option>
                                                    <?php else: ?>
                                                      <option value="<?php echo $listaD->IdDeporte; ?>"><?php echo $listaD->NombreDeporte; ?></option>
                                                    <?php endif; ?>
                                                  <?php endforeach; ?>
                                                </select>
                                              </div>
                                            </div>
                                          </div>
                                        </div>

                                        <input type="hidden" name="datos" value="1">
                                        <input type="hidden" name="ciPersona" value="<?php echo $personal->IdPersona->CI ?>" >
                                        <input type="hidden" name="idPersona" value="<?php echo $personal->IdPersona->IdPersona ?>" >
                                        <input type="hidden" name="imagenPersonal" value="<?php echo $personal->Ruta ?>" >
                                        <input type="hidden" name="idPersonal" value="<?php echo $personal->IdPersonal ?>" >

                                        <div id="mensajePersonal"></div>

                                        <div class="pull-right">
                                          <button type="submit" name="guardar" class="btn btn-primary">Guardar</button>
                                        </div>

                                        <br><br>

                                      </div>
                                      <div class="col-sm-1 col-md-2"></div>
                                    </div>

                                  </form>

                                </div>
                              </div>
                              <div class="tab-pane fade" id="Familiares">
                                <div class="thumbnail">

                                  <div class="row">
                                    <div class="col-sm-1 col-md-2"></div>
                                    <div class="col-sm-10 col-md-8">

                                      <?php if ($personal->C_Conyugue->FechaMatrimonio): ?>
                                        <form id="frmPersonalConyugueEditar">

                                          <div class="ibox float-e-margins" >
                                            <div class="ibox-title" id="conyugueTittle">
                                                <h5>Conyugue</h5>
                                                <div class="ibox-tools">
                                                    <a class="collapse-link" id="conyugueContent">
                                                        <i class="fa fa-chevron-up"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="ibox-content into-panel">

                                              <div class="row">
                                                <div class="col-xs-12 col-sm-12 col-md-6">
                                                  <div class="form-group">
                                                    <label>Primer Nombre</label>
                                                    <div class="input-group">
                                                      <span class="input-group-addon" style="background: red; color:white" id="sizing-addon2"><i class="fa fa-user"></i></span>
                                                      <input id="primerNombreCon" type="text" class="form-control personaConyugueBk solo-letra" placeholder="Primer Nombre: " aria-describedby="sizing-addon2" name="primerNombreCon" value="<?php echo $personal->C_Conyugue->IdPersona->PrimerNombre ?>" required>
                                                    </div>
                                                  </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-12 col-md-6">
                                                  <div class="form-group">
                                                    <label>Segundo Nombre</label>
                                                    <div class="input-group">
                                                      <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-user"></i></span>
                                                      <input id="segundoNombreCon" type="text" class="form-control personaConyugueBk solo-letra" placeholder="Segundo Nombre: " aria-describedby="sizing-addon2" name="segundoNombreCon" value="<?php echo $personal->C_Conyugue->IdPersona->SegundoNombre ?>">
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
                                                      <input id="apellidoPaternoCon" type="text" class="form-control personaConyugueBk solo-letra" placeholder="Apellido Paterno: " aria-describedby="sizing-addon2" name="apellidoPaternoCon" required value="<?php echo $personal->C_Conyugue->IdPersona->ApellidoPaterno ?>">
                                                    </div>
                                                  </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-12 col-md-6">
                                                  <div class="form-group">
                                                    <label>Apellido Materno</label>
                                                    <div class="input-group">
                                                      <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-user"></i></span>
                                                      <input id="apellidoMaternoCon" type="text" class="form-control personaConyugueBk solo-letra" placeholder="Apellido Materno: " aria-describedby="sizing-addon2" name="apellidoMaternoCon" value="<?php echo $personal->C_Conyugue->IdPersona->ApellidoMaterno ?>">
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>

                                              <div class="row">
                                                <div class="col-xs-12 col-sm-12 col-md-6">
                                                  <div class="form-group">
                                                    <label>Fecha de Nacimiento</label>
                                                    <div class="input-group" >
                                                      <span class="input-group-addon" style="background: red; color:white" id="sizing-addon2"><i class="fa fa-calendar"></i></span>
                                                      <input id="fechaNacimientoCon" type="text" class="form-control personaConyugueBk datepicker" data-date-format="yyyy/mm/dd" placeholder="Fecha de Nacimiento:  AAAA/MM/DD" name="fechaNacimientoCon" value="<?php echo $personal->C_Conyugue->IdPersona->FechaNacimiento ?>" required>
                                                    </div>
                                                  </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-12 col-md-6">
                                                  <div class="form-group">
                                                    <label>Fecha de Matrimanio</label>
                                                    <div class="input-group" >
                                                      <span class="input-group-addon" style="background: red; color:white" id="sizing-addon2"><i class="fa fa-calendar"></i></span>
                                                      <input id="fechaBautizmoCon" type="text" class="form-control personaConyugueBk datepicker" data-date-format="yyyy/mm/dd" placeholder="Fecha de Matrimonio:  AAAA/MM/DD" name="fechaBautizmoCon" value="<?php echo $personal->C_Conyugue->FechaMatrimonio ?>" required>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>

                                             <div id="mensajeFrmCon"></div><br><br>

                                             <input type="hidden" name="datos" value="1">
                                             <input type="hidden" name="idPersonConyu" value="<?php echo $personal->C_Conyugue->IdPersona->IdPersona ?>">
                                             <input type="hidden" name="idConyugue" value="<?php echo $personal->C_Conyugue->IdConyuguePersonal ?>">
                                             <input type="hidden" name="idPersonal" value="<?php echo $personal->IdPersonal ?>">
                                             <input type="hidden" name="ciPersonConyu" id="ciPersonConyu" value="1">

                                             <div class="pull-right">
                                               <button type="submit" name="guardar" class="btn btn-primary">Grabar</button>
                                             </div>

                                             <br><br>

                                            </div>
                                          </div>


                                        </form>

                                      <?php else: ?>
                                        <form id="frmPersonalConyugue">

                                          <div class="ibox float-e-margins" >
                                            <div class="ibox-title" id="conyugueTittle">
                                                <h5>Cónyugue</h5>
                                                <div class="ibox-tools">
                                                    <a class="collapse-link" id="conyugueContent">
                                                        <i class="fa fa-chevron-up"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="ibox-content into-panel">

                                              <div class="row">
                                                <div class="col-xs-12 col-sm-12 col-md-6">
                                                  <div class="form-group">
                                                    <label>Primer Nombre</label>
                                                    <div class="input-group">
                                                      <span class="input-group-addon" style="background: red; color:white" id="sizing-addon2"><i class="fa fa-user"></i></span>
                                                      <input id="primerNombreCon" type="text" class="form-control personaConyugueBk solo-letra" placeholder="Primer Nombre: " aria-describedby="sizing-addon2" name="primerNombreCon" required>
                                                    </div>
                                                  </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-12 col-md-6">
                                                  <div class="form-group">
                                                    <label>Segundo Nombre</label>
                                                    <div class="input-group">
                                                      <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-user"></i></span>
                                                      <input id="segundoNombreCon" type="text" class="form-control personaConyugueBk solo-letra" placeholder="Segundo Nombre: " aria-describedby="sizing-addon2" name="segundoNombreCon">
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
                                                      <input id="apellidoPaternoCon" type="text" class="form-control personaConyugueBk solo-letra" placeholder="Apellido Paterno: " aria-describedby="sizing-addon2" name="apellidoPaternoCon" required>
                                                    </div>
                                                  </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-12 col-md-6">
                                                  <div class="form-group">
                                                    <label>Apellido Materno</label>
                                                    <div class="input-group">
                                                      <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-user"></i></span>
                                                      <input id="apellidoMaternoCon" type="text" class="form-control personaConyugueBk solo-letra" placeholder="Apellido Materno: " aria-describedby="sizing-addon2" name="apellidoMaternoCon">
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>

                                              <div class="row">
                                                <div class="col-xs-12 col-sm-12 col-md-6">
                                                  <div class="form-group">
                                                    <label>Fecha de Nacimiento</label>
                                                    <div class="input-group" >
                                                      <span class="input-group-addon" style="background: red; color:white" id="sizing-addon2"><i class="fa fa-calendar"></i></span>
                                                      <input id="fechaNacimientoCon" type="text" class="form-control personaConyugueBk datepicker" data-date-format="yyyy/mm/dd" placeholder="Fecha de Nacimiento:  AAAA/MM/DD" name="fechaNacimientoCon" required>
                                                    </div>
                                                  </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-12 col-md-6">
                                                  <div class="form-group">
                                                    <label>Fecha de Matrimanio</label>
                                                    <div class="input-group" >
                                                      <span class="input-group-addon" style="background: red; color:white" id="sizing-addon2"><i class="fa fa-calendar"></i></span>
                                                      <input id="fechaBautizmoCon" type="text" class="form-control personaConyugueBk datepicker" data-date-format="yyyy/mm/dd" placeholder="Fecha de Matrimonio:  AAAA/MM/DD" name="fechaBautizmoCon" required>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>

                                             <div id="mensajeFrmCon"></div><br><br>

                                             <input type="hidden" name="datos" value="1">
                                             <input type="hidden" name="ciPersonConyu" id="ciPersonConyu" value="1">

                                             <div class="pull-right">
                                               <button type="submit" name="guardar" class="btn btn-primary">Grabar</button>
                                             </div>

                                             <br><br>

                                            </div>
                                          </div>


                                        </form>
                                      <?php endif; ?>


                                      <form id="frmPersonalHijos">

                                        <div class="ibox float-e-margins" >
                                          <div class="ibox-title" id="hijosTittle">
                                              <h5>Hijos</h5>
                                              <div class="ibox-tools">
                                                  <a class="collapse-link" id="hijosContent">
                                                      <i class="fa fa-chevron-up"></i>
                                                  </a>
                                              </div>

                                          </div>
                                          <div class="ibox-content into-panel">

                                            <div class="row">
                                              <div class="col-xs-12 col-sm-12 col-md-6">
                                                <div class="form-group">
                                                  <label>Primer Nombre</label>
                                                  <div class="input-group">
                                                    <span class="input-group-addon" style="background: red; color:white" id="sizing-addon2"><i class="fa fa-user"></i></span>
                                                    <input id="primerNombreHij" type="text" class="form-control inputHijoBk solo-letra" placeholder="Primer Nombre: " aria-describedby="sizing-addon2" name="primerNombreHij" required>
                                                  </div>
                                                </div>
                                              </div>
                                              <div class="col-xs-12 col-sm-12 col-md-6">
                                                <div class="form-group">
                                                  <label>Segundo Nombre</label>
                                                  <div class="input-group">
                                                    <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-user"></i></span>
                                                    <input id="segundoNombreHij" type="text" class="form-control inputHijoBk solo-letra" placeholder="Segundo Nombre: " aria-describedby="sizing-addon2" name="segundoNombreHij">
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
                                                    <input id="apellidoPaternoHij" type="text" class="form-control inputHijoBk solo-letra" placeholder="Apellido Paterno: " aria-describedby="sizing-addon2" name="apellidoPaternoHij" required>
                                                  </div>
                                                </div>
                                              </div>
                                              <div class="col-xs-12 col-sm-12 col-md-6">
                                                <div class="form-group">
                                                  <label>Apellido Materno</label>
                                                  <div class="input-group">
                                                    <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-user"></i></span>
                                                    <input id="apellidoMaternoHij" type="text" class="form-control inputHijoBk solo-letra" placeholder="Apellido Materno: " aria-describedby="sizing-addon2" name="apellidoMaternoHij">
                                                  </div>
                                                </div>
                                              </div>
                                            </div>

                                            <div class="form-group">
                                              <label>Fecha de Nacimiento</label>
                                              <div class="input-group" >
                                                <span class="input-group-addon" style="background: red; color:white" id="sizing-addon2"><i class="fa fa-calendar"></i></span>
                                                <input id="fechaNacimientoHij" type="text" class="form-control inputHijoBk datepicker" data-date-format="yyyy/mm/dd" placeholder="Fecha de Nacimiento:  AAAA/MM/DD" aria-describedby="sizing-addon2" name="fechaNacimientoHij" required>
                                              </div>
                                            </div>

                                            <div id="mensajeFrmHijo">
                                              <div class="table-responsive">
                                                <table class="table table-hover table-bordered">
                                                  <thead>
                                                    <tr>
                                                      <td>Nombres</td>
                                                      <td>Apellidos</td>
                                                      <td>Fecha Nacimiento</td>
                                                    </tr>
                                                  </thead>
                                                  <tbody>
                                                    <?php foreach ($personal->C_HijosLista as $hijo): ?>
                                                      <tr style="cursor:pointer" class="dataHijo" data-toggle="modal" data-target="#editarHijo">
                                                        <td><?php echo "{$hijo->IdPersona->PrimerNombre} {$hijo->IdPersona->SegundoNombre}" ?></td>
                                                        <td><?php echo "{$hijo->IdPersona->ApellidoPaterno} {$hijo->IdPersona->ApellidoMaterno}" ?></td>
                                                        <td><?php echo "{$hijo->IdPersona->FechaNacimiento}" ?></td>
                                                        <input class="idPersona" type="hidden" name="idPersona" value="<?php echo $hijo->IdPersona->IdPersona ?>">
                                                        <input class="idPersona" type="hidden" name="primerNombre" value="<?php echo $hijo->IdPersona->PrimerNombre ?>">
                                                        <input class="idPersona" type="hidden" name="segundoNombre" value="<?php echo $hijo->IdPersona->SegundoNombre ?>">
                                                        <input class="idPersona" type="hidden" name="apellidoPaterno" value="<?php echo $hijo->IdPersona->ApellidoPaterno ?>">
                                                        <input class="idPersona" type="hidden" name="apellidoMaterno" value="<?php echo $hijo->IdPersona->ApellidoMaterno ?>">
                                                        <input class="idPersona" type="hidden" name="fechaNacimiento" value="<?php echo $hijo->IdPersona->FechaNacimiento ?>">
                                                      </tr>
                                                    <?php endforeach; ?>
                                                  </tbody>
                                                </table>
                                              </div>
                                            </div><br><br>

                                            <input type="hidden" name="datos" value="1">
                                            <input type="hidden" name="ciPersonHijo" id="ciPersonHijo" value="1">

                                           <div class="pull-right">
                                             <button type="submit" name="guardar" class="btn btn-primary">Grabar</button>
                                           </div>
                                           <a class="btn btn-warning" id="nuevoHijoPers">Nuevo Hijo (a)</a>

                                           <a class="btn btn-success" id="allhijos">Listo</a>

                                          </div>
                                        </div>


                                      </form>

                                      <?php if (($personal->C_Referencia->IdPersona->ListaTelefonos)): ?>
                                        <form id="frmPersonalReferenciaEditar">

                                          <div class="ibox float-e-margins" >
                                            <div class="ibox-title" id="referenciaTittle">
                                                <h5>Referencia en caso de Emergencia</h5>
                                                <div class="ibox-tools">
                                                    <a class="collapse-link" id="referenciaContent">
                                                        <i class="fa fa-chevron-up"></i>
                                                    </a>
                                                </div>

                                            </div>
                                            <div class="ibox-content into-panel">

                                              <div class="row">
                                                <div class="col-xs-12 col-sm-12 col-md-6">
                                                  <div class="form-group">
                                                    <label>Primer Nombre</label>
                                                    <div class="input-group">
                                                      <span class="input-group-addon" style="background: red; color:white" id="sizing-addon2"><i class="fa fa-user"></i></span>
                                                      <input id="primerNombreRef" type="text" class="form-control inputReferBk solo-letra" placeholder="Primer Nombre: " aria-describedby="sizing-addon2" name="primerNombreRef" value="<?php echo $personal->C_Referencia->IdPersona->PrimerNombre ?>" required>
                                                    </div>
                                                  </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-12 col-md-6">
                                                  <div class="form-group">
                                                    <label>Segundo Nombre</label>
                                                    <div class="input-group">
                                                      <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-user"></i></span>
                                                      <input id="segundoNombreRef" type="text" class="form-control inputReferBk solo-letra" placeholder="Segundo Nombre: " aria-describedby="sizing-addon2" name="segundoNombreRef" value="<?php echo $personal->C_Referencia->IdPersona->SegundoNombre ?>">
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
                                                      <input id="apellidoPaternoRef" type="text" class="form-control inputReferBk solo-letra" placeholder="Apellido Paterno: " aria-describedby="sizing-addon2" name="apellidoPaternoRef" value="<?php echo $personal->C_Referencia->IdPersona->ApellidoPaterno ?>" required>
                                                    </div>
                                                  </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-12 col-md-6">
                                                  <div class="form-group">
                                                    <label>Apellido Materno</label>
                                                    <div class="input-group">
                                                      <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-user"></i></span>
                                                      <input id="apellidoMaternoRef" type="text" class="form-control inputReferBk solo-letra" placeholder="Apellido Materno: " aria-describedby="sizing-addon2" name="apellidoMaternoRef" value="<?php echo $personal->C_Referencia->IdPersona->ApellidoMaterno ?>">
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>

                                             <div class="form-group">
                                               <label>Teléfono</label>
                                               <div class="input-group">
                                                 <span class="input-group-addon" style="background: red; color:white" id="sizing-addon2"><i class="fa fa-phone"></i></span>
                                                 <?php if ($personal->C_Referencia->IdPersona->ListaTelefonos): ?>
                                                   <input id="telefonoReferencia" type="text" class="form-control inputReferBk solo-numero" placeholder="Telefono: " aria-describedby="sizing-addon2" name="telefonoReferencia" value='<?php echo $personal->C_Referencia->IdPersona->ListaTelefonos[0]; ?>' required>
                                                 <?php else: ?>
                                                   <input id="telefonoReferencia" type="text" class="form-control inputReferBk solo-numero" placeholder="Telefono: " aria-describedby="sizing-addon2" name="telefonoReferencia" value='' required>
                                                 <?php endif; ?>
                                               </div>
                                             </div>

                                             <div id="mensajeFrmReferencia"></div><br><br>

                                             <input type="hidden" name="datos" value="1">
                                             <input type="hidden" name="idPersona" value="<?php echo $personal->C_Referencia->IdPersona->IdPersona ?>">
                                             <input type="hidden" name="telefonoAntiguo" value="<?php echo $personal->C_Referencia->IdPersona->ListaTelefonos[0]; ?>">
                                             <input type="hidden" name="ciPersonReferencia" id="ciPersonReferencia" value="1">

                                             <div class="pull-right">
                                               <button type="submit" name="guardar" class="btn btn-primary">Grabar</button>
                                             </div>

                                             <br><br>

                                            </div>
                                          </div>


                                        </form>


                                      <?php else: ?>
                                        <form id="frmPersonalReferencia">

                                          <div class="ibox float-e-margins" >
                                            <div class="ibox-title" id="referenciaTittle">
                                                <h5>Referencia en caso de Emergencia</h5>
                                                <div class="ibox-tools">
                                                    <a class="collapse-link" id="referenciaContent">
                                                        <i class="fa fa-chevron-up"></i>
                                                    </a>
                                                </div>

                                            </div>
                                            <div class="ibox-content into-panel">

                                              <div class="row">
                                                <div class="col-xs-12 col-sm-12 col-md-6">
                                                  <div class="form-group">
                                                    <label>Primer Nombre</label>
                                                    <div class="input-group">
                                                      <span class="input-group-addon" style="background: red; color:white" id="sizing-addon2"><i class="fa fa-user"></i></span>
                                                      <input id="primerNombreRef" type="text" class="form-control inputReferBk solo-letra" placeholder="Primer Nombre: " aria-describedby="sizing-addon2" name="primerNombreRef" required>
                                                    </div>
                                                  </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-12 col-md-6">
                                                  <div class="form-group">
                                                    <label>Segundo Nombre</label>
                                                    <div class="input-group">
                                                      <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-user"></i></span>
                                                      <input id="segundoNombreRef" type="text" class="form-control inputReferBk solo-letra" placeholder="Segundo Nombre: " aria-describedby="sizing-addon2" name="segundoNombreRef">
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
                                                      <input id="apellidoPaternoRef" type="text" class="form-control inputReferBk solo-letra" placeholder="Apellido Paterno: " aria-describedby="sizing-addon2" name="apellidoPaternoRef" required>
                                                    </div>
                                                  </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-12 col-md-6">
                                                  <div class="form-group">
                                                    <label>Apellido Materno</label>
                                                    <div class="input-group">
                                                      <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-user"></i></span>
                                                      <input id="apellidoMaternoRef" type="text" class="form-control inputReferBk solo-letra" placeholder="Apellido Materno: " aria-describedby="sizing-addon2" name="apellidoMaternoRef">
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>

                                             <div class="form-group">
                                               <label>Telefono</label>
                                               <div class="input-group">
                                                 <span class="input-group-addon" style="background: red; color:white" id="sizing-addon2"><i class="fa fa-phone"></i></span>
                                                 <input id="telefonoReferencia" type="text" class="form-control inputReferBk solo-numero" placeholder="Telefono: " aria-describedby="sizing-addon2" name="telefonoReferencia" required>
                                               </div>
                                             </div>

                                             <div id="mensajeFrmReferencia"></div><br><br>

                                             <input type="hidden" name="datos" value="1">
                                             <input type="hidden" name="ciPersonReferencia" id="ciPersonReferencia" value="1">

                                             <div class="pull-right">
                                               <button type="submit" name="guardar" class="btn btn-primary">Grabar</button>
                                             </div>

                                             <br><br>

                                            </div>
                                          </div>


                                        </form>


                                      <?php endif; ?>


                                    </div>
                                    <div class="col-sm-1 col-md-2"></div>
                                  </div>

                                </div>
                              </div>
                              <div class="tab-pane fade" id="HojaVida">
                                <div class="thumbnail"  style="background: rgb(222, 224, 226)">

                                  <div class="panel with-nav-tabs panel-primary">
                                    <div class="panel-heading" >
                                      <ul class="nav nav-tabs" >
                                          <li class="active" id="CursosLI"><a style="color:white" href="#Cursos" data-toggle="tab" >Seminarios y cursos talleres</a></li>
                                          <li id="TitulosLI"><a style="color:white" href="#Titulos" data-toggle="tab">Titulos</a></li>
                                          <li id="ExperienciaLaboralLI"><a style="color:white" href="#ExperienciaLaboral" data-toggle="tab">Experincia Laboral</a></li>
                                    </div>
                                  </div>
                                  <div class="panel-body" style="display: block; background:white">
                                    <div class="tab-content">
                                      <div class="tab-pane fade in active" id="Cursos">
                                        <form id="CursosFrm">
                                          <div class="row">
                                            <div class="col-xs-12 col-sm-6 col-md-4">
                                              <div class="form-group">
                                                <label>Nombre Institución</label>
                                                <div class="input-group">
                                                  <span class="input-group-addon" style="background: red; color:white" id="sizing-addon2"><i class="fa fa-building"></i></span>
                                                  <input type="text" class="form-control inputCursoBk" name="nombreInstitucionCursos" id="nombreInstitucionCursos" required>
                                                </div>
                                              </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-6 col-md-4">
                                              <div class="form-group">
                                                <label>Mención del curso</label>
                                                <div class="input-group">
                                                  <span class="input-group-addon" style="background: red; color:white" id="sizing-addon2"><i class="fa fa-building"></i></span>
                                                  <input type="text" class="form-control inputCursoBk" name="cursoEstudiado" id="cursoEstudiado" required>
                                                </div>
                                              </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-6 col-md-4">
                                              <div class="form-group">
                                                <label>Año de Estudio</label>
                                                <div class="input-group">
                                                  <span class="input-group-addon" style="background: red; color:white" id="sizing-addon2"><i class="fa fa-calendar"></i></span>
                                                  <input type="text" class="form-control inputCursoBk solo-numero" name="anhoEstudioCuso" id="anhoEstudioCuso" required>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="row">
                                            <div class="col-xs-12 col-sm-6 col-md-6">
                                              <label>Rol</label>
                                              <div class="form-group">
                                                <div class="input-group">
                                                  <!-- <span class="input-group-addon"id="sizing-addon2"><i class="fa fa-universal-access"></i></span> -->
                                                  <input type="hidden" class="form-control inputCursoBk solo-letra" name="religionInstCurso" id="religionInstCurso">
                                                </div>
                                              </div>
                                              <input id="participante-ponente" name="par-pon" data-width="130" type="checkbox" data-toggle="toggle" data-on="Ponente" data-off="Participante" data-onstyle="success" data-offstyle="warning">
                                            </div>
                                            <div class="col-xs-12 col-sm-6 col-md-6">
                                              <div class="form-group ">
                                                <label>Respaldo Curso (IMAGEN *jpg *png)</label>
                                                <div class="input-group exportarArchivo">
                                                  <input type="file" class="form-control exportarArchivoFile" name="respaldoCursos" id="respaldoCursos" required>
                                                </div>
                                                <div class="nameFileImg"></div>
                                              </div>
                                            </div>
                                          </div>
                                          <input type="hidden" name="datos" value="1">
                                          <input type="hidden" name="ciPersonaCurso" id="ciPersonaCurso" value="1">
                                          <div class="pull-right">
                                            <a class="btn btn-warning" id="newCurso"><i class="fa fa-plus"></i>Nuevo</a>
                                            <button type="submit" class="btn btn-success" name="guardar"><i class="fa fa-send"></i>Añadir</button>
                                          </div>
                                        </form>
                                        <div class="row">
                                          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="mensajeCursosPersonal">
                                            <div class="table-responsive">
                                              <table class="table table-hover table-bordered">
                                                <thead>
                                                  <tr>
                                                    <th>#</th>
                                                    <th>Curso</th>
                                                    <th>Institución</th>
                                                  </tr>
                                                </thead>
                                                <tbody>
                                                  <?php $i = 0; foreach ($personal->ListaCursos as $listaCE): $i++;?>
                                                    <tr>
                                                      <td><?php echo $i; ?></td>
                                                      <td><?php echo $listaCE->CursoEstudiado; ?></td>
                                                      <td><?php echo $listaCE->NombreInstitucion; ?></td>
                                                    </tr>
                                                  <?php endforeach; ?>
                                                </tbody>
                                              </table>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="tab-pane fade" id="Titulos">
                                        <form id="TiulosFrm">
                                          <div class="row">
                                            <div class="col-xs-12 col-sm-6 col-md-4">
                                              <div class="form-group">
                                                <label>Nombre Institución</label>
                                                <div class="input-group">
                                                  <span class="input-group-addon" style="background: red; color:white" id="sizing-addon2"><i class="fa fa-building"></i></span>
                                                  <input type="text" class="form-control inputTitulosBk" name="nombreInstitucionTitulos" id="nombreInstitucionTitulos">
                                                </div>
                                              </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-6 col-md-4">
                                              <div class="form-group">
                                                <label>Mención del titulo</label>
                                                <div class="input-group">
                                                  <span class="input-group-addon" style="background: red; color:white" id="sizing-addon2"><i class="fa fa-building"></i></span>
                                                  <input type="text" class="form-control inputTitulosBk" name="cursoProfesionalEstudiado" id="cursoProfesionalEstudiado">
                                                </div>
                                              </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-6 col-md-4">
                                              <div class="form-group">
                                                <label>Grado académico</label>
                                                <div class="input-group selector">
                                                  <span class="input-group-addon" style="background: red; color:white" id="sizing-addon2"><i class="fa fa-building"></i></span>
                                                  <select class="selectpicker form-control inputTitulosBk" name="tipoTituloProfesional" id="tipoTituloProfesional">
                                                    <?php foreach ($listaTipoTituloProfesional as $listaTipoTP): ?>
                                                      <option value="<?php echo $listaTipoTP->IdTipoTituloProfesional; ?>"><?php echo $listaTipoTP->NombreTipoTitulo; ?></option>
                                                    <?php endforeach; ?>
                                                  </select>
                                                </div>
                                                <div class="input-group selector-mobile">
                                                  <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-building"></i></span>
                                                  <select class="form-control inputTitulosBk" name="tipoTituloProfesional" id="tipoTituloProfesional">
                                                    <?php foreach ($listaTipoTituloProfesional as $listaTipoTP): ?>
                                                      <option value="<?php echo $listaTipoTP->IdTipoTituloProfesional; ?>"><?php echo $listaTipoTP->NombreTipoTitulo; ?></option>
                                                    <?php endforeach; ?>
                                                  </select>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="row">
                                            <div class="col-xs-12 col-sm-6 col-md-4">
                                              <div class="form-group">
                                                <label>Estado</label>
                                                <div class="input-group">
                                                  <!-- <span class="input-group-addon"id="sizing-addon2"><i class="fa fa-universal-access"></i></span> -->
                                                  <input type="hidden" class="form-control inputTitulosBk" name="religionInstTitulo" id="religionInstTitulo">
                                                </div>
                                              </div>
                                              <input id="en-progreso" name="en-progreso" data-width="130" type="checkbox" data-toggle="toggle" data-on="Completado" data-off="En progreso" data-onstyle="success" data-offstyle="danger" checked>
                                            </div>
                                            <div class="col-xs-12 col-sm-6 col-md-4">
                                              <div class="form-group">
                                                <label>Tiempo de Estudio</label>
                                                <div class="input-group">
                                                  <span class="input-group-addon" style="background: red; color:white" id="sizing-addon2"><i class="fa fa-calendar"></i></span>
                                                  <input type="text" class="form-control inputTitulosBk solo-numero-float" name="anhoEstudioTitulo" id="anhoEstudioTitulo">
                                                </div>
                                              </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-6 col-md-4">
                                              <div class="form-group">
                                                <label>Respaldo Titulo  (IMÁGEN *jpg *png)</label>
                                                <div class="input-group exportarArchivo">
                                                  <input type="file" class="form-control exportarArchivoFile" name="respaldoTitulo" id="respaldoTitulo">
                                                </div>
                                                <div class="nameFileImg"></div>
                                              </div>
                                            </div>
                                          </div>
                                          <input type="hidden" name="datos" value="1">
                                          <input type="hidden" name="ciPersonaTitulo" id="ciPersonaTitulo" value="1">
                                          <div class="pull-right">
                                            <a class="btn btn-warning" id="newTitulo"><i class="fa fa-plus"></i>Nuevo</a>
                                            <button type="submit" class="btn btn-success" name="guardar"><i class="fa fa-send"></i>Añadir</button>
                                          </div>
                                        </form>
                                        <div class="row">
                                          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="mensajeTitulosPersonal">
                                            <div class="table-responsive">
                                              <table class="table table-hover table-bordered">
                                                <thead>
                                                  <tr>
                                                    <th>#</th>
                                                    <th>Mención del titulo</th>
                                                    <th>Institución</th>
                                                  </tr>
                                                </thead>
                                                <tbody>
                                                  <?php $i = 0; foreach ($personal->ListaTitulos as $listaT): $i++;?>
                                                    <tr>
                                                      <td><?php echo $i; ?></td>
                                                      <td><?php echo $listaT->CursoProfesionalEstudiado; ?></td>
                                                      <td><?php echo $listaT->NombreInstitucion; ?></td>
                                                    </tr>
                                                  <?php endforeach; ?>
                                                </tbody>
                                              </table>
                                            </div>
                                          </div>
                                        </div>
                                      </div>

                                      <div class="tab-pane fade" id="ExperienciaLaboral">
                                        <form id="ExperienciaLaboralFrm">
                                          <div class="row">
                                            <div class="col-xs-12 col-sm-6 col-md-4">
                                              <div class="form-group">
                                                <label>Nombre Institución</label>
                                                <div class="input-group">
                                                  <span class="input-group-addon" style="background: red; color:white" id="sizing-addon2"><i class="fa fa-building"></i></span>
                                                  <input type="text" class="form-control inputELabBk" name="nombreInstitucionEL" id="nombreInstitucionEL">
                                                </div>
                                              </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-6 col-md-4">
                                              <div class="form-group">
                                                <label>Cargo/Responsabilidad</label>
                                                <div class="input-group">
                                                  <span class="input-group-addon" style="background: red; color:white" id="sizing-addon2"><i class="fa fa-building"></i></span>
                                                  <input type="text" class="form-control inputELabBk" name="cargoResponsabilidadEL" id="cargoResponsabilidadEL">
                                                </div>
                                              </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-6 col-md-4">
                                              <div class="form-group">
                                                <label>Años de servicio</label>
                                                <div class="input-group">
                                                  <span class="input-group-addon" style="background: red; color:white" id="sizing-addon2"><i class="fa fa-calendar"></i></span>
                                                  <input type="text" class="form-control inputELabBk solo-numero-float" name="anhoServicioEL" id="anhoServicioEL">
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="row">
                                            <div class="col-xs-12 col-sm-6 col-md-6">
                                              <div class="form-group">
                                                <label>Número referencia de la empresa</label>
                                                <div class="input-group">
                                                  <span class="input-group-addon"id="sizing-addon2"><i class="fa fa-universal-access"></i></span>
                                                  <input type="text" class="form-control inputELabBk" name="religionInstEL" id="religionInstEL">
                                                </div>
                                              </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-6 col-md-6">
                                              <div class="form-group">
                                                <label>Motivo de retiro</label>
                                                <div class="input-group">
                                                  <span class="input-group-addon"id="sizing-addon2"><i class="fa fa-universal-access"></i></span>
                                                  <input type="text" class="form-control inputELabBk" name="motivoRetiroEL" id="motivoRetiroEL">
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                          <input type="hidden" name="datos" value="1">
                                          <input type="hidden" name="ciPersonEL" id="ciPersonEL" value="1">
                                          <div class="pull-right">
                                            <a class="btn btn-warning" id="newExpeLabor"><i class="fa fa-plus"></i>Nuevo</a>
                                            <button type="submit" class="btn btn-success" name="guardar"><i class="fa fa-send"></i>Añadir</button>
                                          </div>
                                        </form>
                                        <div class="row">
                                          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="mensajeELaboralPersonal">
                                            <div class="table-responsive">
                                              <table class="table table-hover table-bordered">
                                                <thead>
                                                  <tr>
                                                    <th>#</th>
                                                    <th>Cargo/Responsabilidad</th>
                                                    <th>Institución</th>
                                                  </tr>
                                                </thead>
                                                <tbody>
                                                  <?php $i = 0; foreach ($personal->ListaExperinciaLaboral as $listaExp): $i++;?>
                                                    <tr>
                                                      <td><?php echo $i; ?></td>
                                                      <td><?php echo $listaExp->CargoResponsabilidad; ?></td>
                                                      <td><?php echo $listaExp->NombreInstitucion; ?></td>
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

                              <div class="tab-pane fade" id="Documentos">
                                <div class="thumbnail" style="padding:25px;">
                                  <div class="text-center">
                                    <h2>Archivos personales (ci, certificado nacimiento, certificado matrimonio, etc)</h2>
                                  </div>
                                  <form id="DocumentosFrm">
                                    <div class="row">
                                      <div class="col-xs-12 col-sm-6 col-md-6">
                                        <label>Nombre del documento</label>
                                        <div class="form-group">
                                          <div class="input-group">
                                            <span class="input-group-addon" style="background: red; color:white"><i class="fa fa-universal-access"></i></span>
                                            <input type="text" class="form-control  docum-perso" name="nombreDocumento" id="nombreDocumento" required>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="col-xs-12 col-sm-6 col-md-6">
                                        <div class="form-group ">
                                          <label>Documento (IMÁGEN *jpg *png)</label>
                                          <div class="input-group exportarArchivo">
                                            <input type="file" class="form-control exportarArchivoFile docum-perso" name="documento-Personal" id="documento-Personal" required>
                                          </div>
                                          <div class="nameFileImg"></div>
                                        </div>
                                      </div>
                                    </div>
                                    <input type="hidden" name="ciPersonaDocumento" id="ciPersonaDocumento" value="1">
                                    <div class="pull-right">
                                      <a class="btn btn-warning" id="newDocumento"><i class="fa fa-plus"></i>Nuevo</a>
                                      <button type="submit" class="btn btn-success" name="guardar"><i class="fa fa-send"></i>Añadir</button>
                                    </div>
                                  </form>
                                  <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="mensajeDocumento">
                                      <?php
                                        $documentosPersonal->mostarDocumentos($personal->IdPersonal);
                                      ?>
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
    </div>
</div>

</div>

<div class="modal fade" id="addNewLugExpedi">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <form id="addNewLugExpediForm">
        <div class="modal-header">
          <button type="button" name="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h3 class="modal-title text-center">Agregar Lugar de Expedición</h3>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label>Lugar de Expedición CI</label>
            <div class="input-group">
              <span class="input-group-addon" style="background: red; color:white" ><i class="fa fa-address-card"></i></span>
              <input type="text" name="expedicionNew" class="form-control" required>
            </div>
          </div>
          <div id="respuestaAddLugEx"></div>
        </div>
        <div class="modal-footer">
          <div class="pull-right">
            <button class="btn btn-danger btn-sm" data-dismiss="modal" aria-hidden="true">Cerrar <i class="fa fa-times-circle"></i></button>
            <button type="reset" class="btn btn-default btn-sm">Limpiar <i class="fa fa-refresh"></i></button>
            <button type="submit" class="btn btn-success btn-sm">Guardar <i class="fa fa-check"></i></button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="addNewNacionalidad">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <form id="addNewNacionalidadForm">
        <div class="modal-header">
          <button type="button" name="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h3 class="modal-title text-center">Agregar Nacionalidad</h3>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label>Nacionalidad</label>
            <div class="input-group">
              <span class="input-group-addon" style="background: red; color:white" ><i class="fa fa-building"></i></span>
              <input type="text" name="nacionalidadNew" class="form-control" required>
            </div>
          </div>
          <div id="respuestaAddNacionalidad"></div>
        </div>
        <div class="modal-footer">
          <div class="pull-right">
            <button class="btn btn-danger btn-sm" data-dismiss="modal" aria-hidden="true">Cerrar <i class="fa fa-times-circle"></i></button>
            <button type="reset" class="btn btn-default btn-sm">Limpiar <i class="fa fa-refresh"></i></button>
            <button type="submit" class="btn btn-success btn-sm">Guardar <i class="fa fa-check"></i></button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="addNewCiudad">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <form id="addNewCiudadForm">
        <div class="modal-header">
          <button type="button" name="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h3 class="modal-title text-center">Agregar Ciudad de Nacimiento</h3>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label>Ciudad de Nacimiento</label>
            <div class="input-group">
              <span class="input-group-addon" style="background: red; color:white" ><i class="fa fa-building"></i></span>
              <input type="text" name="ciudadNew" class="form-control" required>
            </div>
          </div>
          <div id="respuestaAddCiudad"></div>
        </div>
        <div class="modal-footer">
          <div class="pull-right">
            <button class="btn btn-danger btn-sm" data-dismiss="modal" aria-hidden="true">Cerrar <i class="fa fa-times-circle"></i></button>
            <button type="reset" class="btn btn-default btn-sm">Limpiar <i class="fa fa-refresh"></i></button>
            <button type="submit" class="btn btn-success btn-sm">Guardar <i class="fa fa-check"></i></button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="addNewReligion">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <form id="addNewReligionForm">
        <div class="modal-header">
          <button type="button" name="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h3 class="modal-title text-center">Agregar Religión</h3>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label>Religión</label>
            <div class="input-group">
              <span class="input-group-addon" style="background: red; color:white" ><i class="fa fa-cube"></i></span>
              <input type="text" name="religionNew" class="form-control" required>
            </div>
          </div>
          <div id="respuestaAddReligion"></div>
        </div>
        <div class="modal-footer">
          <div class="pull-right">
            <button class="btn btn-danger btn-sm" data-dismiss="modal" aria-hidden="true">Cerrar <i class="fa fa-times-circle"></i></button>
            <button type="reset" class="btn btn-default btn-sm">Limpiar <i class="fa fa-refresh"></i></button>
            <button type="submit" class="btn btn-success btn-sm">Guardar <i class="fa fa-check"></i></button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="addNewSeguro">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <form id="addNewSeguroForm">
        <div class="modal-header">
          <button type="button" name="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h3 class="modal-title text-center">Agregar Seguro</h3>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label>Seguro</label>
            <div class="input-group">
              <span class="input-group-addon" style="background: red; color:white" ><i class="fa fa-cube"></i></span>
              <input type="text" name="seguroNew" class="form-control" required>
            </div>
          </div>
          <div id="respuestaAddSeguro"></div>
        </div>
        <div class="modal-footer">
          <div class="pull-right">
            <button class="btn btn-danger btn-sm" data-dismiss="modal" aria-hidden="true">Cerrar <i class="fa fa-times-circle"></i></button>
            <button type="reset" class="btn btn-default btn-sm">Limpiar <i class="fa fa-refresh"></i></button>
            <button type="submit" class="btn btn-success btn-sm">Guardar <i class="fa fa-check"></i></button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="addNewAfp">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <form id="addNewAfpForm">
        <div class="modal-header">
          <button type="button" name="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h3 class="modal-title text-center">Agregar AFP</h3>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label>AFP</label>
            <div class="input-group">
              <span class="input-group-addon" style="background: red; color:white" ><i class="fa fa-cube"></i></span>
              <input type="text" name="afpNew" class="form-control" required>
            </div>
          </div>
          <div id="respuestaAddAfp"></div>
        </div>
        <div class="modal-footer">
          <div class="pull-right">
            <button class="btn btn-danger btn-sm" data-dismiss="modal" aria-hidden="true">Cerrar <i class="fa fa-times-circle"></i></button>
            <button type="reset" class="btn btn-default btn-sm">Limpiar <i class="fa fa-refresh"></i></button>
            <button type="submit" class="btn btn-success btn-sm">Guardar <i class="fa fa-check"></i></button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="addNewEnfermedad">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <form id="addNewEnfermedadForm">
        <div class="modal-header">
          <button type="button" name="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h3 class="modal-title text-center">Agregar Enfermedad/Alergia</h3>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label>Enfermedad/Alergia</label>
            <div class="input-group">
              <span class="input-group-addon" style="background: red; color:white" ><i class="fa fa-cube"></i></span>
              <input type="text" name="enfermedadNew" class="form-control" required>
            </div>
          </div>
          <div id="respuestaAddEnfermedad"></div>
        </div>
        <div class="modal-footer">
          <div class="pull-right">
            <button class="btn btn-danger btn-sm" data-dismiss="modal" aria-hidden="true">Cerrar <i class="fa fa-times-circle"></i></button>
            <button type="reset" class="btn btn-default btn-sm">Limpiar <i class="fa fa-refresh"></i></button>
            <button type="submit" class="btn btn-success btn-sm">Guardar <i class="fa fa-check"></i></button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="addNewDeporte">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <form id="addNewDeporteForm">
        <div class="modal-header">
          <button type="button" name="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h3 class="modal-title text-center">Agregar Deporte</h3>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label>Deporte</label>
            <div class="input-group">
              <span class="input-group-addon" style="background: red; color:white" ><i class="fa fa-cube"></i></span>
              <input type="text" name="deporteNew" class="form-control" required>
            </div>
          </div>
          <div id="respuestaAddDeporte"></div>
        </div>
        <div class="modal-footer">
          <div class="pull-right">
            <button class="btn btn-danger btn-sm" data-dismiss="modal" aria-hidden="true">Cerrar <i class="fa fa-times-circle"></i></button>
            <button type="reset" class="btn btn-default btn-sm">Limpiar <i class="fa fa-refresh"></i></button>
            <button type="submit" class="btn btn-success btn-sm">Guardar <i class="fa fa-check"></i></button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="editarHijo">
  <div class="modal-dialog">
    <div class="modal-content">
      <form id="editarPersonaHijo">
        <div class="modal-header">
          <button type="button" name="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h3 class="modal-title text-center">Editar Hijo</h3>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6">
              <div class="form-group">
                <label>Primer Nombre</label>
                <div class="input-group">
                  <span class="input-group-addon" style="background: red; color:white" ><i class="fa fa-user"></i></span>
                  <input id="primerNombreHijEdit" type="text" class="form-control solo-letra" placeholder="Primer Nombre: " aria-describedby="sizing-addon2" name="primerNombreHij" required>
                </div>
              </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6">
              <div class="form-group">
                <label>Segundo Nombre</label>
                <div class="input-group">
                  <span class="input-group-addon" ><i class="fa fa-user"></i></span>
                  <input id="segundoNombreHijEdit" type="text" class="form-control solo-letra" placeholder="Segundo Nombre: " aria-describedby="sizing-addon2" name="segundoNombreHij">
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6">
              <div class="form-group">
                <label>Apellido Paterno</label>
                <div class="input-group">
                  <span class="input-group-addon" style="background: red; color:white" ><i class="fa fa-user"></i></span>
                  <input id="apellidoPaternoHijEdit" type="text" class="form-control solo-letra" placeholder="Apellido Paterno: " aria-describedby="sizing-addon2" name="apellidoPaternoHij" required>
                </div>
              </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6">
              <div class="form-group">
                <label>Apellido Materno</label>
                <div class="input-group">
                  <span class="input-group-addon" ><i class="fa fa-user"></i></span>
                  <input id="apellidoMaternoHijEdit" type="text" class="form-control solo-letra" placeholder="Apellido Materno: " aria-describedby="sizing-addon2" name="apellidoMaternoHij">
                </div>
              </div>
            </div>
          </div>

          <div class="form-group">
            <label>Fecha de Nacimiento</label>
            <div class="input-group" >
              <span class="input-group-addon" style="background: red; color:white" id="sizing-addon2"><i class="fa fa-calendar"></i></span>
              <input id="fechaNacimientoHijEdit" type="text" class="form-control datepicker" data-date-format="yyyy/mm/dd" placeholder="Fecha de Nacimiento:  AAAA/MM/DD" aria-describedby="sizing-addon2" name="fechaNacimientoHij" required>
            </div>
          </div>
        </div>
        <input id="idPersonaHijEdit" type="hidden" name="idPersona" value="1" >
        <input type="hidden" name="ciPersonHijo" id="ciPersonHijoEdit" value="1">
        <input type="hidden" name="idPersonal"value="<?php echo $personal->IdPersonal ?>">
        <div class="text-center" id="mensajeHijoEditar"></div>
        <div class="modal-footer">
          <button class="btn btn-danger btn-sm" data-dismiss="modal" aria-hidden="true">Cerrar <i class="fa fa-times-circle"></i></button>
          <button type="submit" class="btn btn-success btn-sm">Guardar <i class="fa fa-check"></i></button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade bs-example-modal-lg in"  aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" name="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3 class="modal-title text-center"> <i class="fa fa-user"></i> Personal-UAB</h3>
      </div>
      <div class="modal-body">
        <div class="contenidoDetalle" id="contenidoDetalle">
          <i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
          <span class="sr-only">Cargando...</span>
        </div>
      </div>
      <div class="modal-footer">
        <div class="pull-left">
          <a id="exportarFormularioPDF" class="btn btn-danger">Exportar PDF <i class="fa fa-file-pdf-o"></i></a>
        </div>
        <div class="pull-right">
          <a href="Personal-Lista.html" class="btn btn-success btn-lg">LISTO <i class="fa fa-check"></i></a>
        </div>
      </div>
    </div>
  </div>
</div>
