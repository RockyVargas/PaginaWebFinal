<!DOCTYPE html>
<html>
<head>
    <title>Confirmación de Compra</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .alert {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #28a745;
            color: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            z-index: 1000;
            font-size: 18px;
            text-align: center;
            opacity: 0;
            transition: opacity 0.5s ease, transform 0.5s ease;
        }

        .alert.show {
            display: block;
            opacity: 1;
            transform: translate(-50%, -50%) scale(1.05);
        }

        /* Ajustar la escala si se necesita */
        .alert.show {
            transform: translate(-50%, -50%) scale(1);
        }
    </style>
</head>
<body>
    <div class="alert" id="alertBox">
        ¡Gracias por su compra! Su pedido ha sido procesado con éxito.
    </div>

    <script>
        // Mostrar la alerta al cargar la página con animación
        window.onload = function() {
            var alertBox = document.getElementById('alertBox');
            // Asegurarse de que el alertBox esté oculto antes de la animación
            alertBox.style.display = 'block';
            setTimeout(function() {
                alertBox.classList.add('show');
            }, 10); // Un pequeño retraso para activar la animación
        };
    </script>
</body>
</html>
