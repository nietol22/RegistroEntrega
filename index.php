<?php require_once('conexion.php'); ?>
<!doctype html>
<html lang="es">
<head>
<meta charset="utf-8">
<title>Gestión de Elementos</title>
<link rel="stylesheet" href="assets/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/css/datatables.min.css">
<link rel="stylesheet" href="assets/css/buttons.dataTables.min.css">
</head>
<body class="p-3">

<div class="container">
  <h1 class="mb-4">Gestión de Elementos Electrónicos</h1>

  <div class="tab-content mt-3">
    <!-- Formulario nuevo elemento -->
    <div class="tab-pane fade show active" id="nuevo">
      <form id="formElemento">
        <div class="mb-3"><label>Orden de Servicio</label><input type="text" name="orden_servicio" class="form-control" required></div>
        <div class="mb-3"><label>Elemento</label><input type="text" name="elemento" maxlength="50" class="form-control" required></div>
        <div class="mb-3"><label>Área</label><input type="text" name="area_cargo" class="form-control" required></div>
        <div class="mb-3"><label>Personal que trae</label><input type="text" name="personal_trae" class="form-control" required></div>
        <div class="mb-3"><label>Personal JG</label><input type="text" name="personal_jg" class="form-control" required></div>
        <div class="mb-3"><label>Técnico</label><input type="text" name="tecnico" class="form-control" required></div>
        <button type="submit" class="btn btn-primary">Guardar Elemento</button>
      </form>

      <hr>
      <h3>Elementos con Avisos Registrados</h3>
      <table id="tablaElementosAvisados" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>ID</th>
            <th>Elemento</th>
            <th>Área</th>
            <th>Orden Servicio</th>
            <th>Técnico</th>
            <th>Último Aviso</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody></tbody>
      </table>
    </div>

    <!-- Retirados -->
    <div class="tab-pane fade" id="retirados">
      <table id="tablaRetirados" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>ID</th>
            <th>Fecha/Hora Retiro</th>
            <th>Elemento</th>
            <th>Área</th>
            <th>Orden</th>
            <th>Personal Retira</th>
          </tr>
        </thead>
        <tbody></tbody>
      </table>
    </div>
  </div>
</div>
 probando  el comit 
<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/datatables.min.js"></script>
<script src="assets/js/dataTables.buttons.min.js"></script>
<script src="assets/js/buttons.html5.min.js"></script>
<script src="assets/js/buttons.print.min.js"></script>
<script src="assets/js/jszip.min.js"></script>
<script src="assets/js/main.js"></script>
</body>
</html>
