<?php 
session_start();
date_default_timezone_set("Asia/Bangkok");
$time = date('Y-m-d H:i:s');
$ten = $dc = $sdt = $loiten = $loidc = $loisdt = "";
$tongtien = $_GET['tong'];
if($tongtien < 1000)
{
	header('location: TrangChu.php');
}
if(isset($_POST['ok'])) {
	if(empty($_POST['txtten']))
		$loiten = "Xin vui lòng nhập họ tên";
	else $ten = $_POST['txtten'];
	if(empty($_POST['txtdc']))
		$loidc = "Xin vui lòng nhập địa chỉ";
	else $dc = $_POST['txtdc'];
	if((empty($_POST['txtsdt'])) || (!preg_match('/^(01[2689]|09)[0-9]{8}$/', $_POST['txtsdt'])))
		$loisdt = "Vui lòng nhập số điện thoại hợp lệ";
	else $sdt = $_POST['txtsdt'];
	
	if($ten && $dc && $sdt)
	{
		
		
		include('./config/connect.php');
		$query = mysqli_query($conn, "SELECT MAX(IdHd) FROM hoadon");
		$data = mysqli_fetch_assoc($query);
		// lấy id lớn nhất + 1 làm id mới;
		$idhd = $data['MAX(IdHd)'] + 1;
		
		// thêm ttin vào csdl bảng hoá đơn
		$themhd = mysqli_query($conn, "INSERT INTO hoadon (IdHd,HoTen,DiaChi,Sdt,TongTien,Ngay) VALUES ('$idhd','$ten','$dc','$sdt','$tongtien','$time')");
		if(!$themhd)
		{
			echo "Lỗi";
		}
		
		$x = array();
		$x = $_SESSION['cart'];
		unset($x['a']);
		foreach($x as $idmon => $sl) {
			// thêm idsp vào bảng chi tieest hd
			mysqli_query($conn, "INSERT INTO chitiethd (IdHd,IdMon,SoLuong) VALUES ('$idhd', '$idmon','$sl')");
		}
		echo '
		<div style="position: fixed; width: 100%; height: 100%; background: rgba(0,0,0,0.5 ">
		<div id="tb" style="background: rgba(0,255,147,1.00); width: 500px; height: 200px; position: fixed; top: 50%; left: 50%;transform: translate(-50%,-50%);"><p style ="color: green; margin: 20px">Đơn Hàng Đã Đặt Thành Công, Chúng Tôi Sẽ Liên Hệ Với Bạn Để Xác Nhận Đơn Hàng. Xin Cảm Ơn Quý Khách !!!<a href="./giohang/xoa.php">Trang Chủ</a></p></div></div>';
		// gửi email thông báo
		$to = "anhtoan.23.08.98@gmail.com";
		$subject = "Đơn Hàng Mói";
		$txt = "Bạn Vừa Có Một Đơn Đặt Hàng Mới Từ Khác Hàng '.$ten.' vui lòng kiểm tra";
		$headers  = "From: ngoc98toan@gmail.com \r\n";
		$headers .= "Content-type: text/html; charset = utf8mb4 \r\n";

		if(mail($to,$subject,$txt,$headers) == true )
			echo "đã gửi";
		else echo "lỗi";
		
		mysqli_close($conn);
	}
}
?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>CARD</title>
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="jquery-3.3.1.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
			include_once('./template/menu.php')
			?>
			
			<div class="main">
				<div class="title">
					<div class="titlel" style="width: 100%">
						<h4 style="text-indent: 10px">Thông Tin KH</h4>
					</div>
				</div>
				<hr>
				
				<table class="table table-striped">
				<form method="post" action="#">
					<tr>
						<th>Họ Tên: </th>
						<td><input type="text" size="25" name="txtten"></td>
						<td style="color: red"><?php echo $loiten ?></td>
					</tr>
					<tr>
						<th>Địa Chỉ: </th>
						<td><textarea cols="27" rows="4" style="padding: 3px" name="txtdc"></textarea></td>
						<td style="color: red"><?php echo $loidc ?></td>
					</tr>
					<tr>
						<th>Số Điện Thoại: </th>
						<td><input type="text" size="25" name="txtsdt"></td>
						<td style="color: red"><?php echo $loisdt ?></td>
					</tr>
					<tr>
						<th><input type="submit" class="btn-buy" value="Xác Nhận" name="ok" id="xn"></th>
						
					</tr>
				</form>
				</table>
				
			</div>
			<div style="clear: both"></div>
		</div>
		
	</div>
	
</body>
</html>