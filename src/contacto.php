<?php
// Verificamos si se ha enviado el formulario
if (isset($_POST['submit'])) {

  $servername = "localhost"; //El servidor que se usa para la base de datos
  $username = "root"; //el usuario de la base de datos, por default es root
  $password = ""; // la contraseña del usuario de la base de datos, por default esta vacia
  $dbname = "hotel"; //el nombre de la base de datos
  // Recopilamos los datos del formulario
  $nombre = $_POST['nombre'];
  $correo = $_POST['correo'];
  $telefono = $_POST['telefono'];
  $comentarios = $_POST['comentarios'];

  // Conectamos a la base de datos
  $conexion = mysqli_connect($servername, $username, $password, $dbname);

  // Verificamos si se ha conectado correctamente a la base de datos
  if (!$conexion) {
    die("Error al conectarse a la base de datos: " . mysqli_connect_error());
  }

  // Insertamos los datos en la tabla de la base de datos
  $sql = "INSERT INTO comentarios (nombre, descripcion, email, telefono) VALUES ('$nombre', '$comentarios', '$correo', '$telefono')";

  if (mysqli_query($conexion, $sql)) {
  } else {
    echo "Error al guardar los datos: " . mysqli_error($conexion);
  }

  // Cerramos la conexión a la base de datos
  mysqli_close($conexion);
}
?>

<!doctype html>
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
    <title>Formulario de contacto</title>
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
                        <a class="nav-link" href="../index.html">Inicio</a>
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
                        <a class="nav-link active" href="contacto.php">Contacto</a>
                    </li>
                    <li>
                        <a class="nav-link" href="login.php">Iniciar sesion</a>
                    </li>
                    <li>
                        <a class="nav-link" href="Registrar.php">Registro</a>
                    </li>
                    <li>
                        <a class="nav-link" href="tabla_usuarios.php">Usuarios</a>
                    </li>
                </ul>
                <hr class="text-white-50">



            </div>

        </div>
    </nav>  
    <h2>Formulario de contacto</h2>
    <form class="form-register" method="post" action="contacto.php">
      <label>Nombre:</label>
      <input type="text" name="nombre"><br>

      <label>Correo electrónico:</label>
      <input type="email" name="correo"><br>

      <label>Teléfono:</label>    
      <input type="tel" name="telefono"><br>

      <label>Comentarios:</label>
      <textarea name="comentarios"></textarea><br>

      <input type="submit" name="submit" value="Enviar">
    </form>

    <footer class="footer">Derechos reservados. Las montañas del himalaya es una franquicia internacional. Queda prohibido cualquier tipo de venta fuera de nuestra pagina oficial.</footer>
    
</body>     

</html>
