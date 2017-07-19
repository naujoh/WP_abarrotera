<?php 
include_once('../abarrotera.class.php');
if(isset($_POST['login'])){
	$parametros['correo'] = $_POST['correo'];
	$parametros['contrasena'] = $_POST['contrasena'];
	$parametros['contrasena']=md5($parametros['contrasena']);
	if(filter_var($parametros['correo'], FILTER_VALIDATE_EMAIL)){
		$datos = $abarrotera->consultar('SELECT * FROM usuario WHERE correo=:correo AND contrasena=:contrasena', $parametros);
		if(count($datos)>0){
			$parametros = array();
			$parametros['id_usuario'] = $datos[0]['id_usuario']; 
			$datos_roles = $abarrotera->consultar('SELECT rol FROM rol r JOIN usuario_rol ur ON r.id_rol=ur.id_rol WHERE id_usuario=:id_usuario', $parametros);
			$_SESSION['validado'] = true;
			$_SESSION['usuario'] = $datos[0];
			$i=0;
			foreach ($datos_roles as $key => $value) {
				$_SESSION['roles'][$i] = $datos_roles[$i]['rol'];
				$i++; 
			}
			header('Location: ../cliente/index.php');
		 	die();
		}else{
			$mensaje = 'Usuario o contrasena incorrectos';
			$color = 'danger';
		}		
	}else{
		$mensaje = 'Correo electronico invalido';
		$color = 'danger';
	}
}
if(isset($_GET['error'])){
	$color = 'danger';
	switch ($_GET['error']){
		case 2:
			$mensaje = 'La sesion no es valida.';
			break;
		case 3:
			$mensaje = 'Usted no tiene privilegios para acceder a esta pagina.';
			break;  
		default:
		case 1:
			$mensaje = 'Necesita iniciar sesion para ver este contenido.';
	}
}

include_once('../header.php'); 
?>
<div class="container">
	<form action="index.php" method="POST">
		<div class="form-group">
			<label>Correo</label>
			<input class="form-control" type="email" name="correo">
		</div>
		<div class="form-group">
			<label>Contrasena</label>
			<input class="form-control" type="password" name="contrasena">
		</div>	
		<input class="btn btn-primary" type="submit" name="login" value="Login">
	</form>
</div>
<?php include_once('../footer.php'); ?>