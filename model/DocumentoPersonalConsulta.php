<?php

class DocumentoPersonalConsulta
{

  private $Conexion;

  function __construct($con)
  {
    $this->Conexion = $con;
  }

  public function save($documento)
  {
    try
    {
      $this->Conexion->beginTransaction();

      $query = "INSERT INTO documentosPersonal (idDocumentosPersonal, idPersonal, nombreDocumento, rutaDocumento)
                VALUES (:idDocumentosPersonal, :idPersonal, :nombreDocumento, :rutaDocumento)";

      $stmtDocumento = $this->Conexion->prepare($query);

      $stmtDocumento->bindValue(':idDocumentosPersonal', $documento->IdDocumentoPersonal);
      $stmtDocumento->bindValue(':idPersonal', $documento->C_Personal);
      $stmtDocumento->bindValue(':nombreDocumento', $documento->NombreDocumento);
      $stmtDocumento->bindValue(':rutaDocumento', $documento->RutaDocumento);

      $stmtDocumento->execute();

      $this->Conexion->commit();

    }
    catch (PDOException $e)
    {
      $this->Conexion->rollBack();
    }
  }

  public function listaDocumentos($id)
  {
    $query = "SELECT * FROM documentosPersonal where idPersonal = :id ORDER BY nombreDocumento";
    $consulta=$this->Conexion->prepare($query);
    $consulta->bindValue(':id', $id);
    $consulta->execute();
    $registro=$consulta->fetchAll();
    return $registro;
  }

  public function existe($documento)
  {
    $query = "SELECT * FROM documentosPersonal where idPersonal = :id and nombreDocumento = :nombre";
    $consulta=$this->Conexion->prepare($query);
    $consulta->bindValue(':id', $documento->C_Personal);
    $consulta->bindValue(':nombre', $documento->NombreDocumento);
    $consulta->execute();
    $registro = $consulta->fetch();
    if ($registro) {
      return true;
    } else {
      return false;
    }
  }

}

?>
