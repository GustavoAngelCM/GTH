<?php


class CtrMenuAdmin
{

  private $Modo;

  public function __construct($modo)
  {
    $this->Modo = $modo;
  }

  public function Menu()
  {

    switch ($this->Modo) {

      case 'listaContactosPersonal':
        include '../../model/conexion.php';
        include '../../model/Persona.php';
        include '../../model/Personal.php';
        include '../../model/PersonalConsulta.php';
        include '../../controller/PersonalControlador.php';
        $conexion = new Conexion();
        $personalManejador = new PersonalControlador($conexion);
        $lista = $personalManejador->listar();
        $personalManejador->contactosPersonal($lista);
        break;

      case 'guardarDocumentoPersonal':
        include '../../model/conexion.php';
        include '../../model/PersonaConsulta.php';
        include '../../model/PersonalConsulta.php';
        include '../../model/DocumentoPersonal.php';
        include '../../model/DocumentoPersonalConsulta.php';
        include '../../controller/DocumentoPersonalControlador.php';
        $conexion = new Conexion();
        $documentoManejador = new DocumentoPersonalControlador($conexion);
        $documentoManejador->crear();
        break;

      case 'verificacionFelicitacion':
        include '../../model/conexion.php';
        include '../../model/Mensaje.php';
        include '../../model/MensajeConsulta.php';
        include '../../controller/MensajeControlador.php';
        $conexion = new Conexion();
        $personalManejador = new MensajeControlador($conexion);
        $resp = $personalManejador->verificar();
        echo json_encode($resp);
        break;

      case 'felicitacionEnd':
        include '../../model/conexion.php';
        include '../../model/Mensaje.php';
        include '../../model/MensajeConsulta.php';
        include '../../controller/MensajeControlador.php';
        $conexion = new Conexion();
        $personalManejador = new MensajeControlador($conexion);
        $resp = $personalManejador->felicitarFin();
        break;

      case 'felicitarPersonal':
        include '../../model/conexion.php';
        include '../../model/Mensaje.php';
        include '../../model/MensajeConsulta.php';
        include '../../controller/MensajeControlador.php';
        $conexion = new Conexion();
        $personalManejador = new MensajeControlador($conexion);
        $resp = $personalManejador->felicitar();
        echo $resp;
        break;

      case 'addInstitucion':
        if ($_POST)
        {
          include '../../model/conexion.php';
          include '../../model/DepartamentoContacto.php';
          include '../../model/DepartamentoContactoConsulta.php';
          include '../../model/Fax.php';
          include '../../model/FaxConsulta.php';
          include '../../model/TelefonoDepartamento.php';
          include '../../model/TelefonoDepartamentoConsulta.php';
          include '../../controller/DepartamentoContactoControlador.php';

          $conexion = new Conexion();
          $departamentoManejador = new DepartamentoContactoControlador($conexion);
          $respuesta = $departamentoManejador->crear();
          echo $respuesta;
        }
        else
        {
          echo "<p style='color:red'><strong>Error al Enviar Datos</strong></p>";
        }
        break;

      case 'addContacto':
        if ($_POST)
        {
          include '../../model/conexion.php';
          include '../../model/Contacto.php';
          include '../../model/ContactoConsulta.php';
          include '../../model/TelefonoContacto.php';
          include '../../model/TelefonoContactoConsulta.php';
          include '../../controller/ContactoControlador.php';
          include '../../controller/TelefonoContactoControlador.php';
          $conexion = new Conexion();
          $contactoControlador = new ContactoControlador($conexion);
          $contactoControlador->crear();
          echo "<p style='color:green'><strong>Guardado Exitoso</strong></p>";
        }
        else
        {
          echo "<p style='color:red'><strong>Error al Enviar Datos</strong></p>";
        }
        break;

      case 'cambiarAccesosFecha':
        if ($_POST)
        {
          include '../../model/conexion.php';
          include '../../model/ConfugurarRegistroDatos.php';
          include '../../model/ConfugurarRegistroDatosConsulta.php';
          include '../../controller/ConfugurarRegistroDatosControlador.php';

          $conexion = new Conexion();

          $config = new ConfugurarRegistroDatosControlador($conexion);
          $config->modificar();

          header("Location: Configuraciones.html");

        }
        else
        {
          header("Location: Configuraciones.html");
        }
        break;

      case 'verArchivo':
        if ($_POST)
        {
          include '../../model/conexion.php';
          include '../../model/Archivo.php';
          include '../../model/ArchivoConsulta.php';
          include '../../controller/ArchivoControlador.php';

          $conexion = new Conexion();

          $archivoManejador = new ArchivoControlador($conexion);
          $archivo = $archivoManejador->ver($_POST['id']);
          include 'vistaDocumento.php';
        }
        else
        {
          echo "<h2><strong>Ah Ocurrido un ERROR al GUARDAR</strong></h2>";
        }
        break;

      case 'agregarDocumentoPDF':
        if ($_POST)
        {
          include '../../model/conexion.php';
          include '../../model/Archivo.php';
          include '../../model/ArchivoConsulta.php';
          include '../../controller/ArchivoControlador.php';

          $conexion = new Conexion();

          $archivoManejador = new ArchivoControlador($conexion);
          $archivoManejador->crear();

          $listaArchivos = $archivoManejador->listar();

          ?>
          <?php $i = 0; foreach ($listaArchivos as $key => $value):  $i++;?>
            <tr>
              <td><?php echo $i ?></td>
              <td><?php echo $value->NombreArchivo ?></td>
              <td><?php echo $value->C_TipoArchivo ?></td>
              <td>
                <form class="frmDataArchiv">
                  <input type="hidden" name="id" value="<?php echo $value->IdArchivo ?>">
                  <button type="submit" class="btn btn-danger" data-toggle="modal" data-target="#verArchivo" name="button"><i class="fa fa-eye"></i></button>
                </form>
              </td>
            </tr>
          <?php endforeach; ?>
          <?php

        }
        else
        {
          echo "<h2><strong>Ah Ocurrido un ERROR al GUARDAR</strong></h2>";
        }
        break;

      case 'documentos':
        include 'header.php';
        include 'bodyDocumentos.php';
        include 'footer.php';
        break;

      case 'tablaMeritoDown':
        include '../../model/conexion.php';
        include '../../model/TablaMeritosDocenteProfesor.php';
        include '../../model/TablaMeritosDocenteProfesorConsulta.php';
        $conexion = new Conexion();
        $tabla = new TablaMeritosDocenteProfesor();
        $tabla->IdTablaMeritosDocenteProfesor = $_POST['id'];
        $tablaConsulta = new TablaMeritosDocenteProfesorConsulta($conexion);
        $tablaConsulta->updateDown($tabla);
        header('Location: Meritos-Lista.html');
        break;

      case 'tablaMeritoUp':
        include '../../model/conexion.php';
        include '../../model/TablaMeritosDocenteProfesor.php';
        include '../../model/TablaMeritosDocenteProfesorConsulta.php';
        $conexion = new Conexion();
        $tabla = new TablaMeritosDocenteProfesor();
        $tabla->IdTablaMeritosDocenteProfesor = $_POST['id'];
        $tablaConsulta = new TablaMeritosDocenteProfesorConsulta($conexion);
        $tablaConsulta->updateUp($tabla);
        header('Location: Meritos-Lista.html');
        break;

      case 'UsuarioDown':
        include '../../model/conexion.php';
        include '../../model/usuario.php';
        include '../../model/usuarioConsulta.php';
        $conexion = new Conexion();
        $usuario = new Usuario("","");
        $usuario->IdUsuario = $_POST['id'];
        $usuarioConsulta = new UsuarioConsulta($conexion);
        $usuarioConsulta->updateDown($usuario);
        header('Location: Usuario-Lista.html');
        break;

      case 'UsuarioUp':
        include '../../model/conexion.php';
        include '../../model/usuario.php';
        include '../../model/usuarioConsulta.php';
        $conexion = new Conexion();
        $usuario = new Usuario("","");
        $usuario->IdUsuario = $_POST['id'];
        $usuarioConsulta = new UsuarioConsulta($conexion);
        $usuarioConsulta->updateUp($usuario);
        header('Location: Usuario-Lista.html');
        break;

      case 'config':
        include 'header.php';
        include 'bodyConfig.php';
        include 'footer.php';
        break;

      case 'publicarNoticia':
        if ($_POST)
        {
          include '../../model/conexion.php';
          include '../../model/Noticia.php';
          include '../../model/NoticiaConsulta.php';
          include '../../controller/NoticiaControlador.php';

          $conexion = new Conexion();

          $noticiaManejador = new NoticiaControlador($conexion);
          $noticiaManejador->crear();

          $listaNoticias = $noticiaManejador->listar();

          foreach ($listaNoticias as $key => $noticia): ?>
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
          <?php endforeach;

        }
        else
        {
          echo "<h2 style='color:red'><strong>Ah Ocurrido un ERROR al PUBLICAR</strong></h2>";
        }
        break;

      case 'listadoUsuario':
        if ($_POST)
        {
          include '../../model/conexion.php';
          include '../../model/usuarioConsulta.php';
          include '../../controller/ReportesControlador.php';

          $conexion = new Conexion();

          $reporte = new ReportesControlador($conexion);
          $listaDeUsuario = $reporte->listadoUsuario();
          include '../reportes/listaUsuarioRep.php';
        }
        else
        {
          echo "<p style='color:red'>Error al cargar REPORTE</p>";
        }
        break;

      case 'listadoPersonal':
        if ($_POST)
        {
          include '../../model/conexion.php';
          include '../../model/PersonalConsulta.php';
          include '../../controller/ReportesControlador.php';

          $conexion = new Conexion();

          $reporte = new ReportesControlador($conexion);
          $listaDePersonal = $reporte->listadoPersonal();
          include '../reportes/listaPersonalRep.php';
        }
        else
        {
          echo "<p style='color:red'>Error al cargar REPORTE</p>";
        }
        break;

      case 'cantidadTipoPersonal':
        if ($_POST)
        {
          include '../../model/conexion.php';
          include '../../model/PersonalConsulta.php';
          include '../../controller/ReportesControlador.php';

          $conexion = new Conexion();

          $reporte = new ReportesControlador($conexion);
          $cantidadDePersonal = $reporte->cantidadTipoPersonal();
          echo json_encode($cantidadDePersonal);
        }
        else
        {
          echo "<p>Error al cargar REPORTE</p>";
        }
        break;

      case 'cantidadPersonal':
        if ($_POST)
        {
          include '../../model/conexion.php';
          include '../../model/PersonalConsulta.php';
          include '../../controller/ReportesControlador.php';

          $conexion = new Conexion();

          $reporte = new ReportesControlador($conexion);
          $cantidadDePersonal = $reporte->cantidadPersonal();
          echo json_encode($cantidadDePersonal);
        }
        else
        {
          echo "<p>Error al cargar REPORTE</p>";
        }
        break;

      case 'reportes':
        include 'header.php';
        include 'bodyReportes.php';
        include 'footer.php';
        break;

      case 'listaPersonal':
        include 'header.php';
        include 'bodylistPers.php';
        include 'footer.php';
        break;

      case 'puntuarMeritoPersonal':
        if (isset($_POST['idPersonal']))
        {
          include '../../model/conexion.php';
          include '../../model/EvaluacionMeritosDocenteProfesor.php';
          include '../../model/EvaluacionMeritosDocenteProfesorConsulta.php';
          include '../../controller/EvaluacionMeritosDocenteProfesorControlador.php';
          $conexion =  new Conexion();
          $evaluacionMeritos = new EvaluacionMeritosDocenteProfesorControlador($conexion);
          $evaluacionMeritos->crear();
        }
        else
        {
          echo "<p style='color:red'> Se Requiere de un Personal</p>";
        }
        break;

      case 'evaluacionMeritos':
        if (isset($_POST['datos']))
        {
          include 'header.php';
          include 'bodyEvaluacionMeritos.php';
          include 'footer.php';
        }
        else
        {
          header("Location: Personal-Lista.html");
        }
        break;

      case 'listaUsuario':
        include 'header.php';
        include 'bodylistaUsuario.php';
        include 'footer.php';
        break;

      case 'regPersonal':
        include 'header.php';
        include 'bodyRegPers.php';
        include 'footer.php';
        break;

      case 'personalELab':
        if (isset($_POST['datos']))
        {
          include '../../model/conexion.php';
          include '../../model/PersonaConsulta.php';
          include '../../model/PersonalConsulta.php';
          include '../../model/ExperienciaLaboral.php';
          include '../../model/ExperienciaLaboralConsulta.php';
          include '../../controller/ExperienciaLaboralControlador.php';
          $conexion = new Conexion();

          $manejadorExperencia = new ExperienciaLaboralControlador($conexion);
          $manejadorExperencia->crear();
        }
        else
        {
          echo "<p style='color:red'>Error al ver Formulario</p>";
        }
        break;

      case 'personalCursos':
        if (isset($_POST['datos']))
        {
          include '../../model/conexion.php';
          include '../../model/PersonaConsulta.php';
          include '../../model/PersonalConsulta.php';
          include '../../model/CursoEstudiado.php';
          include '../../model/CursoEstudiadoConsulta.php';
          include '../../controller/CursoEstudiadoControlador.php';
          $conexion = new Conexion();
          $consulta = new PersonaConsulta($conexion);

          $idPersona = $consulta->obtenerIdPersona($_POST['ciPersonaCurso']);

          $consul = new PersonalConsulta($conexion);

          $idPersonal = $consul->obtenerIdPersonal($idPersona['idPersona']);

          $target_path = "/wamp64/www/PersonalUAB/view/libs/multimedia/img/respaldoPersonal/";
          $target_path = $target_path . basename( "curso-".$_POST['cursoEstudiado']."-{$_POST['anhoEstudioCuso']}-".$_POST['nombreInstitucionCursos']."-".strtoupper($_POST['ciPersonaCurso']).".jpg");


          $a=move_uploaded_file($_FILES["respaldoCursos"]["tmp_name"], $target_path);

          $cursoEstudiado = new CursoEstudiado();

          $cursoEstudiado->IdPersonal = $idPersonal['idPersonal'];
          $cursoEstudiado->NombreInstitucion = $_POST['nombreInstitucionCursos'];
          $cursoEstudiado->CursoEstudiado = $_POST['cursoEstudiado'];
          $cursoEstudiado->AnhoEstudio = $_POST['anhoEstudioCuso'];
          $cursoEstudiado->ReligionInstitucion = $_POST['religionInstCurso'];
          $cursoEstudiado->RespaldoTituloPDF = $target_path;

          $cursoEstudiadoManejador = new CursoEstudiadoControlador($conexion);
          $cursoEstudiadoManejador->crear($cursoEstudiado);

          $listaCursoEstudiado = $cursoEstudiadoManejador->listarPer($cursoEstudiado->IdPersonal);
          $i = 0;
          ?>
          <div class="table-responsive">
            <table class="table table-hover table-bordered">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Curso</th>
                  <th>Institucion</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($listaCursoEstudiado as $listaCE): $i++;?>
                  <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $listaCE->CursoEstudiado; ?></td>
                    <td><?php echo $listaCE->NombreInstitucion; ?></td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
          <?php

        }
        else
        {
          echo "<p style='color:red'>Error al ver Formulario</p>";
        }
        break;

      case 'personalTitulos':
        if (isset($_POST['datos']))
        {
          include '../../model/conexion.php';
          include '../../model/PersonaConsulta.php';
          include '../../model/PersonalConsulta.php';
          include '../../model/TituloProfesional.php';
          include '../../model/TituloProfesionalConsulta.php';
          include '../../controller/TituloProfesionalControlador.php';
          $conexion = new Conexion();
          $consulta = new PersonaConsulta($conexion);

          $idPersona = $consulta->obtenerIdPersona($_POST['ciPersonaTitulo']);

          $consul = new PersonalConsulta($conexion);

          $idPersonal = $consul->obtenerIdPersonal($idPersona['idPersona']);

          $target_path = "/wamp64/www/PersonalUAB/view/libs/multimedia/img/respaldoPersonal/";
          if($_FILES['respaldoTitulo']['tmp_name']!="")
          {
            $target_path = $target_path . basename( "titulo-".$_POST['cursoProfesionalEstudiado']."-{$_POST['nombreInstitucionTitulos']}-".$_POST['tipoTituloProfesional']."-".strtoupper($_POST['ciPersonaTitulo']).".jpg");

            $a=move_uploaded_file($_FILES["respaldoTitulo"]["tmp_name"], $target_path);
          }
          else
          {

            $srcfile='C:\wamp64\www\PersonalUAB\view\libs\multimedia\img\design\archivo.png';

            $target_path = $target_path . basename( "titulo-".$_POST['cursoProfesionalEstudiado']."-{$_POST['nombreInstitucionTitulos']}-".$_POST['tipoTituloProfesional']."-".strtoupper($_POST['ciPersonaTitulo']).".jpg");

            copy($srcfile, $target_path);

          }


          $tituloProfesional = new TituloProfesional();

          $tituloProfesional->IdTipoTituloProfesional = $_POST['tipoTituloProfesional'];
          $tituloProfesional->IdPersonal = $idPersonal['idPersonal'];
          $tituloProfesional->NombreInstitucion = $_POST['nombreInstitucionTitulos'];
          $tituloProfesional->CursoProfesionalEstudiado = $_POST['cursoProfesionalEstudiado'];
          $tituloProfesional->TiempoEstudio = $_POST['anhoEstudioTitulo'];
          $tituloProfesional->ReligionInstitucion = $_POST['religionInstTitulo'];
          $tituloProfesional->RespaldoTituloPDF = $target_path;

          $tituloProfesionalManejador = new TituloProfesionalControlador($conexion);
          $tituloProfesionalManejador->crear($tituloProfesional);

          $listaTituloProfesional = $tituloProfesionalManejador->listarPer($tituloProfesional->IdPersonal);
          $i = 0;
          ?>
          <div class="table-responsive">
            <table class="table table-hover table-bordered">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Curso Profesional</th>
                  <th>Institucion</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($listaTituloProfesional as $listaTP): $i++;?>
                  <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $listaTP->CursoProfesionalEstudiado; ?></td>
                    <td><?php echo $listaTP->NombreInstitucion; ?></td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
          <?php

        }
        else
        {
          echo "<p style='color:red'>Error al ver Formulario</p>";
        }
        break;

      case 'verPersonal':
        if (isset($_POST['datos']))
        {
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

          $conexion = new Conexion();
          $consulta = new PersonaConsulta($conexion);

          $idPersona = $consulta->obtenerIdPersona($_POST['ciPersonalDetalle']);
          // $idPersona = $consulta->obtenerIdPersona(7548743);
          //
          // $consul = new PersonalConsulta($conexion);
          //
          // $idPersonal = $consul->datosPersonal($idPersona['idPersona']);// COMEMTAR

          $personalManejador = new PersonalControlador($conexion);

          $personal = $personalManejador->ver($idPersona['idPersona']);

          include 'modalDetallePersonal.php';

        }
        else
        {
          echo "<p style='color:red'>Error al ver Formulario Detalle</p>";
        }
        break;

        case 'personaReferenciaEditar':
          if ($_POST)
          {
            include '../../model/conexion.php';
            include '../../model/Persona.php';
            include '../../model/PersonaConsulta.php';
            include '../../model/PersonalConsulta.php';
            include '../../model/ReferenciaPersonal.php';
            include '../../model/Telefono.php';
            include '../../model/TelefonoConsulta.php';
            include '../../controller/PersonaControlador.php';
            include '../../controller/ReferenciaPersonalControlador.php';
            include '../../controller/TelefonoControlador.php';

            $conexion = new Conexion();

            $personaManejador = new ReferenciaPersonalControlador($conexion);
            $personaManejador->editar();

            echo "<p style='color:green'>Guardado</p>";
          }
          else
          {
            echo "<p style='color:red'>Error al Enviar Formulario</p>";
          }
          break;

      case 'personaReferenciaInsertar':
        if (isset($_POST['datos']))
        {
          $ci = $_POST['ciPersonReferencia'].$_POST['primerNombreRef'].$_POST['segundoNombreRef'];
          include '../../model/conexion.php';
          include '../../model/Persona.php';
          include '../../model/PersonaConsulta.php';
          include '../../model/PersonalConsulta.php';
          include '../../model/ReferenciaPersonal.php';
          include '../../model/Telefono.php';
          include '../../model/TelefonoConsulta.php';
          include '../../controller/PersonaControlador.php';
          include '../../controller/ReferenciaPersonalControlador.php';
          include '../../controller/TelefonoControlador.php';

          $conexion = new Conexion();
          $persona = new Persona();
          $persona->PrimerNombre = ucwords(strtolower($_POST['primerNombreRef']));
          $persona->SegundoNombre = ucwords(strtolower($_POST['segundoNombreRef']));
          $persona->ApellidoPaterno = ucwords(strtolower($_POST['apellidoPaternoRef']));
          $persona->ApellidoMaterno = ucwords(strtolower($_POST['apellidoMaternoRef']));
          $persona->CI = strtoupper($ci);

          $personaManejador = new PersonaControlador($conexion);
          $personaManejador->crear($persona);

          $consulta = new PersonaConsulta($conexion);

          $idReferenciaPersona = $consulta->obtenerIdPersona($persona->CI);//obteniendo id de persona referencia de personal

          // telefono
          $telefono = new Telefono();
          $telefono->IdPersona = $idReferenciaPersona['idPersona'];
          $telefono->NumeroTelefono = $_POST['telefonoReferencia'];
          $telefonoManejador = new TelefonoControlador($conexion);
          $telefonoManejador->crear($telefono);

          $idPersona = $consulta->obtenerIdPersona($_POST['ciPersonReferencia']);//obteniendo id de persona personal

          $consul = new PersonalConsulta($conexion);

          $idPersonal = $consul->obtenerIdPersonal($idPersona['idPersona']);

          $referenciaPersonal = new ReferenciaPersonal();
          $referenciaPersonal->IdPersona = $idReferenciaPersona['idPersona'];
          $referenciaPersonal->IdPersonal = $idPersonal['idPersonal'];

          $referenciaPersonalManejador = new ReferenciaPersonalControlador($conexion);
          $referenciaPersonalManejador->crear($referenciaPersonal);

          echo "<p style='color:green'>Guardado</p>";
        }
        else
        {
          echo "<p style='color:red'>Error al Enviar Formulario</p>";
        }
        break;

      case 'personaHijoEditar':
        if ($_POST)
        {
          include '../../model/conexion.php';
          include '../../model/Persona.php';
          include '../../model/PersonaConsulta.php';
          include '../../model/HijosPersonal.php';
          include '../../model/HijosPersonalConsulta.php';
          include '../../controller/HijosPersonalControlador.php';

          $conexion = new Conexion();
          $hijoManejador = new HijosPersonalControlador($conexion);
          $hijoManejador->editar();
        }
        else
        {
          echo "<p style='color:red'>Error al Enviar Formulario</p>";
        }
        break;

      case 'personaHijoInsertar':
        if (isset($_POST['datos']))
        {
          $ci = $_POST['ciPersonHijo'].$_POST['primerNombreHij'].$_POST['segundoNombreHij'];
          include '../../model/conexion.php';
          include '../../model/Persona.php';
          include '../../model/PersonaConsulta.php';
          include '../../model/PersonalConsulta.php';
          include '../../model/HijosPersonal.php';
          include '../../model/HijosPersonalConsulta.php';
          include '../../controller/PersonaControlador.php';
          include '../../controller/HijosPersonalControlador.php';

          $conexion = new Conexion();
          $persona = new Persona();
          $persona->PrimerNombre = ucwords(strtolower($_POST['primerNombreHij']));
          $persona->SegundoNombre = ucwords(strtolower($_POST['segundoNombreHij']));
          $persona->ApellidoPaterno = ucwords(strtolower($_POST['apellidoPaternoHij']));
          $persona->ApellidoMaterno = ucwords(strtolower($_POST['apellidoMaternoHij']));
          $persona->CI = strtoupper($ci);
          $persona->FechaNacimiento = $_POST['fechaNacimientoHij'];

          $personaManejador = new PersonaControlador($conexion);
          $personaManejador->crear($persona);

          $consulta = new PersonaConsulta($conexion);

          $idHijoPersona = $consulta->obtenerIdPersona($persona->CI);//obteniendo id de persona hijo de personal

          $idPersona = $consulta->obtenerIdPersona($_POST['ciPersonHijo']);//obteniendo id de persona personal

          $consul = new PersonalConsulta($conexion);

          $idPersonal = $consul->obtenerIdPersonal($idPersona['idPersona']);

          $hijoPersonal = new HijosPersonal();
          $hijoPersonal->IdPersona = $idHijoPersona['idPersona'];
          $hijoPersonal->IdPersonal = $idPersonal['idPersonal'];

          $hijoPersonalManejador = new HijosPersonalControlador($conexion);
          $hijoPersonalManejador->crear($hijoPersonal);

          $listaHijos = $hijoPersonalManejador->verHijos($idPersonal['idPersonal']);

          ?>
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
                <?php foreach ($listaHijos as $hijo): ?>
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
          <?php

          echo "<p style='color:green'>Guardado</p>";
        }
        else
        {
          echo "<p style='color:red'>Error al Enviar Formulario</p>";
        }
        break;

      case 'personaConyugueInsertar':
        if (isset($_POST['datos']))
        {
          $ci = $_POST['ciPersonConyu'].$_POST['primerNombreCon'].$_POST['segundoNombreCon'];
          include '../../model/conexion.php';
          include '../../model/Persona.php';
          include '../../model/PersonaConsulta.php';
          include '../../model/PersonalConsulta.php';
          include '../../model/ConyuguePersonal.php';
          include '../../model/ConyuguePersonalConsulta.php';
          include '../../controller/PersonaControlador.php';
          include '../../controller/ConyuguePersonalControlador.php';
          $conexion = new Conexion();
          $persona = new Persona();
          $persona->PrimerNombre = ucwords(strtolower($_POST['primerNombreCon']));
          $persona->SegundoNombre = ucwords(strtolower($_POST['segundoNombreCon']));
          $persona->ApellidoPaterno = ucwords(strtolower($_POST['apellidoPaternoCon']));
          $persona->ApellidoMaterno = ucwords(strtolower($_POST['apellidoMaternoCon']));
          $persona->CI = strtoupper($ci);
          $persona->FechaNacimiento = $_POST['fechaNacimientoCon'];
          $persona->EstadoCivil = 2;

          $personaManejador = new PersonaControlador($conexion);
          $personaManejador->crear($persona);

          $consulta = new PersonaConsulta($conexion);

          $idConyuPersona = $consulta->obtenerIdPersona($persona->CI);//obteniendo id de persona pareja de personal

          $idPersona = $consulta->obtenerIdPersona($_POST['ciPersonConyu']);//obteniendo id de persona personal

          $consul = new PersonalConsulta($conexion);

          $idPersonal = $consul->obtenerIdPersonal($idPersona['idPersona']);//obteniendo id personal mediante id persona

          $conyuguePersonal = new ConyuguePersonal();
          $conyuguePersonal->IdPersona = $idConyuPersona['idPersona'];
          $conyuguePersonal->IdPersonal = $idPersonal['idPersonal'];
          $conyuguePersonal->FechaMatrimonio = $_POST['fechaBautizmoCon'];

          $personalConyugueManajedor = new ConyuguePersonalControlador($conexion);
          $personalConyugueManajedor->crear($conyuguePersonal);

          echo "<p style='color:green'>Guardado Conyugue</p>";
        }
        else
        {
          echo "<p style='color:red'>Error al Enviar Formulario</p>";
        }
        break;

      case 'personaInsertar':
        if (isset($_POST['datos']))
        {
          include '../../model/conexion.php';
          include '../../model/Persona.php';
          include '../../model/PersonaConsulta.php';
          include '../../model/Telefono.php';
          include '../../model/TelefonoConsulta.php';
          include '../../controller/PersonaControlador.php';
          include '../../controller/TelefonoControlador.php';
          $conexion = new Conexion();

          $persona = new Persona();
          $persona->PrimerNombre = ucwords(strtolower($_POST['primerNombre']));
          $persona->SegundoNombre = ucwords(strtolower($_POST['segundoNombre']));
          $persona->ApellidoPaterno = ucwords(strtolower($_POST['apellidoPaterno']));
          $persona->ApellidoMaterno = ucwords(strtolower($_POST['apellidoMaterno']));
          $persona->CI = strtoupper($_POST['ciNit']);
          $persona->LugarExpedicion = ucwords(strtolower($_POST['lugarExpedicion']));
          $persona->FechaNacimiento = $_POST['fechaNac'];
          $persona->Sexo = strtoupper($_POST['sexo']);
          $persona->EstadoCivil = ucwords(strtolower($_POST['estadoCivil']));
          $personaManejador = new PersonaControlador($conexion);
          $personaManejador->crear($persona);

          $consulta = new PersonaConsulta($conexion);

          $idP = $consulta->obtenerIdPersona($persona->CI);

          $telefono = new Telefono();
          $telefono->IdPersona = $idP['idPersona'];
          $telefono->NumeroTelefono = $_POST['telefono'];
          $telefonoManejador = new TelefonoControlador($conexion);
          $telefonoManejador->crear($telefono);

          echo "<p style='color:green'>Guardado Exitoso</p>";

        }
        else
        {
          echo "<p style='color: red'> Por favor LLene el Formulario PersonalUAB/Datos Generales </p>";
        }
        break;

      case 'autoEvaluarMerito':

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

        $idPersona = $consulta->obtenerIdPersona($_POST['ciNit']);

        $personalManejador = new PersonalControlador($conexion);

        $personal = $personalManejador->ver($idPersona['idPersona']);

        $objMeritoDocenteConsulta = new EstructuraMeritosConsulta($conexion);
        $meritos = $objMeritoDocenteConsulta->listaEstructuraMeritosSegunPersonal($_POST['tipoPersonal']);

        if ($meritos)
        {
          $evaluacionManejador = new EvaluacionMeritosDocenteProfesorControlador($conexion);
          $evaluacion = $evaluacionManejador->listaAutoEvalucionPersonal($personal->IdPersonal);

          ?>
          <div class="row">
            <div class="col-sm-12 col-xs-12 col-md-6 col-lg-6">
              <div class="panel panel-primary">
                <div class="panel-heading">
                  <h3 class="panel-title">Tabla de Meritos</h3>
                </div>
                <div class="panel-body">
                  <form id="guardarAutoCalificacion">
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
                        <strong>Total Puntos Meritos: </strong> <input type="text" class="form-control puntajeTotal" id="puntajeTotal" name="puntajeTotal" value="0" readonly>
                      </div>
                      <input type="hidden" name="idPersonal" value="<?php echo $personal->IdPersonal ?>">
                      <br><br><br><br>
                      <div class="pull-right">
                        <button type="submit" class="btn btn-success btn-lg" name="guardar">Guardar Evaluacion <i class="fa fa-paper-plane"></i></button>
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
                                <th>Nombre Curso</th>
                                <th>Institucion</th>
                                <th>Religion Institucion</th>
                                <th>Año de Estudio</th>
                              </tr>
                            </thead>
                            <tbody>
                              <div class="text-center"><strong>CURSOS ESTUDIADOS</strong></div><br>
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
                                <th>Nombre Titulo</th>
                                <th>Institucion</th>
                                <th>Religion Institucion</th>
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
                              <th>Institucion</th>
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
          <div class="mensajeCalificacion" id="mensajeCalificacion">

          </div>
          <script src="../libs/js/controlMeritos.js"></script>
          <script src="../libs/js/guardarCalificacion.js"></script>
          <script src="../libs/js/autosuma.js"></script>
          <?php
        }
        else
        {
          echo "<div class='text-center' style='color:red'><h2><strong>No existe Evaluacíon Asignada</strong></h2></div>";
        }

        break;

      case 'puntuarAutoMeritoPersonal':
        if (isset($_POST['idPersonal']))
        {
          include '../../model/conexion.php';
          include '../../model/EvaluacionMeritosDocenteProfesor.php';
          include '../../model/EvaluacionMeritosDocenteProfesorConsulta.php';
          include '../../controller/EvaluacionMeritosDocenteProfesorControlador.php';
          $conexion =  new Conexion();
          $evaluacionMeritos = new EvaluacionMeritosDocenteProfesorControlador($conexion);
          $evaluacionMeritos->crearAuto();
        }
        else
        {
          echo "<p style='color:red'>Error al Enviar</p>";
        }
        break;

      case 'personaEditar':
        if ($_POST)
        {
          include '../../model/conexion.php';
          include '../../model/Persona.php';
          include '../../model/PersonaConsulta.php';
          include '../../model/Telefono.php';
          include '../../model/TelefonoConsulta.php';
          include '../../controller/PersonaControlador.php';
          include '../../controller/TelefonoControlador.php';
          $conexion = new Conexion();

          $personaManejador = new PersonaControlador($conexion);
          $respuesta = $personaManejador->editar();
          /*
          1. Sin Modificacion
          2. Existe Persona
          3. Guardado Exitoso
          4. Error Guardar
          */
          echo $respuesta;

        }
        else
        {
          echo "<p style='color:red'>Error al enviar datos</p>";
        }
        break;

      case 'personalInsertar':
        if ($_POST)
        {
          include '../../model/conexion.php';
          include '../../model/PersonaConsulta.php';
          include '../../model/Personal.php';
          include '../../model/PersonalConsulta.php';
          include '../../controller/PersonalControlador.php';
          $conexion = new Conexion();

          $consulta = new PersonaConsulta($conexion);

          $target_path = "/wamp64/www/PersonalUAB/view/libs/multimedia/img/personal/";
          $target_path = $target_path . basename("img".strtoupper($_POST['ciPersona']).".jpg");

          $a=move_uploaded_file($_FILES["fotoPersonal"]["tmp_name"], $target_path);

           //echo "Arg1: " . $_FILES["fotoPersonal"]["tmp_name"] . "<br>";
           //echo "Arg2: " . $_FILES["fotoPersonal"]["name"] . "<br>";
          // echo "Cantidad Movida: " . $a . "<br>";

          $idP = $consulta->obtenerIdPersona(strtoupper($_POST['ciPersona']));

          $personal = new Personal();
          $personal->IdPersona = $idP['idPersona'];
          $personal->IdNacion = $_POST['nacionalidad'];
          $personal->IdTipoPersonal = $_POST['tipoPersonal'];
          $personal->IdCarrera = $_POST['carrera'];
          $personal->IdCargo = $_POST['cargoPersonal'];
          $personal->Direccion = $_POST['direccion'];
          $personal->Email = $_POST['email'];
          $personal->IdCiudadNacimiento = $_POST['ciudad'];
          $personal->IdReligion = $_POST['religion'];
          $personal->FechaBautizmo = $_POST['fechaBau'];
          $personal->IdSeguro = $_POST['seguro'];
          $personal->NumeroSeguro = $_POST['numSeguro'];
          $personal->IdAfp = $_POST['afp'];
          $personal->NumeroAfp = $_POST['numSeguro'];
          $personal->NumeroLibretaMilitar = $_POST['numLibMilitar'];
          $personal->NumeroPasaporte = $_POST['numPasaporte'];
          $personal->TipoSangre = $_POST['tipoSangre'];
          $personal->Hobby = $_POST['hobby'];
          $personal->LecturaPreferencial = $_POST['lecturaP'];
          $personal->NumeroRegistroProfesional = $_POST['numeroRegProfesional'];
          $personal->FechaIngreso = $_POST['fechaIngres'];
          $personal->Ruta = $target_path;

          $personalManejador = new PersonalControlador($conexion);
          $personalManejador->crear($personal);

          $consulta = new PersonalConsulta($conexion);
          $idP = $consulta->obtenerIdPersonal($personal->IdPersona);
          $id = $idP['idPersonal'];

          if (isset($_POST['cargos']))
          {
            foreach($_POST['cargos'] as $item)
            {
              $personalManejador->agregarCargo($id, $item);
            }
          }
          if (isset($_POST['enfermedades']))
          {
            foreach($_POST['enfermedades'] as $item)
            {
              $personalManejador->agregarEnfermedad($id, $item);
            }
          }
          if (isset($_POST['deportes']))
          {
            foreach($_POST['deportes'] as $item)
            {
              $personalManejador->agregarDeporte($id, $item);
            }
          }

          echo "<p style='color:green'>Guardado Exitoso</p>";
        }
        else
        {
          echo "<p style='color:red'>Error al Guardar</p>";
        }

        break;

      case 'usuarioInsertar':
        if (strlen($_POST['ciPersona'])>4)
        {
          include '../../model/conexion.php';
          include '../../model/Persona.php';
          include '../../model/PersonaConsulta.php';
          include '../../model/usuario.php';
          include '../../model/usuarioConsulta.php';
          include '../../model/Personal.php';
          include '../../model/PersonalConsulta.php';
          include '../../controller/UsuarioControlador.php';
          include '../../controller/PersonalControlador.php';

          $conexion = new Conexion();
          $consulta = new PersonaConsulta($conexion);
          $idP = $consulta->obtenerIdPersona(strtoupper($_POST['ciPersona']));

          $usuario = new Usuario($_POST['nombreUsuario'],$_POST['contrasena']);
          $usuario->IdUsuario = null;
          $usuario->TipoUsuario = $_POST['tipoUsuario'];
          $usuario->Estado = 1;
          $usuario->Borrado = 0;
          $usuario->IdPersona = $idP['idPersona'];
          $usuarioManejador = new UsuarioControlador($conexion);
          $resp = $usuarioManejador->crear($usuario);
          $resp2 = 0;
          if ($usuario->TipoUsuario != "2"  )
          {
            $personalPrevent = new PersonalControlador($conexion);
            $resp2 = $personalPrevent->crearPreventUsuario($usuario->IdPersona);
          }

          if ($resp == 0 && $resp2 == 0)
          {
            echo "1";
          }
          else
          {
            echo "0";
          }

        }
        else
        {
          echo "<p style='color: red'> Error al guardar.  Complete primero los datos personales. </p>";
        }
        break;

      case 'regUsuario':
        include 'header.php';
        include 'bodyRegUsuario.php';
        include 'footer.php';
        break;

      case 'cumplePersonal':
        include 'header.php';
        include 'bodyCumple.php';
        include 'footer.php';
        break;

      case 'contactoInsertar':
      if (isset($_POST['datos']))
      {
        $ci = $_POST['primerNombreRef'].$_POST['apellidoPaternoRef'];
        include '../../model/conexion.php';
        include '../../model/Persona.php';
        include '../../model/PersonaConsulta.php';
        include '../../model/Telefono.php';
        include '../../model/TelefonoConsulta.php';
        include '../../controller/PersonaControlador.php';
        include '../../controller/TelefonoControlador.php';

        $conexion = new Conexion();
        $persona = new Persona();
        $persona->PrimerNombre = ucwords(strtolower($_POST['primerNombreRef']));
        $persona->SegundoNombre = ucwords(strtolower($_POST['segundoNombreRef']));
        $persona->ApellidoPaterno = ucwords(strtolower($_POST['apellidoPaternoRef']));
        $persona->ApellidoMaterno = ucwords(strtolower($_POST['apellidoMaternoRef']));
        $persona->CI = strtoupper($ci);

        $personaManejador = new PersonaControlador($conexion);
        $personaManejador->crear($persona);

        $consulta = new PersonaConsulta($conexion);

        $idReferenciaPersona = $consulta->obtenerIdPersona($persona->CI);//obteniendo id de persona referencia de personal

        // telefono
        $telefono = new Telefono();
        $telefono->IdPersona = $idReferenciaPersona['idPersona'];
        $telefono->NumeroTelefono = $_POST['telefonoReferencia'];
        $telefonoManejador = new TelefonoControlador($conexion);
        $telefonoManejador->crear($telefono);

        echo "<p style='color:green'>Guardado</p>";
      }
      else
      {
        echo "<p style='color:red'>Error al Enviar Formulario</p>";
      }
      break;

      case 'NuevaTablaMeritos':
            include 'header.php';
            include 'bodyRegistrarTablaMeritosDocenteProfesor.php';
            include 'footer.php';
      break;

      case 'RegistrarNuevaTablaMeritos':
        if (isset($_POST['datos']))
        {
          include '../../model/conexion.php';
          include '../../model/TablaMeritosDocenteProfesor.php';
          include '../../model/TablaMeritosDocenteProfesorConsulta.php';
          include '../../model/EstructuraMeritos.php';
          include '../../model/EstructuraMeritosConsulta.php';

          $conexion = new Conexion();

          $tablaMeritos = new TablaMeritosDocenteProfesor();
          $tablaMeritos->IdTablaMeritosDocenteProfesor = null;

          $tablaMeritos->Version = strtoupper($_POST['version']);

          $tablaMeritos->TipoMerito = $_POST['tipoMerito'];

          $tablaMeritos->FechaCreacion = $_POST['fechaCreacion'];

          $tablaMeritos->Activo = $_POST['activo'];

          $tablaMeritosConsulta = new  TablaMeritosDocenteProfesorConsulta($conexion);

          if($_POST['activo'] == '1'){
            //verificando si existe una tabla de Merito activa juntamente con el tipo de de merito docente/profesor
            //ya que solamente puede existir una activa y las otras no
            $resultadoSiExisteTablaMeritoActivoPorTipoMerito = $tablaMeritosConsulta->existeMeritoActivoPorTipoMerito($_POST['activo'],$_POST['tipoMerito']);

            if($resultadoSiExisteTablaMeritoActivoPorTipoMerito){
                  echo "<p style='color:red'>Existe una Tabla de Meritos Activa para el tipo: ".$_POST['tipoMerito']." </p>";
            }else{

                      $idTablaMerito = $tablaMeritosConsulta->crear($tablaMeritos);
                      //echo "$idTablaMerito" . $idTablaMerito;
                      $archivoXml = $_FILES["archivo"]["tmp_name"];
                      $xmlData = simplexml_load_file($archivoXml);//parseando el archivo XML
                      // Crear tabla merito docentes
                      $objMeritoDocenteConsulta = new EstructuraMeritosConsulta($conexion);
                      foreach ($xmlData->categoria as $categoria):
                        $nombre=$categoria->nombre;//este es del archivo XML
                        $puntaje=$categoria->puntaje;  //este es del archivo XML
                        $objCategoria = new EstructuraMeritos();
                        $objCategoria->IdTablaMeritoDocenteProfesor = $idTablaMerito;
                        $objCategoria->IdEstructuraMeritoPrimario = null;// es la categoria
                        $objCategoria->NombreMerito = $nombre;
                        $objCategoria->PuntajeMerito = $puntaje;
                        $idCategoria = $objMeritoDocenteConsulta->crear($objCategoria);
                        //La categoria tiene "meritos" , y ahora se va a iterar sus meritos
                        foreach ($categoria->merito as $merito):
                          $nombre=$merito->nombre;
                          $puntaje=$merito->puntaje;

                          $objMerito = new EstructuraMeritos();
                          $objMerito->IdTablaMeritoDocenteProfesor = $idTablaMerito;
                          //Aqui se tiene el id de la categoria primaria
                          $objMerito->IdEstructuraMeritoPrimario = $idCategoria;
                          $objMerito->NombreMerito = $nombre;
                          $objMerito->PuntajeMerito = $puntaje;
                          $objMeritoDocenteConsulta->crear($objMerito);
                        endforeach;
                      endforeach;
                      //Recuperando la estructura  las categorias con sus estructuras
                      //Los UL y LI se puede cambiar por tablas
                      $meritos = $objMeritoDocenteConsulta->listaEstructuraMeritos($idTablaMerito);

                      echo "<table class='table table-hover' border = 1>";
                      $contador = 1;
                      foreach ($meritos as $categoria):
                        echo "<thead>
                              <tr>
                                  <th>".$contador.".-</th>
                                  <th colspan='2'><strong>".$categoria->NombreMerito." (".$categoria->PuntajeMerito." puntos)</strong></th>
                              </tr>
                              </thead>";
                              $subcontador = 1;
                        foreach ($categoria->SubMeritos as $merito):
                          echo "<tbody>
                                  <tr>
                                    <td>".$contador.".".$subcontador."</td>
                                    <td>".$merito->NombreMerito."</td>
                                    <td>".$merito->PuntajeMerito."</td>
                                  </tr>
                                </tbody>
                        ";
                          $subcontador++;
                          endforeach;
                        $contador++;
                      endforeach;
                      echo "</table>";

                      echo "<p style='color:green'>Guardado Exitoso</p>";
            }
          }else{

                $idTablaMerito = $tablaMeritosConsulta->crear($tablaMeritos);
                //echo "$idTablaMerito" . $idTablaMerito;
                $archivoXml = $_FILES["archivo"]["tmp_name"];
                $xmlData = simplexml_load_file($archivoXml);//parseando el archivo XML
                // Crear tabla merito docentes
                $objMeritoDocenteConsulta = new EstructuraMeritosConsulta($conexion);
                foreach ($xmlData->categoria as $categoria):
                  $nombre=$categoria->nombre;//este es del archivo XML
                  $puntaje=$categoria->puntaje;  //este es del archivo XML
                  $objCategoria = new EstructuraMeritos();
                  $objCategoria->IdTablaMeritoDocenteProfesor = $idTablaMerito;
                  $objCategoria->IdEstructuraMeritoPrimario = null;// es la categoria
                  $objCategoria->NombreMerito = $nombre;
                  $objCategoria->PuntajeMerito = $puntaje;
                  $idCategoria = $objMeritoDocenteConsulta->crear($objCategoria);
                  //La categoria tiene "meritos" , y ahora se va a iterar sus meritos
                  foreach ($categoria->merito as $merito):
                    $nombre=$merito->nombre;
                    $puntaje=$merito->puntaje;

                    $objMerito = new EstructuraMeritos();
                    $objMerito->IdTablaMeritoDocenteProfesor = $idTablaMerito;
                    //Aqui se tiene el id de la categoria primaria
                    $objMerito->IdEstructuraMeritoPrimario = $idCategoria;
                    $objMerito->NombreMerito = $nombre;
                    $objMerito->PuntajeMerito = $puntaje;
                    $objMeritoDocenteConsulta->crear($objMerito);
                  endforeach;
                endforeach;
                //Recuperando la estructura  las categorias con sus estructuras
                //Los UL y LI se puede cambiar por tablas
                $meritos = $objMeritoDocenteConsulta->listaEstructuraMeritos($idTablaMerito);

                echo "<table class='table table-hover' border = 1>";
                $contador = 1;
                foreach ($meritos as $categoria):
                  echo "<thead>
                        <tr>
                            <th>".$contador.".-</th>
                            <th><strong>".$categoria->NombreMerito." (".$categoria->PuntajeMerito." puntos)</strong></th>
                        </tr>
                        </thead>";
                        $subcontador = 1;
                  foreach ($categoria->SubMeritos as $merito):
                    echo "<tbody>
                            <tr>
                              <td>".$contador.".".$subcontador."</td>
                              <td>".$merito->NombreMerito."</td>
                              <td>".$merito->PuntajeMerito."</td>
                            </tr>
                          </tbody>
                  ";
                    $subcontador++;
                    endforeach;
                  $contador++;
                endforeach;
                echo "</table>";

                echo "<p style='color:green'>Guardado Exitoso</p>";
          }
        }
        else
        {
          echo "<p style='color: red'> Por favor llene el Formulario Nueva Tabla de Meritos </p>";
        }


      break;

      case 'tablaCalificacionMeritosDocente':
            include 'header.php';
            include 'bodyListaTablaCalificacion.php';
            include 'footer.php';
      break;

      //registro de meritos
      case 'registrarMeritoDocente':
          echo "llegue";
            if(isset($_FILES["archivo"]["type"]))
            {
                include '../../model/conexion.php';
                include '../../model/MeritosDocente.php';
                include '../../model/MeritosDocenteConsulta.php';

                $conexion = new Conexion();
                $xml = $_FILES["archivo"]["tmp_name"];
                $xmlData = simplexml_load_file($xml);
                // Crear tabla merito docentes

                $tablaMeritos = new TablaMeritosDocenteProfesor();


                foreach ($xmlData->categoria as $categoria):
                  $nombre=$categoria->nombre;
                  $puntaje=$categoria->puntaje;

                  $objMeritoDocenteConsulta = new MeritosDocenteConsulta($conexion);
                  $objCategoria = new MeritosDocente();
                  $objCategoria->IdMeritoDocente = null;
                  $objCategoria->IdMeritoDocentePrimario = null;
                  $objCategoria->NombreMerito = $nombre;
                  $objCategoria->PuntajeMerito = $puntaje;
                  $idCategoria = $objMeritoDocenteConsulta->crear($objCategoria);
                  foreach ($categoria->merito as $merito):
                    $nombre=$merito->nombre;
                    $puntaje=$merito->puntaje;

                    $objMerito = new MeritosDocente();
                    $objMerito->IdMeritoDocente = null;
                    $objMerito->IdMeritoDocentePrimario = $idCategoria;
                    $objMerito->NombreMerito = $nombre;
                    $objMerito->PuntajeMerito = $puntaje;
                  endforeach;
                endforeach;

                if($exitoRegistrarMerito){
                  echo "El merito fue registrado correctamente";
                }else{
                  echo "Error al registrar el merito";
                }


            }else{

              echo "Debe lllenar los campos";
            }
      break;

      case 'verTablaMeritos':
        if ($_POST)
        {
          include '../../model/conexion.php';
          include '../../model/EstructuraMeritos.php';
          include '../../model/EstructuraMeritosConsulta.php';
          $conexion = new Conexion();
          $objMeritoDocenteConsulta = new EstructuraMeritosConsulta($conexion);
          $meritos = $objMeritoDocenteConsulta->listaEstructuraMeritos($_POST['idTablaMerito']);
          echo "<table class='table table-hover table-bordered' border = 1>";
          $contador = 1;
          foreach ($meritos as $categoria):
            echo "<thead>
                  <tr>
                      <th>".$contador.".-</th>
                      <th><strong>".$categoria->NombreMerito." (".$categoria->PuntajeMerito." puntos)</strong></th>
                      <th></th>
                  </tr>
                  </thead>";
                  $subcontador = 1;
            foreach ($categoria->SubMeritos as $merito):
              echo "<tbody>
                      <tr>
                        <td>".$contador.".".$subcontador."</td>
                        <td>".$merito->NombreMerito."</td>
                        <td>".$merito->PuntajeMerito."</td>
                      </tr>
                    </tbody>
            ";
              $subcontador++;
              endforeach;
            $contador++;
          endforeach;
          echo "</table>";
        }
        else
        {
          echo "<p style='color:red'>Error al enviar Datos</p>";
        }
        break;

      case 'listaDirectorio':
        include 'header.php';
        include 'bodyListaDirectorio.php';
        include 'footer.php';
        break;

      case 'salir':
          session_start();
          session_destroy();
          header("Location: ../../index.php");
          break;

      case 'addNewLugarExpedicion':
        if ($_POST)
        {
          include '../../model/conexion.php';
          include '../../model/LugarExpedicion.php';
          include '../../model/LugarExpedicionConsulta.php';
          include '../../controller/CtrLugarExpedicion.php';
          $conexion = new Conexion();
          $lugarExpedicion = new CtrLugarExpedicion($conexion);
          $lugarExpedicion->crear();
        }
        break;

      case 'addTipoNoticia':
        if ($_POST)
        {
          include '../../model/conexion.php';
          include '../../model/TipoNoticia.php';
          include '../../model/TipoNoticiaConsulta.php';
          include '../../controller/TipoNoticiaControlador.php';
          $conexion = new Conexion();
          $tipoNoticiaManejador = new TipoNoticiaControlador($conexion);
          $tipoNoticiaManejador->crear();
          $listaTipoNoticia = $tipoNoticiaManejador->listar();
          ?>
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
          <?php
        }
        else
        {
          echo "<p style='color:red'><strong>Error al Enviar</strong></p>";
        }
        break;

      case 'addCargos':
        if ($_POST)
        {
          include '../../model/conexion.php';
          include '../../model/Cargo.php';
          include '../../model/CargoConsulta.php';
          include '../../controller/CargoControlador.php';
          $conexion = new Conexion();
          $cargoManejador = new CargoControlador($conexion);
          $cargoManejador->crear();
          $listaCargos = $cargoManejador->listar();
          ?>
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
          <?php
        }
        else
        {
          echo "<p style='color:red'><strong>Error al Enviar</strong></p>";
        }
        break;

      case 'addCargosPersona':
        if ($_POST)
        {
          include '../../model/conexion.php';
          include '../../model/CargoPersona.php';
          include '../../model/CargoPersonaConsulta.php';
          include '../../controller/CargoPersonaControlador.php';
          $conexion = new Conexion();
          $cargosPersonaManejador = new CargoPersonaControlador($conexion);
          $cargosPersonaManejador->crear();
          $listaCargosPersona = $cargosPersonaManejador->listar();
          ?>
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
          <?php
        }
        else
        {
          echo "<p style='color:red'><strong>Error al Enviar</strong></p>";
        }
        break;

      case 'addCarrera':
        if ($_POST)
        {
          include '../../model/conexion.php';
          include '../../model/Facultad.php';
          include '../../model/FacultadConsulta.php';
          include '../../model/Carrera.php';
          include '../../model/CarreraConsulta.php';
          include '../../controller/FacultadControlador.php';
          include '../../controller/CarreraControlador.php';
          $conexion = new Conexion();
          $carreraManejador = new CarreraControlador($conexion);
          $carreraManejador->crear();

          $facultadManejador = new FacultadControlador($conexion);
          $listaFacultadCarrera = $facultadManejador->listar();
          ?>
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
          <?php
        }
        else
        {
          echo "<p style='color:red'><strong>Error al Enviar</strong></p>";
        }
        break;

      case 'addFacultad':
        if ($_POST)
        {
          include '../../model/conexion.php';
          include '../../model/Facultad.php';
          include '../../model/FacultadConsulta.php';
          include '../../model/Carrera.php';
          include '../../model/CarreraConsulta.php';
          include '../../controller/FacultadControlador.php';
          $conexion = new Conexion();
          $facultadManejador = new FacultadControlador($conexion);
          $facultadManejador->crear();

          $listaFacultades = $facultadManejador->listar();
          ?>
          <table class="table table-bordered table-hover">
            <thead>
              <tr class="info">
                <th class="text-center">Nombre</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($listaFacultades as $key => $facultad): ?>
                <tr>
                  <td class="text-center"><?php echo $facultad->NombreFacultad ?></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
          <?php

        }
        else
        {
          echo "<p style='color:red'><strong>Error al Enviar</strong></p>";
        }
        break;

      case 'addTipoArchivo':
        if ($_POST)
        {
          include '../../model/conexion.php';
          include '../../model/TipoArchivo.php';
          include '../../model/TipoArchivoConsulta.php';
          include '../../controller/TipoArchivoControlador.php';
          $conexion = new Conexion();
          $tipoArchivoManejador = new TipoArchivoControlador($conexion);
          $tipoArchivoManejador->crear();

          $listaTipoArchivo = $tipoArchivoManejador->listar();
          ?>
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
          <?php
        }
        else
        {
          echo "<p style='color:red'>Erro al Enviar Datos</p>";
        }
        break;

      case 'addNewNacionalidad':
        if ($_POST)
        {
          include '../../model/conexion.php';
          include '../../model/Nacion.php';
          include '../../model/NacionConsulta.php';
          include '../../controller/NacionControlador.php';
          $conexion = new Conexion();
          $lugarExpedicion = new NacionControlador($conexion);
          $lugarExpedicion->crear();
        }
        break;

      case 'addNewCiudad':
        if ($_POST)
        {
          include '../../model/conexion.php';
          include '../../model/Ciudad.php';
          include '../../model/CiudadConsulta.php';
          include '../../controller/CiudadControlador.php';
          $conexion = new Conexion();
          $ciudad = new CiudadControlador($conexion);
          $ciudad->crear();
        }
        break;

      case 'addNewReligion':
        if ($_POST)
        {
          include '../../model/conexion.php';
          include '../../model/Religion.php';
          include '../../model/ReligionConsulta.php';
          include '../../controller/ReligionControlador.php';
          $conexion = new Conexion();
          $religion = new ReligionControlador($conexion);
          $religion->crear();
        }
        break;

      case 'addNewSeguro':
        if ($_POST)
        {
          include '../../model/conexion.php';
          include '../../model/Seguro.php';
          include '../../model/SeguroConsulta.php';
          include '../../controller/SeguroControlador.php';
          $conexion = new Conexion();
          $seguro = new SeguroControlador($conexion);
          $seguro->crear();
        }
        break;

      case 'addNewAfp':
        if ($_POST)
        {
          include '../../model/conexion.php';
          include '../../model/Afp.php';
          include '../../model/AfpConsulta.php';
          include '../../controller/AfpControlador.php';
          $conexion = new Conexion();
          $afp = new AfpControlador($conexion);
          $afp->crear();
        }
        break;

      case 'addNewEnfermedad':
        if ($_POST)
        {
          include '../../model/conexion.php';
          include '../../model/Enfermedad.php';
          include '../../model/EnfermedadConsulta.php';
          include '../../controller/EnfermedadControlador.php';
          $conexion = new Conexion();
          $enfermedad = new EnfermedadControlador($conexion);
          $enfermedad->crear();
        }
        break;

      case 'addNewDeporte':
        if ($_POST)
        {
          include '../../model/conexion.php';
          include '../../model/Deporte.php';
          include '../../model/DeporteConsulta.php';
          include '../../controller/DeporteControlador.php';
          $conexion = new Conexion();
          $deporte = new DeporteControlador($conexion);
          $deporte->crear();
        }
        break;

      case 'darDeBajaPersonal':
        if ($_POST)
        {
          include '../../model/conexion.php';
          include '../../model/Persona.php';
          include '../../model/Personal.php';
          include '../../model/PersonaConsulta.php';
          include '../../model/PersonalConsulta.php';
          include '../../model/usuario.php';
          include '../../model/usuarioConsulta.php';
          include '../../controller/PersonalControlador.php';
          $conexion = new Conexion();
          $personalManejdor = new PersonalControlador($conexion);
          $personalManejdor->darBeBaja();
          header("Location: Personal-Lista.html");
        }
        else
        {
          header("Location: index.php");
        }
        break;

      case 'personalEditar':
        if ($_POST)
        {
          include '../../model/conexion.php';
          include '../../model/PersonaConsulta.php';
          include '../../model/Personal.php';
          include '../../model/PersonalConsulta.php';
          include '../../controller/PersonalControlador.php';
          $conexion = new Conexion();

          $personalManejador = new PersonalControlador($conexion);
          $respuesta = $personalManejador->editar();
          echo $respuesta;
        }
        else
        {
          echo "<p style='color:red'>Error al Enviar Formulario</p>";
        }
        break;

      case 'personaConyugueEditar':
        if ($_POST)
        {
          include '../../model/conexion.php';
          include '../../model/Persona.php';
          include '../../model/PersonaConsulta.php';
          include '../../model/PersonalConsulta.php';
          include '../../model/ConyuguePersonal.php';
          include '../../model/ConyuguePersonalConsulta.php';
          include '../../controller/PersonaControlador.php';
          include '../../controller/ConyuguePersonalControlador.php';
          $conexion = new Conexion();

          $conyugueManajador = new ConyuguePersonalControlador($conexion);
          $conyugueManajador->editar();
          echo "<p style='color:green'>Cambio Exitoso</p>";
        }
        else
        {
          echo "<p style='color:red'>Error al Enviar Formulario</p>";
        }
        break;

      case 'habilitarPersonal':
        if ($_POST)
        {
          include '../../model/conexion.php';
          include '../../model/Persona.php';
          include '../../model/Personal.php';
          include '../../model/PersonaConsulta.php';
          include '../../model/PersonalConsulta.php';
          include '../../model/usuario.php';
          include '../../model/usuarioConsulta.php';
          include '../../controller/PersonalControlador.php';
          $conexion = new Conexion();
          $personalManejdor = new PersonalControlador($conexion);
          $personalManejdor->habilitar();
          header("Location: Personal-Lista.html");
        }
        else
        {
          header("Location: index.php");
        }
        break;

      case 'telefonoAdd':
        if ($_POST)
        {
          include '../../model/conexion.php';
          include '../../model/Telefono.php';
          include '../../model/TelefonoConsulta.php';
          include '../../controller/TelefonoControlador.php';
          $conexion = new Conexion();

          $telefonoManejador = new TelefonoControlador($conexion);
          $telefonoManejador->crearT();
        }
        else
        {
          echo "<p style='color:red'>Error al Enviar Formulario</p>";
        }
        break;

      case 'telefonoDelete':
        if ($_POST)
        {
          include '../../model/conexion.php';
          include '../../model/Telefono.php';
          include '../../model/TelefonoConsulta.php';
          include '../../controller/TelefonoControlador.php';
          $conexion = new Conexion();

          $telefonoManejador = new TelefonoControlador($conexion);
          $telefonoManejador->borrar();
        }
        else
        {
          echo "<p style='color:red'>Error al Enviar Formulario</p>";
        }
        break;

      case 'editarPersonal':
        if ($_POST)
        {

          include 'header.php';
          include 'bodyEditarPersonal.php';
          include 'footer.php';

        }
        else
        {
          header("Location: index.php?modo=listaPersonal");
        }
        break;

      case 'verHojaDeVida':
        if ($_POST)
        {
          include 'header.php';
          include 'bodyHojaDeVida.php';
          include 'footer.php';
        }
        else
        {
          header("Location: Personal-Lista.html");
        }
        break;

      case 'updateUsuario':
        if ($_POST)
        {
          include '../../model/conexion.php';
          include '../../model/Usuario.php';
          include '../../model/usuarioConsulta.php';
          include '../../controller/usuarioControlador.php';
          $conexion = new Conexion();

          $usuarioManejador = new UsuarioControlador($conexion);
          $respuesta = $usuarioManejador->actualizar();
          if ($respuesta == 1)
          {
            session_destroy();
          }
          echo $respuesta;
        }
        else
        {
          header("<p style='color:red'><strong>Error al Enviar Datos</strong></p>");
        }
        break;

      default:

        include 'header.php';
        include 'body.php';
        include 'footer.php';

        break;
    }

  }


}


?>
