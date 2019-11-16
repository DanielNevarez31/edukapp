<?php 
include '../conn.php';
$idE = $_POST['idEducador'];
$idA = $_POST['idAlumno'];

$sql = "INSERT INTO estudiantes_educadores VALUES ('$idA','$idE')";
if (mysqli_query($conn,$sql)) 
{
	$sql2 = "UPDATE estudiantes SET status = 1 WHERE idEstudiante = '$idA' ";
	if (mysqli_query($conn,$sql2)) 
	{
		$sql3 = "UPDATE educadores SET status = 1 WHERE idEducador = '$idE' ";
		if (mysqli_query($conn,$sql3)) 
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
else
{
	echo 0;
}

?>