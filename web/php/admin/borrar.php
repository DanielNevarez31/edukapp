<?php
	include '../conn.php';
	$id = $_POST['id'];
	$sql = "DELETE FROM administradores  
            WHERE idAdministrador = '$id'";
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