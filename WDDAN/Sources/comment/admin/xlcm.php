<?php
include("../config/connect.php");
$idcm = $_GET['idcm'];
$query = mysqli_query($conn, "Delete from comment where IdCm = $idcm");
if(!$query) echo "Có lỗi khi xoá";
else header('location: QLCM.php');
?>