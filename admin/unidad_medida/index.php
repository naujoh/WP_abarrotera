<?php 
	include_once('../abarrotera.class.php');
	$rol[0] = 'Administrador';
	$abarrotera->guardia($rol);
	include('../header.php');
	echo '<div class="container">';	
	$datos = $abarrotera->consultar('SELECT * from unidad_medida');
	echo '<br/>';
	echo '<a href="nuevo.php" class="btn btn-success" role="button">Nuevo</a>';
	echo '<br/> <br/>';
	echo '<table class="table">';
		echo '<tr>';
		echo '<th>Unidad de medida</th>';
		echo '<th></th>';
		echo '<th></th>';
		echo '</tr>';
		foreach ($datos as $key => $value) {
			echo '<tr>';
			echo '<td>';
			echo $value['unidad_medida'];
			echo '</td>';
			echo '<td><a href="editar.php?id_unidad_medida='.$value['id_unidad_medida'].'" class="btn btn-primary" role="button">Editar</a></td>';
			echo '<td><a href="eliminar.php?id_unidad_medida='.$value['id_unidad_medida'].'" class="btn btn-danger" role="button">Eliminar</a></td>';
			echo '</tr>';
		}
	echo '</table>';
	echo '</div>';
	include('../footer.php');

?>