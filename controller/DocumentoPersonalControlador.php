<?php

class DocumentoPersonalControlador
{

  private $Conexion;

  function __construct($con)
  {
    $this->Conexion = $con;
  }

  public function listar($idPersonal)
  {
    $consulta = new DocumentoPersonalConsulta($this->Conexion);
    $listaDocumnetos = $consulta->listaDocumentos($idPersonal);
    $listaArray = array();
    $i = 0;
    foreach ($listaDocumnetos as $listaC) {
      $documento = new DocumentoPersonal();
      $documento->IdDocumentoPersonal = $listaC['idDocumentosPersonal'];
      $documento->NombreDocumento = $listaC['nombreDocumento'];
      $documento->RutaDocumento = $listaC['rutaDocumento'];
      $documento->C_Personal = $listaC['idPersonal'];
      $listaArray[$i] = $documento;
      $i++;
    }
    return $listaArray;
  }

  public function crear()
  {
    if (strlen($_POST['ciPersonaDocumento'])>4)
    {
      $consulta = new PersonaConsulta($this->Conexion);
      $idPersona = $consulta->obtenerIdPersona($_POST['ciPersonaDocumento']);

      $consul = new PersonalConsulta($this->Conexion);
      $idPersonal = $consul->obtenerIdPersonal($idPersona['idPersona']);

      $target_path = "/wamp64/www/PersonalUAB/view/libs/multimedia/img/documentos/";
      $target_path = $target_path . basename( "documento-".$_POST['nombreDocumento']."-{$_POST['ciPersonaDocumento']}".".jpg");
      $a=move_uploaded_file($_FILES["documento-Personal"]["tmp_name"], $target_path);

      $documento = new DocumentoPersonal();
      $documento->NombreDocumento = $_POST['nombreDocumento'];
      $documento->RutaDocumento = $target_path;
      $documento->C_Personal = $idPersonal['idPersonal'];

      $documentoConsulta = new DocumentoPersonalConsulta($this->Conexion);

      if ($documentoConsulta->existe($documento) == false)
      {
        $documentoConsulta->save($documento);
        echo "<p style='color:green'> Se ha guardado correctamente </p>";
        $this->mostarDocumentos($documento->C_Personal);
      }
      else
      {
        echo "<p style='color:red'> El archivo existe </p>";
        $this->mostarDocumentos($documento->C_Personal);
      }
    }
    else
    {
      echo "<p style='color:red'> Error al guardar </p>";
    }

  }

  public function mostarDocumentos($id)
  {
    $listaD = $this->listar($id);
    ?>
    <div class="table-responsive">
      <table class="table table-hover table-bordered">
        <thead>
          <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Documento (imágen)</th>
          </tr>
        </thead>
        <tbody>
          <?php $i = 0; foreach ($listaD as $lista): $i++;?>
            <tr>
              <td><?php echo $i; ?></td>
              <td><?php echo $lista->NombreDocumento; ?></td>
              <td>
                  <?php
                    list($nada,$ruta) = explode("/wamp64/www/PersonalUAB/view/", $lista->RutaDocumento);
                  ?>
                  <img id="repuestaFoto" src="‪<?php echo "../../../".$ruta ?>" class="img-responsive img-rounded" width="50" height="50">
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
    <?php
  }

}

?>
