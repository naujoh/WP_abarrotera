<?php
include_once('../abarrotera.class.php');
$rol[0] = 'Administrador';
$abarrotera->guardia($rol);
$marcas = $abarrotera->dropdownList('SELECT id_marca as id, marca as opcion FROM marca order by marca asc', 'id_marca');

if(isset($_POST['enviar'])){
		$parametros['producto']=$_POST['producto'];
		$parametros['id_marca']=$_POST['id_marca'];
		$abarrotera->insertar('producto',$parametros);
		$mensaje = 'Se inserto el producto';
		$color = 'success';
		if($_POST['enviar']=="Guardar y Regresar"){
			include('index.php'); die();
		}		
	}
	include('../header.php');
?>
<div class="jumbotron">
	<h1>Inserta un nuevo producto</h1>
</div>
<form action="nuevo.php" method="POST">
	<div class="form-group">
		<label>Producto</label>
		<input class="col-md-6 form-control" type="text" name="producto">
	</div>
	<div class="form-group">
		<label>Marca</label>
		<?php echo $marcas; ?>
	</div>
	<br/>
	<div class="form-group">
		<input class="btn btn-primary" type="submit" name="enviar" value="Guardar">
		<input class="btn btn-info" type="submit" name="enviar" value="Guardar y Regresar">

	</div>
	<div class="form-group">
	</div>	
</form>
