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
include '../../model/EstructuraMeritos.php';
include '../../model/EstructuraMeritosConsulta.php';
include '../../model/ExperienciaLaboral.php';
include '../../model/ExperienciaLaboralConsulta.php';
include '../../model/EvaluacionMeritosDocenteProfesor.php';
include '../../model/EvaluacionMeritosDocenteProfesorConsulta.php';
include '../../controller/PersonaControlador.php';
include '../../controller/PersonalControlador.php';
include '../../controller/ReferenciaPersonalControlador.php';
include '../../controller/TelefonoControlador.php';
include '../../controller/ConyuguePersonalControlador.php';
include '../../controller/HijosPersonalControlador.php';
include '../../controller/CursoEstudiadoControlador.php';
include '../../controller/TituloProfesionalControlador.php';
include '../../controller/ExperienciaLaboralControlador.php';
include '../../controller/EvaluacionMeritosDocenteProfesorControlador.php';

$conexion = new Conexion();
$consulta = new PersonaConsulta($conexion);

$idPersona = $consulta->obtenerIdPersona($_POST['ciPersonalMeritos']);

$personalManejador = new PersonalControlador($conexion);

$personal = $personalManejador->ver($idPersona['idPersona']);

$objMeritoDocenteConsulta = new EstructuraMeritosConsulta($conexion);
$meritos = $objMeritoDocenteConsulta->listaEstructuraMeritosSegunPersonal($_POST['tipoPersonal']);

