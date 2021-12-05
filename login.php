<?php 
require 'conexion.php';

$user = $_POST['user'];
$pass = $_POST['password'];


$consultar = "SELECT * FROM users WHERE nickname = '$user' AND pass = '$pass'";

//$img_consulta = "SELECT image FROM users WHERE nickname = '$user' AND pass = '$pass'";


$query = mysqli_query($conexion,$consultar);
//$query_img = mysqli_query($conexion,$img_consulta);

$mostrar=$query->fetch_array();

if(mysqli_num_rows($query)==0){

	echo "<script> 
    	location.href = 'pagina_login.php'; 
    	</script>";

}else{
	session_start();
	$_SESSION['usuario']=$user;
	$_SESSION['image'] = $mostrar['image'];
	echo "<script> 
    	location.href = 'admin.php'; 
    	</script>";

}

 ?>