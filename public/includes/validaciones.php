<?php
// Validar campos
if ( empty($email) || empty($password) || empty($confirm) ) {
    header("Location: ../../register.php?error=empty");
    exit;
}

// Validar correo
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header("Location: ../../register.php?error=email");
    exit;
}

?>