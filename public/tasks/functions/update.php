<?php
session_start();
include '../../includes/conexion.php';
include '../../includes/funciones.php';

if (!isset($_SESSION['usuario'])) {
    redireccionar("../../index.php", "error", "login");
}

$user_id = obtenerIdUsuario($conn, $_SESSION['usuario']);

if (!$user_id) {
    session_destroy();
    redireccionar("../../index.php", "error", "login");
}

// Validar ID
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    redireccionar("../dashboard.php", "error", "id");
}

$tarea_id = (int) $_GET['id'];

// Buscar la tarea del usuario
$stmt = mysqli_prepare(
    $conn,
    "SELECT id, title, stage
     FROM tasks
     WHERE id = ? AND user_id = ?"
);

mysqli_stmt_bind_param(
    $stmt,
    "ii",
    $tarea_id,
    $user_id
);

mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);

if (mysqli_num_rows($result) === 0) {
    redireccionar("../dashboard.php", "error", "tarea");
}

$tarea = mysqli_fetch_assoc($result);

// Actualizar
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $titulo = trim($_POST['title']);
    $estado = trim($_POST['stage']);

    if (empty($titulo) || empty($estado)) {
        redireccionar("../update.php?id={$tarea_id}", "error", "empty");
    }

    $stmt = mysqli_prepare(
        $conn,
        "UPDATE tasks
         SET title = ?, stage = ?
         WHERE id = ? AND user_id = ?"
    );

    mysqli_stmt_bind_param(
        $stmt,
        "ssii",
        $titulo,
        $estado,
        $tarea_id,
        $user_id
    );

    if (mysqli_stmt_execute($stmt)) {
        redireccionar("../dashboard.php", "mensaje", "Tarea actualizada");
    } else {
        error_log(mysqli_error($conn));
        redireccionar("../update.php?id={$tarea_id}", "error", "db");
    }

}
?>

<!DOCTYPE html>
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
    <link rel="stylesheet" href="../../assets/css/style_actions.css">
    
    <title>Do-Kan: Editar tarea | &#169;Odra Sanchez</title>
</head>
<body>
    <main>
    <h2>Actualizar tarea</h2>
    <p>Cambia el contenido de la tarea o muévela a su siguiente etapa.</p>


    <form method="POST">
        <div class="mb-4">
            <label for="title" class="form-label">Tarea</label>
            <input type="text" class="form-control" name="title" value="<?php echo htmlspecialchars($tarea['title']); ?>" required>
        </div>
        <div class="mb-4">
            <label for="stage" class="form-label">Etapa</label>
            <select name="stage" class="form-select" required>
                <option value="todo" <?php if ($tarea['stage'] == 'todo') echo 'selected'; ?>>To Do</option>
                <option value="en_proceso" <?php if ($tarea['stage'] == 'en_proceso') echo 'selected'; ?>>En Proceso</option>
                <option value="listo" <?php if ($tarea['stage'] == 'listo') echo 'selected'; ?>>Completada</option>
            </select>
        </div>
        <button type="submit" class="btn btn-create px-4 py-2">Guardar cambios</button>
        <a href="../dashboard.php" class="btn btn-secondary px-4 py-2">Cancelar</a>
    </form>
    </main>
</body>
</html>
