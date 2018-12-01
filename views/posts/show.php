<p><strong>Post #<?php echo $post->id; ?></strong></p>
<p><strong>Titulo: </strong><?php echo $post->titulo; ?></p>
<p><strong>Autor: </strong><?php echo $post->author; ?></p>
<p><strong>Conent: </strong><?php echo $post->content; ?></p>

 <div>
	 <strong>Image:</strong>
	        <img style="max-height: 300px" class="img-fluid rounded maxHeight" src="<?php echo constant('URL')."uploads/".$post->image; ?>">
 </div>
