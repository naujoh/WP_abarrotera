<?php
include_once('../abarrotera.class.php');
$rol[0] = 'Cliente';
$abarrotera->guardia($rol);
$parametros['id_usuario']=$_SESSION['usuario']['id_usuario'];
$datos = $abarrotera->consultar('SELECT id_cliente, correo, foto, u.id_usuario, concat(nombre," ",apaterno," ",amaterno) as nombre FROM cliente c join usuario u ON c.id_usuario=u.id_usuario WHERE u.id_usuario=:id_usuario', $parametros);
include('../header.php');

?>
<div class="container">
	<h1>Hola bienvenido</h1>
	<p>
		Bienvenido a la tienda en linea de la Abarrotera galaxia, pedidos realizados antes de las 4 p.m se entregan mismo dia
	</p>
	<?php
		echo '<h3>'.$datos[0]['nombre'].'</h3>';
		echo '<img src="../../image/user_image/'.$datos[0]['foto'].'" width="200" height="200">';
	?>
</div>
<?php include('../footer.php'); ?>