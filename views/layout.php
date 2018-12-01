<DOCTYPE html>
<html>
		 <head>
		 </head>
		 <body>
			 <header>
			 <a href="<?php echo constant('URL'); ?>">Home</a>
			 <a href="<?php echo constant('URL'); ?>posts/index">Posts</a>
			 <a href="<?php echo constant('URL'); ?>posts/mostrarInsertar">Crear Post</a>
			 <a href="<?php echo constant('URL'); ?>coches/index">Coches</a>
			 </header>

		 	<?php require_once('routes.php'); ?>

			 <footer>
			 Copyright
			 </footer>
		 </body>
</html>