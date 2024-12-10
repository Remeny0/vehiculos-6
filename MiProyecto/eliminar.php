<?php
include_once 'config\database.php';
include_once 'models/Vehiculo.php';

$database = new Database();
$db = $database->getConnection();
$vehiculo = new Vehiculo($db);

$id = $_GET['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($vehiculo->delete($id)) {
        echo "<script>alert('Registro eliminado exitosamente.'); window.location.href='index.php';</script>";
    } else {
        echo "<script>alert('Error al eliminar el registro.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Eliminar Vehículo</title>
</head>
<body>
<div class="container">
    <h1 class="mt-5">Eliminar Vehículo</h1>
    <p>¿Estás seguro de que deseas eliminar este vehículo?</p>
    <form method="POST">
        <button type="submit" class="btn btn-danger">Eliminar</button>
        <a href="index.php" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
</body>
</html>