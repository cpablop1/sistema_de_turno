<?php
require '../../models/turno/Turno.php';

$ventanilla = new Turno();
$listar = $ventanilla->listarTurno();
$data = $listar;

$jsonData = array(
    'method' => 'GET',
    'status' => 200,
    'msg' => 'Hello word...',
    'data' => $data
);
echo json_encode($jsonData);
