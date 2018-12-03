

<!--Declaracion de tabla para la vista unica de un solo elemento de la tabla coches-->
<table class="table">
	<tr>
		<th></th>
		<th></th>
	</tr>
	<tr>
		<td>Bastidor:</td>
		<td><?php echo $coche->bastidor; ?></td>
	</tr>
	<tr>
		<td>Marca:</td>
		<td><?php echo $coche->marca; ?></td>
	</tr>
	<tr>
		<td>Modelo:</td>
		<td><?php echo $coche->modelo; ?></td>
	</tr>
	<tr>
		<td>Puertas:</td>
		<td><?php echo $coche->puertas; ?></td>
	</tr>
	<tr>
		<!-- La forma en que PHP muestra la fecha es en el formato americano Y/m/d para que nos resulte mas amigable cambiamos el formato con la funcion strftime-->
	<?php 
		$fecha = strtotime($coche->created);
		$fechaB = strftime("%d/%m/%Y" , $fecha);
	?>
		<td>Creado:</td>
		<td><?php echo $fechaB; ?></td>
	</tr>

