<pre>
<?php
	// echo phpinfo();
	$mbd = new PDO('mysql:host=localhost;dbname=abarrotera', 'gerente', '12345');
		$i=0;
 	foreach($mbd->query('SELECT * from proveedor') as $fila) {
 		echo $fila['proveedor'];
 		$i++;
	}
	echo 'Proveedores: '.$i;
	$mbd->exec("update proveedor set proveedor='luis' where id_proveedor=1");
?>
</pre>