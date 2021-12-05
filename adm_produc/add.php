<?php  

include '../2conexion.php';

$nombre=$_POST['name'];
$nickname=$_POST['nickname'];
$pass=$_POST['pass'];
$foto=$_FILES['foto']["name"];

$db = getPDO();
$agregar = $db->prepare('INSERT INTO bodega (nombre,precio,cantidad,img) VALUES(:nombre,:nickname, :pass,:img)');
$agregar->bindParam(':nombre', $nombre);
$agregar->bindParam(':nickname', $nickname);
$agregar->bindParam(':pass', $pass);


$Fecha = new DateTime();
$nombreArchivo=($foto!="")?"img/".$Fecha->getTimestamp()."_".$_FILES['foto']["name"]:"icon.jpg";
$ruta=($foto!="")?$Fecha->getTimestamp()."_".$_FILES['foto']["name"]:"icon.jpg";

$tmpFoto=$_FILES['foto']["tmp_name"];

if($tmpFoto!=""){
	move_uploaded_file($tmpFoto,"../img/".$ruta);
}

$agregar->bindParam(':img', $nombreArchivo);

if($agregar->execute()){
	header("location:../admin.php?insertado=ok");
}else{
	header("location:../admin.php?insertado=error");
}


?>