	<p><strong>Listado de los posts:</strong></p>
	<?php foreach($posts as $post) { ?>
	 <p>
	 <?php echo $post->author; ?>
	 <a href='<?php echo constant('URL'); ?>posts/show/<?php echo $post->id; ?>'>Ver contenido</a> 
	 <a href='<?php echo constant('URL'); ?>posts/mostrarModificar/<?php echo $post->id; ?>'>Modificar Post</a>
	 <a href='<?php echo constant('URL'); ?>posts/eliminar/<?php echo $post->id; ?>'>Eliminar Post</a>	
	 </p>
<?php } ?>