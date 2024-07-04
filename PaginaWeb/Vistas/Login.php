<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login y Registro</title>
  <link rel="stylesheet" type="text/css" href="../StilosCSS/Loginstyle.css">
</head>

<body>

  <div class="wrapper">
    <div class="form-wrapper sign-in">
      <form action="../Modelos/ConexionGuardarUsuario.php" method="post">
        <input type="hidden" name="action" value="login">
        <h2>Login</h2>
        <div class="input-group">
          <input type="text" name="nombre_usuario" required>
          <label for="">Nombre de usuario</label>
        </div>
        <div class="input-group">
          <input type="password" name="contrasena" required>
          <label for="">Contraseña</label>
        </div>
        <div class="remember">
          <label><input type="checkbox"> Recuérdame</label>
        </div>
        <button type="submit">Login</button>
        <div class="signUp-link">
          <p>¿No tienes una cuenta? <a href="#" class="signUpBtn-link">Crear</a></p>
        </div>
      </form>
    </div>

    <div class="form-wrapper sign-up">
      <form action="../Modelos/ConexionGuardarUsuario.php" method="post">
        <input type="hidden" name="action" value="register">
        <h2>Crear usuario</h2>
        <div class="input-group">
          <input type="text" name="nombre_usuario" required>
          <label for="">Nombre de usuario</label>
        </div>
        <div class="input-group">
          <input type="email" name="correo" required>
          <label for="">Email</label>
        </div>
        <div class="input-group">
          <input type="password" name="contrasena" required>
          <label for="">Contraseña</label>
        </div>
        <div class="input-group">
          <input type="tel" name="telefono" required>
          <label for="">Teléfono</label>
        </div>
        <div class="remember">
          <label><input type="checkbox"> Acepto términos y condiciones</label>
        </div>
        <button type="submit">Crear</button>
        <div class="signUp-link">
          <p>¿Ya tienes una cuenta? <a href="#" class="signInBtn-link">Iniciar sesion</a></p>
        </div>
      </form>
    </div>
  </div>
  <script src="../Controladores/LoginScript.js"></script>
</body>

</html>
