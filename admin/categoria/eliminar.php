<?php
include_once('../abarrotera.class.php');
$rol[0] = 'Administrador';
$abarrotera->guardia($rol);
// include_once('index.php');
$id_categoria = $_GET['id_categoria'];
$parametros['id_categoria']=$id_categoria;
$d = $abarrotera->consultar('SELECT * FROM marca WHERE id_categoria=:id_categoria', $parametros);
$mensaje = 'El elemento no se puede eliminar por que hay '.count($d).' marcas asociados';
$color = 'danger';
if(count($d)==0){
	$fe = $abarrotera->borrar('categoria', $parametros);
	$mensaje = 'Se han eliminado '.$fe.' categorias exitosamente.';
	$color = 'success';
}
include_once('index.php');
?>