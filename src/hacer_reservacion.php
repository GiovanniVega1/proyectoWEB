<?php
    $servername = "localhost"; //El servidor que se usa para la base de datos
    $username = "root"; //el usuario de la base de datos, por default es root
    $password = ""; // la contraseña del usuario de la base de datos, por default esta vacia
    $dbname = "hotel"; //el nombre de la base de datos
    
    
    
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (!$conn) {
        die("Error en la conexión: " . mysqli_connect_error());
    }
    
    $sql = "SELECT *FROM usuarios";
    $usuarios = mysqli_query($conn,$sql);

    if($_SERVER ['REQUEST_METHOD']==='POST'){
        
        $id_usuario = $_POST['id_usuario'];
        $cantidad_personas = $_POST['cantidad_personas'];
        $cantidad_camas = $_POST['cantidad_camas'];
        $cuarto = $_POST['cuarto']; 



        $resultado = mysqli_query($conn, $sql);
        
        if($tabla = mysqli_fetch_assoc($resultado)){
            $sql = "INSERT INTO reservaciones(tamano_cuarto,cantidad_personas,cantidad_camas,ID_usuario) values('${cuarto}','${cantidad_personas}','${cantidad_camas}','${id_usuario}');";
            $ingresar = mysqli_query($conn,$sql);
            if($ingresar){
                header("location:../index.html");
            }
        }
        mysqli_close($conn);
    }
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
                        <a class="nav-link" href="consultar_reservaciones.php">Consultar Reservaciones</a>
                    </li>
                    <li>
                    <a class="nav-link active" href="#">Generar reservacion</a>
                    </li>
                </ul>
                <hr class="text-white-50">

                

            </div>

        </div>
    </nav>

    
    <form method="POST">
        <table class = "table">
            <thead>
                <th>
                    <p>Cuarto que desea reservar</p>
                </th>
                <th>
                    <p>Cantidad de personas</p>
                </th>
                <th>
                    <p>Cantidad de camas</p>
                </th>
                <th>
                    <p>ID del usuario</p>
                </th>
            </thead>
            <tbody>
                <td>
                <select name="cuarto">
                    <option selected = "selected" value="Junior Suite">
                        Junior Suite
                    </option>
                    <option value="Master Suite">
                        Master Suite
                    </option>
                    <option  value="Suite Presidencial">
                        Suite presidencial
                    </option>
                    <option value=" Imperial Suite">
                        Imperial suite
                    </option>
                </select>
                </td>
                <td>
                    <select name="cantidad_personas">
                        <option selected = "selected" value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                    </select>
                </td>
                <td>
                <select name="cantidad_camas">
                    <option selected = "selected" value="1">1</option>
                    <option value="2">2</option>
                </select>
                </td>
                <td>
                    <select name="id_usuario" >
                        <?php while($id = mysqli_fetch_assoc($usuarios)):?>
                        <option value="<?php echo  $id['ID'] ;?>"><?php echo $id['ID']; ?></option>
                        <?php endwhile;?>
                    </select>
                </td>
            </tbody>
        </table>
        
        <input type="submit" value = "Hacer reservacion">
    </form>
    
		

		<footer class="footer">Derechos reservados. Las montañas del himalaya es una franquicia internacional. Queda prohibido cualquier tipo de venta fuera de nuestra pagina oficial.</footer>

	</div>
</body>

</html>