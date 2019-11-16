<?php
	include '../conn.php';
	$id = $_POST['id'];
	$sql = "DELETE FROM estudiantes  
            WHERE idEstudiante = '$id'";
	$res = mysqli_query($conn, $sql);

	if ($res) 
	{
		$q = "SELECT * FROM estudiantes_educadores WHERE idEstudiante = '$id' ";
		$resp = mysqli_query($conn,$q);
		if ($resp) 
		{
			while ($row = mysqli_fetch_assoc($resp)) 
			{
				$idEducador = $row['idEducador'];
				$query = "UPDATE educadores SET status = 0 WHERE '$idEducador' ";
				$res2 = mysqli_query($conn,$query);
				if ($res2) 
				{
					$sql2 = "DELETE FROM estudiantes_educadores WHERE idEstudiante = '$id'";
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