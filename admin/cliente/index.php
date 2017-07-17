<?php 
	include('../abarrotera.class.php');
	include('../header.php');
	echo '<div class="container">';	
	$datos = $abarrotera->consultar('SELECT id_cliente, correo, foto, u.id_usuario, concat(nombre," ",apaterno," ",amaterno) as nombre from cliente c join usuario u on c.id_usuario = u.id_usuario order by nombre asc');
	echo '<br/>';
	echo '<a href="nuevo.php" class="btn btn-success" role="button">Nuevo</a>';
	echo '<br/> <br/>';
	echo '<table class="table">';
		echo '<tr>';
		echo '<th>Nombre</th>';
		echo '<th>Apellido paterno</th>';
		echo '<th>Apellido materno</th>';
		echo '<th>Domicilio</th>';
		echo '<th>Foto</th>';
		echo '<th></th>';
		echo '<th></th>';
		echo '</tr>';
		foreach ($datos as $key => $value) {
			echo '<tr>';
			echo '<td>'.$value['nombre'].'</td>';
			// echo '<td>'.$value['apaterno'].'</td>';
			// echo '<td>'.$value['amaterno'].'</td>';
			echo '<td>'.$value['correo'].'</td>';
			echo '<td>'.$value['foto'].'</td>';
			echo '<td><a href="editar.php?id_cliente='.$value['id_cliente'].'" class="btn btn-primary" role="button">Editar</a></td>';
			echo '<td><a href="eliminar.php?id_cliente='.$value['id_cliente'].'" class="btn btn-danger" role="button">Eliminar</a></td>';
			echo '</tr>';
		}
	echo '</table>';
	echo '</div>';
	include('../footer.php');

?>