<?php 
	// check nếu ko phải admin thì chuyển về trang chủ
	include('checkdn.php');
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv=”Content-Type” content=”text/html; charset=UTF-8″/>
<title>trang admin</title>
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
			<ul>
			<li><a href="QLSP.php">Quản Lý Sản Phẩm</a></li>
			<li><a href="QLDH.php">Quản Lý Đơn Hàng</a></li>
			<li><a href="QLTV.php">Quản Lý USER</a></li>
			<li><a href="QLCM.php">Quản Lý Comment</a></li>
			<li><a href="TK.php">Thống Kê</a></li>
		</ul>
		</ul>
	</div>
	<div class="quanly">
		<table border="1" style="border-collapse: collapse;">
			<tr style="border: none">
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td style="border: 1px solid #000000; height: 35px; background: yellow; font-size: 15px; width: 150px"><a href="Themsp.php">Thêm Món</a></td>
			</tr>
			<tr>
				<th>STT</th>
				<th>Danh Mục</th>
				<th style="width: 200px;">Ảnh</th>
				<th>Tên Sản Phẩm</th>
				<th>Đơn Giá</th>
				<th>Trạng Thái:</th>
				<th>Sửa</th>
				<th>Xoá</th>
			</tr>
			
			
			
			<!--Hiển Thị danh sách từ csdl-->
			
			
			<?php
				include( "../config/connect.php" );
				
				// TÌM TỔNG SỐ RECORDS
				$result1 = mysqli_query($conn, 'select IdMon from mon');
				$total_records = mysqli_num_rows($result1);
		 
				// TÌM LIMIT VÀ CURRENT_PAGE
				$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
				$limit = 10;
		 
				// TÍNH TOÁN TOTAL_PAGE VÀ START
				// tổng số trang
				$total_page = ceil($total_records / $limit);
		 
				// Giới hạn current_page trong khoảng 1 đến total_page
				if ($current_page > $total_page){
					$current_page = $total_page;
				}
				else if ($current_page < 1){
					$current_page = 1;
				}
		 
				// Tìm Start
				$start = ($current_page - 1) * $limit;
				//thực hiện truy vấn
				$stt = 1;
				$result = mysqli_query( $conn, "select TenMenu, Anh, TenMon, Gia, IdMon, TinhTrang from menu, mon WHERE menu.IdMenu = mon.IdMenu ORDER BY IdMon DESC LIMIT $start, $limit" );
				//hàm fetch assoc trả về mảng data
				while ( $data = mysqli_fetch_assoc( $result ) )
				{
				echo 
				"<tr>
					<th>$stt</th>
					<th>$data[TenMenu]</th>
					<th style='width: 200px;'><img src='../image/image_sp/$data[Anh]' alt='anh' width='150px' height='100px'></th>
					<th>$data[TenMon]</th>
					<th>".number_format($data['Gia'])."</th>
					<th>$data[TinhTrang]</th>
					<th><a href='update.php?idsp=$data[IdMon]'>Sửa</a></th>
					<th><a href='xoasp.php?idsp=$data[IdMon]&&giatri=1' onclick='return hienthongbao();'>Xoá</a></th>
				</tr>";
					$stt++;
				}
			?>
			
			
			
		</table>
		<hr>
		 <div class="pagination" style="width: 300px; margin: auto">
           <?php 
            // PHẦN HIỂN THỊ PHÂN TRANG
 
            // nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
            if ($current_page > 1 && $total_page > 1){
                echo '<a href="QLSP.php?page='.($current_page-1).'">Prev</a> | ';
            }
 
            // Lặp khoảng giữa
            for ($i = 1; $i <= $total_page; $i++){
                // Nếu là trang hiện tại thì hiển thị thẻ span
                // ngược lại hiển thị thẻ a
                if ($i == $current_page){
                    echo '<span>'.$i.'</span> | ';
                }
                else{
                    echo '<a href="QLSP.php?page='.$i.'">'.$i.'</a> | ';
                }
            }
 
            // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
            if ($current_page < $total_page && $total_page > 1){
                echo '<a href="QLSP.php?page='.($current_page+1).'">Next</a> | ';
            }
           ?>
        </div>
	</div>
</body>
</html>