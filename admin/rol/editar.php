<?php  
	include_once('../abarrotera.class.php');
	$rol[0] = 'Administrador';
	$abarrotera->guardia($rol);
	if(isset($_REQUEST['id_rol'])){
		$parametros['id_rol']=$_REQUEST['id_rol'];
	}else{
		header('Location: /abarrotera/admin/rol/index.php');
	}
	$datos = $abarrotera->consultar('SELECT * FROM rol WHERE id_rol=:id_rol', $parametros);
	if(isset($_POST['enviar'])){
		$param['rol']=$_POST['rol'];
		$llaves['id_rol']=$_POST['id_rol'];
		$abarrotera->actualizar('rol',$param, $llaves);
		$mensaje = 'Se modifico el rol;';
		$color = 'success';
		if($_POST['enviar']=="Guardar y Regresar"){
			include('index.php'); die();
		}		
	}
	include('../header.php');
?>
<div class="jumbotron">
	<h1>Editar unidad medida</h1>
</div>
<form action="editar.php" method="POST">
	<div class="form-group">
		<label>Unidad medida</label>
		<input class="col-md-6 form-control" type="text" name="rol" value="<?php echo $datos[0]['rol']; ?>">
		<input type="hidden" name="id_rol" value="<?php echo $parametros['id_rol']; ?>">
	</div>	
	<br/>
	<div class="form-group">
		<input class="btn btn-primary" type="submit" name="enviar" value="Guardar">
		<input class="btn btn-info" type="submit" name="enviar" value="Guardar y Regresar">

	</div>
	<div class="form-group">
	</div>	
</form>
<?php include('../footer.php'); ?>