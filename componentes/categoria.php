<?php 
	// include_once('configuracion.php');
	echo '<select name="id_categoria">';
	echo '<option value="">Selecciona categoria</option>';
	foreach ($conexion->query('SELECT * from categoria order by categoria asc') as $fila) {
		echo '<option value='.$fila['id_categoria'].'>'.$fila['categoria'].'</option>';
	}
	echo '</select>';
?>