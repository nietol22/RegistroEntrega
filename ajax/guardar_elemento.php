<?php
require_once('../conexion.php');
$data = $_POST;

try {
    $stmt = $pdo->prepare("INSERT INTO elementos (orden_servicio, elemento, area_cargo, personal_trae, personal_jg, tecnico) VALUES (:orden, :elemento, :area, :trae, :jg, :tecnico)");
    $stmt->execute([
        ':orden' => $data['orden_servicio'],
        ':elemento' => strtoupper($data['elemento']),
        ':area' => $data['area_cargo'],
        ':trae' => $data['personal_trae'],
        ':jg' => $data['personal_jg'],
        ':tecnico' => $data['tecnico']
    ]);
    $id = $pdo->lastInsertId();

    echo json_encode(['status'=>'success','id'=>$id]);
} catch (Exception $e){
    echo json_encode(['status'=>'error','message'=>$e->getMessage()]);
}
?>
