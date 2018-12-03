
<!--Declaracion de una tabla para dar formato a la vista de la tabla coches -->
<p><strong>Listado de los coches:</strong></p>

<table class="table">
	<tr>
		<th>Bastidor</th>
		<th>Opciones</th>
	</tr>
	<!--For que recorre todas las filas que hay en la BBDD-->
	<?php foreach($coches as $coche) { ?>
	 
	 <tr>
	 	<td><?php echo $coche->bastidor; ?></td>
	 	<td>
	 		<!--Declaracion de la URL amigables pasando el bastidor como tercer parametro en el URL-->
	 		<a href="<?php echo constant('URL'); ?>coches/mostrarUno/<?php echo $coche->bastidor; ?>" class="btn btn-primary">Ver contenido</a>
	 		<a href="<?php echo constant('URL'); ?>coches/modificarCoche/<?php echo $coche->bastidor; ?>" class="btn btn-warning">Modificar Coche</a>
	 		<a href="<?php echo constant('URL'); ?>coches/eliminarCoche/<?php echo $coche->bastidor; ?>" class="btn btn-danger">Eliminar Coche</a>
	 	</td>
	 </tr>
	 
<?php } ?>