<?php
require_once('../conexion.php');
$data = $_POST;

if(!isset($data['elemento_id'])){
    echo json_encode(['status'=>'error','message'=>'Falta el ID del elemento']);
    exit;
}

try {
    $stmt = $pdo->prepare("INSERT INTO avisos_retiro (elemento_id, fecha_aviso, hora_aviso, personal_avisa, personal_recibe) VALUES (:eid, CURDATE(), CURTIME(), :avisa, :recibe)");
    $stmt->execute([
        ':eid' => $data['elemento_id'],
        ':avisa' => $data['personal_avisa'],
        ':recibe' => $data['personal_recibe']
    ]);
    echo json_encode(['status'=>'success']);
} catch (Exception $e){
    echo json_encode(['status'=>'error','message'=>$e->getMessage()]);
}
?>
