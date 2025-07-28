<?php 
session_start();
if(!($_SESSION['Level'])) {
	header('location: ../TrangChu.php');
}
?>