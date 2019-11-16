<?php
	include 'conn.php';
	$pwd = $_POST['pwd'];
	$id = $_POST['id'];
	$sql = " UPDATE trabajadores_sistema SET trabajadores_sistema.password = MD5('$pwd') WHERE id_trabajador = '$id' ";
	$res = mysqli_query($conn, $sql);
	if ($res) 
	{
		echo 1;
	}
	else
	{
		echo -1;
	}
?>