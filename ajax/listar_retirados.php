<?php
require_once('../conexion.php');

$stmt = $pdo->query("SELECT a.*, e.elemento, e.area_cargo, e.orden_servicio
                     FROM avisos_retiro a
                     JOIN elementos e ON e.id = a.elemento_id
                     WHERE a.fecha_retiro IS NOT NULL
                     ORDER BY a.fecha_retiro DESC, a.hora_retiro DESC");

$data = $stmt->fetchAll();
echo json_encode(['data'=>$data]);
