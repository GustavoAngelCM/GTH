

</div>
</div>
</div>

</div>

<!-- Mainly scripts -->
<script src="../libs/js/jquery.min.js"></script>
<script src="../libs/js/bootstrap.min.js"></script>
<script src="../libs/js/bootstrap-select.min.js"></script>
<script src="../libs/js/bootstrap-datepicker.min.js"></script>
<script src="../libs/js/jquery.metisMenu.js"></script>
<script src="../libs/js/bootstrap-toggle.min.js"></script>

<!-- Custom and plugin javascript -->
<script src="../libs/js/inspinia.js"></script>
<script src="../libs/js/pace.min.js"></script>

<script src="../libs/js/table.js"></script>
<script src="../libs/js/enviarPersonaUsuario.js"></script>
<script src="../libs/js/enviarUsuario.js"></script>
<script src="../libs/js/enviarPersona.js"></script>
<script src="../libs/js/enviarPersonal.js"></script>
<script src="../libs/js/enviarConyugue.js"></script>
<script src="../libs/js/enviarHijo.js"></script>
<script src="../libs/js/enviarReferencia.js"></script>
<script src="../libs/js/detallePersonal.js"></script>
<script src="../libs/js/guardarCursoEstudiado.js"></script>
<script src="../libs/js/guardarTituloProfesional.js"></script>
<script src="../libs/js/guardarExperienciaLaboral.js"></script>
<script src="../libs/js/registrarNuevaTablaMerito.js"></script>
<script src="../libs/js/imagenesLoad.js"></script>
<script src="../libs/js/cambioCargoFacultad.js"></script>
<script src="../libs/js/autosuma.js"></script>
<script src="../libs/js/controlMeritos.js"></script>
<script src="../libs/js/guardarCalificacion.js"></script>
<script src="../libs/js/initial.js"></script>
<script src="../libs/js/moblieProp.js"></script>
<script src="../libs/js/autoEvaluacionMeritos.js"></script>
<script src="../libs/js/addLugarExpedicion.js"></script>
<script src="../libs/js/addNacionalidad.js"></script>
<script src="../libs/js/addCiudad.js"></script>
<script src="../libs/js/addReligion.js"></script>
<script src="../libs/js/addSeguro.js"></script>
<script src="../libs/js/addAfp.js"></script>
<script src="../libs/js/addEnfermedad.js"></script>
<script src="../libs/js/addDeporte.js"></script>
<script src="../libs/js/telefonoCrud.js"></script>
<script src="../libs/js/reportes.js"></script>
<script src="../libs/js/chartJS/Chart.js-2.6.0/dist/Chart.bundle.min.js"></script>
<script src="../libs/js/FileSaver.min.js"></script>
<script src="../libs/js/canvas-toBlob.js"></script>
<script src="../libs/js/noticia.js"></script>
<script src="../libs/js/tipoArchivo.js"></script>
<script src="../libs/js/documetos.js"></script>
<script src="../libs/js/addFacultad.js"></script>
<script src="../libs/js/addCarrera.js"></script>
<script src="../libs/js/addCargosPersonal.js"></script>
<script src="../libs/js/addCargos.js"></script>
<script src="../libs/js/addTipoNoticia.js"></script>
<script src="../libs/js/contactos.js"></script>
<script src="../libs/js/usuario.js"></script>
<script src="../libs/js/alertify.min.js"></script>
<script src="../libs/js/mensajes.js"></script>
<script src="../libs/js/documentoPersonal.js"></script>

<div id="fondoModal"></div>
<a href="#wrapper" class="efec btn btn-primary back-to-top"><i class="fa fa-chevron-up"></i></a>
<a class="btn btn-danger inbox-float" id="abrir-mensaje"><i class="fa fa-commenting"></i></a>
<a class="btn btn-danger inbox-float" id="cerrar-mensaje"><i class="fa fa-times"></i></a>

