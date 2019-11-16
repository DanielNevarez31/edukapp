<?php
	include '../conn.php';
	$id = $_POST['id'];

	$s = "DELETE FROM usuarios_educadores  
            WHERE idEducador = '$id'";
	$other = mysqli_query($conn, $s);

	$sql = "DELETE FROM educadores  
            WHERE idEducador = '$id'";
	$res = mysqli_query($conn, $sql);
	if ($res && $other) 
	{
		$q = "SELECT * FROM estudiantes_educadores WHERE idEducador = '$id' ";
		$resp = mysqli_query($conn,$q);
		if ($resp) 
		{
			while ($row = mysqli_fetch_assoc($resp)) 
			{
				$idEstudiante = $row['idEstudiante'];
				$query = "UPDATE estudiantes SET status = 0 WHERE '$idEstudiante' ";
				$res2 = mysqli_query($conn,$query);
				if ($res2) 
				{
					$sql2 = "DELETE FROM estudiantes_educadores WHERE idEducador = '$id'";
					if (mysqli_query($conn,$sql2)) 
					{
						echo 1;
					}
					else
					{
						echo 0;
					}
				}
				else
				{
					echo 0;
				}				
			}			
		}
		else
		{
			echo 0;
		}
		
	}
	else
	{
		echo mysqli_error($conn);
	}
?>