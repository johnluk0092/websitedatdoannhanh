<?php 
include("../config/connect.php");
$number = 4;
$trang = $_POST['trang'];
$idsp  = $_POST['id'];
$from =($trang - 1)*$number;
$query = mysqli_query($conn, "SELECT * FROM comment WHERE IdSp = $idsp ORDER BY IdCm DESC limit $from, $number");
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