<?php
require '../../models/ticket/Ticket.php';

$ventanilla = new Ticket();
$listar = $ventanilla->listarTicket();
$data = $listar;

$jsonData = array(
    'method' => 'GET',
    'status' => 200,
    'msg' => 'Hello word...',
    'data' => $data
);
echo json_encode($jsonData);
