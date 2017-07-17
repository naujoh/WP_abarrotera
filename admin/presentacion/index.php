<?php 
	include('../abarrotera.class.php');
	include('../header.php');
	echo '<div class="container">';	
	if(isset($_REQUEST['id_producto'])){
		$parametros['id_producto']=$_REQUEST['id_producto'];
	}else{
		header('Location: /abarrotera/admin/producto/index.php');
	}

	$datos = $abarrotera->consultar('SELECT * from presentacion pr join producto p on pr.id_producto=p.id_producto join unidad_medida um on um.id_unidad_medida=pr.id_unidad_medida WHERE pr.id_producto=:id_producto', $parametros);
	echo '<br/>';
	echo '<a href="nuevo.php?id_producto='.$parametros['id_producto'].'" class="btn btn-success" role="button">Nuevo</a>';
	echo '<br/> <br/>';
	echo '<table class="table">';
		echo '<tr>';
		echo '<th>SKU</th>';	
		echo '<th>Producto</th>';
		echo '<th>Presentacion</th>';
		echo '<th>Unidad de medida</th>';
		echo '<th>Precio unitario</th>';
		echo '<th>Mayoreo</th>';
		echo '<th>Precio mayoreo</th>';
		echo '<th></th>';
		echo '<th></th>';
		echo '</tr>';
		foreach ($datos as $key => $value) {
			echo '<tr>';
			echo '<td>'.$value['sku'].'</td>';
			echo '<td>'.$value['producto'].'</td>';
			echo '<td>'.$value['presentacion'].'</td>';
			echo '<td>'.$value['unidad_medida'].'</td>';
			echo '<td>'.$value['preciou'].'</td>';
			echo '<td>'.$value['cantidadm'].'</td>';
			echo '<td>'.$value['preciom'].'</td>';
			echo '<td><a href="editar.php?sku='.$value['sku'].'" class="btn btn-primary" role="button">Editar</a></td>';
			echo '<td><a href="eliminar.php?sku='.$value['sku'].'" class="btn btn-danger" role="button">Eliminar</a></td>';
			echo '</tr>';
		}
	echo '</table>';
	echo '</div>';
	include('../footer.php');

?>