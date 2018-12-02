<?php 
	class CochesController{
		public function index() {
			// Guardamos todos los posts en una variable
			$coches = Coche::todos();
			require_once('views/coche/index.php');
		}

		public function mostrarUno($bastidor){
			//Comprobar si nos entran un bastidor.
			if (!isset($bastidor)) {
		 		return call('pages', 'error');
			}
			//Obtenemos los datos de coche al llamar a la funcion de Coche que nos buscara en la BBDD todos los campos de un solo coche. Despues requerimos la vista que se encargara de mostrar los datos obtenidos.
			$coche = Coche::readOne($bastidor);
			require_once('views/coche/readOne.php');
		}
	}

 ?>