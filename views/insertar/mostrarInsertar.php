
<!--Declaracion de la tabla para crear un post con su redireccion mediante una URL amigable a postcontrollers-->

<form action="<?php echo constant('URL'); ?>posts/insertar" method="post" enctype="multipart/form-data"> 
    <table class='table table-hover table-responsive table-bordered'>
 
        <tr>
            <td>Titulo</td>
            <td><input type='text' name='titulo' class='form-control' /></td>
        </tr>
        <tr>
            <td>Author</td>
            <td><input type='text' name='author' class='form-control' /></td>
        </tr>
 
        <tr>
            <td>Descripción</td>
            <td><input type='text' name='desc' class='form-control' /></td>
        </tr>
 
        <tr>
            <td>Foto</td>
            <td><input type="file" name="image" /></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <button type="submit" class="btn btn-primary">Crear</button>
            </td>
        </tr>
 
    </table>
</form>