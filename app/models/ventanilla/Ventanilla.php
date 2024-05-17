<?php
//require_once '../conn.php';
require_once '../../models/conn.php';

class Ventanilla {
    private $conn;

    public function __construct() {
        $this->conn = getConnection();
    }

    public function crearVentanilla() {
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
}
?>
