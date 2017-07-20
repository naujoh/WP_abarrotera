<?php
include_once('../abarrotera.class.php');
$rol[0] = 'Administrador';
$abarrotera->guardia($rol);	
// include_once('index.php');
$id_rol = $_GET['id_rol'];
$id_usuario = $_GET['id_usuario'];
$parametros['id_rol']=$id_rol;
$parametros['id_usuario']=$id_usuario;
// print_r($parametros); die();
$fe = $abarrotera->borrar('usuario_rol', $parametros);
$mensaje = 'Se han eliminado '.$fe.' roles exitosamente.';
$color = 'success';
include_once('index.php');
?>