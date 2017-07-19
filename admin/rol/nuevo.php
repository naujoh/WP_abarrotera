<?php  
	include_once('../abarrotera.class.php');
	$rol[0] = 'Administrador';
	$abarrotera->guardia($rol);
	if(isset($_POST['enviar'])){
		$parametros['rol']=$_POST['rol'];
		$abarrotera->insertar('rol',$parametros);
		$mensaje = 'Se inserto le unidad de medida';
		$color = 'success';
		if($_POST['enviar']=="Guardar y Regresar"){
			include('index.php'); die();
		}		
	}
	include('../header.php');
?>
<div class="jumbotron">
	<h1>Inserta una nueva unidad medida</h1>
</div>
<form action="nuevo.php" method="POST">
	<div class="form-group">
		<label>Unidad medida</label>
		<input class="col-md-6 form-control" type="text" name="rol">
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