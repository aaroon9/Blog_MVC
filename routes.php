<?php
		//$param es el nombre que le he dado al tercer parametro del array para la URL.
		function call($controller, $action, $param) {
			 require_once('controllers/' . $controller . '_controller.php');
			 switch($controller) {
			 case 'pages':
			 $controller = new PagesController();
			 break;
			 case 'posts':
			 // necesitamos el modelo para después consultar a la BBDD desde el controlador
			 require_once('models/post.php');
			 $controller = new PostsController();
			 break;
			 case 'coches':
			 // nueva tabla en la BBDD
			 require_once('models/coche.php');
			 $controller = new CochesController();
			 break;
			 }
			 $controller->{ $action }($param);
		}
			// agregando una entrada para el nuevo controlador y sus acciones.
			//Declaro el nuevo array asociativo coches de la nueva tabla para que tenga rutas.
			$controllers = array( 'pages' => ['home', 'error'],
			 					  'posts' => ['index', 'show','mostrarInsertar','insertar','mostrarModificar','modificar','eliminar'],
			 					  'coches' => ['index', 'mostrarUno', 'crearCoche', 'insertarCoche', 'modificarCoche', 'modificarCocheBD', 'eliminarCoche']
			);

			if (array_key_exists($controller, $controllers)) {
			 	if (in_array($action, $controllers[$controller])) {
			 		call($controller, $action, $param);
			 	} else {
			 		//nuevo paramepro null en el caso de acabar en la pagina error, hace referencia a $param;
			 		call('pages', 'error', null);
			 	}
			} else {
			 call('pages', 'error', null);
		}
?>
