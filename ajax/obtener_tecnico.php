<?php
header('Content-Type: application/json');
require_once('../conexion.php');

$stmt = $pdo->prepare("SELECT tecnico_repara FROM avisos_retiro WHERE elemento_id=? LIMIT 1");
$stmt->execute([$_GET['elemento_id']]);
$row = $stmt->fetch();

echo json_encode(['tecnico_repara'=>$row ? $row['tecnico_repara'] : '']);
