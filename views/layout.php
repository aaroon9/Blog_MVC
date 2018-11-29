<DOCTYPE html>
<html>
		 <head>
		 </head>
		 <body>
			 <header>
			 <a href='/bloc_php_mvc'>Home</a>
			 <a href='?controller=posts&action=index'>Posts</a>
			 <a href='?controller=posts&action=mostrarInsertar'>Crear Post</a>
			 <a href='?controller=coches&action=index'>Coches</a>
			 </header>

		 	<?php require_once('routes.php'); ?>

			 <footer>
			 Copyright
			 </footer>
		 </body>
</html>