<?php
    include('../conn.php');
    $id = $_POST['id_trabajador'];
    $nombre = $_POST['nombre'];
    $ape1 = $_POST['ape1'];
    $ape2 = $_POST['ape2'];
    $sexo = $_POST['sexo'];
    $tipo = $_POST['tipo'];
    $telefono = $_POST['telefono'];
    $calle = $_POST['calle'];
    $num_ext = $_POST['num_ext'];
    $num_int = $_POST['num_int'];
    $colonia = $_POST['colonia'];
    $cp = $_POST['cp'];
    $localidad = $_POST['localidad'];
    $municipio = $_POST['municipio'];
    $estado = $_POST['estado'];
    $celular = $_POST['celular'];
    $email = $_POST['email'];
    $comentarios = $_POST['comentarios'];
    $username = $_POST['username'];
    $pass = $_POST['pass'];
    $privilegios = $_POST['privilegios'];
    $switch = $_POST['switchPass'];
    $exists = $_POST['existente'];
    $proceed = filter_var($switch, FILTER_VALIDATE_BOOLEAN);
    $insert = filter_var($exists, FILTER_VALIDATE_BOOLEAN);

    $sql = "UPDATE trabajadores SET
                nombre = '$nombre',
                ape1 = '$ape1',
                ape2 = '$ape2',
                sexo = '$sexo',
                tipo = '$tipo',
                telefono = '$telefono',
                calle = '$calle',
                num_ext = '$num_ext',
                num_int = '$num_int',
                colonia = '$colonia',
                cp = '$cp',
                localidad = '$localidad',
                municipio = '$municipio',
                estado = '$estado',
                celular = '$celular',
                email = '$email',
                comentarios = '$comentarios'
            WHERE id_trabajador = '$id'";

    //echo $switch;

    $res = mysqli_query($conn, $sql);

    if ($res)
    {
        if ($insert == false) {
            $sq = "INSERT INTO trabajadores_sistema (id_trabajador, usuario_nombre, password, privilegios) VALUES ('$id','$username',md5('$pass'),'$privilegios')";
            //echo $sq;
        } else {
            if ($proceed) 
            {
                //echo "si? :".$proceed;
                $sq = "UPDATE trabajadores_sistema SET
                        usuario_nombre = '$username',
                        privilegios = '$privilegios',
                        password = md5('$pass') 
                    WHERE id_trabajador = '$id'";
            }
            else 
            {
                //echo "no? :".$proceed;
                $sq = "UPDATE trabajadores_sistema SET 
                        usuario_nombre = '$username',
                        privilegios = '$privilegios'
                    WHERE id_trabajador = '$id'";
            }
        }
        
        $r = mysqli_query($conn, $sq);
        if ($r)
        {
            echo 1;
        }
        else 
        {
            echo 'Insert: '.$insert.' error: '.mysqli_error($conn);
        }
    }
    else
    {
        echo 'No hizo primer update: '.mysqli_error($conn);
    }
?>