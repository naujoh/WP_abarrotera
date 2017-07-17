<?php 
	include('../abarrotera.class.php');
	include('../header.php');
	echo '<div class="container">';	
	$datos = $abarrotera->consultar('SELECT * from marca m join proveedor p on m.id_proveedor=p.id_proveedor join categoria c
		 on c.id_categoria=m.id_categoria');
	echo '<br/>';
	echo '<a href="nuevo.php" class="btn btn-success" role="button">Nuevo</a>';
	echo '<br/> <br/>';
	echo '<table class="table">';
		echo '<tr>';
		echo '<th>Marca</th>';
		echo '<th>Proveedor</th>';
		echo '<th>Categoria</th>';
		echo '<th></th>';
		echo '<th></th>';
		echo '</tr>';
		foreach ($datos as $key => $value) {
			echo '<tr>';
			echo '<td>'.$value['marca'].'</td>';
			echo '<td>'.$value['proveedor'].'</td>';
			echo '<td>'.$value['categoria'].'</td>';
			echo '<td><a href="editar.php?id_marca='.$value['id_marca'].'" class="btn btn-primary" role="button">Editar</a></td>';
			echo '<td><a href="eliminar.php?id_marca='.$value['id_marca'].'" class="btn btn-danger" role="button">Eliminar</a></td>';
			echo '</tr>';
		}
	echo '</table>';
	echo '</div>';
	include('../footer.php');

?>