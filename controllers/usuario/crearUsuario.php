<?php

include('../../db/db.php');

$link = connect();

if ($_POST) {
	$username = $link->real_escape_string($_POST['username']);
	$buscarUsuario = "SELECT username FROM usuarios WHERE username = '$username'";

	if (!$resultado = $link->query($buscarUsuario)) {
		echo $link->error . "<br>";
		exit;
	} else {
		if ($resultado->num_rows == 1) {
			echo 505;
		} else {
			$insert = $link->prepare("INSERT INTO usuarios VALUES (?,?,?,?,?,?,?)");
			$insert->bind_param(
				"isssssi",
				$id,
				$username,
				$password,
				$email,
				$nombre,
				$puesto,
				$activo
			);
			$id = null;
			
			$password = password_hash($link->real_escape_string($_POST['password']), PASSWORD_BCRYPT);
			$email = $link->real_escape_string($_POST['email']);
			$nombre = $link->real_escape_string($_POST['nombre']);
			$puesto = $link->real_escape_string($_POST['puesto']);
			$activo = 1;

			if (!$insert->execute()) {
				echo $insert->error . "<br>";
				exit;
			} else {
				echo "<p>Usuario registrado exitosamente</p><br>";
				echo
					'<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>';
			}
		}
	}
}