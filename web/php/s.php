<?php

require 'conn.php';

$sql = "ALTER TABLE `informacion_eventos` ADD `hora` TIME NULL AFTER `fecha`;";

$res = mysqli_query($conn,$sql);
if($res)
{
	echo 1;
}

?>