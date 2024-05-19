<?php
require '../../models/ventanilla/Ventanilla.php';

$ventanilla = new Ventanilla();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    header('Content-Type: application/json');

    // Leer el cuerpo de la solicitud
    $input = file_get_contents('php://input');

    // Decodificar el JSON
    $data_post = json_decode($input, true);

    $siguienteTurno = isset($data_post['siguiente_turno']);
    $id = isset($data_post['id_ventanilla']);
    $data = '';
    $msg = '';
    if ($siguienteTurno) {
        $data = $ventanilla->siguienteTurno($data_post['id_ventanilla']);
    } else {
        $result = $ventanilla->crearVentanilla();
        $msg = ($result) ? 'Ventanilla creada correctamente.' : 'Error al crear ventanilla';
        $data = $result;
    }

    $jsonData = array(
        'method' => 'POST',
        'status' => 200,
        'msg' => $msg,
        'data' => $data,
    );
    echo json_encode($jsonData);
} else {
    $id = isset($_GET['id']);
    $estado = isset($_GET['estado']);
    $reiniciarTodo = isset($_GET['reiniciar_todo']);
    $data = '';
    if ($id) {
        if ($estado) {
            $desactivar = $ventanilla->desActivarVentanilla($_GET['id']);
            $data = $desactivar;
        } else {
            $activar = $ventanilla->activarVentanilla($_GET['id']);
            $data = $activar;
        }
    } else {
        if ($reiniciarTodo) {
            $reiniciar = $ventanilla->reiniciarTodo();
        } else {
            $listar = $ventanilla->listarVentanilla();
            $data = $listar;
        }
    }
    $jsonData = array(
        'method' => 'GET',
        'status' => 200,
        'msg' => 'Hello word...',
        'data' => $data,
        'id' => $id,
        'estado' => $estado
    );
    echo json_encode($jsonData);
}
