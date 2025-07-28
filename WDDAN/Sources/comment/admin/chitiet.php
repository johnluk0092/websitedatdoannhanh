<?php 
	// check nếu ko phải admin thì chuyển về trang chủ
	include('checkdn.php');
	// lấy id hoá đơn từ địa chỉ
	$idhd = $_GET['idhd'];
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv=”Content-Type” content=”text/html; charset=UTF-8″/>
<title>Chi Tiết Đơn Hàng</title>
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
		</ul>
	</div>
	
	
	<?php
	include("../config/connect.php");
	$querry = mysqli_query($conn, "SELECT * FROM hoadon WHERE IdHd = $idhd");
	mysqli_close($conn);
	$data = mysqli_fetch_assoc($querry);
	echo '
	<div class="tt" style="width: 80%; border: 1px solid rgba(50,255,0,1.00); margin: auto; text-indent: 30px">
		<p>Đơn Hàng: <b style="color: rgba(0,12,151,1.00)">#'.$data['IdHd'].'</b></p>
		<p>Ngày: <b style="color: rgba(0,12,151,1.00)">'.$data['Ngay'].'</b></p>
		<p>Họ Tên KH: <b style="color: rgba(0,12,151,1.00)">'.$data['HoTen'].'</b></p>
		<p>Điện Thoại: <b style="color: rgba(0,12,151,1.00)">'.$data['Sdt'].'</b></p>
		<p>Địa chỉ: <b style="color: rgba(0,12,151,1.00)">'.$data['DiaChi'].'</b></p>
	</div>';
	?>
	
	<div class="quanly">
		<table class="table table-striped">
			  <thead>
				<tr>
				  <th scope="col">STT</th>
				  <th scope="col">Tên SP</th>
				  <th scope="col">Số Lượng</th>
				  <th scope="col">Đơn Giá</th>
				  <th scope="col">Thành Tiền</th>
				</tr>
			  </thead>
			  <tbody>
			  <?php
				include("../config/connect.php");
				$stt = 1;
				$querry1 = mysqli_query($conn, "SELECT IdMon,SoLuong FROM chitiethd WHERE IdHd = $idhd");
				while($data1 = mysqli_fetch_assoc($querry1)){
					$idmon = $data1['IdMon'];
					$query2 = mysqli_query($conn, "SELECT TenMon,Gia FROM mon WHERE IdMon = $idmon");
					$data2  = mysqli_fetch_assoc($query2);
				  echo '
					<tr>
					  <th scope="row">#'.$stt.'</th>
					  <td>'.$data2['TenMon'].'</td>
					   <td>'.$data1['SoLuong'].'</td>
					  <td>'.number_format($data2['Gia']).'</td>
					  <td>'.number_format($data2['Gia']*$data1['SoLuong']).'</td>	  
					</tr>';
					$stt ++;
				}
				echo '<tr>
					  <th></th>
					  <td></td>
					  <td><b>Tổng Tiền</b></td>
					  <td></td>
					  <td><b><i style="color: red">'.$data['TongTien'].'</i></b></td>	  
					</tr>';
				mysqli_close($conn);
			  ?>
			  </tbody>
		</table>
	</div>
	
	
	
</body>
</html>