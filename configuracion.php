<?php
	session_start();
	/*CONFIGURACION DE LA BD - CONEXION*/ 
	define ('USER', 'gerente');
	define ('PASSWORD', '12345');
	define ('SGDB', 'mysql');
	define ('DB', 'abarrotera');
	define ('SGDB_SERVER', 'localhost');

	/*VARIABLES DEL SISTEMA*/
	$configuracion['imagenes_permitidas'] = array('image/jpeg', 'image/pjpeg', 'image/png', 'image/gif');
	$conexion = new PDO(SGDB.':host='.SGDB_SERVER.';dbname='.DB, USER, PASSWORD);
?>