<?php 
	// check nếu ko phải admin thì chuyển về trang chủ
	include('checkdn.php');
	$id = $_GET['idsp'];
	error_reporting(E_ERROR | E_PARSE);
	// lấy dữ liệu người dùng nhập vào
if($_POST['ok']) {
		 if($_FILES['anh']['error'] > 0)
		 {
			 $image = "none";
		 }
		 else $image = $_FILES['anh']['name'];
		 if(empty($_POST['tensp']))
		 {
			 $loi['tensp'] = "Bạn Chưa Nhập Tên Sản Phẩm";
		 }
		 else $tensp = $_POST['tensp'];
		 if(empty($_POST['gia']))
		 {
			 $loi['gia'] = "Bạn Chưa Nhập Giá Tiền";
		 }
		 else $gia = $_POST['gia'];
		 if(empty($_POST['tt']))
		 {
			 $loi['tt'] = "Bạn Chưa Nhập Trạng Thái";
		 }
		 else $tt = $_POST['tt'];
		 //
		 //
		 // update Dữ liệu mới trong csdl
		 if($image && $tensp && $gia && $tt)
		 {
			 include_once('../config/connect.php');
			 if($image == "none")
				 mysqli_query($conn, "UPDATE mon SET TenMon = '$tensp', Gia = '$gia', TinhTrang ='$tt' where IdMon = $id");
			 else {
				  mysqli_query($conn, "UPDATE mon SET TenMon = '$tensp', Gia = '$gia', TinhTrang ='$tt', Anh ='$image' where IdMon = $id");
				  move_uploaded_file($_FILES["anh"]["tmp_name"], "../image/image_sp/".$_FILES['anh']['name']);
			 }
			 header('location: QLSP.php');
			 exit();		 }	
 }



	include_once('../config/connect.php');
	$loi = array();
	$tensp = $gia = $tt = $loi['tensp'] = $loi['gia'] = $loi['tt'] = null;
	$result = mysqli_query( $conn, "Select * from mon where IdMon = $id" );
		foreach($result as $key => $value);
?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>UpDate SP</title>
	<style>
	a {
		text-decoration: none; color: aliceblue; text-align: center
	}
	a:hover {
		text-decoration: underline
	}
	.trangadmin {
		width: 80%; height: 60px; background:  #36AFF3; margin: auto; text-align: center; line-height: 60px; font-size: 20px; color: rgba(0,0,0,1.00)
	}
		.update {
			border: 1px solid rgba(0,0,0,1.00); margin:10px auto; width: 80%;
		}
		.tieude {
			float: left; width: 200px; margin: 15px
		}
		.noidung {
			float: left; width: 300px; margin: 15px
		}
		h3 {
			margin: 0px; padding: 0px
		}
		p{
			color: red; font-style: italic;
		}
</style>
</head>

<body>
	<div class="trangadmin" style="color: 
	rgba(0,0,0,1.00)"><a href="QLSP.php">HELLO ADMIN</a>
	</div>
		<div class="update">
		<form action="#" method="post" enctype="multipart/form-data">
			<h2 style="margin-left: 20px;">Chỉnh Sửa Sản Phẩmt</h2>

				<div class="tieude"><h3>Danh Mục: </h3></div>
				<div class="noidung">
					<select name="select">
						<option value="1" <?php if($value['IdMenu'] == 1) { echo "selected = 'selected'"; } ?>>Cơm Set</option>
						<option value="2" <?php if($value['IdMenu'] == 2) { echo "selected = 'selected'"; } ?>>Giải Khát</option>
						<option value="3" <?php if($value['IdMenu'] == 3) { echo "selected = 'selected'"; } ?>>Korean Food</option>
						<option value="4" <?php if($value['IdMenu'] == 4) { echo "selected = 'selected'"; } ?>>Phở - Mì</option>
						<option value="5" <?php if($value['IdMenu'] == 5) { echo "selected = 'selected'"; } ?>>Đồ Ăn Vặt</option>
						<option value="6" <?php if($value['IdMenu'] == 6) { echo "selected = 'selected'"; } ?>>Combo95k</option>
					</select>
				</div>
				<div style="clear: both"></div>

				<div class="tieude"><h3>Ảnh Cũ: </h3></div>
				<div class="noidung">
					<?php
					echo '<img src="../image/image_sp/'.$value['Anh'].'" width="150px" height="100px">'
					?>
				</div>
				<div style="clear: both"></div>

				<div class="tieude"><h3>Ảnh Mới: </h3></div>
				<div class="noidung">
					<input type="file" name="anh">
				</div>
				<div style="clear: both"></div>

				<div class="tieude"><h3>Tên Sản Phẩm: </h3></div>
				<div class="noidung">
					<?php
					echo '<textarea name="tensp" rows="3" cols="30">'.$value['TenMon'].'</textarea>'
					?>
					<p><?php echo $loi['tensp'] ?> </p>
				</div>
				<div style="clear: both"></div>

				<div class="tieude"><h3>Đơn Giá: </h3></div>
				<div class="noidung">
					<?php
					echo '<input type="text" name="gia" value="'.$value['Gia'].'">'
					?>
					<p><?php echo $loi['gia'] ?> </p>
				</div>
				<div style="clear: both"></div>
				<div class="tieude"><h3>Trạng Thái: </h3></div>
				<div class="noidung">
					<?php
					echo '<input type="text" name="tt" value="'.$value['TinhTrang'].'">'
					?>
					<p><?php echo $loi['tt'] ?> </p>
				</div>
				<div style="clear: both"></div>
				<div class="noidung">
					<input type="submit" name="ok" style="margin: 20px; width: 50px" value="OK">
				</div>
				<div style="clear: both"></div>
		</form>
		</div>
</body>
</head>
</html>
			
			
		
		
		