<?php
include_once('../abarrotera.class.php');
if(isset($_POST['enviar'])){
	$parametros['correo'] = $_POST['correo'];
	$datos = $abarrotera->consultar('SELECT * FROM usuario WHERE correo=:correo', $parametros);
	if(count($datos)>0){
		$token = md5(rand(1,10000).sha1($parametros['correo'])).md5(md5($datos[0]['contrasena'])).md5(rand(1,1000000).soundex(crypt('pjd5132','tecate')).crypt('cruz azul','corona'));
		echo $token; die();
	}
}
include('../header.php');
?>
<form action="recuperar.php" method="POST">
	<div class="form-group">
		<label>Escribe tu correo electronico</label>
		<input class="form-control" type="email" name="correo">
	</div>
	<input class="btn btn-primary" type="submit" name="enviar" value="Recuperar">
</form>
<?php
include('../footer.php');
?>