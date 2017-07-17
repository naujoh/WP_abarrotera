<?php  
	include_once('../abarrotera.class.php');
	if(isset($_POST['enviar'])){
		if(isset($_FILES['imagen']['name'])){
			$origen = $_FILES['imagen']['tmp_name'];
			$destino = '../../image/promocion/'.$_FILES['imagen']['name'];
			echo 'ori > '.$origen.' | des > '. $destino;
			if($abarrotera->validarImagen($_FILES['imagen'])){
				if(move_uploaded_file($origen, $destino)){
					$parametros['fechai']=$_POST['fechai'];
					$parametros['fechaf']=$_POST['fechaf'];
					$parametros['imagen']=$_FILES['imagen']['name'];
					$abarrotera->insertar('promocion',$parametros);
					$mensaje = 'Se inserto la promocion';
					$color = 'success';
					if($_POST['enviar']=="Guardar y Regresar"){
						include('index.php'); die();
					}			
				}else{
					$mensaje="Error al subir la imagen la promocion no se ingreso!";
					$color="danger";
				}								
			}else{
				$mensaje="El archivo que intento subir no esta permitido, solo se permiten archivos con extension jpg, png y gif";
				$color="danger";				
			}
		}
	}
	include_once('../header.php');
?>
<div class="container">
	<div class="jumbotron">
		<h1>Inserta una nueva promocion</h1>
	</div>
	<form class="row" action="nuevo.php" method="POST" enctype="multipart/form-data">
		<div class="form-group col-md-6">
			<label>Fecha de inicio</label>
			<input class="form-control" type="date" name="fechai">
		</div>	
		<div class="form-group col-md-6">
			<label>Fecha de termino</label>
			<input class="form-control" type="date" name="fechaf">
		</div>	
		<br/>
		<div class="form-group col-md-12">
			<label>Imagen de la promocion</label>
			<input class="form-control" type="file" name="imagen" required>
		</div>		
		<div class="form-group col-md-12">
			<input class="btn btn-primary" type="submit" name="enviar" value="Guardar">
			<input class="btn btn-info" type="submit" name="enviar" value="Guardar y Regresar">
		</div>
	</form>
</div>
<?php include('../footer.php'); ?>