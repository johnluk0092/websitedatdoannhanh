<?php 
$slmoi = $_POST['sl'];
$idsp = $_POST['idsp'];
session_start();
$_SESSION['cart'][$idsp] = $slmoi;


?>