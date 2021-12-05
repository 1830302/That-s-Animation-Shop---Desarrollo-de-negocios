<?php  
include '../2conexion.php';

$id=$_POST['id_product'];

$db = getPDO();

$consulta=$db->prepare("select image FROM users where id=:id");
$consulta->bindParam(':id',$id);
$consulta->execute();

$empleado=$consulta->fetch(PDO::FETCH_LAZY);
print_r($empleado);

if(isset($empleado["image"])){
	if (file_exists("../".$empleado["image"])) {
		unlink("../".$empleado["image"]);
	}
}



$consulta=$db->prepare("DELETE FROM users where id=:id");
$consulta->bindParam(':id',$id);

if($consulta->execute()){
	header("location:../admin_usuarios.php?eliminado=ok");
}else{
	header("location:../admin_usuarios.php?eliminado=error");
}



?>