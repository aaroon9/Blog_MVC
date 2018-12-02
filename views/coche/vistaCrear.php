
<form action="<?php echo constant('URL'); ?>coches/insertarCoche" method="post" enctype="multipart/form-data"> 
    <table class='table table-hover table-responsive table-bordered'>
 
        <tr>
            <td>Bastidor</td>
            <td><input type='text' name='bastidor' class='form-control' /></td>
        </tr>
        <tr>
            <td>Marca</td>
            <td><input type='text' name='marca' class='form-control' /></td>
        </tr>
 
        <tr>
            <td>Modelo</td>
            <td><input type='text' name='modelo' class='form-control' /></td>
        </tr>
 
        <tr>
            <td>Puertas</td>
            <td>
            	<select name="puertas">
            		<option value="3">3</option>
            		<option value="4">4</option>
            		<option value="5">5</option>
           		</select>
        	</td>
        </tr>
        <tr>
            <td></td>
            <td>
                <button type="submit" class="btn btn-primary">Crear</button>
            </td>
        </tr>
 
    </table>
</form>