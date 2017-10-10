<?php

class TelefonoDepartamentoConsulta
{

  private $Conexion;

  function __construct($con)
  {
    $this->Conexion = $con;
  }

  public function listaTelefonoDepartamento($idDepartamentoContacto)
  {
    $query = "SELECT td.prefijo, td.tipoTelefono, td.numero
              FROM departamentocontacto dc, telefonodepartamento td
              WHERE dc.idDepartamentoContacto = :idDepartamentoContacto
              AND dc.idDepartamentoContacto = td.idDepartamentoContacto
              ";

    $consulta = $this->Conexion->prepare($query);
    $consulta->bindParam(':idDepartamentoContacto', $idDepartamentoContacto);
    $consulta->execute();
    $listaTelfDpto = $consulta->fetchAll();
    return $listaTelfDpto;
  }//end function

  public function save($telefono)
  {
    try
    {
      $this->Conexion->beginTransaction();

      $query = "INSERT INTO telefonodepartamento (idTelefono, idDepartamentoContacto, tipoTelefono, numero, prefijo)
                VALUES (:idTelefono, :idDepartamentoContacto, :tipoTelefono, :numero, :prefijo)";

      $stmtFax = $this->Conexion->prepare($query);

      $stmtFax->bindValue(':idTelefono', $telefono->idTelefono);
      $stmtFax->bindValue(':idDepartamentoContacto', $telefono->idDepartamentoContacto);
      $stmtFax->bindValue(':tipoTelefono', $telefono->tipoTelefono);
      $stmtFax->bindValue(':numero', $telefono->numero);
      $stmtFax->bindValue(':prefijo', $telefono->prefijo);

      $stmtFax->execute();

      $this->Conexion->commit();

    }
    catch (PDOException $e)
    {
      $this->Conexion->rollBack();
    }
  }

}//end class

?>
