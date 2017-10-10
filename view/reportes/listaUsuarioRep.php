<div class="table-responsive">
  <table class="table table-hover table-striped">
    <thead>
      <tr>
        <th>#</th>
        <th>Nombre Completo</th>
        <th>CI</th>
        <th>Usuario</th>
        <th>Contraseña</th>
      </tr>
    </thead>
    <tbody>
      <?php $i=1; foreach ($listaDeUsuario as $persona): ?>
        <tr>
          <td><?php echo $i ?></td>
          <td><?php echo "{$persona['primerNombre']} {$persona['apellidoPaterno']} {$persona['apellidoMaterno']} " ?></td>
          <td><?php echo $persona['CI'] ?></td>
          <td><?php echo $persona['usuario'] ?></td>
          <td><?php echo $persona['contrasena'] ?></td>
        </tr>
      <?php $i++; endforeach; ?>
    </tbody>
  </table>
</div>
<br>
<div class="container">
  <div class="row">
    <div class="col-xs-2 col-md-2">
      <form action="../reportes/listaUsuarioRepPDF.php" method="POST">
        <input type="hidden" name="tipoPersonal" value="<?php echo $_POST['tipoPersonal'] ?>">
        <button type="submit" class="btn btn-danger ">Exportar PDF <i class="fa fa-file-pdf-o"></i></button>
      </form>
    </div>
  </div>
</div>
<br>
