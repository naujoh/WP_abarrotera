<?php 
	include_once('configuracion.php'); 
	include_once('header.php');
?>
			<div id="content">
				<section class="contenido_general">
					<div>
						<h2>Nuestros proveedores</h2>
						<div id="proveedores">
							<?php 
								include_once('configuracion.php');
							 	foreach($conexion->query('SELECT * from proveedor') as $fila) {
							 		echo '<img src="image/proveedor/'.$fila['logo'].'"width=150 height=auto>';
								}
							?>
						</div>
					</div>
				</section>
<?php 
	include('footer.php');
?>