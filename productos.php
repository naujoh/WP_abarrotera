<?php 
	include_once('configuracion.php'); 
	include('header.php');
?>
			<div id="content">
				<section class="contenido_general" id="filtro_productos">
					<div>
						<h2>Productos</h2>
						<form>
							<?php
								if(isset($_GET['id_categoria'])){
									$id_categoria = $_GET['id_categoria'];
									include('componentes/marca.php');
									echo '<input type="submit" name="ver" value="Mostrar">';
								}
							?>
						</form>						
						<form method="GET" action="productos.php">
							<?php
								include('componentes/categoria.php');
							?>
							<input type="submit" name="ver" value="Mostrar">
						</form>
					</div>
					<div id="productos">
						<table>	
							<tr>				
							<?php
								$where=""; 
								if(isset($_GET['id_categoria'])){
									$where='where c.id_categoria='.$_GET['id_categoria'];
								}else{
									if(isset($_GET['id_marca'])){
										$where='where m.id_marca='.$_GET['id_marca'];
									}
								}
								$c=0;
							 	foreach($conexion->query('SELECT * from vw_productos '.$where) as
							 	 $fila) 
							 	{
						 			$fila['precdesc'] = round($fila['precdesc'], 2);
						 			$fila['precmdesc'] = round($fila['precmdesc'], 2);
							 		if($fila['descuento']>0){
								 		echo '<td>';
						 					echo 
						 					'
												<div class="producto-img oferton">
													<img src="image/productos/'.$fila["imagen"].'" alt="producto"/><br/>
												</div>
												<div class="producto-info">
													<h3>'.$fila["producto"].'</h3>
													<span class="gramage">
														500 '.$fila["unidad_medida"].' | '.$fila["presentacion"].'
													</span><br/>
													<span class="p_real">
														'.$fila["preciou"].'
													</span>
													<span class="descuento">
														-'.$fila['descuento'].'%
													</span><br/>
													<span class="p_descuento">
														$'.$fila["precdesc"].' c/u
													</span><br/>
													<span class="p_mayoreo">
														'.$fila["cantidadm"].' mayoreo ($'.$fila["precmdesc"].')
													</span>
												</div>
						 					';
					 					echo '</td>';
				 					}else{
								 		echo '<td>';
						 					echo 
						 					'
												<div class="producto-img">
													<img src="image/productos/'.$fila["imagen"].'" alt="producto"/><br/>
												</div>
												<div class="producto-info">
													<h3>'.$fila["producto"].'</h3></br>
													<span class="gramage">
														500 '.$fila["unidad_medida"].' | '.$fila["presentacion"].'
													</span><br/>
													<span class="p_descuento">
														$'.$fila["preciou"].' c/u
													</span><br/>
													<span class="p_mayoreo">
														'.$fila["cantidadm"].' mayoreo ($'.$fila["preciom"].')
													</span>
												</div>
						 					';
					 					echo '</td>';				 						
				 					}
						 			$c++;
						 			if($c%3==0){
					 					echo '</tr>';
					 					echo '<tr>';
						 			}
					 			}
							?>	
							</tr>
						</table>				
				</section>
<?php 
	include('footer.php');
?>