<p><strong>Post #<?php echo $post->id; ?></strong></p>
<p><strong>Titulo: </strong><?php echo $post->titulo; ?></p>
<p><strong>Autor: </strong><?php echo $post->author; ?></p>
<p><strong>Conent: </strong><?php echo $post->content; ?></p>
<?php
echo "<div>";
echo "<strong>Image:</strong>";
        echo $post->image? "<img src='uploads/{$post->image}' style='width:250px;' />" : "No image found.";
    echo "</div>";
?>