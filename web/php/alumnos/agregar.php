<?php
	
	include('../conn.php');
	$nombre = $_POST['nombre']; 
	$ape1 = $_POST['ape1'];		
	$ape2 = $_POST['ape2'];		
	$sexo = $_POST['sexo'];		
	$calle = $_POST['calle'];
	$num_ext = $_POST['num_ext'];
	$num_int = $_POST['num_int'];
	$cp  = $_POST['cp'];
	$col= $_POST['col'];


	$sql = " INSERT INTO estudiantes(nombre, ape1, ape2, sexo, calle, numExt, numInt, cp, colFracc ,status) VALUES('$nombre', '$ape1', '$ape2', '$sexo', '$calle', '$num_ext', '$num_int', '$cp', '$col' ,0) ";
	$res = mysqli_query($conn, $sql);

	if ($res)
	{        
        echo 1;              
	}
	else
	{
		echo mysqli_error($conn);
	}

?>