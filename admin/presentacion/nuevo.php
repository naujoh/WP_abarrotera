<?php
include_once('../abarrotera.class.php');
$rol[0] = 'Administrador';
$abarrotera->guardia($rol);	
if(isset($_REQUEST['id_producto'])){
	$parametros['id_producto']=$_REQUEST['id_producto'];
}else{
	header('Location: /abarrotera/admin/producto/index.php');
}
$productos = $abarrotera->dropdownList('SELECT id_producto as id, producto as opcion FROM producto order by producto asc', 'id_producto', $parametros['id_producto']);

$unidades_medida = $abarrotera->dropdownList('SELECT id_unidad_medida as id, unidad_medida as opcion FROM unidad_medida order by unidad_medida asc', 'id_unidad_medida');

if(isset($_POST['enviar'])){
		if(isset($_FILES['imagen']['name'])){
			$origen = $_FILES['imagen']['tmp_name'];
			$destino = '../../image/productos/'.$_FILES['imagen']['name'];
			if($abarrotera->validarImagen($_FILES['imagen'])){
				if(move_uploaded_file($origen, $destino)){
					$parametros['sku']=$_POST['sku'];
					$parametros['presentacion']=$_POST['presentacion'];
					$parametros['id_producto']=$_POST['id_producto'];
					$parametros['preciou']=$_POST['preciou'];
					$parametros['cantidadm']=$_POST['cantidadm'];
					$parametros['preciom']=$_POST['preciom'];
					$parametros['id_unidad_medida']=$_POST['id_unidad_medida'];
					$parametros['imagen']=$_FILES['imagen']['name'];
					$abarrotera->insertar('presentacion',$parametros);
					$mensaje = 'Se inserto la presentacion';
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
	include('../header.php');
?>
<div class="jumbotron">
	<h1>Inserta una nueva presentacion</h1>
</div>
<form action="nuevo.php" method="POST" enctype="multipart/form-data">
	<div class="form-group">
		<label>SKU</label>
		<input class="col-md-6 form-control" type="text" name="sku">
	</div>
	<div class="form-group">
		<label>Presentacion</label>
		<input class="col-md-6 form-control" type="text" name="presentacion">
	</div>
	<div class="form-group">
		<label>Precio unitario</label>
		<input class="col-md-6 form-control" type="text" name="preciou">
	</div>	
	<div class="form-group">
		<label>Cantidad mayoreo</label>
		<input class="col-md-6 form-control" type="text" name="cantidadm">
	</div>
	<div class="form-group">
		<label>Precio mayoreo</label>
		<input class="col-md-6 form-control" type="text" name="preciom">
	</div>			
	<input type="hidden" name="id_producto" value="<?php echo $parametros['id_producto']; ?>">
	<div class="form-group">
		<label>Unidad de medida</label>
		<?php echo $unidades_medida; ?>
	</div>
	<div class="form-group">
		<label>Imagen</label>
		<input class="form-control" type="file" name="imagen">
	</div>						
	<br/>
	<div class="form-group">
		<input class="btn btn-primary" type="submit" name="enviar" value="Guardar">
		<input class="btn btn-info" type="submit" name="enviar" value="Guardar y Regresar">
	</div>
	<div class="form-group">
	</div>	
</form>
