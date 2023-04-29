<!DOCTYPE html>

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
	<link rel="stylesheet" type="text/css" href="/css/consultar.css">
	<title>NavBar</title>
</head>

<body class="bg-secondary">

	<nav class="navbar navbar-expand-md navbar-dark bg-dark">
		<div class="container-fluid">
			<a class="navbar-brand" href="#">
				<i class="bi bi-house-door-fill"></i>
				<span class="text-warning">Intelio</span>
			</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="menu">
				<ul class="navbar-nav me-auto">
					<li class="navbar-iten">
						<a class="nav-link active" href="#">Inicio</a>
					</li>
					<li class="navbar-iten">
						<a class="nav-link" href="#">Galeria</a>
					</li>
					<li class="navbar-iten">
						<a class="nav-link" href="#">Servicios</a>
					</li>
				</ul>
				<hr class="text-white-50">

				<ul class="navbar-nav flex-row flex-wrap text-light">
					<li class="nav-item col-6 col-md-auto p-3">
						<i class="bi bi-twitter"></i>
						<small class="d-md-none ms-2">Twitter</small>
					</li>
					<li class="nav-item col-6 col-md-auto p-3">
						<i class="bi bi-facebook"></i>
						<small class="d-md-none ms-2">Facebook</small>
					</li>
					<li class="nav-item col-6 col-md-auto p-3">
						<i class="bi bi-whatsapp"></i>
						<small class="d-md-none ms-2">Whatsapp</small>
					</li>
					<li class="nav-item col-6 col-md-auto p-3">
						<i class="bi bi-instagram"></i>
						<small class="d-md-none ms-2">Instagram</small>
					</li>
				</ul>

			</div>

		</div>
	</nav>

	<div id="contenido">
		<div id="section">
			<?php
			$servername = "localhost"; //El servidor que se usa para la base de datos
			$username = "root"; //el usuario de la base de datos, por default es root
			$password = ""; // la contraseña del usuario de la base de datos, por default esta vacia
			$dbname = "hotel"; //el nombre de la base de datos
			$nombreUsuario = "edgar";
			$id = "";
			$nombre = "";
			$email = "";

			$conn = mysqli_connect($servername, $username, $password, $dbname);

			if (!$conn) {
				die("Error en la conexión: " . mysqli_connect_error());
			}

			consultarUsuario($conn, $nombreUsuario);

			mysqli_close($conn);

			function consultarUsuario($conn, $nombreUsuario)
			{
				global
				 $id, $nombre, $email;

				$sql = "SELECT *FROM usuarios WHERE nombre = '$nombreUsuario'";
				$resultado = mysqli_query($conn, $sql);
				if (mysqli_num_rows($resultado) > 0) {
					// Recorre los resultados y haz algo con ellos
					while ($fila = mysqli_fetch_assoc($resultado)) {

						$id = $fila["ID"];
						$nombre = $fila["nombre"];
						$email = $fila["correo"];
					}
				} else {
					echo "0 resultados";
				}
			}
			?>

			<div class="container text-center">
				<div class="row">
					<div class="col">
						ID usuario: <?php echo $id ?>
					</div>
					<div class="col">
						Nombre usuario: <?php echo $nombre ?>
					</div>
					<div class="col">
						Correo usuario: <?php echo $email ?>
					</div>
				</div>
			</div>
			<button><a href=""></a></button>
			<div id="footer">
				<p>ESTE ES EL FOOTER</p>

			</div>

		</div>
</body>

</html>


<?php
$servername = "localhost"; //El servidor que se usa para la base de datos
$username = "root"; //el usuario de la base de datos, por default es root
$password = ""; // la contraseña del usuario de la base de datos, por default esta vacia
$dbname = "hotel"; //el nombre de la base de datos
$nombreUsuario = "edgar";
$id = "";
$nombre = "";
$email = "";

$conn = mysqli_connect($servername, $username, $password, $dbname);
global $conn;
if (!$conn) {
    die("Error en la conexión: " . mysqli_connect_error());
}
echo "<pre>";
var_dump($_POST);
echo "</pre>";
			/*if($_SERVER ['REQUEST_METHOD']==='POST'){
				
				
					
					global $id, $nombre, $email;
					
					$sql = "SELECT *FROM usuarios WHERE nombre = '$nombreUsuario'";
					$resultado = mysqli_query($conn, $sql);
					if (mysqli_num_rows($resultado) > 0) {
						// Recorre los resultados y haz algo con ellos
						while ($fila = mysqli_fetch_assoc($resultado)) {

							$id = $fila["ID"];
							$nombre = $fila["nombre"];
							$email = $fila["correo"];
						}
					} else {
						echo "0 resultados";
					}
				
					if($id ){
						$sql = "DELETE FROM usuarios WHERE id='$id'";
						if (mysqli_query($conn, $sql)) {
							echo "Usuario eliminado correctamente";
						} else {
							echo "Error: " . $sql . "<br>" . mysqli_error($conn);
						}	
					}
					mysqli_close($conn);
					
			}else{
				
					global $id, $nombre, $email;

					$sql = "SELECT *FROM usuarios WHERE nombre = '$nombreUsuario'";
					$resultado = mysqli_query($conn, $sql);
					if (mysqli_num_rows($resultado) > 0) {
						// Recorre los resultados y haz algo con ellos
						while ($fila = mysqli_fetch_assoc($resultado)) {

							$id = $fila["ID"];
							$nombre = $fila["nombre"];
							$email = $fila["correo"];
						}
					} else {
						echo "0 resultados";
					}
				
				mysqli_close($conn);
			}*/
