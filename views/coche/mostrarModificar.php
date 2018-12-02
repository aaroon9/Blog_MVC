
<form action="<?php echo constant('URL'); ?>coches/modificarCocheBD" method="post" enctype="multipart/form-data"> 
    <table class='table table-hover table-responsive table-bordered'>
 
        <tr>
            <td>Bastidor:</td>
            <td><?php echo $coche->bastidor; ?></td>
            <input type="hidden" name="bastidor" value="<?php echo $coche->bastidor; ?>"/>
        </tr>
        <tr>
            <td>Marca:</td>
            <td><input type='text' name='marca' value="<?php echo $coche->marca; ?>" class='form-control' /></td>
        </tr>
 
        <tr>
            <td>Modelo:</td>
            <td><input type='text' name='modelo' value="<?php echo $coche->modelo; ?>" class='form-control' /></td>
        </tr>
 
        <tr>

            <td>Puertas Actuales:</td>
            <td><?php echo $coche->puertas; ?></td>
                <input type="hidden" name="puertas" value="<?php echo $coche->puertas; ?>" class='form-control'/>
        </tr>
        <tr>
            <td></td>
            <td>
                <button type="submit" class="btn btn-primary">Update</button>
            </td>
        </tr>
 
    </table>
</form>