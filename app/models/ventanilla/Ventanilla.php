<?php

use LDAP\Result;

require_once '../../models/conn.php';

class Ventanilla
{
    private $conn;

    public function __construct()
    {
        $this->conn = getConnection();
    }

    public function crearVentanilla()
    {
        try {
            $sql = "INSERT INTO ventanilla (turno, estado) VALUES (0, 0)";
            $stmt = $this->conn->prepare($sql);

            // Bindear los parámetros
            /* $stmt->bindParam(':turno', $turno);
            $stmt->bindParam(':estado', $estado); */

            // Ejecutar la consulta
            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            return "Error: " . $e->getMessage();
        }
    }

    public function listarVentanilla()
    {
        $sql = "SELECT * FROM ventanilla WHERE estado = 0";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $resultados;
    }
    public function activarVentanilla($id)
    {
        /* Actualizamos la ventanilla a activdo */
        $sql = "UPDATE ventanilla SET estado = 1 WHERE id_ventanilla = $id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        /* Luego retornamos la ventanilla activada */
        $sql = "SELECT * FROM ventanilla WHERE id_ventanilla = $id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $resultados;
    }
    public function desActivarVentanilla($id)
    {
        /* Actualizamos la ventanilla a activdo */
        $sql = "UPDATE ventanilla SET turno = 0, estado = 0 WHERE id_ventanilla = $id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        /* Luego retornamos la ventanilla desactivada */
        $sql = "SELECT * FROM ventanilla WHERE id_ventanilla = $id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $resultados;
    }

    public function reiniciarTodo()
    {
        /* Reiniciamos ventanillas */
        $sql = "UPDATE ventanilla SET turno = 0, estado = 0";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        /* Reiniciamos turnos */
        $sql = "TRUNCATE TABLE turno";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        return 0;
    }

    public function siguienteTurno($id_ventanilla)
    {
        /* Buscamos el turno correspondiente */
        $sql = "SELECT * FROM turno";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (count($resultados) == 0) {
            /* Creamos el turno */
            $sql = "INSERT INTO turno (turno) VALUES (1)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            /* Luego volvemos a hacer la consulta. */
            $sql = "SELECT * FROM turno";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
            /* Actualizamos la ventanilla */
            $turno = $resultados[0]['turno'];
            $sql = "UPDATE ventanilla SET turno = $turno WHERE id_ventanilla = $id_ventanilla";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
        } else {
            $turno = intval($resultados[0]['turno']) + 1;
            /* Actualizamos turno */
            $sql = "UPDATE turno SET turno = $turno";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            /* Actualizamos la ventanilla */
            $sql = "UPDATE ventanilla SET turno = $turno WHERE id_ventanilla = $id_ventanilla";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            /* Luego volvemos listar turno */
            $sql = "SELECT * FROM turno";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        return $resultados;
    }
}
