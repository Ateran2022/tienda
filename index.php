

<?php
include_once('db_connection.php');

$sql = "SELECT * FROM productos";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
       <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Productos</title>
    
      
    
<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <h2>Lista de Productos</h2>
    <a href="create.php">Agregar Producto</a>

 <center><h1> Bienvenidos al mejor lugar de la ropa de Ingenieria  </h1></center> <br>


    <table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Precio</th>
            <th>Acciones</th>
        </tr>
        <?php
        while ($row = $result->fetch_assoc()) {
            echo "<tr>"; 
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["nombre"] . "</td>";
            echo "<td>" . $row["descripcion"] . "</td>";
            echo "<td>" . $row["precio"] . "</td>";
            echo "<td><a href='edit.php?id=" . $row["id"] . "'>Editar</a> | <a href='delete.php?id=" . $row["id"] . "'>Eliminar</a></td>";
            echo "</tr>";
        }
        ?>
    </table>

<br> <br><br>



   <center><a href="laviatoriana.html">
        <button>Atras</button>
    </a></center>

</body>
</html>
