<?php 
session_start();
// mở kêt nối csdl, lấy ra cột trong bảng Mon
	include("./config/connect.php");
	// lấy id món
	$id = isset($_GET['id']) ? $_GET['id'] : '';

?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>chi tiet san pham</title>
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="jquery-3.3.1.min.js"></script>

<script>
$(document).ready(function(){
		// function ajax xử lý comment
			function load_ajax(){
			$.ajax({
			url : "./comment/xulycomment.php",
			type : "post",
			dataType:"text",
			data : {
				 nd : $('#noidungcm').val(),
				 id : <?php echo $id ?>,
			},
			success : function (result){
				if($("#com li").length == 0)
					$("#com").html(result);
				else $("#com li:eq(0)").before(result);
				$("#noidungcm").val("");
			}
		});
       };
	$("#ok").click(function(){
		load_ajax();
	});
	// phân trang (Bắt đầu từ trang thứ 2. trang 1 lấy từ csdl)
	var tranghientai = 1;
	$("#s").click(function(){
			tranghientai +=1;
			$.post("./comment/phantrang.php", {trang: tranghientai, id : <?php echo $id ?>}, function(data){
				$("#com").html(data);
			});
	})
	$("#t").click(function(){
			if(tranghientai > 1)
			{
				tranghientai -=1;
				$.post("./comment/phantrang.php", {trang: tranghientai, id : <?php echo $id ?>}, function(data){
					$("#com").html(data);
			})};
			})
})	
	
	
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
	.di {
		top: 0px; position: fixed; width: 23.5%;  min-width: 250px;
	}
	.checked {
    color: orange;
	}
	.star {
		cursor: pointer;
	}
	.commment {
		border: 1px solid rgba(0,0,0,1.00); position: relative; margin: 5px; width: 99%;
	}
	.conten .commment ul {
		margin: 0px; padding: 0px; list-style: none; width: 100%
	}
	.conten .commment ul li {
		padding-top: 5px; margin: 5px 20px; width: 95%; border: none
	}
	.repcomment {
		display: block; 
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
					<div class="titlel">
						<h4>Chi Tiết Sản Phẩm</h4>
					</div>
					<div class="titler"></div>
				</div>
				<?php
				$result = mysqli_query( $conn, "Select * from mon where IdMon = $id");
					if ( !$result )
						echo "query loi";
					//hàm fetch assoc trả về mảng data
					while ( $data = mysqli_fetch_assoc( $result ) ) {
					echo'
					<div class="mainanh">
						<img src="image/image_sp/'.$data['Anh'].'" alt="anh" width="100%" height="100%">
					</div>
					<div class="mainsp">
						<h1>'.$data['TenMon'].'</h1><hr>
						<h2>Giá: '.number_format($data['Gia']).'</h2><hr>
						<p>trạng thái :<b>'.$data['TinhTrang'].'</b></p><hr>';
						};
					echo '<a href="giohang.php?idsp='.$id.'" class="btn-buy">Thêm Giỏ Hàng</a>';
				?>
					
				</div>
				<div style="clear: both"></div>
				<hr>
				<?php
				if(isset($_SESSION['username']))
				{
					echo '
						<div class="comment">
							<div class="star" style="margin: 5px 20px">
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star star"></span>
								<span class="fa fa-star star"></span>
							</div>
							<div style="margin-left: 20px">
							<h2>Your Comment</h2>
							<textarea id="noidungcm" rows="5" cols="50" style="padding: 5px; font-size: 18px"></textarea><br>
							<input type="submit" value="Post" id="ok">
							</div>
						</div> ';
				}
				else echo '<i style="margin: 20px">Bạn Phải Đăng Nhập Để Comment !</i>';
				?>
				<hr>
				<div class="commment">
					<ul id="com">
				       <!--in comment từ csdl -->
					   <!--in comment từ csdl -->
						<?php
						$query = mysqli_query($conn, "SELECT * FROM comment WHERE IdSp = $id ORDER BY IdCm DESC limit 0, 4");
						mysqli_close($conn);
						if(mysqli_num_rows($query) == 0)
							echo "<h2>Chưa Có Comment !</h2>";
						else {
							foreach($query as $key => $value)
							{
								echo '
							<li>
								<img src="image/user-image-with-black-background_318-34564.jpg" alt="img" width="100px" height="100px" style="float: left">
								<div style="float: left; margin: 10px 15px">
									<b>'.$value['TenTk'].' </b><i>'.$value['Time'].' </i><br>
									<p id="hienthicomment" style="text-align: left">'.$value['NoiDungCm'].'</p>
								</div>
								<div style="clear: both; margin: 10px 0px"></div>
							</li>
							<hr>';
							}
						}; 
						
						?>
						<!---->
						<div style="clear: both"></div>
						<hr>
						<div style="clear: both"></div>
						<!--..-->
						
					</ul>
				</div>
				<div style="clear: both"></div>
				<div class="chiatrang">
					<ul>
						<li style="Width: 50px; color: red; cursor: pointer; font-size: 20px" id="t">Trước</li>
						<li style="Width: 50px; color: red; cursor: pointer; font-size: 20px" id="s">Sau</li>
					</ul>
				</div>
				<hr>
				<div class="sptuongtu">
					<div class="title">
						<div class="titlel">
							<h4>Sản Phẩm Ưa Thích</h4>
						</div>
						<div class="titler"></div>
					</div>
					<div style="width: 100%; height: 200px; margin-top: 10px; overflow: hidden; ">
						<?php
						include("./config/connect.php");
						$query2 = mysqli_query($conn, "SELECT * FROM mon WHERE IdMenu = (SELECT IdMenu FROM mon WHERE IdMon = $id) ORDER BY RAND() limit 4");
						mysqli_close($conn);
						if(mysqli_num_rows($query2) == 0)
							echo "Chưa có sp nào";
						else {
							foreach($query2 as $key => $value2)
							{
								echo '
									<div class="sptt" style="margin-left: 19px">
										<img src="image/image_sp/'.$value2['Anh'].'" width="100%" height="30%">
										<p><a href="chitietsp.php?id='.$value2['IdMon'].'">'.$value2['TenMon'].'</a></p>
									</div>';
							}
						}
						?>
					</div>

				</div>

			
	
		</div>
	<?php include_once('./dangky_dangnhap/formdk_dn.php');  ?>
	</div>
	
	<?php include_once('./template/footer.php')?>	
<script>
	// cuộn chuột
	var y = document.getElementsByClassName("menulef");
	window.addEventListener("scroll",function(){
		console.log(window.pageYOffset);
		
		if(window.pageYOffset > 175 && window.pageYOffset < 4729)
			y[0].classList.add("di");
		else 
			y[0].classList.remove("di");
		
		});
		//dk, dn
		document.getElementById("dn").addEventListener("click", function(){
			document.getElementById("background").style.display = ("block");
			document.getElementsByClassName("login")[0].style.display = ("block");
			document.getElementsByClassName("login")[1].style.display = ("none");
		})
		document.getElementById("dk").addEventListener("click", function(){
			document.getElementById("background").style.display = ("block");
			document.getElementsByClassName("login")[0].style.display = ("none");
			document.getElementsByClassName("login")[1].style.display = ("block");
		})
		var close = document.getElementsByClassName("close");
		for(var i = 0; i < close.length; i ++)
			{
				close[i].addEventListener("click", function(){
					document.getElementsByClassName("login")[0].style.display = ("none");
					document.getElementsByClassName("login")[1].style.display = ("none");
					document.getElementById("background").style.display = ("none");
				})
			};
	//vote
	var star = document.getElementsByClassName("star");
		for(var i = 0; i<star.length; i++)
			{
				star[i].addEventListener("click", function(){
						this.classList.add("checked")
						
				});
			}
</script>

</body>
</html>