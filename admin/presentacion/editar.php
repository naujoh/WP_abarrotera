<?php
include_once('../abarrotera.class.php');
if(isset($_REQUEST['sku'])){
	$parametros['sku']=$_REQUEST['sku'];
}else{
	header('Location: /abarrotera/admin/producto/index.php');
}
// $productos = $abarrotera->dropdownList('SELECT id_producto as id, producto as opcion FROM producto order by producto asc', 'id_producto', $parametros['id_producto']);

$datos = $abarrotera->consultar("SELECT * FROM presentacion WHERE sku=:sku", $parametros);
// print_r($datos); die();
$unidades_medida = $abarrotera->dropdownList('SELECT id_unidad_medida as id, unidad_medida as opcion FROM unidad_medida order by unidad_medida asc', 'id_unidad_medida', $datos[0]['id_unidad_medida']);

if(isset($_POST['enviar'])){
	if(empty($_FILES['imagen']['name'])){
		$parametros['sku']=$_POST['sku_nuevo'];
		$parametros['presentacion']=$_POST['presentacion'];
		$parametros['preciou']=$_POST['preciou'];
		$parametros['cantidadm']=$_POST['cantidadm'];
		$parametros['preciom']=$_POST['preciom'];
		$parametros['id_unidad_medida']=$_POST['id_unidad_medida'];
		// $parametros['imagen']=$_FILES['imagen']['name'];
		$llaves['sku'] = $_POST['sku'];
		$abarrotera->actualizar('presentacion',$parametros, $llaves);
		$mensaje = 'Se actualizo la presentacion';
		$color = 'success';
		if($_POST['enviar']=="Guardar y Regresar"){
			$_GET['id_producto'] = $datos[0]['id_producto'];	
			header('Location: /abarrotera/admin/presentacion/index.php?id_producto='.$datos[0]['id_producto']);		
		}		
	}else{
			echo $parametros['sku']=$_POST['sku_nuevo'];
			$origen = $_FILES['imagen']['tmp_name'];
			$extension = explode('.', $_FILES['imagen']['name']);
			$destino = '../../image/productos/'.$parametros['sku'].'.'.$extension[count($extension)-1];
			if($abarrotera->validarImagen($_FILES['imagen'])){
				if(move_uploaded_file($origen, $destino)){
					$parametros['presentacion']=$_POST['presentacion'];
					$parametros['preciou']=$_POST['preciou'];
					$parametros['cantidadm']=$_POST['cantidadm'];
					$parametros['preciom']=$_POST['preciom'];
					$parametros['id_unidad_medida']=$_POST['id_unidad_medida'];
					$parametros['imagen']=$parametros['sku'].'.'.$extension[count($extension)-1];
					$llaves['sku'] = $_POST['sku'];
					$abarrotera->actualizar('presentacion',$parametros, $llaves);
					$mensaje = 'Se actualizo la presentacion';
					$color = 'success';
					if($_POST['enviar']=="Guardar y Regresar"){
						$_GET['id_producto'] = $datos[0]['id_producto'];
						header('Location: /abarrotera/admin/presentacion/index.php?id_producto='.$datos[0]['id_producto']);		
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
		unset($parametros['presentacion']);
		unset($parametros['preciou']);
		unset($parametros['cantidadm']);
		unset($parametros['preciom']);
		unset($parametros['id_unidad_medida']);
		unset($parametros['imagen']);
		$datos = $abarrotera->consultar("SELECT * FROM presentacion WHERE sku=:sku", $parametros);
		$unidades_medida = $abarrotera->dropdownList('SELECT id_unidad_medida as id, unidad_medida as opcion FROM unidad_medida order by unidad_medida asc', 'id_unidad_medida', $datos[0]['id_unidad_medida']);

	}
		include('../header.php');	

?>
<div class="jumbotron">
	<h1>Editar presentacion</h1>
</div>
<form action="editar.php" method="POST" enctype="multipart/form-data">
	<div class="form-group">
		<label>SKU</label>
		<input class="col-md-6 form-control" type="text" name="sku_nuevo" value="<?php echo $datos[0]['sku'] ?>">
		<input type="hidden" name="sku" value="<?php echo $datos[0]['sku'] ?>">
	</div>
	<div class="form-group">
		<label>Presentacion</label>
		<input class="col-md-6 form-control" type="text" name="presentacion" value="<?php echo $datos[0]['presentacion'] ?>">
	</div>
	<div class="form-group">
		<label>Precio unitario</label>
		<input class="col-md-6 form-control" type="text" name="preciou" value="<?php echo $datos[0]['preciou'] ?>">
	</div>	
	<div class="form-group">
		<label>Cantidad mayoreo</label>
		<input class="col-md-6 form-control" type="text" name="cantidadm" value="<?php echo $datos[0]['cantidadm'] ?>">
	</div>
	<div class="form-group">
		<label>Precio mayoreo</label>
		<input class="col-md-6 form-control" type="text" name="preciom" value="<?php echo $datos[0]['preciom'] ?>">
	</div>			
	<input type="hidden" name="id_producto" value="<?php echo $parametros['id_producto']; ?>">
	<div class="form-group">
		<label>Unidad de medida</label>
		<?php echo $unidades_medida; ?>
	</div>
	<div class="form-group">
		<label>Imagen</label>
		<input class="form-control" type="file" name="imagen">
		<img src="../../image/productos/<?php echo $datos[0]['imagen'] ?>">
	</div>						
	<br/>
	<div class="form-group">
		<input class="btn btn-primary" type="submit" name="enviar" value="Guardar">
		<input class="btn btn-info" type="submit" name="enviar" value="Guardar y Regresar">
	</div>
	<div class="form-group">
	</div>	
</form>
