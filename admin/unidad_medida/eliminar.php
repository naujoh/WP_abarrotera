<?php
include_once('../abarrotera.class.php');
// include_once('index.php');
$id_unidad_medida = $_GET['id_unidad_medida'];
$parametros['id_unidad_medida']=$id_unidad_medida;
$d = $abarrotera->consultar('SELECT * FROM presentacion WHERE id_unidad_medida=:id_unidad_medida', $parametros);
$mensaje = 'El elemento no se puede eliminar por que hay '.count($d).' productos asociados';
$color = 'danger';
if(count($d)==0){
	$fe = $abarrotera->borrar('unidad_medida', $parametros);
	$mensaje = 'Se han eliminado '.$fe.' unidades de medida exitosamente.';
	$color = 'success';
}
include_once('index.php');
?>