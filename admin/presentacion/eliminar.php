<?php
include_once('../abarrotera.class.php');
$rol[0] = 'Administrador';
$abarrotera->guardia($rol);	
// include_once('index.php');
$sku = $_GET['sku'];
$parametros['sku']=$sku;
$d = $abarrotera->consultar('SELECT * FROM promocion_producto WHERE sku=:sku UNION SELECT * FROM carrito_detalle WHERE sku=:sku' , $parametros);
$mensaje = 'El elemento no se puede eliminar por que hay '.count($d).' elementos asociados';
$color = 'danger';
if(count($d)==0){
	$fe = $abarrotera->borrar('presentacion', $parametros);
	$mensaje = 'Se han eliminado '.$fe.' presentacion exitosamente.';
	$color = 'success';
}
include_once('index.php');
?>