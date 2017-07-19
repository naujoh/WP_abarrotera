<?php
include_once('../abarrotera.class.php');
$rol[0] = 'Administrador';
$abarrotera->guardia($rol);	
// include_once('index.php');
$id_cliente = $_GET['id_cliente'];
$parametros['id_cliente']=$id_cliente;
$d = $abarrotera->consultar('SELECT * FROM carrito WHERE id_cliente=:id_cliente', $parametros);
$mensaje = 'El elemento no se puede eliminar por que hay '.count($d).' carritos asociados';
$color = 'danger';
if(count($d)==0){
	$fe = $abarrotera->borrar('cliente', $parametros);
	$mensaje = 'Se han eliminado '.$fe.' clientes exitosamente.';
	$color = 'success';
}
include_once('index.php');
?>