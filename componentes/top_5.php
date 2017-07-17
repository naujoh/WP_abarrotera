<?php 
		echo '<ul>';
		foreach ($conexion->query('SELECT p.id_producto, pr.sku, p.producto, pr.presentacion, pr.imagen, pr.preciou, sum(cd.cantidad) FROM 
	producto p inner join presentacion pr on p.id_producto=pr.id_producto
    inner join carrito_detalle cd on cd.sku = pr.sku group by 1, 2, 3 order by sum(cd.cantidad) desc limit 5;') as $fila) 
		{
			echo
			'
				<li>
					<img src="image/productos/'.$fila['imagen'].'" width="52" height="52" alt="producto_nuevo"/>
					<div class="prod_desc">
						<h4>'.$fila['producto'].'</h4>
						<p>$'.$fila['preciou'].' c/u</p>
					</div>
				</li>				
			';
		}
		echo '</ul>'
?>