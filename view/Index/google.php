<?php

require_once '../../vendor/autoload.php';
require_once '../../model/Google_Auth.php';
include '../../controller/IdentificadorUsuario.php';

session_start();

$googleCliente = new Google_Client();
$guzzleClient = new \GuzzleHttp\Client(array( 'curl' => array( CURLOPT_SSL_VERIFYPEER => false, ), ));
$googleCliente->setHttpClient($guzzleClient);
$auth = new Google_Auth($googleCliente);

if ($auth->checkRedirectCode())
{
  include '../../model/conexion.php';
  include '../../model/PersonaConsulta.php';
  include '../../model/usuarioConsulta.php';
  include '../../model/usuario.php';
  include '../../model/sesion.php';

  $oAuth =  new Google_Service_Oauth2($googleCliente);
  $userdata = $oAuth->userinfo_v2_me->get();
  $identificador = new IdentificadorUsuario();
  $identificador->setEmail($userdata->email);
  $identificador->verificarCorreoIntitucional();
}

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>GTH</title>
    <link rel="stylesheet" href="../libs/css/bootstrap.min.css">
    <link rel="stylesheet" href="../libs/css/font-awesome/css/font-awesome.min.css">
  </head>
  <body>
    <?php
    if (isset($_SESSION['access_token']))
    {
      if (isset($_SESSION['idTipoUsuario']))
      {
        include '../../model/conexion.php';
        $identificador = new IdentificadorUsuario();
        $identificador->autentificacion($_SESSION['idTipoUsuario']);
      }
      else
      {
        session_destroy();
        header("Location: ../../index.php?modo=AccesDenied");
      }
    }
    else
    {
      ?>
      <style media="screen">
        .container{
          margin: 12%;
        }
      </style>
      <div class="container">
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="panel panel-primary">
              <div class="panel-heading">
                <div class="panel-title text-center">
                  <h1>GTH esta comunicándose con...</h1>
                </div>
              </div>
              <div class="panel-body">
                <center><img src="../libs/multimedia/img/design/google_logo.png" alt="google" class="img-responsive" width="150" height="150"></center>
              </div>
            </div>
          </div>
        </div>
      </div>
      <script type="text/javascript">
        setTimeout("location.href = '<?php echo $auth->getAuthUrl() ?>';", 500);
      </script>
      <?php
     }
    ?>
  </body>
</html>
