<?php
include '../../includes/conexion.php';
include '../../includes/funciones.php';



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm = $_POST['confirm_password'];
    
    validarRegistro($email, $password, $confirm,"../registrar.php");
    
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    // Preparacion de statments
    $stmt = mysqli_prepare($conn, "SELECT id FROM users WHERE email = ?");
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $checkResult = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($checkResult) > 0) {
        mostrarMensaje(
            "× Correo registrado ×",
            "Este correo ya está registrado.<br> Registrate con otra cuenta.",
            "Regresar",
            "../registrar.php"
        );
    } else {
        // Insertar el usuario
        $stmt = mysqli_prepare(
        $conn,
        "INSERT INTO users (email, contrasena) VALUES (?, ?)");

        mysqli_stmt_bind_param(
            $stmt,
            "ss",
            $email,
            $passwordHash
        );

        
        if (mysqli_stmt_execute($stmt)) {
            mostrarMensaje(
                "✓ Registro exitoso",
                "Tu cuenta ha sido creada correctamente.",
                "Iniciar sesión",
                "../../index.php"
            );
        } else {
            error_log(mysqli_error($conn));
            echo "<div class='alert'>Ocurrió un error al registrar el usuario. Inténtalo nuevamente.</div>";
        }
    }
}
?>