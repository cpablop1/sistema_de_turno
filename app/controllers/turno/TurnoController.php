<?php
require '../../models/turno/Turno.php';

$turno = new Turno();
$listar = $turno->listarTurno();
$data = $listar;

$jsonData = array(
    'method' => 'GET',
    'status' => 200,
    'msg' => 'Hello word...',
    'data' => $data
);
echo json_encode($jsonData);
