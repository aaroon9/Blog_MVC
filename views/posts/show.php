
<table class="table">
	<tr>
		<th></th>
		<th></th>
	</tr>
	<tr>
		<td>ID:</td>
		<td><?php echo $post->id; ?></td>
	</tr>
	<br>
	<tr>
		<td>Titulo:</td>
		<td><?php echo $post->titulo; ?></td>
	</tr>
	<br>
	<tr>
		<td>Author:</td>
		<td><?php echo $post->author; ?></td>
	</tr>
	<tr>
		<td>Content:</td>
		<td><?php echo $post->content; ?></td>
	</tr>
	<td>Image:</td>

		<td>
	        <img style="max-height: 300px" class="img-fluid rounded maxHeight" src="<?php echo constant('URL')."uploads/".$post->image; ?>">
		</td>
</table>