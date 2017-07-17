<?php 
	include_once('configuracion.php'); 
	include('header.php');
?>
			<div id="content">
				<section class="contenido_general" id="filtro_productos">
					<div>
						<h2>¡Ofertones!</h2>
						<div class="slider-container">
							<?php
								include('componentes/promocion.php');
							?>
						</div>
						<form method="GET" action="productos.php">
							<select name="categoria">
								<option value="">Selecciona</option>
								<option value="blancos">Blancos</option>
								<option value="abarrotes">Abarrotes</option>
								<option value="carnes">Carnes frias</option>
								<option value="dulces">Dulces</option>
							</select>
							<input type="submit" name="enviar" value="Mostrar">
						</form>
					</div>
					<div id="productos">
						<table>
							<tr>
								<td>
									<div class="producto-img oferton">
										<img src="image/productos/aceite_1.png" alt="producto"/><br/>
									</div>
									<div class="producto-info">
										<h3>Aceite Girasol</h3>
										<span class="gramage">
											500 ml
										</span><br/>
										<span class="p_real">
											$32
										</span>
										<span class="descuento">
											-16%
										</span><br/>
										<span class="p_descuento">
											$24.00 c/u
										</span><br/>
										<span class="p_mayoreo">
											$20.00 mayoreo
										</span>
									</div>
								</td>
								<td>
									<div class="producto-img oferton">
										<img src="image/productos/aceite_4.jpg" alt="producto"/><br/>
									</div>
									<div class="producto-info">
										<h3>Aceite Girasol</h3>
										<span class="gramage">
											500 ml
										</span><br/>
										<span class="p_real">
											$32
										</span>
										<span class="descuento">
											-16%
										</span><br/>
										<span class="p_descuento">
											$24.00 c/u
										</span><br/>
										<span class="p_mayoreo">
											$20.00 mayoreo
										</span>
									</div>
								</td>
								<td>
									<div class="producto-img oferton">
										<img src="image/productos/azucar_1.png" alt="producto"/><br/>
									</div>
									<div class="producto-info">
										<h3>Aceite Girasol</h3>
										<span class="gramage">
											500 ml
										</span><br/>
										<span class="p_real">
											$32
										</span>
										<span class="descuento">
											-16%
										</span><br/>
										<span class="p_descuento">
											$24.00 c/u
										</span><br/>
										<span class="p_mayoreo">
											$20.00 mayoreo
										</span>
									</div>
								</td>
							</tr> 
							<tr>
								<td>
									<div class="producto-img oferton">
										<img src="image/productos/catsup_2.jpg" alt="producto"/><br/>
									</div>
									<div class="producto-info">
										<h3>Aceite Girasol</h3>
										<span class="gramage">
											500 ml
										</span><br/>
										<span class="p_real">
											$32
										</span>
										<span class="descuento">
											-16%
										</span><br/>
										<span class="p_descuento">
											$24.00 c/u
										</span><br/>
										<span class="p_mayoreo">
											$20.00 mayoreo
										</span>
									</div>							
								</td>
								<td>
									<div class="producto-img oferton">
										<img src="image/productos/azucar_3.png" alt="producto"/><br/>
									</div>
									<div class="producto-info">
										<h3>Aceite Girasol</h3>
										<span class="gramage">
											500 ml
										</span><br/>
										<span class="p_real">
											$32
										</span>
										<span class="descuento">
											-16%
										</span><br/>
										<span class="p_descuento">
											$24.00 c/u
										</span><br/>
										<span class="p_mayoreo">
											$20.00 mayoreo
										</span>
									</div>								
								</td>
								<td>
									<div class="producto-img oferton">
										<img src="image/productos/catsup_1.jpeg" alt="producto"/><br/>
									</div>
									<div class="producto-info">
										<h3>Aceite Girasol</h3>
										<span class="gramage">
											500 ml
										</span><br/>
										<span class="p_real">
											$32
										</span>
										<span class="descuento">
											-16%
										</span><br/>
										<span class="p_descuento">
											$24.00 c/u
										</span><br/>
										<span class="p_mayoreo">
											$20.00 mayoreo
										</span>
									</div>								
								</td>
							</tr>
						</table>
					</div>
				</section>
<?php 
	include('footer.php');
?>