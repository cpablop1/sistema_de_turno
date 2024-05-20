<?php

use LDAP\Result;

require_once '../../models/conn.php';

class Turno
{
	private $conn;

	public function __construct()
	{
		$this->conn = getConnection();
	}

	public function listarTurno()
	{
		$sql = "SELECT * FROM ticket";
		$stmt = $this->conn->prepare($sql);
		$stmt->execute();
		$resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
		if (count($resultados) == 0) { // Si no hay registro
			/* Insertamos registro */
			$sql = "INSERT INTO ticket (numero, estado) VALUES (1, 1)";
			$stmt = $this->conn->prepare($sql);
			$stmt->execute();
			/* Y volvemos a realizar la consulta de listar */
			$sql = "SELECT * FROM ticket";
			$stmt = $this->conn->prepare($sql);
			$stmt->execute();
			$resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
		} else { /* En caso contrario */
			/* Actualizamos el numero de turno */
			$numero = intval($resultados[0]['numero']) + 1;
			$sql = "UPDATE ticket SET numero = $numero";
			$stmt = $this->conn->prepare($sql);
			$stmt->execute();
			/* Luego volvemos a seleccionar los datos */
			$sql = "SELECT * FROM ticket";
			$stmt = $this->conn->prepare($sql);
			$stmt->execute();
			$resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
		}
		return $resultados;
	}
}
