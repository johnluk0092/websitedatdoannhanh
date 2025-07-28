<?php 
	session_start();
	$sl = 1;
	$idsp = isset($_GET['idsp']) ?  $_GET['idsp'] : ""; 	
	$_SESSION['cart'][$idsp] = $sl;	
	$dem = 1;
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Chi Tiết Đơn Hàng</title>
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="jquery-3.3.1.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script>
	$(document).ready(function(){
		$(".select").change(function(){
			$.post("./giohang/xulygiohang.php", {sl: $(this).val(), idsp : $(this).attr("data-idsp")}, function(data){
				window.location.replace("giohang.php?idsp=a<?php $idsp ?>");
			})
		});
		// xử lý xoá sp
		$(".xoa").click(function(){
			$.post("./giohang/xoasp.php", {idsp: $(this).attr("data-idxoa")}, function(data){
				window.location.replace("giohang.php?idsp=a<?php $idsp ?>");
			})
		})
	});
</script>
<style>
@keyframes doimau {
		0% {color: #3AFF00}
		30% {color: #00FCE8 }
		70% {color: #FF0000}
		100% {color: #000DFF}
	}	
	h3 {
		animation: doimau 6s infinite; margin: 0px; padding: 0px;
	}	
	
</style>
</head>
<body>
	<div class="backgr">
		<?php 
		// include header
		include_once('./template/header.php')
		?>
		<div class="conten">
			<?php 
			//include menu
			include_once('./template/menu.php');
			?>
			
			<div class="main">
				<div class="title">
					<div class="titlel" style="width: 100%">
						<h4 style="text-indent: 10px">Chi Tiết Đơn Hàng</h4>
					</div>
				</div>
				<hr>
				<div class="container" style="width: 100%">
				  <table class="table table-striped">
					  <thead>
						<tr>
						  <th scope="col">STT</th>
						  <th scope="col">Tên</th>
						  <th scope="col">Đơn Giá</th>
						  <th scope="col">Số Lượng</th>
						  <th scope="col">Thành Tiền</th>
						  <th scope="col">Xoá</th>
						</tr>
					  </thead>
					  <tbody>
					<?php
						include("./config/connect.php");
							foreach($_SESSION['cart'] as $idsp => $sl)
							{
								$arr[]="'".$idsp."'";
							}
							$string = implode(",",$arr);
							$query = mysqli_query($conn, "SELECT IdMon, TenMon, Gia FROM mon WHERE IdMon in ($string)");
							mysqli_close($conn);
							$tong = 0;
							while($data = mysqli_fetch_assoc($query)){
							echo '<tr>
							  <th scope="row">'.$dem.'</th>
							  <td>'.$data['TenMon'].'</td>
							  <td>'.number_format($data['Gia']).' vnd</td>
							  <td><select class="select" data-idsp="'.$data['IdMon'].'">';
							  		$sl = $_SESSION['cart'][$data['IdMon']];
									for($i = 1; $i <= 100; $i++)
									{
										if($i == $sl)
											echo "<option value='$i' selected ='selected'>$i</option>";
										else echo "<option value='$i'>$i</option>";
									}
							
							 echo' </select></td>
							  <td>'.number_format($sl*$data['Gia']).' vnd</td>
							  <td><a href="#" class="xoa" data-idxoa="'.$data['IdMon'].'">Xoá</a></td>
							</tr>';
							$tong = $tong + ($sl * $data['Gia']);
							$dem ++;
							}
							echo '
							<tr>
								<td></td>
								<td><b>Tổng Tiền:</b></td>
								<td></td>
								<td></td>
								<td><b>'.number_format($tong).' vnd</b></td>
								<td></td>
					 		</tr>
					  	</tbody>
					</table>
					<a href="ttinkh.php?tong='.$tong.'" class="btn-buy">Thanh Toán</a>
					<a href="TrangChu.php" class="btn-buy">Tiếp Tục Mua</a>
					<a href="./giohang/xoa.php" class="btn-buy">Xoá Tất Cả Sản Phẩm</a>';
					
						 
							  	
					 ?>
				</div>
			</div>
			<div style="clear: both"></div>
		</div>
	</div>
</body>
</html>