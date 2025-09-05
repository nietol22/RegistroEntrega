<?php
require_once('../conexion.php');
$data = $_POST;

if(!isset($data['aviso_id'])){
    echo json_encode(['status'=>'error','message'=>'Falta el ID del aviso']);
    exit;
}

try {
    $stmt = $pdo->prepare("UPDATE avisos_retiro SET fecha_retiro=CURDATE(), hora_retiro=CURTIME(), personal_retiro=:personal WHERE id=:id");
    $stmt->execute([
        ':personal' => $data['personal_retiro'],
        ':id' => $data['aviso_id']
    ]);
    echo json_encode(['status'=>'success']);
} catch (Exception $e){
    echo json_encode(['status'=>'error','message'=>$e->getMessage()]);
}
?>
