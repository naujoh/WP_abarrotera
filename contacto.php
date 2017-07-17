<?php 
	include_once('configuracion.php'); 
	include('header.php');
?>
			<div id="content">
				<section class="contenido_general">
					<div id="formulario_contacto">
						<h2>Contacto</h2>
						<?php 
							if(isset($_POST['enviar'])){
								$nombre = $_POST['nombre'];
								$email = $_POST['email'];
								$nocliente = $_POST['no_cliente'];
								$tipo_comentario = $_POST['tipo_comentario'];
								$comentario = $_POST['comentario'];

								$sql = 'SELECT * from cliente where id_cliente='.$nocliente; 
								$id_cliente = 'null';
								foreach ($conexion->query($sql) as $fila) {
									$id_cliente=$fila['id_cliente'];
								}
								$conexion->exec('INSERT into comentario (cometario, email, fecha, id_cliente, nombre, tipo_comentario)
																 values ("'.$comentario.'", "'.$email.'", now(), '.$id_cliente.', "'.$nombre.'", "'.$tipo_comentario.'")');
							}else{

						?>
						<form method="POST" action="contacto.php">
							<div class="one_half">
								<label>Nombre</label> 
								<input type="text" name="nombre" />
							</div>
							<div class="one_half_last">
								<label>Correo electrónico</label>
								<input type="email" name="email" />
							</div>
							<div class="fullwidth">
								<label>No. cliente</label>
								<input type="text" name="no_cliente">
							</div>
							<div class="one_half">
								<label>Comentario:</label>
								<select name="tipo_comentario">
									<option value="queja">Queja</option>
									<option value="sugerencia">Sugerencia</option>
									<option value="felicitacion">Felicitación</option>
								</select>
							</div>
							<div class="fullwidth">	
								<textarea name="comentario" rows="10"></textarea>
							</div>
							<div id="boton_enviar" class="one_half">
								<input type="submit" name="enviar" value="Enviar">
							</div>
						</form>
						<?php
							}
						?>
					</div>
				</section>
<?php 
	include('footer.php');
?>