<!doctype html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Bootstrap 5 -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"
    />

    <link
      rel="icon"
      type="image/x-icon"
      href="./assets/img/icon/odra-sanchez-logo.png"
    />
    <link rel="stylesheet" href="./assets/css/style.css" />

    <title>Do-Kan: Lista multiusuario | &#169;Odra Sanchez</title>
  </head>

  <body>
    <main>
      <div class="container">
        <div class="card p-4 shadow rounded-3">
          <h1 class="text-center mb-4">Iniciar Sesi&oacute;n</h1>

          <!-- Cierre de sesion -->
          <?php if (isset($_GET['mensaje']) && $_GET['mensaje'] === 'logout'): ?>
          <div class="alert alert-success">
              Has cerrado sesión correctamente.
          </div>
          <?php endif; ?>

          <!-- Error de contrasena o correo -->
          <?php if (isset($_GET['error']) && $_GET['error'] === 'login') { echo
          "
          <div class='alert alert-danger' role='alert'>
            Correo electrónico o contraseña incorrectos.
          </div>
          "; } ?>


          <form action="./users/functions/login.php" method="POST">
            <div class="mb-4">
              <label for="email" class="form-label"
                >Ingrese su correo electr&oacute;nico</label
              >
              <input
                type="email"
                class="form-control"
                pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,5}"
                id="email"
                name="email"
                placeholder="correo@example.com"
                required
              />
            </div>
            <div class="mb-4">
              <label for="password" class="form-label"
                >Ingrese su contrase&ntilde;a</label
              >
              <input
                type="password"
                class="form-control"
                placeholder="••••••••"
                minlength="8"
                id="password"
                name="password"
                required
              />
            </div>
            <div class="d-grid mb-4">
              <button type="submit" class="btn">Ingresar</button>
            </div>
            <div class="text-center">
              <a href="./users/registrar.php">Registrar usuario</a>
              <br />
              <a href="./users/recuperarcontrasena.php">Olvidé mi contraseña</a>
            </div>
          </form>
        </div>
      </div>
    </main>

    <!-- Bootstrap JS -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
