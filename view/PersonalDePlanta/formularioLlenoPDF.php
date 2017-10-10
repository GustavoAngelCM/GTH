
    <?php

    if (isset($_GET['datos']))
    {
      $nameCompletFile = "";
      ob_start();
      require_once("../libs/dompdf/dompdf_config.inc.php");

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
      include '../../model/ExperienciaLaboral.php';
      include '../../model/ExperienciaLaboralConsulta.php';
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
      include '../../controller/PersonaControlador.php';
      include '../../controller/PersonalControlador.php';
      include '../../controller/ReferenciaPersonalControlador.php';
      include '../../controller/TelefonoControlador.php';
      include '../../controller/ConyuguePersonalControlador.php';
      include '../../controller/HijosPersonalControlador.php';
      include '../../controller/CursoEstudiadoControlador.php';
      include '../../controller/TituloProfesionalControlador.php';
      include '../../controller/ExperienciaLaboralControlador.php';

      $conexion = new Conexion();
      $consulta = new PersonaConsulta($conexion);

      $idPersona = $consulta->obtenerIdPersona($_GET['ciPersonalDetalle']);

      $personalManejador = new PersonalControlador($conexion);

      $personal = $personalManejador->ver($idPersona['idPersona']);

      $nameCompletFile = "{$personal->IdPersona->PrimerNombre}-{$personal->IdPersona->ApellidoPaterno}";

      ?>
      <!DOCTYPE html>
      <html>
        <head>
          <meta charset="utf-8">
          <link href="../libs/css/pdf.css" rel="stylesheet">
          <title></title>
        </head>
        <body>
          <div class="container">

              <div class="row">
                <div class="columna">
                  <center><img src="../libs/multimedia/img/design/logo-uab.png" alt="uab-logo" width="150" height="150" class="img-rounded"></center>
                </div>
                <div class="columna">
                  <div class="text-center titulo">
                    <h4>Gestión del Talento Humano</h4>
                    <br><br>
                    <h1 style="font-size:30px;"><strong>FICHA PERSONAL</strong></h1>
                  </div>
                </div>
                <div class="columna">
                  <?php if ($personal->Ruta): ?>
                    <?php
                      list($nada,$ruta) = explode("/wamp64/www/PersonalUAB/view/", $personal->Ruta);
                    ?>
                    <center><img src="‪<?php echo "../../../".$ruta; ?>" alt="persona" class="img-rounded" width="110" height="110"></center>
                  <?php endif; ?>
                </div>
              </div>

              <strong style="color:red; padding-left:8%; margin-top:40px;">DATOS GENERALES:</strong>

              <div class="row-datos">
                <div class="table-pdf">
                  <table class="tabla-estilo">
                    <tbody>
                      <tr>
                        <td><strong>Apellidos y nombres: </strong> <?php echo " {$personal->IdPersona->ApellidoPaterno} {$personal->IdPersona->ApellidoMaterno} {$personal->IdPersona->PrimerNombre} {$personal->IdPersona->SegundoNombre}" ?></td>
                      </tr>
                      <tr>
                        <td> <strong>Fecha de nacimiento: </strong> <?php echo " {$personal->IdPersona->FechaNacimiento}" ?></td>
                      </tr>
                      <tr>
                        <td> <strong>Lugar de nacimiento: </strong> <?php echo $personal->IdCiudadNacimiento; ?> </td>
                      </tr>
                      <tr>
                        <td><strong>Nacionalidad: </strong><?php echo $personal->IdNacion; ?></td>
                      </tr>
                      <tr>
                        <td><strong>Carnet de identidad: </strong><?php echo " {$personal->IdPersona->CI} {$personal->IdPersona->LugarExpedicion}" ?></td>
                      </tr>
                      <tr>
                        <td><strong>Pasaporte o C.E.: </strong><?php echo $personal->NumeroPasaporte ?></td>
                      </tr>
                      <tr>
                        <td><strong>Religión: </strong><?php echo $personal->IdReligion ?></td>
                      </tr>
                      <tr>
                        <td><strong>Fecha de bautismo: </strong><?php echo $personal->FechaBautizmo ?></td>
                      </tr>
                      <tr>
                        <td><strong>Dirección actual: </strong><?php echo $personal->Direccion ?></td>
                      </tr>
                      <tr>
                        <td><strong>Teléfonos: </strong>
                          <?php
                            foreach ($personal->IdPersona->getListaTelefonos() as $telefono)
                            {
                              echo "{$telefono} " ;
                            }
                          ?>
                        </td>

                      </tr>
                      <tr>
                        <td><strong>Correo electrónico: </strong><?php echo $personal->Email ?></td>
                      </tr>
                      <?php if ($personal->IdCargo == null): ?>
                        <?php if ($personal->ListaCargos): ?>
                          <tr>
                            <td><strong>Cargo: </strong><?php echo $personal->ListaCargos[0]->NombreCargo ?></td>
                          </tr>
                        <?php endif; ?>
                      <?php else: ?>
                        <tr>
                          <td><strong>Cargo: </strong><?php echo $personal->IdCargo ?></td>
                        </tr>
                      <?php endif; ?>
                      <tr>
                        <td><strong>Número de registro profesional: </strong><?php echo $personal->NumeroRegistroProfesional ?></td>
                      </tr>
                      <?php if ($personal->C_Conyugue->IdPersona->PrimerNombre): ?>
                        <tr>
                          <td><strong>Nombres y apellidos del conyugue: </strong><?php echo "{$personal->C_Conyugue->IdPersona->PrimerNombre} {$personal->C_Conyugue->IdPersona->SegundoNombre} {$personal->C_Conyugue->IdPersona->ApellidoPaterno} {$personal->C_Conyugue->IdPersona->ApellidoMaterno} " ?></td>
                        </tr>
                        <tr>
                          <td><strong>Fecha de nacimiento: </strong><?php echo $personal->C_Conyugue->IdPersona->FechaNacimiento ?></td>
                        </tr>
                        <tr>
                          <td><strong>Fecha de matrimonio: </strong><?php echo $personal->C_Conyugue->FechaMatrimonio ?></td>
                        </tr>
                      <?php endif; ?>
                    </tbody>
                  </table>
                </div>
              </div>

              <strong style="color:red; padding-left:22%;">HIJOS</strong>
              <?php $i = 1; ?>
                <div class="row-h">
                  <div class="table-pdf">
                    <table class="tabla-estilo">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Nombre completo</th>
                          <th>Fecha de nacimiento</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($personal->C_HijosLista as $hijo): ?>
                          <tr>
                            <td><?php echo $i ?></td>
                            <td><?php echo "{$hijo->IdPersona->PrimerNombre} {$hijo->IdPersona->SegundoNombre} {$hijo->IdPersona->ApellidoPaterno} {$hijo->IdPersona->ApellidoMaterno} " ?></td>
                            <td><?php echo $hijo->IdPersona->FechaNacimiento ?></td>
                          </tr>
                        <?php $i++; endforeach; ?>
                      </tbody>
                    </table>
                  </div>
                </div>

              <strong style="color:red; top:45px; padding-left:22%;">SEMINARIOS Y CURSOS TALLERES</strong>
              <?php $i = 1; ?>
                <div class="row-hdv">
                  <div class="table-pdf">
                    <table class="tabla-estilo">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Mención del curso</th>
                          <th>Institución</th>
                          <th>Rol</th>
                          <th>Año de estúdio</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($personal->ListaCursos as $cursos): ?>
                          <tr>
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

              <strong style="color:red; top:45px; padding-left:22%;">TITULOS QUE POSEE</strong>
              <?php $i = 1; ?>
                <div class="row-hdv">
                  <div class="table-pdf">
                    <table class="tabla-estilo">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Mención del titulo</th>
                          <th>Institución</th>
                          <th>Estado</th>
                          <th>Tiempo de estudio(Años)</th>
                        </tr>
                      </thead>
                      <tbody>

                        <?php foreach ($personal->ListaTitulos as $titulos): ?>
                          <tr>
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

              <strong style="color:red; padding-left:8%; margin-top:30px;">OTROS DATOS:</strong>
              <div class="row-otros">
                <div class="table-pdf">
                  <table class="tabla-estilo">
                    <tbody>
                      <tr>
                        <td><strong>Deportes favoritos: </strong>
                          <?php
                            foreach ($personal->ListaDeportes as $deporte)
                            {
                              echo "<br /> - {$deporte->NombreDeporte} " ;
                            }
                          ?>
                        </td>
                      </tr>
                      <tr>
                        <td><strong>Libro favorito: </strong><?php echo $personal->LecturaPreferencial ?></td>
                      </tr>
                      <tr>
                        <td><strong>Hobby: </strong><?php echo $personal->Hobby ?></td>
                      </tr>
                      <tr>
                        <td><strong>Enfermedades y/o alergias</strong>
                          <?php
                            foreach ($personal->ListaEnfermedades as $enfermedad)
                            {
                              echo "<br /> - {$enfermedad->NombreEnfermedad} " ;
                            }
                          ?>
                        </td>
                      </tr>
                      <tr>
                        <td><strong>Tipo de sangre: </strong><?php echo $personal->TipoSangre ?></td>
                      </tr>
                      <tr>
                          <td><strong>En caso de emergencia llamar a: </strong><?php echo "{$personal->C_Referencia->IdPersona->PrimerNombre} {$personal->C_Referencia->IdPersona->SegundoNombre} {$personal->C_Referencia->IdPersona->ApellidoPaterno} {$personal->C_Referencia->IdPersona->ApellidoMaterno}" ?></td>
                      </tr>
                      <tr>
                        <td><strong>Numero(s): </strong>
                          <?php foreach ($personal->C_Referencia->IdPersona->getListaTelefonos() as $key => $telefono): ?>
                            <?php echo " {$telefono} " ?>
                          <?php endforeach; ?>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
              <br><br><br>
              <div class="text-center">
                <p>__________________________________</p>
                <p>FIRMA</p>
              </div>

          </div>
        </body>
      </html>

      <?php

      $dompdf=new DOMPDF();
      $dompdf->load_html(ob_get_clean());
      ini_set("memory_limit","128M");
      $dompdf->render();
      $hoy = date("Y-m-d");
      $nameFile = "{$nameCompletFile}-{$hoy}";
      $dompdf->stream("Formulario_$nameFile.pdf");

    }
    else
    {
     echo "<p style='color:red'>Error al ver Formulario Detalle</p>";
    }
    ?>
