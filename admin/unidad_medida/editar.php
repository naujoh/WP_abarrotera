<?php  
	include_once('../abarrotera.class.php');
	if(isset($_REQUEST['id_unidad_medida'])){
		$parametros['id_unidad_medida']=$_REQUEST['id_unidad_medida'];
	}else{
		header('Location: /abarrotera/admin/unidad_medida/index.php');
	}
	$datos = $abarrotera->consultar('SELECT * FROM unidad_medida WHERE id_unidad_medida=:id_unidad_medida', $parametros);
	if(isset($_POST['enviar'])){
		$param['unidad_medida']=$_POST['unidad_medida'];
		$llaves['id_unidad_medida']=$_POST['id_unidad_medida'];
		$abarrotera->actualizar('unidad_medida',$param, $llaves);
		$mensaje = 'Se modifico la unidad de medida;';
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
		<input class="col-md-6 form-control" type="text" name="unidad_medida" value="<?php echo $datos[0]['unidad_medida']; ?>">
		<input type="hidden" name="id_unidad_medida" value="<?php echo $parametros['id_unidad_medida']; ?>">
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