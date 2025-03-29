<?php
include('db.php');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $cliente = $_POST['cliente'];
    $producto = $_POST['producto'];
    $cantidad = $_POST['cantidad'];
    $precio = $_POST['precio'];

    $stmt = $conexion->prepare("INSERT INTO ventas (cliente, producto, cantidad, precio) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssid", $cliente, $producto, $cantidad, $precio);
    $stmt->execute();

    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrar Venta</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-5">
        <h2 class="mb-4">📝 Registrar Nueva Venta</h2>
        <form method="POST" class="row g-3">
            <div class="col-md-6">
                <label class="form-label">Cliente:</label>
                <input type="text" name="cliente" class="form-control" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">Producto:</label>
                <input type="text" name="producto" class="form-control" required>
            </div>
            <div class="col-md-4">
                <label class="form-label">Cantidad:</label>
                <input type="number" name="cantidad" class="form-control" required>
            </div>
            <div class="col-md-4">
                <label class="form-label">Precio:</label>
                <input type="number" name="precio" step="0.01" class="form-control" required>
            </div>
            <div class="col-12">
                <button class="btn btn-primary">Guardar</button>
                <a href="generar_pdf.php" target="_blank" class="btn btn-outline-success">📄 Ver Reporte en PDF</a>
            </div>
        </form>
    </div>
</body>
</html>
