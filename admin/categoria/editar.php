<?php  
	include_once('../abarrotera.class.php');
	if(isset($_REQUEST['id_categoria'])){
		$parametros['id_categoria']=$_REQUEST['id_categoria'];
	}else{
		header('Location: /abarrotera/admin/categoria/index.php');
	}
	$datos = $abarrotera->consultar('SELECT * FROM categoria WHERE id_categoria=:id_categoria', $parametros);
	if(isset($_POST['enviar'])){
		$param['categoria']=$_POST['categoria'];
		$llaves['id_categoria']=$_POST['id_categoria'];
		$abarrotera->actualizar('categoria',$param, $llaves);
		$mensaje = 'Se modifico la categoria';
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
		<input class="col-md-6 form-contcategoria" type="text" name="categoria" value="<?php echo $datos[0]['categoria']; ?>">
		<input type="hidden" name="id_categoria" value="<?php echo $parametros['id_categoria']; ?>">
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