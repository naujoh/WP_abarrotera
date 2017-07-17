<?php 
	include('../abarrotera.class.php');
	include('../header.php');
	echo '<div class="container">';	
	$datos = $abarrotera->consultar('SELECT * from producto p join marca m on p.id_marca = m.id_marca');
	echo '<br/>';
	echo '<a href="nuevo.php" class="btn btn-success" role="button">Nuevo</a>';
	echo '<br/> <br/>';
	echo '<table class="table">';
		echo '<tr>';
		echo '<th>Producto</th>';
		echo '<th>Marca</th>';
		echo '<th></th>';
		echo '<th></th>';
		echo '<th></th>';
		echo '</tr>';
		foreach ($datos as $key => $value) {
			echo '<tr>';
			echo '<td>'.$value['producto'].'</td>';
			// echo '<td>'.$value['apaterno'].'</td>';
			// echo '<td>'.$value['amaterno'].'</td>';
			echo '<td>'.$value['marca'].'</td>';
			echo '<td><a href="../presentacion/index.php?id_producto='.$value['id_producto'].'" class="btn btn-success" role="button">Ver presentacions</a></td>';			
			echo '<td><a href="editar.php?id_producto='.$value['id_producto'].'" class="btn btn-primary" role="button">Editar</a></td>';
			echo '<td><a href="eliminar.php?id_producto='.$value['id_producto'].'" class="btn btn-danger" role="button">Eliminar</a></td>';
			echo '</tr>';
		}
	echo '</table>';
	echo '</div>';
	include('../footer.php');

?>