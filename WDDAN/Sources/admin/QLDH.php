<?php 
	// check nếu ko phải admin thì chuyển về trang chủ
	include('checkdn.php');
?>
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
		<table class="table table-striped">
			  <thead>
				<tr>
				  <th scope="col">Đơn Hàng</th>
				  <th scope="col">Ngày</th>
				  <th scope="col">Họ Tên</th>
				  <th scope="col">Tổng Tiền</th>
				  <th scope="col">Trạng Thái</th>
				  <th scope="col">Xem Đơn Hàng</th>
				  <th scope="col">Cập nhật trạng thái</th>
				  <th scope="col">Xoá Đơn Hàng</th>
				</tr>
			  </thead>
			  <tbody>
			  <?php
				 include('../config/connect.php');
				  $result = mysqli_query($conn, "SELECT * FROM hoadon ORDER BY IdHd DESC");
				  while($data = mysqli_fetch_assoc($result)) {
						if ($data['TrangThai'] == 0){
							$tt = "<span style='color: red'>✖ Đơn Hàng Chưa Thanh Toán</span>";
						}
						if ($data['TrangThai'] == 1){
							$tt = "✔  Đã Thanh Toán";
						}
						echo '<tr>
						  <th scope="row">#'.$data['IdHd'].'</th>
						  <td>'.$data['Ngay'].'</td>
						  <td>'.$data['HoTen'].'</td>
						  <td>'.number_format($data['TongTien']).'</td>
						  <td>'.$tt.'</td>
						  <td><a href="chitiet.php?idhd='.$data['IdHd'].'">Xem</a></td> 
						  <td><a href="xoasp.php?idhd='.$data['IdHd'].'&&giatri=2&&trangthai='.$data['TrangThai'].'">Cập Nhật</a></td> 
						  <td><a href="xoasp.php?idhd='.$data['IdHd'].'&&giatri=3" onclick="return hienthongbao();">Xoá</a></td> 

						</tr>';
				  }
			?>
				
			  </tbody>
		</table>
	</div>
</body>
</html>