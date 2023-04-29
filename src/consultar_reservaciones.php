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

				$conn = conectarBD($servername, $username, $password, $dbname);
				consultarReservaciones($conn);
				cerrarConexionBD($conn);

				function conectarBD($servername, $username, $password, $dbname)
				{

					$conn = mysqli_connect($servername, $username, $password, $dbname);

					if (!$conn) {
						die("Error en la conexión: " . mysqli_connect_error());
					}
					return $conn;
				}

				function cerrarConexionBD($conn)
				{
					mysqli_close($conn);
				}

				function consultarReservaciones($conn)
				{
					$sql = "SELECT *FROM reservaciones";
					$resultado = mysqli_query($conn, $sql);
					if (mysqli_num_rows($resultado) > 0) {
						// Recorre los resultados y haz algo con ellos
						echo "
						<table>
							<thead>
								<tr>
									<th>Tamaño de cuarto</th>
									<th>Cantidad de personas</th>
									<th>Cantidad de camas</th>
									<th>ID del usuario</th>
								</tr>
							</thead>
							<tbody>";
						while ($fila = mysqli_fetch_assoc($resultado)) {
							echo " 
							<tr>
							<td>" . $fila["tamano_cuarto"] . "</td>
							<td>" . $fila["cantidad_personas"] . "</td>
							<td>" . $fila["cantidad_camas"] . "</td>
							<td>" . $fila["ID_usuario"] . "</td>
							</tr>";
						}
						echo "
							</tbody>
						</table>";
					} else {
						echo "0 resultados";
					}
				}
				?>

			</div>

		</div>

		<div id="footer">
			<p>ESTE ES EL FOOTER</p>

		</div>

	</div>
</body>

</html>