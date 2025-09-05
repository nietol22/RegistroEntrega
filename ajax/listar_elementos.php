<?php
require_once('../conexion.php');

$stmt = $pdo->query("SELECT * FROM elementos ORDER BY id DESC");
$data = $stmt->fetchAll();
echo json_encode(['data'=>$data]);