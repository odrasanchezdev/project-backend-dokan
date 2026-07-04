<?php
session_start();

include '../../includes/conexion.php';
include '../../includes/funciones.php';

if (!isset($_SESSION['usuario'])) {
    redireccionar("../../index.php", "error", "login");
}

if ($_SERVER["REQUEST_METHOD"] !== "POST" || empty($_POST['id_tarea'])) {
    redireccionar("../dashboard.php", "error", "seleccion");
}

$id_tarea = (int) $_POST['id_tarea'];
$usuario_email = $_SESSION['usuario'];


// Obtener el ID del usuario
$usuario_id = obtenerIdUsuario($conn, $_SESSION['usuario']);

if (!$usuario_id) {
    session_destroy();
    redireccionar("../../index.php", "error", "login");
}

// Eliminar únicamente si la tarea pertenece al usuario
$stmt = mysqli_prepare(
    $conn,
    "DELETE FROM tasks
     WHERE id = ? AND user_id = ?"
);

mysqli_stmt_bind_param(
    $stmt,
    "ii",
    $id_tarea,
    $usuario_id
);

mysqli_stmt_execute($stmt);

if (mysqli_stmt_affected_rows($stmt) > 0) {
    redireccionar("../dashboard.php", "mensaje", "Tarea eliminada");
} else {
    redireccionar("../dashboard.php", "error", "eliminar");
}