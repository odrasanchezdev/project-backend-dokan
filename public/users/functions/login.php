<?php
session_start();
include '../../includes/conexion.php';
include '../../includes/funciones.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if (empty($email) || empty($password)) {
        redireccionar("../../index.php", "error", "empty");
    }
    

    $query = "SELECT * FROM users WHERE email = ? LIMIT 1";
    if ($stmt = mysqli_prepare($conn, $query)) {
        mysqli_stmt_bind_param($stmt, 's', $email); 
        mysqli_stmt_execute($stmt);
        $resultado = mysqli_stmt_get_result($stmt);

        if ($resultado && mysqli_num_rows($resultado) === 1) {
            $usuario = mysqli_fetch_assoc($resultado);

            if (password_verify($password, $usuario['contrasena'])) {
                $_SESSION['usuario'] = $usuario['email'];
                redireccionar("../../tasks/dashboard.php", "", "");
            }
        }
        redireccionar("../../index.php", "error", "login");
    } else {
        echo "Error en la consulta SQL.";
    }
}
?>
