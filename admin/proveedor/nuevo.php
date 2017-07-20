<?php  
	include_once('../abarrotera.class.php');
	$rol[0] = 'Administrador';
	$abarrotera->guardia($rol);
	// print_r($_FILES);
	if(isset($_POST['enviar'])){
		if(isset($_FILES['logo']['name'])){
			$origen = $_FILES['logo']['tmp_name'];
			// $destino = '/opt/lampp/htdocs/abarrotera/image/proveedor/'.$_FILES['logo']['name'];
			$destino = '../../image/proveedor/'.$_FILES['logo']['name'];
			if($abarrotera->validarImagen($_FILES['logo'])){
				if(move_uploaded_file($origen, $destino)){
					$parametros['proveedor']=$_POST['proveedor'];
					$parametros['logo']=$_FILES['logo']['name'];
					$abarrotera->insertar('proveedor',$parametros);
					$mensaje = 'Se inserto el proveedor';
					$color = 'success';
					if($_POST['enviar']=="Guardar y Regresar"){
						include('index.php'); die();
					}			
				}else{
					$mensaje="Error al subir la imagen el proveedor no se ingreso!";
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
		<h1>Inserta un nuevo proveedor</h1>
	</div>
	<form action="nuevo.php" method="POST" enctype="multipart/form-data">
		<div class="form-group">
			<label>Proveedor</label>
			<input class="col-md-6 form-control" type="text" name="proveedor">
		</div>	
		<br/>
		<div class="form-group">
			<label>Logtipo</label>
			<input class="form-control" type="file" name="logo">
		</div>		
		<div class="form-group">
			<input class="btn btn-primary" type="submit" name="enviar" value="Guardar">
			<input class="btn btn-info" type="submit" name="enviar" value="Guardar y Regresar">
		</div>
	</form>
</div>
<?php include('../footer.php'); ?>