<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "proyectomnmark";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$categoria = 'Confiteria'; //categoría

// Preparar la llamada al Stored Procedure
$stmt = $conn->prepare("CALL FiltrarProductosPorCategoria(?)");
$stmt->bind_param("s", $categoria);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Mostrar resultados
    while ($row = $result->fetch_assoc()) {
        echo '<div class="producto" data-name="' . htmlspecialchars($row["nombre_producto"]) . '" data-categoria="' . htmlspecialchars($row["categoria"]) . '">';
        echo '<img src="../images/' . htmlspecialchars($row['imagen']) . ' " alt="' . htmlspecialchars($row['nombre_producto']) . '">';
        echo '<h2>' . htmlspecialchars($row["nombre_producto"]) . '</h2>';
        echo '<p>ID: ' . htmlspecialchars($row["cod_producto"]) . '</p>';
        echo '<p>Categoría: ' . htmlspecialchars($row["categoria"]) . '</p>';
        echo '<p>Precio: S/' . htmlspecialchars($row["precio"]) . '</p>';
        echo '<p>Stock: ' . htmlspecialchars($row["stock"]) . '</p>';
        echo '<button class="agregar-carrito">Agregar al carrito</button>';
        echo '</div>';
    }
} else {
    echo "0 resultados";
}

$conn->close();
?>
