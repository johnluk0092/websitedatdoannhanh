<?php 
if(isset($_SESSION['username'])) {
	echo '
	<div class="banber">
			<div class="logo">
				<img src="image/fastfood-logo-D673849A4C-seeklogo.com.png" alt="logo">
			</div>
			<div class="mid">
				<marquee direction="right" scrollamount="4"><img src="image/tải xuống.png" width="160px"> <h3>Giao Hàng Tận Nơi Chỉ Từ 25p...</h3></marquee>
			</div>
			<div class="contact">
				<ul>
					<li><i class="fa fa-user"> Xin Chào: <b style="color: red">'.$_SESSION['username'].'</b></i></li>
					<li><i class="fa fa-sign-out"><a href="dangky_dangnhap/xulydangxuat.php"> logout</a></i></li>
				</ul>
			</div>
	</div>';
}
else echo '
	<div class="banber">
			<div class="logo">
				<img src="image/fastfood-logo-D673849A4C-seeklogo.com.png" alt="logo">
			</div>
			<div class="mid">
				<marquee direction="right" scrollamount="4"><img src="image/tải xuống.png" width="160px"> <h3>Giao Hàng Tận Nơi Chỉ Từ 25p...</h3></marquee>
			</div>
			<div class="contact">
				<ul>
					<li id="dk"><a href="#"><i class="fa fa-user-plus"></i> Đăng Ký</a></li>
					<li id="dn"><a href="#"><i class="fa fa-sign-in"></i> Đăng nhập</a></li>
				</ul>
			</div>
	</div>

'

?>
