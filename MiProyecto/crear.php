<?php
include_once 'config\database.php';
include_once 'models/Vehiculo.php';

$database = new Database();
$db = $database->getConnection();
$vehiculo = new Vehiculo($db);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $placa = $_POST['placa'];
    $problema = $_POST['problema'];
    $fecha_ingreso = $_POST['fecha_ingreso'];
    $fecha_salida = $_POST['fecha_salida'];

    if ($vehiculo->create($marca, $modelo, $placa, $problema, $fecha_ingreso, $fecha_salida)) {
        echo "<script>alert('Registro agregado exitosamente.'); window.location.href='index.php';</script>";
    } else {
        echo "<script>alert('Error al agregar el registro.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Agregar Vehículo</title>
</head>
<body>
<div class="container">
    <h1 class="mt-5">Agregar Vehículo</h1>
    <form method="POST">
        <div class="form-group">
            <label for="marca">Marca</label>
            <input type="text" class="form-control" id="marca" name="marca" required>
        </div>
        <div class="form-group">
            <label for="modelo">Modelo</label>
            <input type="text" class="form-control" id="modelo" name="modelo" required>
        </div>
        <div class="form-group">
            <label for="placa">Placa</label>
            <input type="text" class="form-control" id="placa" name="placa" required>
        </div>
        <div class="form-group">
            <label for="problema">Problema</label>
            <textarea class="form-control" id="problema" name="problema" required></textarea>
        </div>
        <div class="form-group">
            <label for="fecha_ingreso">Fecha de Ingreso</label>
            <input type="date" class="form-control" id="fecha_ingreso" name="fecha_ingreso" required>
        </div>
        <div class="form-group">
            <label for="fecha_salida">Fecha de Salida</label>
            <input type="date" class="form-control" id="fecha_salida" name="fecha_salida">
        </div>
        <button type="submit" class="btn btn-primary">Agregar Vehículo</button>
        <a href="index.php" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
</body>
</html>