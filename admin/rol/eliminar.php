<?php
include_once('../abarrotera.class.php');
$rol[0] = 'Administrador';
$abarrotera->guardia($rol);
// include_once('index.php');
$id_rol = $_GET['id_rol'];
$parametros['id_rol']=$id_rol;
$d = $abarrotera->consultar('SELECT * FROM usuario_rol WHERE id_rol=:id_rol', $parametros);
$mensaje = 'El elemento no se puede eliminar por que hay '.count($d).' usuarios asociados';
$color = 'danger';
if(count($d)==0){
	$fe = $abarrotera->borrar('rol', $parametros);
	$mensaje = 'Se han eliminado '.$fe.' roles de medida exitosamente.';
	$color = 'success';
}
include_once('index.php');
?>