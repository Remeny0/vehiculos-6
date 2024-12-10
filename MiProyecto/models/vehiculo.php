<?php
class Vehiculo {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create($marca, $modelo, $placa, $problema, $fecha_ingreso, $fecha_salida) {
        $query = "INSERT INTO vehiculos (marca, modelo, placa, problema, fecha_ingreso, fecha_salida) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ssssss", $marca, $modelo, $placa, $problema, $fecha_ingreso, $fecha_salida);
        return $stmt->execute();
    }

    public function read() {
        $query = "SELECT * FROM vehiculos";
        $result = $this->conn->query($query);
        return $result;
    }

    public function update($id, $marca, $modelo, $placa, $problema, $fecha_ingreso, $fecha_salida) {
        $query = "UPDATE vehiculos SET marca=?, modelo=?, placa=?, problema=?, fecha_ingreso=?, fecha_salida=? WHERE id=?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ssssssi", $marca, $modelo, $placa, $problema, $fecha_ingreso, $fecha_salida, $id);
        return $stmt->execute();
    }

    public function delete($id) {
        $query = "DELETE FROM vehiculos WHERE id=?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
?>