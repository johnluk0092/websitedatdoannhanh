<?php 
$key = $_GET['key'];
include('../config/connect.php');
$result = mysqli_query($conn, "SELECT * FROM mon WHERE TenMon LIKE '%$key%'");
if(mysqli_num_rows($result) == 0) 
	echo "<li>Ko có kết quả nào</li>";
else {
	foreach($result as $key => $value)
	{
		echo "<li><a href='chitietsp.php?id=$value[IdMon]'>$value[TenMon]<a></li>" ;
	};
};
?>