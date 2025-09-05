<?php
require_once('../conexion.php');

$stmt = $pdo->query("SELECT a.*, e.elemento, e.area_cargo, e.orden_servicio, e.tecnico
                     FROM avisos_retiro a
                     JOIN elementos e ON e.id = a.elemento_id
                     ORDER BY a.fecha_aviso DESC, a.hora_aviso DESC");

$data = $stmt->fetchAll();
echo json_encode(['data'=>$data]);
