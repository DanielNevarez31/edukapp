<?php
	
	include('conn.php');
	$usr = $_POST['us'];
	$pwd = $_POST['ps'];
	
	$sql = "SELECT * FROM administradores a INNER JOIN usuarios_administradores ua
			ON (a.idAdministrador = ua.idAdministrador)
			WHERE us = '$usr' AND ps = md5('$pwd')";
	$res = mysqli_query($conn, $sql);

	if ($res)
	{
		$nr = mysqli_num_rows($res);
		if ($nr > 0)
		{
			// echo 0;
			$val = mysqli_fetch_assoc($res);
			$id = $val['idAdministrador'];
			session_start();
			$_SESSION['id'] = $id;
			$_SESSION['in'] = true;
			//$_SESSION['nombre'] = $val['nombre'].' '.$val['ape1'].' '.$val['ape2'];
			$_SESSION['nombre'] = $val['nombre'].' '.$val['ape1'].' '.$val['ape2'];			
			$_SESSION['priv'] = 1;
			echo 1;
		}
		else
		{
			echo 2;
		}
	}
	else
	{
		echo mysqli_error($conn);
	}

?>