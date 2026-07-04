<!doctype html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
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
      href="../assets/img/icon/odra-sanchez-logo.png"
    />
    <link rel="stylesheet" href="../assets/css/style.css" />

    <title>Do-Kan: Crear cuenta | &#169;Odra Sanchez</title>
  </head>

  <body>
    <main>
      <div class="container">
        <div class="card p-4 shadow" style="width: 100%; max-width: 400px">
          <h3 class="text-center mb-4">Crear cuenta</h3>

          <?php if (isset($_GET['error']) && $_GET['error'] === 'password') {
          echo "
          <div class='alert alert-warning' role='alert'>
            Las contraseñas no coinciden.
          </div>
          "; } ?>

          <form id="registrar" action="functions/register.php" method="POST">
            <div class="mb-4">
              <label for="email" class="form-label"
                >Correo electr&oacute;nico</label
              >
              <input
                type="email"
                class="form-control"
                pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,5}"
                placeholder="Ingresa tu dirección de correo eletrónico"
                id="email"
                name="email"
                required
              />
            </div>
            <div class="mb-4">
              <label for="password" class="form-label">Contrase&ntilde;a</label>
              <input
                type="password"
                class="form-control"
                pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*\W).{8,}"
                placeholder="Elige tu contraseña. Mínimo 8 carácteres"
                title="Debe contener al menos un número, una minúscula, una mayúscula, un carácter especial y 8 o más caracteres."
                id="password"
                name="password"
                required
              />
            </div>
            <div class="mb-4">
              <label for="confirm_password" class="form-label"
                >Confirmar Contrase&ntilde;a</label
              >
              <input
                type="password"
                class="form-control"
                placeholder="Confirma tu contraseña"
                minlength="8"
                id="confirm_password"
                name="confirm_password"
                required
              />
            </div>
            <div class="d-grid mb-4">
              <button type="submit" class="btn">Registrar</button>
            </div>
            <div class="text-center">
              <a href="../index.php">Ya tengo cuenta</a>
            </div>
          </form>
        </div>
      </div>
    </main>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>