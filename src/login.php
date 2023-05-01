<?php 
    $db = mysqli_connect('localhost', 'root', '', 'hotel');

    if(!$db) {
        echo "Error en la conexion";
    }

    $errores = [];
    $exitos = [];

    if($_SERVER['REQUEST_METHOD'] === 'POST'){

        $correo = mysqli_real_escape_string( $db ,filter_var( $_POST['correo'], FILTER_VALIDATE_EMAIL));
        $contrasena = mysqli_real_escape_string( $db ,$_POST['contrasena']);

        if(!$correo) {
            $errores[] = "El email es obligatorio o no es valido";
        }

        if(!$contrasena) {
            $errores[] = "La contraseña es obligatoria";
        }

        if(empty($errores)) {
            $query = "SELECT * FROM usuarios WHERE correo = '$correo' ";
            $resultado = mysqli_query($db, $query);

            if( $resultado->num_rows ) {
            $usuario = mysqli_fetch_assoc($resultado);
                if ($usuario['contrasena'] == $contrasena) {
                    $exitos[] = "El usuario a sido autenticado con exito";
                    $resultado = $_GET['resultado'] ?? null;
                } else {
                    $errores[] = "El usuario o la contraseña son incorrectos";
                }
            } else {
                $errores[] = "El usuario no existe";
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
    <title>Login</title>
    <link rel="stylesheet" href="../css/style.css">

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
                        <a class="nav-link" href="#">Inicio</a>
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
                        <a class="nav-link active" href="src/login.php">Iniciar sesion</a>
                    </li>
                    <li>
                        <a class="nav-link" href="src/Registrar.php">Registro</a>
                    </li>
                    <li>
                        <a class="nav-link" href="src/tabla_usuarios.php">Usuarios</a>
                    </li>
                </ul>
                <hr class="text-white-50">



            </div>

        </div>
    </nav>

    <form class="form-login" method="POST">
        <?php foreach($errores as $error): ?>
            <div class="alerta_error">
                <?php echo $error; ?>
            </div>
        <?php endforeach; ?>
        <?php foreach($exitos as $exito): ?>
            <div class="alerta_exito">
                <?php echo $exito; ?>
            </div>
        <?php endforeach; ?>
        <label for="name">Correo</label>
        <input type="email" placeholder="Correo" id="email-login" name="correo">
        <br>
        <label for="password">Contraseña</label>
        <input type="password" placeholder="password" id="password-login" name="contrasena">
        <br>
        <input type="submit" value="Ingresar" id="btn-login" class="btn">

    </form>
    <footer class="footer">Derechos reservados. Las montañas del himalaya es una franquicia internacional. Queda prohibido cualquier tipo de venta fuera de nuestra pagina oficial.</footer>
</body>

</html>