<?php

	$server = "localhost";
	$usuario = "root";
	$contraseña = "";
	$bd = "prueba-codeandote";

	$conexion = mysqli_connect($server, $usuario, $contraseña, $bd)
		or die("Error en la conexion");

		$Nombre = $_POST['Nombre'];
		$Apellidos = $_POST['Apellidos'];
		$Email = $_POST['Email'];
		$Asunto = $_POST['Asunto'];
		$Mensaje = $_POST['Mensaje'];

			$insertarDatos = "INSERT INTO contactos (Nombre, Apellidos, Email, Asunto, Mensaje) VALUES ('$Nombre', '$Apellidos', '$Email', '$Asunto', '$Mensaje')";

				$resultado = mysqli_query($conexion, $insertarDatos);
					
					if ($resultado) {
				        echo '<script type="text/javascript">alert("Tus datos fueron enviados ¡Gracias!"); window.location.href="registro.html"; </script>';
				    } else {
				        echo "Error al insertar datos: " . mysqli_error($conexion);
				    }

?>