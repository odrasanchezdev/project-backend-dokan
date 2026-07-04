<?php

// Login, create, update, delete, dashboard
function redireccionar($pagina, $parametro, $valor)
{
    header("Location: {$pagina}?{$parametro}={$valor}");
    exit;
}

// obtener usuario
function obtenerIdUsuario($conn, $email)
{
    $stmt = mysqli_prepare(
        $conn,
        "SELECT id FROM users WHERE email = ? LIMIT 1"
    );

    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);
    $usuario = mysqli_fetch_assoc($result);

    return $usuario ? $usuario['id'] : null;
}

// register and update-pass
function validarRegistro($email, $password, $confirm, $redirect)
{
    if (empty($email) || empty($password) || empty($confirm)) {
        header("Location: $redirect?error=empty");
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: $redirect?error=email");
        exit;
    }

    if ($password !== $confirm) {
        header("Location: $redirect?error=password");
        exit;
    }
}

function mostrarMensaje($titulo, $mensaje, $boton, $link)
{
    echo "
                <!DOCTYPE html>
                <html lang='es'>
                <head>
                    <link
                    href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css'
                    rel='stylesheet'
                    integrity='sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3'
                    crossorigin='anonymous'
                    />
                    <link rel='stylesheet' href='../../assets/css/style.css'>
                </head>

                <body>

                <div class='container'>
                <div class='card p-4 shadow rounded-3'>
                    <h2 class='text-center mb-4'>$titulo</h1>
                    <p>$mensaje</p>
                    <div class='d-grid mb-4'>
                        <a class='btn' href='$link'>
                        $boton
                        </a>
                    </div>
                </div>
                </div>

                </body>
                <!-- Bootstrap JS -->
                <script
                src='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js'
                integrity='sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p'
                crossorigin='anonymous'
                ></script>
                </html>
                ";
}

?>