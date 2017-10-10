

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

<div class="panel panel-primary" id="mensajeria-float">
  <div class="panel-heading">
    <h2>Buzón de mensajes</h2>
  </div>
  <div class="panel-body" id="contenido-Mensajes">

  </div>
</div>

</body>
</html>
