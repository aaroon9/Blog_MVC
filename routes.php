<?php
		function call($controller, $action) {
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
			 // necesitamos el modelo para después consultar a la BBDD desde el controlador
			 require_once('models/coche.php');
			 $controller = new CochesController();
			 break;
			 }
			 $controller->{ $action }();
		}
			// agregando una entrada para el nuevo controlador y sus acciones.
			$controllers = array( 'pages' => ['home', 'error'],
			 					  'posts' => ['index', 'show','mostrarInsertar','insertar','mostrarModificar','modificar','eliminar'],
			 					  'coches' => ['index', 'mostrarUno', 'crearCoche', 'crearCocheBD', 'modificarCoche', 'modificarCocheBD', 'eliminarCoche']
			);

			if (array_key_exists($controller, $controllers)) {
			 	if (in_array($action, $controllers[$controller])) {
			 		call($controller, $action);
			 	} else {
			 		call('pages', 'error');
			 	}
			} else {
			 call('pages', 'error');
		}
?>
