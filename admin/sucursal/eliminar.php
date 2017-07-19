<?php
include_once('../abarrotera.class.php');
$rol[0] = 'Administrador';
$abarrotera->guardia($rol);
// include_once('index.php');
$id_sucursal = $_GET['id_sucursal'];
$parametros['id_sucursal']=$id_sucursal;
$d = $abarrotera->consultar('SELECT * FROM carrito WHERE id_sucursal=:id_sucursal', $parametros);
$mensaje = 'El elemento no se puede eliminar por que hay '.count($d).' carritos de compra asociados';
$color = 'danger';
if(count($d)==0){
	$fe = $abarrotera->borrar('sucursal', $parametros);
	$mensaje = 'Se han eliminado '.$fe.' sucursales exitosamente.';
	$color = 'success';
}
include_once('index.php');
?>