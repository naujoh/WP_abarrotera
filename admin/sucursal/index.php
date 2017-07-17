<?php 
include('../abarrotera.class.php');
include('../header.php');
echo '<div class="container">';
$datos = $abarrotera->consultar('SELECT * from sucursal');
echo '<br/>';
echo '<a href="nuevo.php" class="btn btn-success" role="button">Nuevo</a>';
echo '<br/> <br/>';
echo '<table class="table">';
	echo '<tr>';
	echo '<th>Sucursal</th>';
	echo '<th></th>';
	echo '<th></th>';
	echo '</tr>';
	foreach ($datos as $key => $value) {
		echo '<tr>';
		echo '<td>';
		echo $value['sucursal'];
		echo '</td>';
		echo '<td><a href="editar.php?id_sucursal='.$value['id_sucursal'].'" class="btn btn-primary" role="button">Editar</a></td>';
		echo '<td><a href="eliminar.php?id_sucursal='.$value['id_sucursal'].'" class="btn btn-danger" role="button">Eliminar</a></td>';
		echo '</tr>';
	}
echo '</table>';
echo '</div>';
include('../footer.php');
?>