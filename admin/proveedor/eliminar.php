<?php
include_once('../abarrotera.class.php');
// include_once('index.php');
$id_proveedor = $_GET['id_proveedor'];
$parametros['id_proveedor']=$id_proveedor;
$d = $abarrotera->consultar('SELECT * FROM marca WHERE id_proveedor=:id_proveedor', $parametros);
$mensaje = 'El elemento no se puede eliminar por que hay '.count($d).' marcas asociados';
$color = 'danger';
if(count($d)==0){
	$fe = $abarrotera->borrar('proveedor', $parametros);
	$mensaje = 'Se han eliminado '.$fe.' proveedores exitosamente.';
	$color = 'success';
}
include_once('index.php');
?>