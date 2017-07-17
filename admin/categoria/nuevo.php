<?php  
	include_once('../abarrotera.class.php');
	if(isset($_POST['enviar'])){
		$parametros['categoria']=$_POST['categoria'];
		$abarrotera->insertar('categoria',$parametros);
		$mensaje = 'Se inserto la unidad de medida';
		$color = 'success';
		if($_POST['enviar']=="Guardar y Regresar"){
			include('index.php'); die();
		}		
	}
	include('../header.php');
?>
<div class="jumbotron">
	<h1>Inserta una nueva categoria</h1>
</div>
<form action="nuevo.php" method="POST">
	<div class="form-group">
		<label>Categoria</label>
		<input class="col-md-6 form-control" type="text" name="categoria">
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