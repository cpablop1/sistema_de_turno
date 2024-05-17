<?php
require '../../models/ventanilla/Ventanilla.php';

$ventanilla = new Ventanilla();

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $result = $ventanilla->crearVentanilla();

    $jsonData = array(
        'method' => 'POST',
        'status' => ($result) ? 200 : 500,
        'msg' => ($result) ? 'Ventanilla creada correctamente.' : 'Error al crear ventanilla',
        'data' => $result
    );
    echo json_encode($jsonData);
} else {
    $jsonData = array(
        'method' => 'GET',
        'status' => 200,
        'msg' => 'Hello word...'
    );
    echo json_encode($jsonData);
}