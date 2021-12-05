<?php
session_start();//inicia o continua la sesion

	if (!isset($_SESSION['usuario'])) {
		echo "Inicie Sesion";
		header('Location: login.php');//redirige a login.php
		exit;
	}
?>