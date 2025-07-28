<?php
session_start();
$id = $_POST['idsp'];
if($id) {
	unset($_SESSION['cart'][$id]);
}
?>