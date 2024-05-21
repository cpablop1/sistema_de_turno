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
		$sql = "SELECT * FROM ventanilla WHERE estado = 1";
		$stmt = $this->conn->prepare($sql);
		$stmt->execute();
		$resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $resultados;
	}
}
