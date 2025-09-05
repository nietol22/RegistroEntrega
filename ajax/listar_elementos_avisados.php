<?php
require_once('../conexion.php');

$stmt = $pdo->query("
    SELECT e.*,
           (SELECT CONCAT(a.fecha_aviso,' ',a.hora_aviso)
            FROM avisos_retiro a
            WHERE a.elemento_id = e.id
            ORDER BY a.fecha_aviso DESC, a.hora_aviso DESC
            LIMIT 1) AS ultimo_aviso
    FROM elementos e
    ORDER BY ultimo_aviso DESC
");

$data = $stmt->fetchAll();
echo json_encode(['data'=>$data]);
?>
