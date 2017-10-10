<?php


class ManagePage
{

  private $Modo;

  public function __construct($modo)
  {
    $this->Modo = $modo;
  }

  public function MenuIndex()
  {

    switch ($this->Modo) {

      case 'AccesDenied':
        include 'view/Index/header.php';
        ?>
        <div class="alert alert-danger text-center" style="background: rgb(249, 41, 41); color: white; z-index:2000; position:absolute; right:1em; top:1em;">
          <a href="#" class="btn btn-default close" data-dismiss="alert" aria-label="close"><i class="fa fa-times"></i></a>
          <h4><strong>Error!</strong> Acceso Denegado.</h4>
        </div>
        <?php
        include 'view/Index/body.php';
        include 'view/Index/footer.php';
        break;

      case 'Sesion Caducada':
        echo "sesion caducada";
        break;

      case 'CampLlenos':
        if (isset($_POST['datos']))
        {
          include 'model/usuario.php';
          include 'model/usuarioConsulta.php';
          include 'model/sesion.php';
          include 'model/conexion.php';
          include 'controller/ctrUsuario.php';

          include 'model/PersonaConsulta.php';
          $conexion = new Conexion();
          $personaManejador = new PersonaConsulta($conexion);
          $personaManejador->limpiar();

          $usuario  = new Usuario($_POST['usuario'], $_POST['contrasena']);
          $manageUser = new ManagamentUsuario($conexion);
          $manageUser->ingresar($usuario);
        }
        else
        {
          echo "Llene el formulario";
        }
        break;

      case 'salir':
          session_start();
          session_destroy();
          header("Location: index.php");
          break;

      default:

        include 'view/Index/header.php';
        include 'view/Index/body.php';
        include 'view/Index/footer.php';

        break;
    }

  }


}


?>
