<p><strong>Listado de los coches:</strong></p>

<table class="table">
	<tr>
		<th>Bastidor</th>
		<th>Opciones</th>
	</tr>
	<?php foreach($coches as $coche) { ?>
	 
	 <tr>
	 	<td><?php echo $coche->bastidor; ?></td>
	 	<td>
	 		<a href="<?php echo constant('URL'); ?>coches/mostrarUno/<?php echo $coche->bastidor; ?>" class="btn btn-primary">Ver contenido</a>
	 		<a href="<?php echo constant('URL'); ?>coches/modificarCoche/<?php echo $coche->bastidor; ?>" class="btn btn-warning">Modificar Coche</a>
	 		<a href="<?php echo constant('URL'); ?>coches/eliminarCoche/<?php echo $coche->bastidor; ?>" class="btn btn-danger">Eliminar Coche</a>
	 	</td>
	 </tr>
	 
<?php } ?>