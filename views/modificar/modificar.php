<form action="?controller=posts&action=modificar&id=<?php echo $post->id; ?>" method="post" enctype="multipart/form-data"> 
    <table class='table table-hover table-responsive table-bordered'>
        <tr>
            <td>ID</td>
            <td><?php echo $post->id; ?></td>
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
                <input type="hidden" name="image1" value="$post->image">
                <?php echo $post->image? "<img src='uploads/{$post->image}' style='width:250px;' />" : "No image found."; ?>
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