<div class="modal fade" id="editarUsuarioModal" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog">
    <div class="modal-content" style="border-radius: 20px;">
      <form id="editarUsuarioFRM">
        <div class="modal-body" id="usuarioUpdateTrue">
          <div class="panel panel-danger">
            <div class="panel-heading">
              <div class="text-center">
                <h3>Editar Mis Datos de Usuario</h3>
              </div>
            </div>
            <div class="panel-body">
              <div id="mensajeErrUsuario"></div>
              <div>
                <label>Usuario: </label>
                <input type="text" class="form-control" style="border-radius: 7px;" name="usuario" value="" placeholder="<?php echo $_SESSION['usuario'] ?>" required>
                <label>Contraseña Actual: </label>
                <input type="password" class="form-control" style="border-radius: 7px;" name="contrasena" value="" placeholder="*********" required>
                <label>Contraseña Nueva: </label>
                <input type="password" class="form-control" style="border-radius: 7px;" name="contrasenaN" value="" placeholder="*********" required>
                <label>Repita la Nueva Contraseña: </label>
                <input type="password" class="form-control" style="border-radius: 7px;" name="contrasenaNR" value="" placeholder="*********" required>
                <input type="hidden" name="id" value="<?php echo $_SESSION['idUsuario'] ?>">
                <input type="hidden" name="user" value="<?php echo $_SESSION['usuario'] ?>">
                <input type="hidden" name="contra" value="<?php echo $_SESSION['contrasena'] ?>">
              </div>
              <hr>
              <div class="pull-right" id="usuarioControl">
                <button type="button" data-dismiss="modal" class="btn btn-danger btn-lg" >Cerrar <i class="fa fa-times"></i></button>
                <button type="submit" class="btn btn-success btn-lg">CAMBIAR <i class="fa fa-paper-plane"></i></button>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="modalView" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" name="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3 class="modal-title text-center"> <i class="fa fa-user"></i> Personal-UAB</h3>
      </div>
      <div class="modal-body">
        <div class="contenidoDetalle" id="contenidoDetalle">
          <div class="thumbnail">
            <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-4">
                <center><img src="../libs/multimedia/img/design/logo-uab.png" alt="uab-logo" width="150" height="150" class="img img-responsive img-rounded"></center>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-4">
                <div class="text-center">
                  <h3>GESTIÓN DEL TALENTO HUMANO</h3>
                  <br><br>
                  <h1><strong>FICHA PERSONAL</strong></h1>
                </div>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-4">
                <?php if ($personal->Ruta): ?>
                  <?php
                    list($nada,$ruta) = explode("/wamp64/www/PersonalUAB/view/", $personal->Ruta);
                  ?>
                  <center><img src="‪<?php echo "../../../".$ruta ?>" alt="persona" class="img img-responsive img-rounded" width="110" height="110"></center>
                <?php endif; ?>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="table-responsive">
                  <table class="table table-hover">
                    <tbody>
                      <div><strong style="color:red">DATOS GENERALES</strong></div><br>
                      <tr>
                        <td> <strong>Apellidos y nombres: </strong> <?php echo " {$personal->IdPersona->ApellidoPaterno} {$personal->IdPersona->ApellidoMaterno} {$personal->IdPersona->PrimerNombre} {$personal->IdPersona->SegundoNombre}" ?></td>
                        <td></td>
                      </tr>
                      <tr>
                        <td> <strong>Fecha de nacimiento: </strong> <?php echo " {$personal->IdPersona->FechaNacimiento}" ?></td>
                        <td> <strong>Lugar de nacimiento: </strong> <?php echo $personal->IdCiudadNacimiento; ?> </td>
                      </tr>
                      <tr>
                        <td><strong>Nacionalidad: </strong><?php echo $personal->IdNacion; ?></td>
                        <td></td>
                      </tr>
                      <tr>
                        <td><strong>Carnet de identidad: </strong><?php echo " {$personal->IdPersona->CI} {$personal->IdPersona->LugarExpedicion}" ?></td>
                        <td><strong>Pasaporte o C.E.: </strong><?php echo $personal->NumeroPasaporte ?></td>
                      </tr>
                      <tr>
                        <td><strong>Religión: </strong><?php echo $personal->IdReligion ?></td>
                        <td><strong>Fecha de bautismo: </strong><?php echo $personal->FechaBautizmo ?></td>
                      </tr>
                      <tr>
                        <td><strong>Dirección actual: </strong><?php echo $personal->Direccion ?></td>
                        <td></td>
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
                        <td></td>
                      </tr>
                      <tr>
                        <td><strong>Email: </strong><?php echo $personal->Email ?></td>
                        <td></td>
                      </tr>
                      <?php if ($personal->IdCargo == null): ?>
                        <?php if ($personal->ListaCargos): ?>
                          <tr>
                            <td><strong>Cargo: </strong><?php echo $personal->ListaCargos[0]->NombreCargo ?></td>
                            <td></td>
                          </tr>
                        <?php endif; ?>
                      <?php else: ?>
                        <tr>
                          <td><strong>Cargo: </strong><?php echo $personal->IdCargo ?></td>
                          <td></td>
                        </tr>
                      <?php endif; ?>
                      <tr>
                        <td><strong>Número de registro profesional: </strong><?php echo $personal->NumeroRegistroProfesional ?></td>
                        <td></td>
                      </tr>
                      <?php if ($personal->C_Conyugue->IdPersona->PrimerNombre): ?>
                        <tr>
                          <td><strong>Nombres y apellidos del cónyugue: </strong><?php echo "{$personal->C_Conyugue->IdPersona->PrimerNombre} {$personal->C_Conyugue->IdPersona->SegundoNombre} {$personal->C_Conyugue->IdPersona->ApellidoPaterno} {$personal->C_Conyugue->IdPersona->ApellidoMaterno} " ?></td>
                          <td><strong>Fecha de nacimiento: </strong><?php echo $personal->C_Conyugue->IdPersona->FechaNacimiento ?></td>
                        </tr>
                        <tr>
                          <td><strong>Fecha de matrimonio: </strong><?php echo $personal->C_Conyugue->FechaMatrimonio ?></td>
                          <td></td>
                        </tr>
                      <?php endif; ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          <?php $i = 1; ?>
            <?php if ($personal->C_HijosLista): ?>
              <div class="row">
                <div class="col-xs-1 col-sm-1 col-md-2"></div>
                <div class="col-xs-10 col-sm-10 col-md-8">
                  <div class="table-responsive">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Nombre Completo</th>
                          <th>Fecha de Nacimiento</th>
                        </tr>
                      </thead>
                      <tbody>
                        <div class="text-center"><strong style="color:red">HIJOS</strong></div><br>
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
                <div class="col-xs-1 col-sm-1 col-md-2"></div>
              </div>
            <?php endif; ?>

            <?php $i = 1; ?>
              <div class="row">
                <div class="col-xs-1 col-sm-1 col-md-2"></div>
                <div class="col-xs-10 col-sm-10 col-md-8">
                  <div class="table-responsive">
                    <table class="table table-hover table-center">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Mención del curso</th>
                          <th>Institución</th>
                          <th>Rol</th>
                          <th>Año de Estudio</th>
                        </tr>
                      </thead>
                      <tbody>
                        <div class="text-center"><strong style="color:red">SEMINARIOS Y CURSOS TALLERES</strong></div><br>
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
                <div class="col-xs-1 col-sm-1 col-md-2"></div>
              </div>
            <?php $i = 1; ?>
              <div class="row">
                <div class="col-xs-1 col-sm-1 col-md-2"></div>
                <div class="col-xs-10 col-sm-10 col-md-8">
                  <div class="table-responsive">
                    <table class="table table-hover table-center">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Mención del tiutlo</th>
                          <th>Institución</th>
                          <th>Estado</th>
                          <th>Tiempo de Estudio(Años)</th>
                        </tr>
                      </thead>
                      <tbody>
                        <div class="text-center"><strong style="color:red">TITULOS QUE POSEE</strong></div><br>
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
                <div class="col-xs-1 col-sm-1 col-md-2"></div>
              </div>

            <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="table-responsive">
                  <table class="table table-hover">
                    <tbody>
                      <div><strong style="color:red">OTROS DATOS</strong></div><br>
                      <tr>
                        <td><strong>Deportes favoritos: </strong>
                          <?php
                            foreach ($personal->ListaDeportes as $deporte)
                            {
                              echo "<br /> - {$deporte->NombreDeporte} " ;
                            }
                          ?>
                        </td>
                        <td></td>
                      </tr>
                      <tr>
                        <td><strong>Libro favorito: </strong><?php echo $personal->LecturaPreferencial ?></td>
                        <td></td>
                      </tr>
                      <tr>
                        <td><strong>Hobby: </strong><?php echo $personal->Hobby ?></td>
                        <td></td>
                      </tr>
                      <tr>
                        <td><strong>Enfermedades y/o Alergias</strong>
                          <?php
                            foreach ($personal->ListaEnfermedades as $enfermedad)
                            {
                              echo "<br /> - {$enfermedad->NombreEnfermedad} " ;
                            }
                          ?>
                        </td>
                        <td></td>
                      </tr>
                      <tr>
                        <td><strong>Tipo de sangre: </strong><?php echo $personal->TipoSangre ?></td>
                        <td></td>
                      </tr>
                      <tr>
                          <td><strong>En caso de emergencia llamar a: </strong><?php echo "{$personal->C_Referencia->IdPersona->PrimerNombre} {$personal->C_Referencia->IdPersona->SegundoNombre} {$personal->C_Referencia->IdPersona->ApellidoPaterno} {$personal->C_Referencia->IdPersona->ApellidoMaterno}" ?></td>
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
            </div>
            <br><br><br>
            <div class="text-center">
              <p>__________________________________</p>
              <p>FIRMA</p>
            </div>
          </div>

        </div>
      </div>
      <div class="modal-footer">
        <div class="pull-left">
          <a id="exportarFormularioPDF" href="formularioLlenoPDF.php?datos=1&ciPersonalDetalle=<?php echo $personal->IdPersona->CI; ?>" class="btn btn-danger">Exportar PDF <i class="fa fa-file-pdf-o"></i></a>
        </div>
        <div class="pull-right">
          <a data-dismiss="modal" class="btn btn-danger btn-lg">CERRAR <i class="fa fa-times"></i></a>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade working">
  <div class="modal-dialog">
    <div class="modal-content" style="border-radius: 50px;">
      <div class="modal-body">
        <center>
          <img src="../libs/multimedia/img/design/estamosTrabajando.png" class="img-responsive img-rounded">
        </center>
        <br>
        <div class="pull-right">
          <button class="btn btn-danger btn-sm" data-dismiss="modal" aria-hidden="true">Cerrar <i class="fa fa-times-circle"></i></button>
        </div>
        <br>
      </div>
    </div>
  </div>
</div>

<div class="panel panel-primary" id="mensajeria-float">
  <div class="panel-heading">
    <h2>Buzón de mensajes</h2>
  </div>
  <div class="panel-body" id="contenido-Mensajes">

  </div>
</div>

</body>
</html>
