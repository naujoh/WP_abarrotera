<?php 
	$nombres['13030562'] = 'Jorge';
	$nombres['14030581'] = 'Miguel';
	$nombres['12030841'] = 'Alejandra';
	$nombres['12030853'] = 'Damian';
	$nombres['12030838'] = 'Jonathan';
	$nombres['14030593'] = 'Juan Diego';

	$calificacion['13030562'][1] = 90;
	$calificacion['13030562'][2] = 80;
	$calificacion['13030562'][3] = 70;
	$calificacion['13030562'][4] = 60;

	$calificacion['14030581'][1] = 70;
	$calificacion['14030581'][2] = 70;
	$calificacion['14030581'][3] = 70;
	$calificacion['14030581'][4] = 69;

	$calificacion['12030841'][1] = 90;
	$calificacion['12030841'][2] = 80;
	$calificacion['12030841'][3] = 70;
	$calificacion['12030841'][4] = 100;

	$calificacion['12030853'][1] = 90;
	$calificacion['12030853'][2] = 100;
	$calificacion['12030853'][3] = 70;
	$calificacion['12030853'][4] = 90;

	$calificacion['12030838'][1] = 90;
	$calificacion['12030838'][2] = 80;
	$calificacion['12030838'][3] = 70;
	$calificacion['12030838'][4] = 71;

	$calificacion['14030593'][1] = 90;
	$calificacion['14030593'][3] = 80;

	$prom = 0;
	$prom_gen = 0;
	foreach ($nombres as $key => $value) {
		echo $key.' '.$value. '<br>';
		foreach ($calificacion[$key] as $parcial => $obtenido) {
			echo 'Parcial: '.$parcial .' Obtenido: '. $obtenido . '<br>'; 
			$prom += $obtenido;
		}
		$prom = $prom/count($calificacion[$key]);
		echo 'Promedio: '. $prom . '<br> <br>';
		$prom_gen += $prom;
		$prom = 0;
	}
	$prom_gen = $prom_gen/count($nombres);
	echo 'Promedio grupo '. $prom_gen;
?>