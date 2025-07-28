<?php 
$tk = "";
$tk = $_POST['tk']
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>fastfood</title>
<link rel="stylesheet" type="text/css" href="style.css">
<script src="jquery-3.3.1.min.js"></script>
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
						<h4 style="text-indent: 10px">Tìm Kiếm SP</h4>
					</div>
				</div>
				<hr>
				<?php
				include('./config/connect.php');
				$query = mysqli_query($conn,"SELECT * FROM mon WHERE TenMon LIKE '%$tk%'");
				mysqli_close($conn);
				while($data = mysqli_fetch_assoc($query))
				{
				echo '
				<div class="sanpham">
					<div class="anh">
						<img src="./image/image_sp/' . $data[ 'Anh' ] . '" width="200px" height="200px" style="border-radius: 16px">
						<h5 class="tieude">'.$data['TenMon'].'</h5>
						<div class="chu"><h2>Giá: '.$data['Gia'].'</h2><hr><p>Trạng Thái: <b>'.$data['TinhTrang'].'</b></p>
						<hr>
						<a href="./chitietsp.php?id='.$data['IdMon'].'"><input type="button" value="Chi Tiết Sản Phẩm" style="cursor: pointer" class="btn-buy"></a>
						</div>
					</div>
				</div>';
				}
				?>
				
			</div>
			<div style="clear: both"></div>
		</div>
		<?php include_once('./template/footer.php') ?>
	</div>
<script>
//cuộn chuột
			
		    var y = document.getElementsByClassName("menulef");
			window.addEventListener("scroll",function(){
				console.log(window.pageYOffset);
				
				if(window.pageYOffset > 175 && window.pageYOffset < 4729)
					y[0].classList.add("di");
				else 
					y[0].classList.remove("di");
			});
			
</script>
</body>
</html>