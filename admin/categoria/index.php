<?php 
	include('../abarrotera.class.php');
	include('../header.php');
	echo '<div class="container">';	
	$datos = $abarrotera->consultar('SELECT * from categoria');
	echo '<br/>';
	echo '<a href="nuevo.php" class="btn btn-success" role="button">Nuevo</a>';
	echo '<br/> <br/>';
	echo '<table class="table">';
		echo '<tr>';
		echo '<th>Categoria</th>';
		echo '<th></th>';
		echo '<th></th>';
		echo '</tr>';
		foreach ($datos as $key => $value) {
			echo '<tr>';
			echo '<td>';
			echo $value['categoria'];
			echo '</td>';
			echo '<td><a href="editar.php?id_categoria='.$value['id_categoria'].'" class="btn btn-primary" role="button">Editar</a></td>';
			echo '<td><a href="eliminar.php?id_categoria='.$value['id_categoria'].'" class="btn btn-danger" role="button">Eliminar</a></td>';
			echo '</tr>';
		}
	echo '</table>';
	echo '</div>';
	include('../footer.php');

?>