if ($meritos)
{

  $evaluacionManejador = new EvaluacionMeritosDocenteProfesorControlador($conexion);
  $evaluacion = $evaluacionManejador->listaEvalucionPersonal($personal->IdPersonal);

  $autoEvaluacion = $evaluacionManejador->listaAutoEvalucionPersonal($personal->IdPersonal);

  $puntajeAutoEvaluacion = 0;
  $puntajeEvaluacion = 0;

  // var_dump($autoEvaluacion);


  foreach ($autoEvaluacion as $eval):

    $puntajeAutoEvaluacion += $eval->PuntajeMerito;

  endforeach;

  foreach ($evaluacion as $eval):

    $puntajeEvaluacion += $eval->PuntajeMerito;

  endforeach;

  $puntajeTotal = 0;

  foreach ($meritos as $categoria)
  {
    $puntajeTotal +=$categoria->PuntajeMerito;
  }


  ?>
  <div class="container" id="contenidoAll">
    <div class="pull-left">
      <a href="Personal-Lista.html" class="btn btn-danger btn-lg"><i class="fa fa-arrow-left"></i> Atras</a>
    </div>
    <br><br><br>
    <div class="row  border-bottom white-bg dashboard-header">

        <div class="col-sm-3">
            <h2>Personal-UAB </h2>
        </div>

        <div class="col-sm-9 text-center">
          <div class="panel panel-danger">
            <div class="panel-body">
              <div class="table-responsive">
                <table class="table table-hover table-condensed">
                  <thead>
                    <th colspan="2" class="text-center">Meritos</th>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Evaluación</td>
                      <td><strong><?php echo "{$puntajeEvaluacion} / $puntajeTotal" ?></strong></td>
                    </tr>
                    <tr>
                      <td>Auto evaluación</td>
                      <td><strong><?php echo "{$puntajeAutoEvaluacion} / $puntajeTotal" ?></strong></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="panel-heading">
              <div class="table-responsive">
                <table class="table table-hover table-condensed">
                  <thead>
                    <tr>
                      <th colspan="1" class="text-center">Promedio</th>
                      <th colspan="1" class="text-center"><h3><strong><?php echo ($puntajeAutoEvaluacion + $puntajeEvaluacion) / 2 ?></strong></h3></th>
                    </tr>
                  </thead>
                </table>
              </div>
            </div>
          </div>
        </div>

        <div class="col-sm-12 text-center">
          <h2><?php echo "{$personal->IdPersona->PrimerNombre} {$personal->IdPersona->SegundoNombre} {$personal->IdPersona->ApellidoPaterno} {$personal->IdPersona->ApellidoMaterno}" ?></h2>
        </div>

    </div>
    <hr>
    <div class="row">
      <div class="col-sm-12 col-xs-12 col-md-6 col-lg-6">
        <div class="panel panel-primary">
          <div class="panel-heading">
            <h3 class="panel-title">Tabla de Meritos</h3>
          </div>
          <div class="panel-body">
            <form id="guardarCalificacion">
              <div class="table-responsive">
                <table class="table table-hover table-bordered">

                  <?php $contador = 1; foreach ($meritos as $categoria): ?>

                    <thead>
                      <tr>
                        <th><?php echo $contador ?></th>
                        <th><p><?php echo "{$categoria->NombreMerito} ({$categoria->PuntajeMerito} puntos)" ?></p></th>
                        <th></th>
                        <th></th>
                      </tr>
                    </thead>

                    <?php $subcontador = 1; foreach ($categoria->SubMeritos as $merito):
                       $encontrado = false; ?>
                      <tbody>
                        <tr>
                          <td><?php echo "{$contador}.{$subcontador}" ?></td>
                          <td><?php echo $merito->NombreMerito ?></td>
                          <td><?php echo $merito->PuntajeMerito ?></td>
                          <input type="hidden" class="idMerito" name="idMerito[]" value="<?php echo $merito->IdEstructuraMerito ?>">
                          <?php foreach ($evaluacion as $eval): ?>
                            <?php if ($eval->IdEstructuraMerito == $merito->IdEstructuraMerito): ?>
                              <td><input type="text" maxlength="2" size="2" style="width: 50px" class="form-control puntaje" name="puntajeMerito[]" value="<?php echo $eval->PuntajeMerito ?>"></td>
                              <?php $encontrado = true;
                              break;
                             endif; ?>
                          <?php endforeach;
                          if ($encontrado == false) {
                            ?>
                            <td><input type="text" maxlength="2" size="2" style="width: 50px" class="form-control puntaje" name="puntajeMerito[]" value="0"></td>
                            <?php
                          }
                          ?>

                        </tr>
                      </tbody>

                    <?php $subcontador++; endforeach; ?>

                  <?php $contador++; endforeach; ?>
                </table>
                <div class="pull-right">
                  <strong>Total Puntos Méritos: </strong> <input type="text" class="form-control puntajeTotal" id="puntajeTotal" name="puntajeTotal" value="0" readonly>
                </div>
                <input type="hidden" name="idPersonal" value="<?php echo $personal->IdPersonal ?>">
                <br><br><br><br>
                <div class="pull-right">
                  <button type="submit" class="btn btn-success btn-lg" data-toggle="modal" data-target="#respuestaModal" name="guardar">Guardar Evaluación <i class="fa fa-paper-plane"></i></button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="col-sm-12 col-xs-12 col-md-6 col-lg-6">
        <div class="panel panel-primary">
          <div class="panel-heading">
            <h3 class="panel-title">Hoja de Vida Personal</h3>
          </div>
          <div class="panel-body">
            <?php $i = 1; ?>
              <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="table-responsive">
                    <table class="table table-hover table-bordered table-center">
                      <thead>
                        <tr>
                          <th></th>
                          <th>#</th>
                          <th>Mención del Curso</th>
                          <th>Institución</th>
                          <th>Rol</th>
                          <th>Año de Estudio</th>
                        </tr>
                      </thead>
                      <tbody>
                        <div class="text-center"><strong>SEMINARIOS Y CURSOS TALLERES</strong></div><br>
                        <?php foreach ($personal->ListaCursos as $cursos): ?>
                          <tr class="action">
                            <td><input type="checkbox" class="control"  name="control[]" value="1"></td>
                            <td><?php echo $i ?></td>
                            <td class="text-center"><?php echo $cursos->CursoEstudiado ?></td>
                            <td class="text-center"><?php echo $cursos->NombreInstitucion ?></td>
                            <td class="text-center"><?php echo $cursos->ReligionInstitucion ?></td>
                            <td class="text-center"><?php echo $cursos->AnhoEstudio ?></td>
                          </tr>
                        <?php $i++; endforeach; ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            <?php $i = 1; ?>
              <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="table-responsive">
                    <table class="table table-hover table-bordered table-center">
                      <thead>
                        <tr>
                          <th></th>
                          <th>#</th>
                          <th>Mencion del Titulo</th>
                          <th>Institución</th>
                          <th>Estado</th>
                          <th>Tiempo de Estudio(Años)</th>
                        </tr>
                      </thead>
                      <tbody>
                        <div class="text-center"><strong>TITULOS QUE POSEE</strong></div><br>
                        <?php foreach ($personal->ListaTitulos as $titulos): ?>
                          <tr class="action">
                            <td><input type="checkbox" class="control"  name="control[]" value="1"></td>
                            <td><?php echo $i ?></td>
                            <td class="text-center"><?php echo $titulos->CursoProfesionalEstudiado ?></td>
                            <td class="text-center"><?php echo $titulos->NombreInstitucion ?></td>
                            <td class="text-center"><?php echo $titulos->ReligionInstitucion ?></td>
                            <td class="text-center"><?php echo $titulos->TiempoEstudio ?></td>
                          </tr>
                        <?php $i++; endforeach; ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            <?php $i = 1; ?>
            <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="table-responsive">
                  <table class="table table-hover table-bordered">
                    <thead>
                      <tr>
                        <th></th>
                        <th>#</th>
                        <th>Cargo/Responsabilidad</th>
                        <th>Institución</th>
                        <th>Años de servicio</th>
                      </tr>
                    </thead>
                    <tbody>
                      <div class="text-center"><strong>Experiencia Laboral</strong></div><br>

                      <?php foreach ($personal->ListaExperinciaLaboral as $listaE): ?>
                        <tr class="action">
                          <td><input type="checkbox" class="control" name="control[]" value="1"></td>
                          <td><?php echo $i; ?></td>
                          <td><?php echo $listaE->CargoResponsabilidad; ?></td>
                          <td><?php echo $listaE->NombreInstitucion; ?></td>
                          <td><?php echo $listaE->AniosDeServicio; ?></td>
                        </tr>
                      <?php $i++; endforeach; ?>
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
  <?php
}
else
{
  echo "<div class='text-center' style='color:red'><h2><strong>No existe Evaluacioón Asignada</strong></h2></div>";
  ?>
  <script type="text/javascript">
     setTimeout("location.href = 'index.php?modo=listaPersonal';", 1500);
  </script>
  <?php
}

?>


<div class="modal fade" id="respuestaModal">
  <div class="modal-dialog" >
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" name="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3 class="modal-title text-center"> <i class="fa fa-user"></i> Personal-UAB</h3>
      </div>
      <div class="modal-body">
        <div class="mensajeCalificacion" id="mensajeCalificacion">
          <i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
          <span class="sr-only">Cargando...</span>
        </div>
      </div>
      <div class="modal-footer">
        <div class="pull-right">
          <a href="Personal-Lista.html" class="btn btn-success btn-lg">LISTO <i class="fa fa-check"></i></a>
        </div>
      </div>
    </div>
  </div>
</div>
