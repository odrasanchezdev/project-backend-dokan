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

    <title>Do-Kan: Actualizar contrase&ntilde;a | &#169;Odra Sanchez</title>
  </head>

  <body>
    <main>
      <div class="container">
        <div class="card p-4 shadow" style="width: 100%; max-width: 400px">
          <h3 class="text-center mb-4">Actualizar Contrase&ntilde;a</h3>

          <?php if (isset($_GET['error']) && $_GET['error'] === 'password') {
          echo "
          <div class='alert alert-warning' role='alert'>
            Las contraseñas no coinciden.
          </div>
          "; } ?>

          <form
            id="recoverForm"
            action="./functions/update-pass.php"
            method="POST"
          >
            <div class="mb-4">
              <label for="email" class="form-label"
                >Correo electr&oacute;nico</label
              >
              <input
                type="email"
                class="form-control"
                placeholder="Ingresa tu dirección de correo eletrónico"
                id="email"
                name="email"
                required
              />
            </div>
            <div class="mb-4">
              <label for="new_password" class="form-label"
                >Nueva contrase&ntilde;a</label
              >
              <input
                type="password"
                class="form-control"
                pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*\W).{8,}"
                placeholder="Elige tu contraseña. Mínimo 8 carácteres"
                title="Debe contener al menos un número, una minúscula, una mayúscula, un carácter especial y 8 o más caracteres."
                id="new_password"
                name="new_password"
                required
              />
            </div>
            <div class="mb-4">
              <label for="confirm_password" class="form-label"
                >Confirmar contrase&ntilde;a</label
              >
              <input
                type="password"
                class="form-control"
                placeholder="Confirma tu contraseña"
                id="confirm_password"
                name="confirm_password"
                required
              />
            </div>
            <div class="d-grid mb-4">
              <button type="submit" class="btn">Actualizar</button>
            </div>
            <div class="text-center">
              <a href="../index.php">Volver al login</a>
            </div>
          </form>
        </div>
      </div>
    </main>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
