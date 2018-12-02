	<p><strong>Listado de los posts:</strong></p>
	<table class="table">
		<tr>
			<th>Author</th>
			<th>Opciones</th>
		</tr>
		<?php foreach($posts as $post) { ?>
			<tr>
				<td>
					<?php echo $post->author; ?>
				</td>
				<td>
					<a href='<?php echo constant('URL'); ?>posts/show/<?php echo $post->id; ?>' class="btn btn-primary">Ver contenido</a> 
					<a href='<?php echo constant('URL'); ?>posts/mostrarModificar/<?php echo $post->id; ?>' class="btn btn-warning">Modificar Post</a>
					<a href='<?php echo constant('URL'); ?>posts/eliminar/<?php echo $post->id; ?>' class="btn btn-danger">Eliminar Post</a>
				</td>
			</tr>
<?php } ?>
	</table>