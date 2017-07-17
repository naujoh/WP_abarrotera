<?php
include_once('../abarrotera.class.php');
// include_once('index.php');
$id_empleado = $_GET['id_empleado'];
$parametros['id_empleado']=$id_empleado;
$d = $abarrotera->consultar('SELECT * FROM carrito WHERE id_empleado=:id_empleado', $parametros);
$mensaje = 'El elemento no se puede eliminar por que hay '.count($d).' carritos asociados';
$color = 'danger';
if(count($d)==0){
	$fe = $abarrotera->borrar('empleado', $parametros);
	$mensaje = 'Se han eliminado '.$fe.' emplaedos exitosamente.';
	$color = 'success';
}
include_once('index.php');
?>