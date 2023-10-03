<?php
include_once('db_connection.php');

if (isset($_GET["id"]) && is_numeric($_GET["id"])) {
    $id = $_GET["id"];

    $sql = "DELETE FROM productos WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit;
    } else {
        echo "Error al eliminar el producto: " . $conn->error;
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
    <title>Eliminar Producto</title>
   
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <h2>Eliminar Producto</h2>
    <p>¿Estás seguro de que deseas eliminar este producto?</p>
    <form method="POST" action="delete.php">
        <!-- Agrega un campo oculto para enviar el ID del producto que se eliminará -->
        <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
        <button type="submit" name="eliminar">Sí, Eliminar</button>
    </form>
    <a href="index.php">Cancelar</a>
</body>
</html>

