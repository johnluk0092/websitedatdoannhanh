<?php
	session_start();
	// mở kêt nối csdl, lấy ra cột trong bảng Mon
	include("./config/connect.php");
	// lấy id chuyên mục
	$id = isset($_GET['id']) ? $_GET['id'] : '';
	// check user
	if(isset($_SESSION['username'])) {
		$Ten = $_SESSION['username'];
		$truyvan = mysqli_query($conn, "SELECT Level FROM user WHERE Ten = '$Ten'");
		foreach ($truyvan as $giatri);
		if($giatri['Level'] == 1 ) {
			$_SESSION['Level'] = 1;
			header('location: admin/QLDH.php');
		}
		
	}
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>fastfood</title>
<link rel="stylesheet" type="text/css" href="style.css">
<script src="jquery-3.3.1.min.js"></script>
<script src="xulyjs.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
	@keyframes doimau {
		0% {color: #3AFF00}
		30% {color: #00FCE8 }
		70% {color: #FF0000}
		100% {color: #000DFF}
	}	
	@keyframes doimau1 {
		0% {color: rgba(0,0,0,1.00)}
		20% {color: rgba(255,255,255,1.00) }
		40% {color: rgba(0,253,186,1.00)}
		60% {color: rgba(18,0,255,1.00)}
		80% {color: rgba(255,0,4,1.00)}
		100% {color: rgba(255,245,0,1.00)}
	}	
	h3 {
		animation: doimau 6s infinite; margin: 0px; padding: 0px;
	}
	h4 {
		text-align: center; font-family: Comic Sans MS; animation: doimau1 15s infinite;
	}
	.di {
		top: 0px; position: fixed; width: 23.5%;  min-width: 250px;
	}
	#song {
		width: 100%; height: 120px;  margin: 0px; background: url(image/honuoc.png); padding: 0px;
	}
</style>
</head>

<body>
	<div class="backgr">
		<?php 
		// include header
		include_once('./template/header.php');
		?>
		<div class="conten">
			<?php 
			//include menu
			include_once('./template/menu.php')
			?>
			<div class="main">
				<div class="slide fade">
					<img src="./image/andras-malmos-745147-unsplash.jpg" width ="100%" height="100%">
					<div class="next">
						<button class="btn" onclick = "plusDivs(-1)">&#10094;</button>
						<button class="btn" id="btn1" onclick = "plusDivs(1)">&#10095;</button>
					</div>
				</div>
				<div class="slide fade">
					<img src="./image/robin-stickel-82145-unsplash.jpg" width ="100%" height="100%">
					<div class="next">
						<button class="btn" onclick = "plusDivs(-1)">&#10094;</button>
						<button class="btn" id="btn1" onclick = "plusDivs(1)">&#10095;</button>
					</div>
				</div>
				<div class="slide fade">
					<img src="./image/fancycrave-458022-unsplash.jpg" width ="100%" height="100%">
					<div class="next">
						<button class="btn" onclick = "plusDivs(-1)">&#10094;</button>
						<button class="btn" id="btn1" onclick = "plusDivs(1)">&#10095;</button>
					</div>
				</div>
				<hr>
				<div class="dot">
					<ul>
						<li></li>
						<li></li>
						<li></li>
					</ul>
				</div>
				
	
				<hr>
			
			
			
				<div class="title">
					<div class="titlel">
						<h4>Sản Phẩm mới</h4>
					</div>
					<div class="titler"></div>
				</div>
				
				
				<?php
				//////////////////////////
				// in ra list san pham //
				//////////////////////// 
				
				
				if($id > 0)
				{	
			
					if(isset($_GET['begin']))
					{
						$vitribv = $_GET['begin'];
					}
					else $vitribv = 0;
					$hienthi = 6;
					$result = mysqli_query( $conn, "Select * from mon where IdMenu = $id order by IdMon DESC limit $vitribv, $hienthi" );
					if ( !$result )
						echo "query loi";
					
					//hàm fetch assoc trả về mảng data
					while ( $data = mysqli_fetch_assoc( $result ) ) {
						echo '
					<div class="sanpham">
						<div class="anh">
							<img src="image/image_sp/' . $data[ 'Anh' ] . '" width="200px" height="200px" style="border-radius: 16px">
							<h5 class="tieude">' . $data[ 'TenMon' ] . '</h5>
							<div class="chu"><h2>Giá: ' . number_format($data[ 'Gia' ]) . '</h2><hr><p>Tình Trạng: <b>' . $data[ 'TinhTrang' ] . '</b></p>
							<hr>
								<a href="chitietsp.php?id='.$data['IdMon'].'"><input type="button" value="Chi Tiết Sản Phẩm" style="cursor: pointer" class="btn-buy"></a>
							</div>
						</div>

					</div>';
					
					}
				}
				else {
					$result = mysqli_query( $conn, "Select * from mon ORDER BY RAND() limit 6" );
					if ( !$result )
						echo "query loi";
					//hàm fetch assoc trả về mảng data
					while ( $data = mysqli_fetch_assoc( $result ) ) {
						echo '
					<div class="sanpham">
						<div class="anh">
							<img src="image/image_sp/' . $data[ 'Anh' ] . '" width="200px" height="200px" style="border-radius: 16px">
							<h5 class="tieude">' . $data[ 'TenMon' ] . '</h5>
							<div class="chu"><h2>Giá: ' . number_format($data[ 'Gia' ]) . '</h2><hr><p>Tình Trạng: <b>' . $data[ 'TinhTrang' ] . '</b></p>
							<hr>
							<a href="chitietsp.php?id='.$data['IdMon'].'"><input type="button" value="Chi Tiết Sản Phẩm" style="cursor: pointer" class="btn-buy"></a>
							</div>
						</div>

					</div>';
				}
			}
				//////////////////////////
				// in ra list san pham //
				////////////////////////  
				?>
				<div style="clear: both;"></div>
				<hr>
				<div class="chiatrang">
				
				<?php
					//phan chia trang web
					//set số sản phẩm hiện thị trên 1 trang (6sp)
					
					
					if($id > 0)
					{
						$dem = mysqli_query( $conn, "Select * from mon where IdMenu = $id");
						if ( !$dem )
							echo "query loi";
						// đếm tổng sản phẩm theo ID
						$soluongsp = mysqli_num_rows($dem);
						// tính số trang phải chia (làm tròn lên bằng cei)
						$sotrang = ceil($soluongsp / 6);
						// in ra số trang và truyền vị trí vào link 
						echo"<ul>";
						//tính số trang hiện tại:
						$now = ($vitribv / $hienthi) + 1;
						// tính vị  trí lùi trang (vị trí = vị trí đầu tiên trang tiếp - số sp hiển thị)
						if($now != 1)
						{
							$sau = $vitribv - $hienthi;
							echo "<li><a href='TrangChu.php?id=$id&begin=$sau'>Sau</a></li>";
						}
						for($i = 1; $i <= $sotrang; $i++) {
							$begin = ($i - 1) * $hienthi;
							if($i == $now)
								echo "<li><a href='TrangChu.php?id=$id&begin=$begin' style='color: red'>$i</a></li>";
							else echo "<li><a href='TrangChu.php?id=$id&begin=$begin'>$i</a></li>";
						}
						if($now != $sotrang)
						{
							$truoc = $vitribv + $hienthi;
							echo "<li style='width:50px'><a href='TrangChu.php?id=$id&begin=$truoc'>Trước</a></li>";
						}
						echo"</ul>";
						
						
					}
					else echo '<div id="song">
									<marquee direction="right" scrollamount="3" style="margin-top: 5px"><img src="image/may1.png"></marquee>
									<marquee behavior="scroll" direction="right" scrollamount="5" style="margin-top: 0px"><img src="image/may2.png"></marquee>
							 </div>';
												
					//end phần phân chia
					
				?>
			
					
				</div>
				<hr>
				
				
				
				
				
				

				<div class="title">
					<div class="titlel">
						<h4>Sản phẩm bán chạy</h4>
					</div>
					<div class="titler"></div>
				</div>
				<hr>
				<div class="row">
					<ul>
						
						<?php
						/// in random list sản pham khac /////
						if($id > 0)
						{
							$result2 = mysqli_query( $conn, "SELECT * FROM mon where IdMenu = $id ORDER BY RAND() limit 4" );
							if ( !$result2 )
								echo "query loi";
							//hàm fetch assoc trả về mảng data
							while ( $data2 = mysqli_fetch_assoc( $result2 ) ) {
							echo'
							<li><img src="image/image_sp/'.$data2['Anh'].'" width="99%" height="120px"><p><a href="chitietsp.php?id=spkhac">'.$data2['TenMon'].'</a></p></li>
							';
							}
						}
						else {
							$result2 = mysqli_query( $conn, "SELECT * FROM mon ORDER BY RAND() limit 4" );
							if ( !$result2 )
								echo "query loi";
							//hàm fetch assoc trả về mảng data
							while ( $data2 = mysqli_fetch_assoc( $result2 ) ) {
							echo'
							<li><img src="image/image_sp/'.$data2['Anh'].'" width="99%" height="120px"><p><a href="chitietsp.php?id='.$data2['IdMon'].'">'.$data2['TenMon'].'</a></p></li>
							';
							}
						}
						mysqli_close($conn);
						///----------------------------////
						?>
						
					</ul>
				</div>
				
			</div>
		</div>
		<!--login signup-->

		<?php include_once('./dangky_dangnhap/formdk_dn.php') ?>
		<!--footer-->
		<?php include_once('./template/footer.php') ?>
	</div>

</body>
</html>
