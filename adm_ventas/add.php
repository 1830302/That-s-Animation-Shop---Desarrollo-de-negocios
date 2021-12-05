<?php 
include '../2conexion.php';

$nombre=$_POST['name'];
$pago=$_POST['pago'];
$direccion=$_POST['direccion'];
$telefono=$_POST['telefono'];
$producto=$_POST['producto'];
$total=$_POST['total'];
$foto=$_POST['foto'];


$db = getPDO();
$agregar = $db->prepare('INSERT INTO ventas (nombre_del_comprador, forma_de_pago, direccion_de_entrega, telefono_del_comprador, nombre_del_producto, total, imagen ) VALUES(:nombre,:pago, :direccion,:telefono, :producto, :total, :foto)');
$agregar->bindParam(':nombre', $nombre);
$agregar->bindParam(':pago', $pago);
$agregar->bindParam(':direccion', $direccion);
$agregar->bindParam(':telefono', $telefono);
$agregar->bindParam(':producto', $producto);
$agregar->bindParam(':total', $total);
$agregar->bindParam(':foto', $foto);

if($agregar->execute()){
	header("location:../brand.php?insertado=ok");
}else{
	header("location:../brand.php?insertado=error");
}







?>

