<?php
	
	include('../../php/conn.php');
	$sql = "SELECT * FROM administradores a INNER JOIN usuarios_administradores ua ON(a.idAdministrador=ua.idAdministrador) ORDER BY ape1,ape2,nombre ASC";
	$res = mysqli_query($conn, $sql);

	if ($res) 
	{
		while ($val = mysqli_fetch_assoc($res))
		{
			echo '	<tr scope="row">
						<td data-title="Nombre">'.$val['nombre'].'</td>
						<td data-title="Primer apellido">'.$val['ape1'].'</td>
						<td data-title="Segundo apellido">'.$val['ape2'].'</td>
						<td data-title="Teléfono">'.$val['tel'].'</td>
						<td data-title="Email">'.$val['email'].'</td>
						<td class="d-flex m-0 p-0">
							<button class="btn blue lighten-1 btn-sm m-1 pendiente" data-toggle="tooltip" title="Ver" onclick="ver('.$val['idAdministrador'].')">
								<i class="far fa-eye fa-lg"></i>
							</button>					
							<button class="btn red accent-4 btn-sm m-1" data-toggle="tooltip" title="Eliminar" onclick=borrar('.$val['idAdministrador'].')>
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