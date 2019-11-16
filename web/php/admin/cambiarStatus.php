<?php
	include '../conn.php';
    $id = $_POST['id'];
    $status = $_POST['status'];
    $sql = "UPDATE trabajadores
                SET status = '$status'
                WHERE id_trabajador = '$id'";
    $res = mysqli_query($conn, $sql);

    if ($res) 
    {
        echo 1;
    }
    else 
    {
        echo mysqli_error($conn);
    }