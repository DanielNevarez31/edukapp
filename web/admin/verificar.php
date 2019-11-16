<?php
	session_start();	
	if (!isset($_SESSION['in']))
	{
		echo "<script>window.location.href = '/adame/index.php'</script>";
	}
?>