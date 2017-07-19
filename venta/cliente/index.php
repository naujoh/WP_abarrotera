<?php
include_once('../abarrotera.class.php');
$rol[0] = 'Cliente';
$abarrotera->guardia($rol);
print_r($_SESSION);
?>