<?php
    $db = mysqli_connect('localhost', 'root', '', 'hotel');

    if(!$db) {
        echo "Error en la conexion";
    }

    $nombre = '';
    $correo = '';
    $contrasena = '';

    $errores = [];

    if ($_SERVER['REQUEST_METHOD'] === 'POST'){

        $nombre = mysqli_real_escape_string( $db, $_POST['nombre'] );
        $correo = mysqli_real_escape_string( $db, $_POST['correo'] );
        $contrasena = mysqli_real_escape_string( $db, $_POST['contrasena'] );

        if (!$nombre) {
            $errores[] = "Debes añadir un nombre";
        }
        if (!$correo) {
            $errores[] = "Debes añadir un correo";
        }
        if (!$contrasena) {
            $errores[] = "Debes añadir una contraseña";
        }


        if(empty($errores)) {
            $query = " INSERT INTO usuarios (nombre, correo, contrasena) VALUES ( '$nombre', '$correo', '$contrasena')";

            $enviar = mysqli_query($db, $query);

            if ($enviar) {
                header('location: login.php?resultado=1');
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../css/style.css">
    <title>Registro</title>
</head>

<body class="bg-secondary">

    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="../index.html">
                <i class="bi bi-house-door-fill"></i>
                <span class="text-warning">MH</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="menu">
                <ul class="navbar-nav me-auto">
                    <li class="navbar-iten">
                        <a class="nav-link active" href="#">Inicio</a>
                    </li>
                    <li class="navbar-iten">
                        <a class="nav-link" href="src/galeria.html">Galeria</a>
                    </li>
                    <li class="navbar-iten">
                        <a class="nav-link" href="src/servicios.html">Servicios</a>
                    </li>
                    <li>
                        <a class="nav-link" href="src/consultar_reservaciones.php">Consultar Reservaciones</a>
                    </li>
                    <li>
                        <a class="nav-link" href="src/hacer_reservacion.php">Generar reservacion</a>
                    </li>
                    <li>
                        <a class="nav-link" href="src/contacto.php">Contacto</a>
                    </li>
                    <li>
                        <a class="nav-link" href="src/login.php">Iniciar sesion</a>
                    </li>
                    <li>
                        <a class="nav-link active" href="src/Registrar.php">Registro</a>
                    </li>
                    <li>
                        <a class="nav-link" href="src/tabla_usuarios.php">Usuarios</a>
                    </li>
                </ul>
                <hr class="text-white-50">



            </div>

        </div>
    </nav>

    <form class="form-register" method="POST" action="Registrar.php">
        <label for="name">Nombre</label>
        <input type="text" placeholder="Nombre" id="name-register" name="nombre" value="<?php echo $nombre ?>">
        <br>
        <label for="email">Correo</label>
        <input type="email" placeholder="Correo" id="email-register" name="correo" value="<?php echo $correo ?>">
        <br>
        <label for="password">Contraseña</label>
        <input type="password" placeholder="password" id="password-register" name="contrasena" value="<?php echo $contrasena ?>">
        <br>
        <input type="submit" value="Ingresar" id="btn-register" class="btn">

        <?php foreach($errores as $error): ?>
        <div class="alerta_error">
            <?php echo $error; ?>
        </div>
    <?php endforeach ?>
    </form>


    <footer class="footer">Derechos reservados. Las montañas del himalaya es una franquicia internacional. Queda prohibido cualquier tipo de venta fuera de nuestra pagina oficial.</footer>

</body>

</html>