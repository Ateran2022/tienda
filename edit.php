<?php
include_once('db_connection.php');

if (isset($_GET["id"]) && is_numeric($_GET["id"])) {
    $id = $_GET["id"];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombre = $_POST["nombre"];
        $descripcion = $_POST["descripcion"];
        $precio = $_POST["precio"];

        // Validación adicional para asegurarse de que los campos no estén vacíos
        if (empty($nombre) || empty($descripcion) || empty($precio)) {
            echo "Por favor, complete todos los campos.";
        } else {
            $sql = "UPDATE productos SET nombre='$nombre', descripcion='$descripcion', precio='$precio' WHERE id=$id";

            if ($conn->query($sql) === TRUE) {
                header("Location: index.php");
                exit;
            } else {
                echo "Error al actualizar el producto: " . $conn->error;
            }
        }
    }

    $sql = "SELECT * FROM productos WHERE id=$id";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $nombre = $row["nombre"];
        $descripcion = $row["descripcion"];
        $precio = $row["precio"];
    }
} else {
    echo "ID no válido o no proporcionado.";
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Producto</title>
    <!-- Enlace al archivo CSS -->
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>Editar Producto</h2>
        <form method="POST">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" value="<?php echo $nombre; ?>" required><br>

            <label for="descripcion">Descripción:</label>
            <textarea id="descripcion" name="descripcion" required><?php echo $descripcion; ?></textarea><br>

            <label for="precio">Precio:</label>
            <input type="text" id="precio" name="precio" value="<?php echo $precio; ?>" required><br>

            <button type="submit" class="button edit-button" onclick="return confirm('¿Estás seguro de que deseas actualizar este producto?')">Actualizar Datos</button>
            <a href="index.php" class="button">Cancelar</a>
        </form>
    </div>
</body>
</html>

       
