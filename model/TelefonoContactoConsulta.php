<?php

class TelefonoContactoConsulta
{

  private $Conexion;

  function __construct($con)
  {
    $this->Conexion = $con;
  }

  public function listaTelefonoContacto($idContacto)
  {
    $query = "SELECT tc.tipoTelefono, tc.numero
              FROM contacto c, telefonoContacto tc
              WHERE c.idContacto = :idContacto
              AND c.idContacto = tc.idContacto
              ";

    $consulta = $this->Conexion->prepare($query);
    $consulta->bindParam(':idContacto', $idContacto);
    $consulta->execute();
    $registro = $consulta->fetchAll();
    return $registro;
  }

  public function idContactoMax()
  {
    $query = "SELECT MAX(idContacto) as 'id'
              FROM contacto
              ";

    $consulta = $this->Conexion->prepare($query);
    $consulta->execute();
    $registro = $consulta->fetch();
    return $registro;
  }

  public function save($TelefonoContacto)
  {
    try
    {
      //var_dump($contacto); ver datos
      $this->Conexion->beginTransaction();

      $query = "INSERT INTO telefonoContacto (idTelefonoContacto,idContacto,tipoTelefono,numero) VALUES (:idTelefonoContacto,:idContacto,:tipoTelefono,:numero)";

      $stmtContacto = $this->Conexion->prepare($query);

      $stmtContacto->bindValue(':idTelefonoContacto', null);
      $stmtContacto->bindValue(':idContacto', $TelefonoContacto->idContacto);
      $stmtContacto->bindValue(':tipoTelefono', $TelefonoContacto->tipoTelefono);
      $stmtContacto->bindValue(':numero', $TelefonoContacto->numero);
      $stmtContacto->execute();
      $this->Conexion->commit();
    }
    catch (PDOException $e)
    {
      $this->Conexion->rollBack();
    }
  }

}

?>
