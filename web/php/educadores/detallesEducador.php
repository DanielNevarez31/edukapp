<?php
    include '../conn.php';
    $idEducador = $_POST['idEducador'];
    
    $sql = "SELECT * FROM educadores e WHERE e.idEducador = '$idEducador'";

    $res = mysqli_query($conn, $sql);
    
    if ($res) 
    {
        if (mysqli_num_rows($res) > 0)
        {
            $tr = array();
            while( $val = mysqli_fetch_assoc($res) )
            {
                if ($val['status']==0) 
                {                    
                    $tr['idEducador'] = $val['idEducador'];
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
                    $tr['grado'] = $val['gradoEstudios'];
                    $tr['comentarios'] = $val['comentarios'];
                    $tr['escuela'] = $val['escuela'];
                    $tr['status'] = $val['status'];
                    echo json_encode($tr);
                }
                else
                {
                    $sql2 = "SELECT e.idEducador,e.nombre,e.ape1,e.ape2,e.sexo,e.calle,e.numExt,e.numInt,e.colFracc,e.cp, e.gradoEstudios,
                    e.email,e.tel,e.comentarios,e.status as 'statusE',e.escuela,CONCAT(a.nombre,' ',a.ape1,' ',a.ape2) as 'nombreA',a.sexo as 'sexoA',a.calle as 'calleA',a.numInt as 'numIntA',a.numExt as 'numExtA',a.colFracc as 'colFraccA',a.cp as 'cpA' FROM 
                    educadores e INNER JOIN estudiantes_educadores ee INNER JOIN estudiantes a ON (e.idEducador=ee.idEducador AND a.idEstudiante=ee.idEstudiante) WHERE e.idEducador = '$idEducador' ";
                    $res2 = mysqli_query($conn,$sql2);
                    if ($res2) 
                    {
                        while ($val = mysqli_fetch_assoc($res2)) 
                        {
                            $tr['idEducador'] = $val['idEducador'];
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
                            $tr['grado'] = $val['gradoEstudios'];
                            $tr['comentarios'] = $val['comentarios'];
                            $tr['escuela'] = $val['escuela'];
                            $tr['status'] = $val['statusE'];
                            $tr['nombreA'] = $val['nombreA'];
                            $tr['sexoA'] = $val['sexoA'];
                            $tr['calleA'] = $val['calleA'];
                            $tr['colFraccA'] = $val['colFraccA'];
                            $tr['numIntA'] = $val['numIntA'];
                            $tr['numExtA'] = $val['numExtA'];
                            $tr['cpA'] = $val['cpA'];
                            echo json_encode($tr);
                        }
                    }

                }
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