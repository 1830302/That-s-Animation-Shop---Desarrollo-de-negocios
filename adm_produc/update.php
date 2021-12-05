<?php  

include '../2conexion.php';

$id=$_POST['id_user'];
$nombre=$_POST['name'];
$nickname=$_POST['nickname'];
$pass=$_POST['pass'];
$foto=$_FILES['foto']["name"];


$db = getPDO();


$Fecha = new DateTime();
$nombreArchivo=($foto!="")?"img/".$Fecha->getTimestamp()."_".$_FILES['foto']["name"]:"icon.jpg";
$ruta=($foto!="")?$Fecha->getTimestamp()."_".$_FILES['foto']["name"]:"icon.jpg";

$tmpFoto=$_FILES['foto']["tmp_name"];

if($tmpFoto!=""){
	move_uploaded_file($tmpFoto,"../img/".$ruta);

	$consulta=$db->prepare("select img FROM bodega where id=:id");
    $consulta->bindParam(':id',$id);
    $consulta->execute();

    $empleado=$consulta->fetch(PDO::FETCH_LAZY);
    

    if(isset($empleado["image"])){
    	if (file_exists("../".$empleado["image"])) {
		unlink("../".$empleado["image"]);
    	}
    }


	$agregarr = $db->prepare('UPDATE bodega SET img=:img WHERE id=:id');
    $agregarr->bindParam(':img', $nombreArchivo);
    $agregarr->bindParam(':id', $id);
    $agregarr->execute();
}




$agregar = $db->prepare('UPDATE bodega SET nombre=:nombre, precio=:nickname, cantidad=:pass WHERE id=:id');
$agregar->bindParam(':id', $id);
$agregar->bindParam(':nombre', $nombre);
$agregar->bindParam(':nickname', $nickname);
$agregar->bindParam(':pass', $pass);

if($agregar->execute()){
	header("location:../admin.php?actualizado=ok");
}else{
	header("location:../admin.php?actualizado=error");
}


?>