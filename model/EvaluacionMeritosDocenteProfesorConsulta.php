<?php

class EvaluacionMeritosDocenteProfesorConsulta
{

  private $Conexion;

  function __construct($con)
  {
    $this->Conexion = $con;
  }

  public function actualizar($evaluacionMeritos)
  {
    try
    {

      $this->Conexion->beginTransaction();

      $query = "UPDATE evaluacionMeritosDocenteProfesor
                SET puntajeMerito = :puntajeMerito
                WHERE idPersonal = :idPersonal
                AND idEstructuraMerito = :idEstructuraMerito
                AND evaluacionOficial = :evaluacion";

      $stmtPersona = $this->Conexion->prepare($query);

      $stmtPersona->bindValue(':idPersonal', $evaluacionMeritos->IdPersonal);
      $stmtPersona->bindValue(':idEstructuraMerito', $evaluacionMeritos->IdEstructuraMerito);
      $stmtPersona->bindValue(':puntajeMerito', $evaluacionMeritos->PuntajeMerito);
      $stmtPersona->bindValue(':evaluacion', $evaluacionMeritos->EvaluacionOficial);

      $stmtPersona->execute();

      $this->Conexion->commit();

      return true;

    }
    catch (PDOException $e)
    {
      $this->Conexion->rollBack();
      return false;
    }
  }

  public function crear($evaluacionMeritos)
  {
    try {

            $this->Conexion->beginTransaction();

            $query = "INSERT INTO evaluacionMeritosDocenteProfesor (idPersonal, idEstructuraMerito, puntajeMerito, evaluacionOficial)
                      VALUES (:idPersonal, :idEstructuraMerito, :puntajeMerito, :evaluacionOficial)";

            $stmtPersona = $this->Conexion->prepare($query);

            $stmtPersona->bindValue(':idPersonal', $evaluacionMeritos->IdPersonal);
            $stmtPersona->bindValue(':idEstructuraMerito', $evaluacionMeritos->IdEstructuraMerito);
            $stmtPersona->bindValue(':puntajeMerito', $evaluacionMeritos->PuntajeMerito);
            $stmtPersona->bindValue(':evaluacionOficial', $evaluacionMeritos->EvaluacionOficial);
            //var_dump($evaluacionMeritos);
            $stmtPersona->execute();

            $this->Conexion->commit();

            return true;

        } catch (PDOException $e) {

            $this->Conexion->rollBack();
            return false;
      }


  }// end metodo

  public function existeEvaluacion($idPersonal, $idMerito)
  {
    $query = "SELECT *
              FROM evaluacionmeritosdocenteprofesor
              WHERE idPersonal = :idPersonal
              AND idEstructuraMerito = :idEstructura
              AND evaluacionOficial = 1";
    $consulta = $this->Conexion->prepare($query);
    $consulta->bindValue(':idPersonal', $idPersonal);
    $consulta->bindValue(':idEstructura', $idMerito);
    $consulta->execute();
    $registro = $consulta->fetch();
    if ($registro)
    {
      return true;
    }
    else
    {
      return false;
    }
  }

  public function existeAutoEvaluacion($idPersonal, $idMerito)
  {
    $query = "SELECT *
              FROM evaluacionmeritosdocenteprofesor
              WHERE idPersonal = :idPersonal
              AND idEstructuraMerito = :idEstructura
              AND evaluacionOficial = 0";
    $consulta = $this->Conexion->prepare($query);
    $consulta->bindValue(':idPersonal', $idPersonal);
    $consulta->bindValue(':idEstructura', $idMerito);
    $consulta->execute();
    $registro = $consulta->fetch();
    if ($registro)
    {
      return true;
    }
    else
    {
      return false;
    }
  }

  public function meritosPuntajesAutoEvaluacion($idPersonal)
  {
    $query = "SELECT ev.idPersonal, ev.idEstructuraMerito, ev.puntajeMerito, ev.evaluacionOficial
              FROM evaluacionmeritosdocenteprofesor ev,
                estructurameritos em,
                tablameritosdocenteprofesor tm
              WHERE ev.idEstructuraMerito = em.idEstructuraMerito
              AND em.idTablaMeritoDocenteProfesor = tm.idTablaMeritoDocenteProfesor
              AND ev.idPersonal = :idPersonal
              AND tm.activo = 1
              AND ev.evaluacionOficial = 0";
    $consulta = $this->Conexion->prepare($query);
    $consulta->bindValue(':idPersonal', $idPersonal);
    $consulta->execute();
    $registro = $consulta->fetchAll();
    return $registro;
  }

  public function meritosPuntajesEvaluacion($idPersonal)
  {
    $query = "SELECT *
              FROM evaluacionmeritosdocenteprofesor
              WHERE idPersonal = :idPersonal
              AND evaluacionOficial = 1";
    $consulta = $this->Conexion->prepare($query);
    $consulta->bindValue(':idPersonal', $idPersonal);
    $consulta->execute();
    $registro = $consulta->fetchAll();
    return $registro;
  }

}

?>
