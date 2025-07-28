<?php
session_start();
include("../config/connect.php");
date_default_timezone_set("Asia/Bangkok");
$time = date('Y-m-d H:i:s');
$tentk = $_SESSION['username'];
$id = $_POST['id'];
$nd = $_POST['nd'];
// inser thông tin vào csdl
if($nd && $id) {
	mysqli_query($conn, "INSERT INTO comment (TenTk, NoiDungCm, Time, IdSp) VALUES ('$tentk', '$nd', '$time', '$id')");
	mysqli_close($conn);
// đồng thời trả về kết quả comment //
	echo'
		<li>
			<img src="image/user-image-with-black-background_318-34564.jpg" alt="img" width="100px" height="100px" style="float: left">
			<div style="float: left; margin: 10px 15px">
				<b>'.$tentk.' </b><i>'.$time.' </i><br>
				<p id="hienthicomment" style="text-align: left">'.$nd.'</p>
			</div>
			<div style="clear: both; margin: 10px 0px"></div>
		</li>
		<hr>
';
};
?>
