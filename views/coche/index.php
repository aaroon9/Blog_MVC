<p><strong>Listado de los coches:</strong></p>
	<?php foreach($coches as $coche) { ?>
	 <p>
	 <?php echo $coche->bastidor; ?>
	 <a href="<?php echo constant('URL'); ?>coches/mostrarUno/<?php echo $coche->bastidor; ?>">Ver contenido</a>
	 <!--<a href='?controller=posts&action=mostrarModificar&id=<?php echo $post->id; ?>'>Modificar Coche</a>
	 <a href='?controller=posts&action=eliminar&id=<?php echo $post->id; ?>'>Eliminar Coche</a>-->
	 </p>
<?php } ?>