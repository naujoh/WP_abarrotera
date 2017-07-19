<?php
include_once('../abarrotera.class.php');
$rol[0] = 'Administrador';
$abarrotera->guardia($rol);
// include_once('index.php');
$id_producto = $_GET['id_producto'];
$parametros['id_producto']=$id_producto;
$d = $abarrotera->consultar('SELECT * FROM presentacion WHERE id_producto=:id_producto', $parametros);
$mensaje = 'El elemento no se puede eliminar por que hay '.count($d).' presentaciones asociadas';
$color = 'danger';
if(count($d)==0){
	$fe = $abarrotera->borrar('producto', $parametros);
	$mensaje = 'Se han eliminado '.$fe.' productos exitosamente.';
	$color = 'success';
}
include_once('index.php');
?>