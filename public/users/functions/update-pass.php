<?php
include '../../includes/conexion.php';
include '../../includes/funciones.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $new_pass = trim($_POST['new_password']);
    $confirm = trim($_POST['confirm_password']);

    validarRegistro($email, $new_pass, $confirm,"../recuperarcontrasena.php");

    $passwordHash = password_hash($new_pass, PASSWORD_DEFAULT);

    // Verifica si existe el correo
    $stmt = mysqli_prepare($conn, "SELECT id FROM users WHERE email = ?");
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) === 1) {
        $stmt = mysqli_prepare($conn, "UPDATE users SET contrasena = ? WHERE email = ?");

        mysqli_stmt_bind_param($stmt,"ss", $passwordHash, $email);

        if (mysqli_stmt_execute($stmt)) {
            mostrarMensaje(
                "✓ Contraseña actualizada",
                "Tu contraseña ha sido actualizada correctamente.",
                "Iniciar sesión",
                "../../index.php"
            );
        } else {
            error_log(mysqli_error($conn));
            echo "<div class='alert'>Ocurrió un error al registrar el usuario. Inténtalo nuevamente.</div>";
        }
    } else {
        mostrarMensaje(
            "× Correo no encontrado",
            "No existe ninguna cuenta registrada con ese correo electrónico.",
            "Regresar",
            "../recuperarcontrasena.php"
        );
    }
}

?>