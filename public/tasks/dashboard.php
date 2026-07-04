<?php
session_start();
include '../includes/conexion.php';
include '../includes/funciones.php';

  if (!isset($_SESSION['usuario'])) {
      redireccionar("../index.php", "error", "login");
  }

  $user_id = obtenerIdUsuario($conn, $_SESSION['usuario']);

  if (!$user_id) {
      session_destroy();
      redireccionar("../index.php", "error", "login");
  }

  $stmt = mysqli_prepare(
      $conn,
      "SELECT *
      FROM tasks
      WHERE user_id = ?
      ORDER BY created_at DESC"
  );

  mysqli_stmt_bind_param($stmt, "i", $user_id);
  mysqli_stmt_execute($stmt);

  $result = mysqli_stmt_get_result($stmt);

  $mensaje = $_GET['mensaje'] ?? '';
?>

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
      href="../assets/img/icon/odra-sanchez-logo.png"
    />
    <link rel="stylesheet" href="../assets/css/style_dashboard.css" />

    <title>Do-Kan: Dashboard | &#169;Odra Sanchez</title>
  </head>
  <body>
    <main>
      <h2 class="text-center mb-4">Bienvenido</h2>

      <section id="usuario">
        <p>
          Usuario:
          <strong><?= htmlspecialchars($_SESSION['usuario']) ?></strong>
        </p>
        <a href="../users/functions/logout.php" class="btn w-25">Cerrar Sesión</a>
      </section>

      <section id="acciones">
        <div class="row g-3">
          <div class="col-lg-4">
            <a href="./functions/create.php" class="btn btn-success w-100">
              Crear tarea
            </a>
          </div>

          <div class="col-lg-4">
            <button id="btn-editar" class="btn btn-warning w-100">Editar tarea</button>
          </div>

          <div class="col-lg-4">
            <form id="form-eliminar" method="POST" action="./functions/delete.php">
              <input
                type="hidden"
                name="id_tarea"
                id="id_tarea"
              >
              <button id="btn-eliminar" class="btn btn-danger w-100">Eliminar tarea</button>
            </form>
          </div>
        </div>
      </section>

      <section id="tareas">
        <div class="row">
          <div class="col-12">
            <h5>Mis tareas</h5>
            <p>
              Para editar o eliminar una tarea, selecciona utilizando las
              casillas.
            </p>
            <form method="POST" id="form-tareas">
              <?php if ($mensaje): ?>
              <div
                class="alert alert-success alert-dismissible fade show"
                role="alert"
              >
                <?php echo $mensaje; ?>
                <button
                  type="button"
                  class="btn-close"
                  data-bs-dismiss="alert"
                  aria-label="Cerrar"
                ></button>
              </div>
              <?php endif; ?>

              <div class="list-group row">
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <div
                  class="list-group-item d-flex justify-content-between align-items-center"
                >
                <div class="col-lg-4">
                  <input
                    type="checkbox"
                    name="tarea[]"
                    value="<?php echo $row['id']; ?>"
                    class="form-check-input select-tarea"
                  />
                  <?php echo htmlspecialchars($row['title']); ?>
                </div>
                <div class="col-lg-4">
                  <?= date('d M Y', strtotime($row['created_at'])) ?>
                </div>
                <div class="col-lg-4">
                  <?php 
                  $estado = $row['stage']; switch ($estado) { 
                    case 'todo':
                        $texto = 'Pendiente';
                        $clase = 'badge-todo';
                        break;
                    case 'en_proceso':
                        $texto = 'En proceso';
                        $clase = 'badge-proceso';
                        break;
                    case 'listo':
                        $texto = 'Listo';
                        $clase = 'badge-listo';
                        break;
                    }
                  ?>
                  <span class="<?= $clase ?>">
                    <?= htmlspecialchars($texto) ?>
                  </span>
                </div>
                </div>
                <?php endwhile; ?>
              </div>
            </form>
          </div>
        </div>
      </section>
    </main>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
      crossorigin="anonymous"
    ></script>
    <script src="../assets/js/action-update.js"></script>
    <script src="../assets/js/action-delete.js"></script>
  </body>
</html>

