<?php
    include '../conn.php';
    $id = $_POST['id'];
    
    $sql = "SELECT * FROM administradores a WHERE a.idAdministrador = '$id'";

    $res = mysqli_query($conn, $sql);
    
    if ($res) 
    {
        if (mysqli_num_rows($res) > 0)
        {
            $tr = array();
            while( $val = mysqli_fetch_assoc($res) )
            {                   
                $tr['id'] = $val['idAdministrador'];
                $tr['nombre'] = $val['nombre'];
                $tr['ape1'] = $val['ape1'];
                $tr['ape2'] = $val['ape2'];
                $tr['sexo'] = $val['sexo'];
                $tr['calle'] = $val['calle'];
                $tr['num_ext'] = $val['numExt'];
                $tr['num_int'] = $val['numInt'];
                $tr['cp'] = $val['cp'];
                $tr['colonia'] = $val['colFracc'];
                $tr['email'] = $val['email'];
                $tr['telefono'] = $val['tel'];
                echo json_encode($tr);
            }
        }
        else
        {
            //echo mysqli_error($conn);
            echo 0;
        }
    }
    else
    {
        echo -1;
        //echo mysqli_error($conn);
    }
?>