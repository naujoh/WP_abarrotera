<?php
include_once('../abarrotera.class.php');
$rol[0] = 'Administrador';
$abarrotera->guardia($rol);	
// include_once('index.php');
$id_marca = $_GET['id_marca'];
$parametros['id_marca']=$id_marca;
$d = $abarrotera->consultar('SELECT * FROM producto WHERE id_marca=:id_marca', $parametros);
$mensaje = 'El elemento no se puede eliminar por que hay '.count($d).' productos asociados';
$color = 'danger';
if(count($d)==0){
	$fe = $abarrotera->borrar('marca', $parametros);
	$mensaje = 'Se han eliminado '.$fe.' marcas exitosamente.';
	$color = 'success';
}
include_once('index.php');
?>