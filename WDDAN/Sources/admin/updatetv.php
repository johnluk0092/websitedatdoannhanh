<?php 
include('../config/connect.php');
error_reporting(E_ERROR | E_PARSE);
// lấy về biến chức năng = 1: update admin; chức năng = 2: xoá user
$cn = $_GET['chucnang'];
// lấy id user
$idtv = $_GET['idtv'];
// lấy level
$level = $_GET['level'];
if($cn == 1 && $level == 0)
{
	$query = mysqli_query($conn, "UPDATE user set Level = 1 where Id = $idtv");
	if(!$query)
		echo "Loi";
	header('location: QLTV.php');
	exit();
}
if($cn == 1 && $level == 1)
{
	$query = mysqli_query($conn, "UPDATE user set Level = 0 where Id = $idtv");
	if(!$query)
		echo "Loi";
	header('location: QLTV.php');
	exit();
}
if($cn == 2) {
	$query = mysqli_query($conn, "delete from user where Id = $idtv");
	if(!$query)
		echo "Loi";
	header('location: QLTV.php');
	exit();
	};
mysqli_close($conn);
?>