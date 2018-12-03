<DOCTYPE html>
<html>
		 <head>
		 	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
		 </head>
		 <body>
			 <header>
			 	<!--Declaracion de un navbar para dar formato-->
			 	<nav class="navbar navbar-dark bg-dark">
			 		<!--Declaracion de redireccion de URL amigable-->
					 <a class="navbar-brand" href="<?php echo constant('URL'); ?>">Home</a>
					 <a class="navbar-brand" href="<?php echo constant('URL'); ?>posts/index">Posts</a>
					 <a class="navbar-brand" href="<?php echo constant('URL'); ?>posts/mostrarInsertar">Crear Post</a>
					 <a class="navbar-brand" href="<?php echo constant('URL'); ?>coches/index">Coches</a>
					 <a class="navbar-brand" href="<?php echo constant('URL'); ?>coches/crearCoche">Crear Coches</a>
			 	</nav>
			 </header>

		 	<?php require_once('routes.php'); ?>

			 <footer>
			 Copyright
			 </footer>
		 </body>
</html>