<?php
	include '../conn.php';
    $sql = "SELECT * FROM estudiantes WHERE status = 0 ORDER BY nombre,ape1,ape2 ";
    $res = mysqli_query($conn, $sql);

    if ($res)
    {
        if (mysqli_num_rows($res) > 0)
        {
            echo '<option value="" selected>Seleccione un alumno</option>';
            
            while ($val = mysqli_fetch_assoc($res)) 
			{
				echo '<option value="'.$val['idEstudiante'].'">'.$val['nombre'].' '.$val['ape1'].' '.$val['ape2'].'</option>';
			}
        }
        else
        {
            echo '<option value="0">No hay estudiantes disponibles.</option>';
        }
    }
    else
	{
		echo '<option value="null">No se pudo conectar a la base de datos</option>';
	}
?>