
<p><strong>Bastidor #<?php echo $coche->bastidor; ?></strong></p>
<p><strong>Marca: </strong><?php echo $coche->marca; ?></p>
<p><strong>Modelo: </strong><?php echo $coche->modelo; ?></p>
<p><strong>Puertas: </strong><?php echo $coche->puertas; ?></p>
<!-- La forma en que PHP muestra la fecha es en el formato americano Y/m/d para que nos resulte mas amigable cambiamos el formato con la funcion strftime-->
<?php 
		$fecha = strtotime($coche->created);
		$fechaB = strftime("%d/%m/%Y" , $fecha);
?>
<p><strong>Creado: </strong><?php echo $fechaB; ?></p>
