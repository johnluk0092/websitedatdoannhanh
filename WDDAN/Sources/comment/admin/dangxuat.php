<?php
session_start();
if(isset($_SESSION['username'])) 
	unset($_SESSION['username']);
if(isset($_SESSION['Level']))
	unset($_SESSION['Level']);
header('location: ../TrangChu.php');

?>