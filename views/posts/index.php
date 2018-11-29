	<p><strong>Listado de los posts:</strong></p>
	<?php foreach($posts as $post) { ?>
	 <p>
	 <?php echo $post->author; ?>
	 <a href='?controller=posts&action=show&id=<?php echo $post->id; ?>'>Ver contenido</a>
	 <a href='?controller=posts&action=mostrarModificar&id=<?php echo $post->id; ?>'>Modificar Post</a>
	 <a href='?controller=posts&action=eliminar&id=<?php echo $post->id; ?>'>Eliminar Post</a>
	 </p>
<?php } ?>