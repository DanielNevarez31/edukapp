<?php
	
	include('../../php/conn.php');
	$sql = "SELECT * FROM estudiantes ORDER BY ape1,ape2,nombre ASC";
	$res = mysqli_query($conn, $sql);

	if ($res) 
	{
		while ($val = mysqli_fetch_assoc($res))
		{
			if ($val['status']==1) 
			{
				$op = '<button class="btn green accent-4 btn-sm m-1 pendiente" data-toggle="tooltip" title="Asignado" ">
							<i class="fas fa-check-circle"></i>
						</button>';
			}
			else
			{
				$op = '<button class="btn yellow accent-4 btn-sm m-1 pendiente" data-toggle="tooltip" title="No asignado" >
								<i class="fas fa-times-circle"></i>
							</button>';
			}
			echo '	<tr scope="row">
						<td data-title="Nombre">'.$val['nombre'].'</td>
						<td data-title="Primer apellido">'.$val['ape1'].'</td>
						<td data-title="Segundo apellido">'.$val['ape2'].'</td>
						<td data-title="Sexo">'.$val['sexo'].'</td>
						<td class="d-flex m-0 p-0">
							<button class="btn blue lighten-1 btn-sm m-1 pendiente" data-toggle="tooltip" title="Ver" onclick="ver('.$val['idEstudiante'].')">
								<i class="far fa-eye fa-lg"></i>
							</button>
							'.$op.'							
							<button class="btn red accent-4 btn-sm m-1" data-toggle="tooltip" title="Eliminar" onclick=borrar('.$val['idEstudiante'].')>
								<i class="fas fa-times fa-lg"></i>
							</button>
						</td>
					</tr>';
		}
	}
	else
	{
		echo mysqli_error($conn);
	}

?>