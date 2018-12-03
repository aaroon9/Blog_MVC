
<!--Declaracion de tabla con su redireccion mediante una URL amigable. Tabla declarada para la vista de modificar post-->

<form action="<?php echo constant('URL') ?>posts/modificar" method="post" enctype="multipart/form-data"> 
    <table class='table table-hover table-responsive table-bordered'>
        <tr>
            <td>ID</td>
            <td><?php echo $post->id; ?></td>
            <td> <input type="hidden" name="id" value="<?php echo $post->id; ?>"></td>
        </tr>
 
        <tr>
            <td>Titulo</td>
            <td><input type='text' name='titulo' value='<?php echo $post->titulo; ?>' class='form-control' /></td>
        </tr>
        <tr>
            <td>Author</td>
            <td><input type='text' name='author' value='<?php echo $post->author; ?>' class='form-control' /></td>
        </tr>
 
        <tr>
            <td>Descripción</td>
            <td><input type='text' name='desc' value='<?php echo $post->content; ?>' class='form-control' /></td>
        </tr>

        <tr>
            <td>Foto Actual</td>
            <td>
                <input type="hidden" name="image1" value="<?php echo $post->image;?>">
                <img style="max-height: 300px" class="img-fluid rounded maxHeight" src="<?php echo constant('URL')."uploads/".$post->image; ?>">
            </td>
        </tr>
 
        <tr>
            <td>Foto</td>
            <td><input type="file" name="image"/></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <button type="submit" class="btn btn-primary">Update</button>
            </td>
        </tr>
 
    </table>
</form>