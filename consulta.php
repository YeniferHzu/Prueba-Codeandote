<!DOCTYPE html>
<html lang="ES">
<head>
	<title>Ver Contactos</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
	<!--Icono-->
	<link rel="shortcut icon" type="text/css" href="icono.png">
</head>
<body>
	
<!--MENÚ-->
	<header id="main-header">
            <nav>
                <ul>
                    <li><a href="index.html">Inicio</a></li>
                    <li><a href="registro.html">Contacto</a></li>
                    <li><a href="consulta.php">Ver contactos</a></li>
                </ul>
            </nav>
    </header>

<!--INICIO Y BIENVENIDA-->
    <div class="Formularios">
    	<h1>CONSULTA LOS DATOS</h1>
    	   <br>
    	<h2>En esta sección, tendrás acceso a la información
    		<br>recopilada a través del formulario de contacto.</h2>
        	
            <!--Consulta de datos-->
            <div class="Formularios">

            	<?php

            		$registrosPorPagina = 1;
            			$paginaActual = isset($_GET['pagina']) ? $_GET['pagina']:1;

						$server = "localhost";
						$usuario = "root";
						$contraseña = "";
						$bd = "prueba-codeandote";

						$conexion = mysqli_connect($server, $usuario, $contraseña, $bd)
							or die("Error en la conexion");

							$totalRegistros = mysqli_num_rows(mysqli_query($conexion, "SELECT * FROM contactos"));

								$totalPaginas = ceil($totalRegistros / $registrosPorPagina);

									$inicio = ($paginaActual - 1) * $registrosPorPagina;

								$consulta = mysqli_query($conexion, "SELECT * FROM contactos LIMIT $inicio, $registrosPorPagina") 

									or die("No hay más datos para mostrar");

									echo "<table align=center>";
									echo "<tr>";
									echo "<td><b>Id</b></td>";
									echo "<td><b>Nombre</b></td>";
									echo "<td><b>Apellidos</b></td>";
									echo "<td><b>Email</b></td>";
									echo "<td><b>Asunto</b></td>";
									echo "<td><b>Mensaje</b></td>";
									echo "</tr>";

										while ($datos = mysqli_fetch_array($consulta)) {
											echo "<tr>";
											echo "<td>".$datos['Id']."</td>";
											echo "<td>".$datos['Nombre']."</td>";
											echo "<td>".$datos['Apellidos']."</td>";
											echo "<td>".$datos['Email']."</td>";
											echo "<td>".$datos['Asunto']."</td>";
											echo "<td>".$datos['Mensaje']."</td>";
											echo "</tr>";
										}

								mysqli_close($conexion);
								echo "</table>";

    					?>

            </div>

<br><br><br>

<button class="boton1"><a href="consulta.php?pagina=<?= $paginaActual - 1 ?>">Anterior</a></button>
<button class="boton1"><a href="consulta.php?pagina=<?= $paginaActual + 1 ?>">Siguiente</a></button>

    </div>

<br><br><br>

<!--FOOTER-->
    <footer>
        <a href="https://linktr.ee/yen_hzu" target="_blank">
            <p>Desarrollado por Yenifer Hzu</p>
        </a>
    </footer>

</body>
</html>


