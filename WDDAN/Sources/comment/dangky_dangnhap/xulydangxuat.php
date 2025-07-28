<?php 
session_start(); 
 
if (isset($_SESSION['username'])){
    unset($_SESSION['username']); // xóa session login
};
if (isset($_SESSION['cart'])){
    unset($_SESSION['cart']); // xóa session cart
};
header('Location: ../TrangChu.php');
?>
