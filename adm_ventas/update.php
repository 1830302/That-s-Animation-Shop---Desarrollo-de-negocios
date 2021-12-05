<?php  

include '../2conexion.php';


$id=$_POST['id_user'];
$nombre=$_POST['name'];
$pago=$_POST['pago'];
$direccion=$_POST['direccion'];
$telefono=$_POST['telefono'];
$producto=$_POST['producto'];
$fecha=$_POST['fecha'];
$total=$_POST['total'];
$foto=$_FILES['foto']["name"];



$db = getPDO();


$Fecha = new DateTime();
$nombreArchivo=($foto!="")?"img/".$Fecha->getTimestamp()."_".$_FILES['foto']["name"]:"icon.jpg";
$ruta=($foto!="")?$Fecha->getTimestamp()."_".$_FILES['foto']["name"]:"icon.jpg";

$tmpFoto=$_FILES['foto']["tmp_name"];

if($tmpFoto!=""){
	move_uploaded_file($tmpFoto,"../img/".$ruta);

	$consulta=$db->prepare("select imagen FROM ventas where id=:id");
    $consulta->bindParam(':id',$id);
    $consulta->execute();

    $empleado=$consulta->fetch(PDO::FETCH_LAZY);
    

    if(isset($empleado["image"])){
    	if (file_exists("../".$empleado["image"])) {
		unlink("../".$empleado["image"]);
    	}
    }


	$agregarr = $db->prepare('UPDATE ventas SET imagen=:imagen WHERE id=:id');
    $agregarr->bindParam(':imagen', $nombreArchivo);
    $agregarr->bindParam(':id', $id);
    $agregarr->execute();
}






$agregar = $db->prepare ('UPDATE ventas SET nombre_del_comprador=:nombre, forma_de_pago=:pago, direccion_de_entrega=:direccion, telefono_del_comprador=:telefono, nombre_del_producto=:producto, fecha=:fecha, total=:total  WHERE id=:id');  
$agregar->bindParam(':nombre', $nombre);
$agregar->bindParam(':pago', $pago);
$agregar->bindParam(':direccion', $direccion);
$agregar->bindParam(':telefono', $telefono);
$agregar->bindParam(':producto', $producto);
$agregar->bindParam(':fecha', $fecha);
$agregar->bindParam(':total', $total);
$agregar->bindParam(':id', $id); 




if($agregar->execute()){
	header("location:../realizar_venta.php?actualizado=ok");
}else{
	header("location:../realizar_venta.php?actualizado=error");
}


?>