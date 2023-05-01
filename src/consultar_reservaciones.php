<?php
    
        $servername = "localhost"; //El servidor que se usa para la base de datos
        $username = "root"; //el usuario de la base de datos, por default es root
        $password = ""; // la contraseña del usuario de la base de datos, por default esta vacia
        $dbname = "hotel"; //el nombre de la base de datos

        $conn = mysqli_connect($servername, $username, $password, $dbname);
        if (!$conn) {
            die("Error en la conexión: " . mysqli_connect_error());
        }
        $sql = "SELECT *FROM reservaciones";
        
        $resultado = mysqli_query($conn, $sql);
        
        if($_SERVER ['REQUEST_METHOD']==='POST'){

            $id = $_POST['ID'];
            if($id){
                $query = "DELETE FROM reservaciones where ID = ${id}";   
                $eliminar = mysqli_query($conn,$query);
                if($eliminar){
                    header("location:consultar_reservaciones.php");
                }
            }

        }
        

        mysqli_close($conn);

?>

<!DOCTYPE html>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
	<link rel="stylesheet" href="../css/style.css">	
    <title>Reservaciones</title>
  </head>
  <body class="bg-secondary">

    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="../index.html">
                <i class="bi bi-house-door-fill"></i>
                <span class="text-warning">MH</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
                        <a class="nav-link active" href="consultar_reservaciones.php">Consultar Reservaciones</a>
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
                        <a class="nav-link" href="tabla_usuarios.php">Usuarios</a>
                    </li>
                </ul>
                <hr class="text-white-50">

                

            </div>

        </div>
    </nav>

    <table  class="table" >
        <thead>
            <tr>
                <th>
                    <p>ID de la reservacion</p>
                </th>
                <th >
                    <p>Tamaño del cuarto</p>
                </th>
                <th >
                    <p>Cantidad de las personas</p>
                </th>
                <th >
                    <p>Cantidad de camas del cuarto</p>
                </th>
                <th >
                    <p>ID del usuario</p>
                </th>
                <th>
                    <p>Eliminar</p>
                </th>
            </tr>
        </thead>
        <tbody > 
            <?php while($tabla = mysqli_fetch_assoc($resultado)):?>
            <tr>
                <td>
                    <?php echo $tabla["ID"];?> 
                </td>
                <td >
                    <?php echo $tabla["tamano_cuarto"];?> 
                </td>
                <td >
                    <?php echo $tabla["cantidad_personas"];?>
                </td>
                <td >
                    <?php echo $tabla["cantidad_camas"];?>
                </td>
                <td >
                    <?php echo $tabla["ID_usuario"];?>
                </td>
                <td>
                    <form method="POST">
                        <input type="hidden" name ="ID" value = "<?php echo $tabla["ID"];?>">
                        <input type="submit" class = "btn" value = "Eliminar" href = "">
                        
                    </form>
                </td>
            </tr>
            <?php endwhile;?>
        </tbody>    
    </table>

    
    
		

		<footer class="footer">Derechos reservados. Las montañas del himalaya es una franquicia internacional. Queda prohibido cualquier tipo de venta fuera de nuestra pagina oficial.</footer>

	</div>
</body>

</html>