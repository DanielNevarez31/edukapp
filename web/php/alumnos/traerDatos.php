<?php
	include '../conn.php';
    $id = $_POST['id'];
    $sql = "SELECT * FROM estudiantes WHERE status = 0 AND idEstudiante = '$id' ORDER BY nombre,ape1,ape2 ";
    $res = mysqli_query($conn, $sql);

    if ($res)
    {
        $tr = array();  
        while ($val = mysqli_fetch_assoc($res)) 
		{
			$tr['id'] = $val['idEstudiante'];
            $tr['calle'] = $val['calle'];
            $tr['num_ext'] = $val['numExt'];
            $tr['num_int'] = $val['numInt'];
            $tr['col'] = $val['colFracc'];
            $tr['cp'] = $val['cp'];
            $tr['sexo'] = $val['sexo'];
            echo json_encode($tr);
		}
    }
    else
	{
		echo 0;
	}
?>