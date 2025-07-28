<?php
	// check nếu ko phải admin thì chuyển về trang chủ
include('checkdn.php');
$loi = array();
$tenanh = $monan = $gia = $trangthai = null;
$loi['upanh'] = $loi['monan'] = $loi['gia'] = $loi['trangthai'] = null;
if(isset($_POST['ok']))
{
	$id = $_POST['danhmuc'];
	// up ảnh 
	if($_FILES["anh"]["name"] != null)
	 {
		 move_uploaded_file($_FILES["anh"]["tmp_name"], "../image/image_sp/".$_FILES['anh']['name']);
		 $tenanh = $_FILES['anh']['name'];
	 }
	else $loi['upanh'] = "<p>* Bạn Chưa Chọn Ảnh<p>";
	//------------
	if(empty($_POST['tenma']))
		$loi['monan']  = "<p>* Bạn Chưa Nhập Tên Món<p>";
	else $monan = $_POST['tenma'];
	//------------
	if(empty($_POST['gia']) || !is_numeric($_POST['gia']))
		$loi['gia']  = "<p>* Bạn Chưa Nhập Giá Tiền Hoặc Sai Định Dạng<p>";
	else $gia = $_POST['gia'];
	//----------------
	if(empty($_POST['trangthai']))
		$loi['trangthai']  = "<p>* Bạn Chưa Nhập Trạng Thái<p>";
	else $trangthai = $_POST['trangthai'];
	//
	//-----------------
	//-----------------
	if($tenanh && $monan && $gia && $trangthai)
	 {
		 //mở kết nối csdl
		 include("../config/connect.php");
	
		 // truy vấn thêm DL vào csdl
		 
		 $query = mysqli_query($conn,"INSERT INTO mon (IdMenu, Anh, TenMon,	Gia, TinhTrang) 
		 VALUES ('$id','$tenanh','$monan','$gia', '$trangthai' )");
		 if(!$query)
			 echo"thêm DL Lỗi";
		 else header("location: chuyentrang.php");
		 exit();
		 //đóng kết nỗi csdl
		  mysqli_close($conn);
		 
		
	 }
	
}
?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv=”Content-Type” content=”text/html; charset=UTF-8″/>
<title>Thêm Sản Phẩm Mới</title>
<style>
		#vietcss {
		color: #FF0004; border: none; background: #FFF; 
	}
	 @keyframes my { 
	 0% { color: #1128E3;  } 
	 50% { color: #FF0000;  }
	 80% {color: #08FF3B}
	 100% { color: #F8CD0A;  } 
 } 
 .test {
         background:#fff;
         font-size:18px;
         font-weight:bold;
	 	animation: my 7s infinite;
	 width: 100%; margin: auto; text-align: center
}
	#conten {
		width: 70%; margin: 20px auto; border: 1px solid #000000
	}
	#conten table td {
		padding: 5px
	}
	p {
		color: rgba(255,0,4,1.00); font-style: italic
	}
	.trangadmin {
		width: 80%; height: 60px; background:  #36AFF3; margin: auto; text-align: center; line-height: 60px; font-size: 20px; color: aliceblue }
	
</style>
</head>

<body>
	<div class="trangadmin"><a href="QLSP.php">Chức Năng Thêm Sản Phẩm</a></div>
<div id="conten">
	<form method="post" action="#" enctype="multipart/form-data">
	<table>

		<tr>
		<th>
		<p class="test">
		<!--// lấy time hiện tại-->
		<?php 
		date_default_timezone_set("Asia/Ho_Chi_Minh");
		echo date("d-m-Y H:i:s"),'<br>';?></p>
		</th>
		</tr>
		<tr>
			<td>Danh Mục</td>
			<td>
				<select name="danhmuc">
					<?php
						 include("../config/connect.php");
						//thực hiện truy vấn
						 $result = mysqli_query($conn, "Select * from menu");
						//hàm fetch assoc trả về mảng data
						 while($data = mysqli_fetch_assoc ( $result ))
						 {	
							if($id == $data[IdMenu])
							 	echo ("<option selected='selected' value='$data[IdMenu]'>$data[TenMenu]</option>");
							 else
								 echo ("<option value='$data[IdMenu]'>$data[TenMenu]</option>");
								 
			
						 }
						mysqli_close($conn);
					?>
				
				</select>
					
			</td>
		</tr>
		<tr>
			<td>upload ảnh mô tả</td>
			<td><input type="file" name="anh"></td>
			<td><?php echo $loi['upanh'] ?></td>
		</tr>
		<tr>
			<td>Tên Món Ăn</td>
			<td><input type="text" name="tenma"></td>
			<td><?php echo $loi['monan'] ?></td>
		</tr>
		<tr>
			<td>Giá:</td>
			<td><input type="text" name="gia"></td>
			<td><?php echo $loi['gia'] ?></td>
		</tr>
		<tr>
			<td>Trạng Thái:</td>
			<td><input type="text" name="trangthai"></td>
			<td><?php echo $loi['trangthai'] ?></td>
		</tr>
		
		<tr>
			<td></td>
			<td style="height: 28px;"><input type="submit" value="ADD" name="ok"></td>
		</tr>
	</table>
	</form>
</div>
</body>
</html>