<?php
include_once 'config/Database.php';
include_once 'models/Vehiculo.php';

$database = new Database();
$db = $database->getConnection();
$vehiculo = new Vehiculo($db);

$id = $_GET['id'];
$result = $vehiculo->read()->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $placa = $_POST['placa'];
    $problema = $_POST['problema'];
    $fecha_ingreso = $_POST['fecha_ingreso'];
    $fecha_salida = $_POST['fecha_salida'];

    if ($vehiculo->update($id, $marca, $modelo, $placa, $problema, $fecha_ingreso, $fecha_salida)) {
        echo "<script>alert('Registro editado exitosamente.'); window.location.href='index.php';</script>";
    } else {
        echo "<script>alert('Error al editar el registro.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Editar Vehículo</title>
</head>
<body>
    <div class="container">
        <h1>Editar Vehículo</h1>
        <form method="POST">
            <input type="hidden" name="id" value="<?= htmlspecialchars($id) ?>">
            <div class="form-group">
                <label>Marca:</label>
                <input type="text" name="marca" class="form-control" value="<?= htmlspecialchars($result['marca']) ?>" required>
            </div>
            <div class="form-group">
                <label>Modelo:</label>
                <input type="text" name="modelo" class="form-control" value="<?= htmlspecialchars($result['modelo']) ?>" required>
            </div>
            <div class="form-group">
                <label>Placa:</label>
                <input type="text" name="placa" class="form-control" value="<?= htmlspecialchars($result['placa']) ?>" required>
            </div>
            <div class="form-group">
                <label>Problema:</label>
                <textarea name="problema" class="form-control" required><?= htmlspecialchars($result['problema']) ?></textarea>
            </div>
            <div class="form-group">
                <label>Fecha de Ingreso:</label>
                <input type="date" name="fecha_ingreso" class="form-control" value="<?= htmlspecialchars($result['fecha_ingreso']) ?>" required>
            </div>
            <div class="form-group">
                <label>Fecha de Salida:</label>
                <input type="date" name="fecha_salida" class="form-control" value="<?= htmlspecialchars($result['fecha_salida']) ?>">
            </div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
            <a href="index.php" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</body>
</html>