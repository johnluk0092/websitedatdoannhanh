<?php
$sever = 'localhost';
$user  = 'root';
$pass  = '';
$conn = mysqli_connect($sever, $user, $pass);
	if(!$conn)
		{
			die("connect failed: ". mysqli_connect_error());
		}
	mysqli_select_db($conn, "webbanhang");
	mysqli_set_charset($conn, 'UTF8');
?>