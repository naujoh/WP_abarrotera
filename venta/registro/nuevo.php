<?php  
	include_once('../abarrotera.class.php');
	if(isset($_POST['enviar'])){
		if(isset($_FILES['foto']['name'])){
			$origen = $_FILES['foto']['tmp_name'];
			$destino = '../../image/user_image/'.$_FILES['foto']['name'];
			if($abarrotera->validarImagen($_FILES['foto'])){
				if(move_uploaded_file($origen, $destino)){
					$parametros['correo']=$_POST['correo'];
					$parametros['contrasena']=md5($_POST['contrasena']);
					$abarrotera->insertar('usuario', $parametros);
					$datos = $abarrotera->consultar('SELECT id_usuario FROM usuario WHERE correo=:correo AND contrasena=:contrasena', $parametros);
					$parametros = array();
					$parametros['id_usuario']=$datos[0]['id_usuario'];
					$parametros['nombre']=$_POST['nombre'];
					$parametros['apaterno']=$_POST['apaterno'];
					$parametros['amaterno']=$_POST['amaterno'];
					$parametros['domicilio']=$_POST['domicilio'];
					$parametros['foto']=$_FILES['foto']['name'];
					$abarrotera->insertar('cliente',$parametros);
					$parametros = array();
					$parametros['id_usuario'] = $datos[0]['id_usuario'];
					$parametros['id_rol'] = 1;
					$abarrotera->insertar('usuario_rol', $parametros);
					$mensaje = 'Se inserto el cliente';
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
		<h1>Inserta un nuevo cliente</h1>
	</div>
	<form action="nuevo.php" method="POST" enctype="multipart/form-data">
		<div class="form-group">
			<label>Nombre</label>
			<input class="form-control" type="text" name="nombre">
		</div>		
		<div class="form-group">
			<label>Apellido paterno</label>
			<input class="form-control" type="text" name="apaterno">
		</div>		
		<div class="form-group">
			<label>Apellido materno</label>
			<input class="form-control" type="text" name="amaterno">
		</div>		
		<div class="form-group">
			<label>Domicilio</label>
			<input class="form-control" type="text" name="domicilio">
		</div>		
		<div class="form-group">
			<label>Foto</label>
			<input class="form-control" type="file" name="foto">
		</div>		
		<div class="form-group">
			<label>Correo</label>
			<input class="form-control" type="email" name="correo" required>
		</div>		
		<div class="form-group">
			<label>Contraseña</label>
			<input class="form-control" type="password" name="contrasena" required>
		</div>								
		<div class="form-group">
			<input class="btn btn-primary" type="submit" name="enviar" value="Guardar">
			<input class="btn btn-info" type="submit" name="enviar" value="Guardar y Regresar">
		</div>
	</form>
</div>
<?php include('../footer.php'); ?>