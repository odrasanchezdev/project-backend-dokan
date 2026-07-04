<?php
session_start();
include '../../includes/conexion.php';
include '../../includes/funciones.php';

if (!isset($_SESSION['usuario'])) {
    header("Location: ../../index.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = $_POST['titulo'];
    $estado = $_POST['estado'];
    $usuario_email = $_SESSION['usuario'];

    if (empty($titulo) || empty($estado)) {
        redireccionar("../create.php","error","empty");
    }

    // Obtener ID del usuario
    $usuario_id = obtenerIdUsuario($conn, $_SESSION['usuario']);

    if (!$usuario_id) {
        session_destroy();
        redireccionar("../../index.php","","");
    }

    // Insertar tarea
    $stmt = mysqli_prepare(
        $conn,
        "INSERT INTO tasks (user_id, title, stage)
         VALUES (?, ?, ?)"
    );

    mysqli_stmt_bind_param(
        $stmt,
        "iss",
        $usuario_id,
        $titulo,
        $estado
    );

    if (mysqli_stmt_execute($stmt)) {
      redireccionar("../dashboard.php","mensaje","Tarea creada");
      }
      
      error_log(mysqli_error($conn));
      redireccionar("../create.php","error","db");
}
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
      href="../../assets/img/icon/odra-sanchez-logo.png"
    />
    <link rel="stylesheet" href="../../assets/css/style_actions.css" />

    <title>Do-Kan: Crear tarea | &#169;Odra Sanchez</title>
  </head>
  <body>
    <main>
      <h2>Nueva tarea</h2>
      <p>
        Define los detalles de tu actividad y organ&iacute;zala en tu tablero.
      </p>

      <form id="crear" method="POST" action="create.php">
        <div class="mb-4">
          <label for="titulo" class="form-label">Tarea</label>
          <input
            type="text"
            class="form-control"
            id="titulo"
            placeholder="Asigna un título o descripción de tu tarea"
            name="titulo"
            required
          />
        </div>
        <div class="mb-4">
          <label for="estado" class="form-label">Estado</label>
          <select class="form-select" id="estado" name="estado" required>
            <option value="" class="placeholder" selected disabled hidden>
              Selecciona el estado de la tarea
            </option>
            <option value="todo">To Do</option>
            <option value="en_proceso">En proceso</option>
            <option value="listo">Completada</option>
          </select>
        </div>
        <button type="submit" class="btn btn-create">
          A&ntilde;adir tarea
        </button>
        <a href="../dashboard.php" class="btn btn-secondary">Cancelar</a>
      </form>
    </main>
  </body>
</html>