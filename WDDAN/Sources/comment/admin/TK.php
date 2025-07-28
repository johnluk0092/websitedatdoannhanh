<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv=”Content-Type” content=”text/html; charset=UTF-8″/>
<title>Quản Lý Đơn Hàng</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript">
	function hienthongbao(){
		if(confirm("Bạn có muốn xoá dòng dữ liệu này không?"))
			return true;
		else return false;
	}
</script>
<script>
	$(document).ready(function( ){
		$("#thang").keyup(function(){
			$.post("xulytk.php", {thang: $("#thang").val(), nam: $("#nam").val() }, function(data){$("#inra").html(data);});
		});
		$("#nam").keyup(function(){
			$.post("xulytk.php", {thang: $("#thang").val(), nam: $("#nam").val() }, function(data){$("#inra").html(data);});
		});
		$.post("xulytk.php", {thang: $("#thang").val(), nam: $("#nam").val() }, function(data){$("#inra").html(data);});
			
});
</script>
<style>
	a {
		text-decoration: none; color: aliceblue; text-align: center
	}
	a:hover {
		text-decoration: underline
	}
	.trangadmin {
		width: 80%; height: 60px; background:  #36AFF3; margin: auto; text-align: center; line-height: 60px; font-size: 20px; color: aliceblue
	}
	.quanly {
		width: 80%; height: auto;  margin: 10px auto; 
	}
	.quanly table {
		width: 100%;
	}
	.quanly table th {
		background: rgba(0,0,0,0.40) color: aliceblue; margin: 3px; padding: 5px;
	}
	.quanly a {
		color: #0014F9
	} 
	.quanly table td {
		padding: 5px
	}
	ul {
		margin: 10px 300px;
	}
	a {
		color: rgba(0,21,255,1.00); text-align: center
	}
	.menu {
		width: 80%; height: 50px; margin: 10px auto; background: #36AFF3
	}
	.menu ul {
		margin: 0px; padding: 0px; list-style: none; 
	}
	.menu ul li {
		float: left; color: aliceblue; width: 200px; line-height: 50px; text-align: center
	}
	.menu ul li a {
		text-decoration: none; color: aliceblue; font-size: 20px
	}
	.menu ul li a:hover {
		text-decoration: underline
	}
	.menu ul li:hover {
		background: rgba(66,255,0,1.00);
	}.menu ul li:hover a {
		color: red
	}
</style>
</head>

<body>
	<div class="trangadmin"><a href="dangxuat.php">Đăng Xuất</a></div>
	<div class="menu">
		<ul>
			<li><a href="QLSP.php">Quản Lý Sản Phẩm</a></li>
			<li><a href="QLDH.php">Quản Lý Đơn Hàng</a></li>
			<li><a href="QLTV.php">Quản Lý USER</a></li>
			<li><a href="QLCM.php">Quản Lý Comment</a></li>
			<li><a href="TK.php">Thống Kê</a></li>
		</ul>
	</div>
	<div class="quanly">
		<h2>Thống Kê tháng: <input type="text" value="<?php echo date('m') ?>" size=1 id='thang'> Năm: <input type="text" value="<?php echo date('Y') ?>" size=5 id='nam'></h2>
		<hr>
		<div id="inra">
		
		</div>
		
		
		
		<!--SELECT IdMon, SoLuong, Ngay FROM chitiethd, hoadon WHERE SoLuong = (SELECT MAX(SoLuong) FROM chitiethd) AND hoadon.IdHd = chitiethd.IdHd AND Ngay BETWEEN '2018/12/01' AND '2018/12/31'-->
	</div>
</body>
</html>