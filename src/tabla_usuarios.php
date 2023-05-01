<?php 
    $db = mysqli_connect('localhost', 'root', '', 'hotel');

    if(!$db) {
        echo "Error en la conexion";
    }

    $resultados = $_GET['resultado'] ?? null;

    $query = "SELECT * FROM usuarios";

    $resultado = mysqli_query($db, $query);

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $id = $_POST['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);

        if($id) {
            $query = "DELETE FROM reservaciones WHERE ID_usuario = ${id}";
            $resultado = mysqli_query($db, $query);
            $query = "DELETE FROM usuarios WHERE ID = ${id}";
            $resultado = mysqli_query($db, $query);

            if($resultado) {
                header('location: tabla_usuarios.php');
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
    <title>Consulta de usuarios</title>
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
                        <a class="nav-link active" href="#">Inicio</a>
                    </li>
                    <li class="navbar-iten">
                        <a class="nav-link" href="galeria.html">Galeria</a>
                    </li>
                    <li class="navbar-iten">
                        <a class="nav-link" href="servicios.html">Servicios</a>
                    </li>
                    <li>
                        <a class="nav-link" href="consultar_reservaciones.php">Consultar Reservaciones</a>
                    </li>
                    <li>
                        <a class="nav-link" href="hacer_reservacion.php">Generar reservacion</a>
                    </li>
                    <li>
                        <a class="nav-link" href="contacto.php">Contacto</a>
                    </li>
                    <li>
                        <a class="nav-link" href="login.php">Iniciar sesion</a>
                    </li>
                    <li>
                        <a class="nav-link" href="Registrar.php">Registro</a>
                    </li>
                    <li>
                        <a class="nav-link active" href="tabla_usuarios.php">Usuarios</a>
                    </li>
                </ul>
                <hr class="text-white-50">



            </div>

        </div>
    </nav>

    <div class="contenedor_usuarios">
            <?php if( intval($resultados) === 1): ?>
                <p class="alerta_exito">Usuario creado correctamente</p>
            <?php elseif( intval($resultados) === 2): ?>
                <p class="alerta_exito">Usuario actualizado correctamente</p>
            <?php endif; ?>
        <table class="tabla_usuarios">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Accion</th>
                </tr>
            </thead>
            <tbody class="cuerpo-tabla">
                <?php while($usuario = mysqli_fetch_assoc($resultado)): ?>
                <tr>
                    <td><?php echo $usuario['nombre'] ?></td>
                    <td><?php echo $usuario['correo'] ?></td>
                    <td>
                        <form method="POST">
                            <input type="hidden" name="id" value="<?php echo $usuario['ID'] ?>">
                            <input type="submit" value="Eliminar" id="btn-register" class="btn">
                        </form>
                        <a href="actualizar.php?id=<?php echo $usuario['ID']; ?>" class="btn">Actualizar</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

    <footer class="footer">Derechos reservados. Las montañas del himalaya es una franquicia internacional. Queda prohibido cualquier tipo de venta fuera de nuestra pagina oficial.</footer>
</body>

</html>