<div class="menulef">
	<div class="serchbox">
		<form method="post" action="./search2.php">
		<input type="text" placeholder="Nhập Từ Khoá" class="txt" name="tk" autocomplete="off">
		<input type="submit" value="Search" class="sub">
		</form>

	</div>
	<div class="divsearch">
		<ul>
		<!--data đổ ra của search-->
		</ul>
	</div>
	<hr>
	<!--giỏ hàng-->
	<?php 
	if(isset($_SESSION['cart'])){
	$sosp = -1;
	foreach($_SESSION['cart'] as $value){
		$sosp += 1;
	}
	echo '
	<a href="giohang.php?idsp=a"><h2 style=" color: aliceblue; text-align: center"><i class="fa fa-shopping-cart" style="color: aqua"></i> '.$sosp.' Sản Phẩm</h2></a>';
	}
	else echo '
	<a href="giohang.php?idsp=a"><h2 style=" color: aliceblue; text-align: center"><i class="fa fa-shopping-cart" style="color: aqua"></i> 0 Sản Phẩm</h2></a>';
	?>

	<hr>
	<div class="text" style="margin: 10px auto; color: aliceblue; text-align: center">
		<h1><a href="TrangChu.php" style="color: aliceblue">MENU</a></h1>
	</div>
	<div class="menu">
		<hr>
		<ul>
			<li><a href="TrangChu.php?id=1">✔  Cơm Set</a>
			</li>
			<li><a href="TrangChu.php?id=2">✔  Giải Khát</a>
			</li>
			<li><a href="TrangChu.php?id=3">✔  Korean Food</a>
			</li>
			<li><a href="TrangChu.php?id=40">✔  Phở - Mì</a>
			</li>
			<li><a href="TrangChu.php?id=5">✔  Đồ Ăn Vặt</a>
			</li>
			<li><a href="TrangChu.php?id=6">✔  ComBo 95k</a>
			</li>
		</ul>
	</div>
</div>
<script>
	// chức năng timf kiếm
$(document).ready(function(){
	$(".txt").keyup(function(){
		if($(".txt").val() == "")
			$(".divsearch").slideUp();
		else {
			$.ajax({
			  type :'get',
			  url: './quicksearch/search.php',
			  data: {
				  key: $('.txt').val(),
			  },
			  dataType: 'text',
			  success: function(data) {
				$(".divsearch ul").html(data),
				$(".divsearch").slideDown();
			  }
			})
		}
	})
});
</script>

