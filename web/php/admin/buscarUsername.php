<?php
	include '../conn.php';
    $t = $_POST['txt'];
    $sql = "SELECT us AS resultado FROM usuarios_administradores WHERE us = '$t'";
    $res = mysqli_query($conn, $sql);
    
    if($res) 
    {
        if(mysqli_num_rows($res)>0) 
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
        echo mysqli_error($conn);
    }