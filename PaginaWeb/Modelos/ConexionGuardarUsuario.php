<?php
// Crea la conexión a la base de datos
$conn = new mysqli('localhost', 'root', '', 'proyectomnmark');

// Verifica la conexión
if ($conn->connect_error) {
    die('Conexión fallida: ' . $conn->connect_error);
}

// Función para filtrar y validar datos de entrada
function validarEntrada($dato) {
    // Filtra y devuelve el dato
    return filter_var($dato, FILTER_SANITIZE_STRING);
}

if (isset($_POST['action'])) {
    // Valida y filtra la acción recibida
    $action = validarEntrada($_POST['action']);

    if ($action == 'register') {
        // Obtén y filtra los datos del formulario
        $nombre_usuario = validarEntrada($_POST['nombre_usuario']);
        $correo = filter_var($_POST['correo'], FILTER_SANITIZE_EMAIL);
        $contrasena = $_POST['contrasena'];
        $telefono = validarEntrada($_POST['telefono']);

        // Hashea la contraseña usando password_hash
        $hash_contrasena = password_hash($contrasena, PASSWORD_DEFAULT);

        // Prepara la consulta SQL
        $sql = "INSERT INTO clientes (nombre, correo, contrasena, telefono) VALUES (?, ?, ?, ?)";

        // Prepara una declaración para la ejecución
        $stmt = $conn->prepare($sql);

        // Vincula las variables a la declaración preparada como parámetros
        $stmt->bind_param('ssss', $nombre_usuario, $correo, $hash_contrasena, $telefono);

        // Ejecuta la declaración preparada
        if ($stmt->execute()) {
            echo "<script type='text/javascript'>alert('Usuario creado exitosamente'); window.location='../Vistas/Login.php';</script>";
        } else {
            echo "<script type='text/javascript'>alert('Error al registrar usuario'); window.location='../Vistas/Login.php';</script>";
        }

        // Cierra la declaración
        $stmt->close();
    } else if ($action == 'login') {
        // Obtén y filtra los datos del formulario
        $nombre_usuario = validarEntrada($_POST['nombre_usuario']);
        $contrasena = $_POST['contrasena'];

        // Prepara la consulta SQL
        $sql = "SELECT contrasena FROM clientes WHERE nombre = ?";

        // Prepara una declaración para la ejecución
        $stmt = $conn->prepare($sql);

        // Vincula las variables a la declaración preparada como parámetros
        $stmt->bind_param('s', $nombre_usuario);

        // Ejecuta la declaración preparada
        $stmt->execute();

        // Obtiene los resultados
        $result = $stmt->get_result();

        // Verifica si se encontró un usuario
        if ($result->num_rows > 0) {
            // Obtiene la contraseña hasheada desde la base de datos
            $row = $result->fetch_assoc();
            $hash_contrasena = $row['contrasena'];

            // Verifica la contraseña usando password_verify
            if (password_verify($contrasena, $hash_contrasena)) {
                echo "<script type='text/javascript'>alert('Inicio de sesión exitoso'); window.location='../Vistas/paginaprincipal.php';</script>";
            } else {
                echo "<script type='text/javascript'>alert('Nombre de usuario o contraseña incorrectos'); window.location='../Vistas/Login.php';</script>";
            }
        } else {
            echo "<script type='text/javascript'>alert('Nombre de usuario o contraseña incorrectos'); window.location='../Vistas/Login.php';</script>";
        }

        // Cierra la declaración
        $stmt->close();
    } else {
        echo "<script type='text/javascript'>alert('Acción no válida'); window.location='../Vistas/Login.php';</script>";
    }
}

// Cierra la conexión
$conn->close();
?>
