
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
			  	  <th scope="col">STT</th>
				  <th scope="col">Tên Người Dùng</th>
				  <th scope="col">Nội Dung Comment</th>
				  <th scope="col">Thời Gian</th>
				  <th scope="col">Xoá</th>
				</tr>
			  </thead>
			  <tbody>
			  	<?php
				
			  	  	$stt = 1;
					include("../config/connect.php");
					$query = mysqli_query($conn, "SELECT * FROM comment ORDER BY IdCm DESC");
				  	mysqli_close($conn);
				  	while($data = mysqli_fetch_assoc($query))
					{
					echo "
				<tr>
				  <th scope='row'>#$stt</th>
				  <td>$data[TenTk]</td>
				  <td>$data[NoiDungCm]</td>
				  <td>$data[Time]</td>  
				  <td><a href='xlcm.php?idcm=$data[IdCm]' onclick='return hienthongbao();'>Xoá</a></td>
				  
				</tr>";
				$stt ++;
				}
				?>
				
			  </tbody>
		</table>
	</div>
</body>
</html>