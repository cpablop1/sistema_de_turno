<?php
include ('../../../config/config.php');

function getConnection()
{
	try {
		$conn = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
		// Configurar PDO para que lance excepciones en caso de error
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		return $conn;
	} catch (PDOException $e) {
		//echo "Conexión fallida: " . $e->getMessage();
		return null;
	}
}
