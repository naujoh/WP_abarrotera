<?php 
	echo '<select name="id_marca">';
	echo '<option value="">Selecciona marca</option>';
	foreach ($conexion->query('SELECT * from marca where id_categoria='.$id_categoria.' order by marca asc') as $fila) {
		echo '<option value='.$fila['id_marca'].'>'.$fila['marca'].'</option>';
	}
	echo '</select>';
?>