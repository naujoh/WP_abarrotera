<?php
include_once('../abarrotera.class.php');
$rol[0] = 'Administrador';
$abarrotera->guardia($rol);	
$proveedores = $abarrotera->dropdownList('SELECT id_proveedor as id, proveedor as opcion FROM proveedor order by proveedor asc', 'id_proveedor');

$categorias = $abarrotera->dropdownList('SELECT id_categoria as id, categoria as opcion FROM categoria order by categoria asc', 'id_categoria');

if(isset($_POST['enviar'])){
		$parametros['marca']=$_POST['marca'];
		$parametros['id_proveedor']=$_POST['id_proveedor'];
		$parametros['id_categoria']=$_POST['id_categoria'];
		$abarrotera->insertar('marca',$parametros);
		$mensaje = 'Se inserto la marca';
		$color = 'success';
		if($_POST['enviar']=="Guardar y Regresar"){
			include('index.php'); die();
		}		
	}
	include('../header.php');
?>
<div class="jumbotron">
	<h1>Inserta una nueva Marca</h1>
</div>
<form action="nuevo.php" method="POST">
	<div class="form-group">
		<label>Marca</label>
		<input class="col-md-6 form-control" type="text" name="marca">
	</div>
	<div class="form-group">
		<label>Proveedor</label>
		<?php echo $proveedores; ?>
	</div>
	<div class="form-group">
		<label>Categoria</label>
		<?php echo $categorias; ?>
	</div>			
	<br/>
	<div class="form-group">
		<input class="btn btn-primary" type="submit" name="enviar" value="Guardar">
		<input class="btn btn-info" type="submit" name="enviar" value="Guardar y Regresar">

	</div>
	<div class="form-group">
	</div>	
</form>
