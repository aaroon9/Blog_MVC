<?php 
	class CochesController{
		//Funcion que se llama cuando se pulsa Coches, el resulado son todo el listado de los coches que hay en la BBDD.
		public function index() {
			// Guardamos todos los posts en una variable
			$coches = Coche::todos();
			require_once('views/coche/index.php');
		}
		//Funcion que llama al metodo readOne de Coche, el resultado es la vista de un solo coche.
		public function mostrarUno($bastidor){
			//Comprobar si nos entran un bastidor.
			if (!isset($bastidor)) {
		 		return call('pages', 'error');
			}
			//Obtenemos los datos de coche al llamar a la funcion de Coche que nos buscara en la BBDD todos los campos de un solo coche. Despues requerimos la vista que se encargara de mostrar los datos obtenidos.
			$coche = Coche::readOne($bastidor);
			require_once('views/coche/readOne.php');
		}
		//funcion que llama a la visa para crear un coche nuevo.
		public function crearCoche(){
			require_once('views/coche/vistaCrear.php');

		}
		//el formulario llama a este metodo donde lo redirige a la funcion crearCocheBD de Coche.
		public function insertarCoche(){
			if (Coche::crearCocheBD() == true) {
				echo "<div class='alert alert-success'>Coche creado correctamente.</div>";
				require_once('views/coche/vistaCrear.php');
			 } else{
			 	echo "<div class='alert alert-danger'>Yeeee ande ibas? Coche no creado.</div>";
			 	require_once('views/coche/vistaCrear.php');
			 }
		}
		//funcion que permite mostrar la vista de modificarCoche
		 public function modificarCoche($bastidor){
		 	if (!isset($bastidor)) {
			 	return call('pages', 'error', null);
			 }else{
			 	$coche = Coche::readOne($bastidor);
			 	require_once('views/coche/mostrarModificar.php');
			 }

		 }
		 //Esta funcion es llamada desde la vista modificarCoche donde los datos son redirigidos al metodo de Coche 'modificarCocheBD'
		 public function modificarCocheBD(){
		 	if(Coche::modificarCocheBD()== true){
		 		$coches = Coche::todos();
		 		echo "<div class='alert alert-success'Coche actualizado correctamente.</div>";
		 		require_once('views/coche/index.php');
		 	}
		 	else{
		 		$coches = Coche::todos();
		 		echo "<div class='alert alert-danger'>Yeeee ande ibas? Coche no actualizado.</div>";
		 		require_once('views/coche/index.php');
		 	}
		 }
		 //funcion que recoje el $bastidor de un coche donde este sera enviado al metodo eliminarBD para wu edesaparezca de la BBDD.
		 public function eliminarCoche($bastidor){
		 	if(Coche::eliminarBD($bastidor) == true){
		 		$coches = Coche::todos();
		 		echo "<div class='alert alert-success'>Coche eliminado correctamente.</div>";
		 		require_once('views/coche/index.php');
		 	}else{
		 		$coches = Coche::todos();
		 		echo "<div class='alert alert-success'>Imposible eliminar el coche</div>";
		 		require_once('views/coche/index.php');
		 	}
		}
	}
 ?>