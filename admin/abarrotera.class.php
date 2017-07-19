<?php
if(!class_exists('Abarrotera')){
	/**
	* Acciones y procedimientos genericos
	*/
	class Abarrotera
	{
		var $conexion = null;
		var $configuracion = null;
		function __construct()
		{
			// print_r($_SERVER); die();
			include_once($_SERVER['DOCUMENT_ROOT'].'/abarrotera/configuracion.php');
			$this->configuracion=$configuracion;
			$this->conexion = $conexion;
		}

		/**
		* Metodo generico para realizar consultas en la BD
		*/
		function consultar($sql, $parametros=null){
			$statement= $this->conexion->prepare($sql);
			if(!is_null($parametros)){
				foreach ($parametros as $key => $value) {
					$statement->bindValue(':'.$key, $value);
				}
			}
			$statement->execute();
			$datos = $statement->fetchAll();
			return $datos;
		}

		/**
		* Metodo generico para insertar en la BD
		*/
		function insertar($tabla, $parametros){
			$datos = array_keys($parametros);
			array_walk($datos, function(&$item){$item=' :'.$item;});
			$sql = 'INSERT INTO '.$tabla.'('.implode(" ",explode(":",implode(",",$datos))).') values ('.implode(",", $datos).')';
			try{
				$statement=$this->conexion->prepare($sql);
				foreach ($parametros as $key => $value) {
					$statement->bindValue(':'.$key, $value);
				}
				return $statement->execute();		
			} 
			catch (Exception $e){
				echo 'La exception: '. $e->getMessage(). '\n';
			}
		}

		/**
		* Metodo generico para actualizar en la BD
		* @param String $tabla : Nombre de la tabla que se va a actualizar.
		* @param Array $parametros : parametros para actualizar la tabla.
		* @param Array $llaves : llaves primarias para actualizar la tabla. 
		*/
		function actualizar($tabla, $parametros, $llaves){
			$datos = array_keys($parametros);
			$keys = array_keys($llaves);
			array_walk($datos, function(&$item){$item=$item.'=?';});
			array_walk($keys, function(&$item){$item=$item.'=?';});
			$sql = 'UPDATE '.$tabla.' SET '.implode(",", $datos).' WHERE '.implode(" and ", $keys);
			// echo $sql; die();
			try{
				$statement=$this->conexion->prepare($sql);
				$i=1;
				foreach ($parametros as $key => $value) {
					$statement->bindValue($i, $value);
					$i++;
				}
				foreach ($llaves as $key => $value) {
					$statement->bindValue($i, $value);
					$i++;
				}
				return $statement->execute();		
				// echo $statement->execute(); die();
			} 
			catch (Exception $e){
				echo 'La exception: '. $e->getMessage(). '\n';
			}
		}

		/**
		* Metodo generico para borrar en la BD
		*/
		function borrar($tabla, $parametros){
			$sql = 'DELETE from '.$tabla.' where ';
			$where ="";
			$c = 1;
			foreach ($parametros as $key => $value) { 
				if(count($parametros)==$c){
					$where .= $key.'= :'.$key;
				}else{
					$where .= $key.'= :'.$key.' AND';
				}
				$c++;
			}
			$sql = $sql . $where;
			try{
				$statement=$this->conexion->prepare($sql);
				foreach ($parametros as $key => $value) {
					$statement->bindParam(':'.$key, $value);
				}
				return $statement->execute();		
			} 
			catch (Exception $e){
				echo 'La exception: '. $e->getMessage(). "\n";
			}
		}

		function validarImagen($imagen){
			if(in_array($imagen['type'], $this->configuracion['imagenes_permitidas']))
				return true;
			return false;
		}

		function dropdownList($sql, $nombre, $id_seleccionado=null){
			$datos = $this->consultar($sql);
			$select = '<select name="'.$nombre.'">';
			$select .= '<option value=""></option>';
			foreach ($datos as $key => $value) {
				$selected = "";
				if($id_seleccionado==$datos[$key]['id'])
					$selected = ' selected';
				$select .= '<option value="'.$datos[$key]['id'].'"'.$selected.'>'.$datos[$key]['opcion'].'</option>';
			}
			$select .= '</select>';
			return $select;
		}

		function guardia($roles_permitidos){
			if(isset($_SESSION['validado'])){
				if($_SESSION['validado']){
					$band=false;
					foreach ($_SESSION['roles'] as $rol) {
						if(in_array($rol, $roles_permitidos)){
							$band = true;
						}
					}
					if(!$band){
						$error=3;
					}
				}else{
					$error=2;
				}
			}else{
				$error=1;
			}
			if(!$band){
				header('Location: ../login/index.php?error='.$error);
			}
		}
	}
	$abarrotera = new Abarrotera();
}
?>

