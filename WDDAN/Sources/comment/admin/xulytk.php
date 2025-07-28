<?php
if(is_numeric($_POST['thang']))
	$thang = $_POST['thang']; 
else $thang = date('m');
if(is_numeric($_POST['nam']))
	$nam = $_POST['nam']; 
else $nam = date('y');
include('../config/connect.php');

// lấy ra sp bán chạy nhất theo tháng, năm
$query = mysqli_query($conn,"SELECT IdMon, SoLuong, Ngay FROM chitiethd, hoadon WHERE SoLuong = (SELECT MAX(SoLuong) FROM chitiethd) AND hoadon.IdHd = chitiethd.IdHd AND Ngay BETWEEN '$nam/$thang/01' AND '$nam/$thang/31' limit 1");
// lấy ra sp Tổng tiền thu đc theo tháng, năm
$query3 = mysqli_query($conn,"SELECT SUM(TongTien) AS TT FROM hoadon WHERE Ngay BETWEEN '$nam/$thang/01' AND '$nam/$thang/31'");
foreach($query3 as $key => $value);
while($data = mysqli_fetch_assoc($query))
{

	$query2 = mysqli_query($conn, "SELECT TenMon FROM mon WHERE IdMon = $data[IdMon]");
	while($data2 = mysqli_fetch_assoc($query2)) {
		echo '
		<h2>Sản Phẩm Bán Chạy Nhất: '.$data2['TenMon'].'</h2>
		<h3>Số lượng bán được : '.$data['SoLuong'].'</h3>
		<hr>
		<h2>Doanh Thu Tháng '.$thang.': <span style="color: red">'.number_format($value['TT']).'</span></h2>
		
		';
	}
}

 ?>