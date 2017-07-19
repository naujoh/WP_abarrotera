<?php  
	include_once('../abarrotera.class.php');
	$rol[0] = 'Administrador';
	$abarrotera->guardia($rol);
	if(isset($_REQUEST['id_sucursal'])){
		$parametros['id_sucursal']=$_REQUEST['id_sucursal'];
	}else{
		header('Location: /abarrotera/admin/sucursal/index.php');
	}
	$datos = $abarrotera->consultar('SELECT * FROM sucursal WHERE id_sucursal=:id_sucursal', $parametros);
	if(isset($_POST['enviar'])){
		$param['sucursal']=$_POST['sucursal'];
		$llaves['id_sucursal']=$_POST['id_sucursal'];
		$abarrotera->actualizar('sucursal',$param, $llaves);
		$mensaje = 'Se modifico la sucursal';
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
		<input class="col-md-6 form-contsucursal" type="text" name="sucursal" value="<?php echo $datos[0]['sucursal']; ?>">
		<input type="hidden" name="id_sucursal" value="<?php echo $parametros['id_sucursal']; ?>">
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