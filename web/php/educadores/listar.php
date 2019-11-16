<?php
	
	include('../../php/conn.php');
	$sql = "SELECT * FROM educadores ORDER BY ape1,ape2,nombre ASC";
	$res = mysqli_query($conn, $sql);

	if ($res) 
	{
		while ($val = mysqli_fetch_assoc($res))
		{
			if ($val['status']==1) 
			{
				$op = '<button class="btn green accent-4 btn-sm m-1 pendiente" data-toggle="tooltip" title="Educando" ">
								<i class="fas fa-user-tie"></i>
							</button>';
			}
			else
			{
				$op = '<button class="btn yellow accent-4 btn-sm m-1 pendiente" data-toggle="tooltip" title="Asignar" onclick="asignar('.$val['idEducador'].')">
								<i class="fas fa-coffee"></i>
							</button>';
			}
			echo '	<tr scope="row">
						<td data-title="Nombre">'.$val['nombre'].'</td>
						<td data-title="Primer apellido">'.$val['ape1'].'</td>
						<td data-title="Segundo apellido">'.$val['ape2'].'</td>
						<td data-title="Escuela de procedencia">'.$val['escuela'].'</td>
						<td data-title="Cargo">'.$val['gradoEstudios'].'</td>
						<td class="d-flex m-0 p-0">
							<button class="btn blue lighten-1 btn-sm m-1 pendiente" data-toggle="tooltip" title="Ver" onclick="ver('.$val['idEducador'].')">
								<i class="far fa-eye fa-lg"></i>
							</button>
							'.$op.'							
							<button class="btn red accent-4 btn-sm m-1" data-toggle="tooltip" title="Eliminar" onclick=borrar('.$val['idEducador'].')>
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