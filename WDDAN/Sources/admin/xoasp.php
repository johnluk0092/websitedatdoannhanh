<?php
include('../config/connect.php');
error_reporting(E_ERROR | E_PARSE);
$id = $_GET['idsp'];
$idhd = $_GET['idhd'];
$trangthai = $_GET['trangthai'];
// lấy giatri trên url. = 1 : xoá sản phẩm; =2:đổi trạng thái hoá đơn
$giatri = $_GET['giatri'];
if($giatri == 1)
	{
	// xử lý xoá sản phẩm
	$query = mysqli_query($conn, "Delete from mon where IdMon = $id");
	if(!$query)
		echo "Loi";
	header('location: QLSP.php');
	exit();
	}
if($giatri == 2 && $trangthai == 0)
{
	$query = mysqli_query($conn, "UPDATE hoadon set TrangThai = 1 where IdHd = $idhd");
	if(!$query)
		echo "Loi";
	header('location: QLDH.php');
	exit();
}
if($giatri == 2 && $trangthai == 1)
{
	$query = mysqli_query($conn, "UPDATE hoadon set TrangThai = 0 where IdHd = $idhd");
	if(!$query)
		echo "Loi";
	header('location: QLDH.php');
	exit();
}
// xoá hoá đơn 
if($giatri == 3)
	{
	// xử lý xoá sản phẩm
	$query  = mysqli_query($conn, "Delete from hoadon where IdHd = $idhd");
	$query2 = mysqli_query($conn, "delete from chitiethd where IdHd = $idhd");
	if(!$query || !$query2 )
		echo "Loi";
	header('location: QLDH.php');
	exit();
	}
mysqli_close($conn);
?>
