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
	$email = $_POST['email'];
	$tel = $_POST['tel'];
	$grado = $_POST['grado'];
    $contra = $_POST['password'];
    $escuela = $_POST['escuela'];
    $comentarios = $_POST['comentarios'];

	$sql = " INSERT INTO educadores(nombre, ape1, ape2, sexo, calle, numExt, numInt, cp, colFracc, email, tel, gradoEstudios,escuela, comentarios ,status) VALUES('$nombre', '$ape1', '$ape2', '$sexo', '$calle', '$num_ext', '$num_int', '$cp', '$col' ,'$email', '$tel', '$grado','$escuela','$comentarios',0) ";
	$res = mysqli_query($conn, $sql);

	if ($res)
	{
        $id = mysqli_insert_id($conn);
        $sql2 = " INSERT INTO usuarios_educadores (us, ps, idEducador) VALUES ('$email', md5('$contra'),'$id')";
        $res2 = mysqli_query($conn, $sql2);
        if ($res2) 
        {
            echo 1;
        }
        else
        {
            echo mysqli_error($conn);
        }        
	}
	else
	{
		echo mysqli_error($conn);
	}

?>