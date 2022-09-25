<?php
ob_start();
// INCLUDE HEADER 
include('header.php');
?>

<?php
// INCLUDE CART FILE IF CART NOT EMPTY
count($product->getData('cart')) ? include('template/_cart.php') : include('template/item-not-found/empty-cart.php');
// #INCLUDE CART FILE IF CART NOT EMPTY
?>

<?php
// INCLUDE WISHLIST FILE IF WISHLIST EMPTY
count($product->getData('wishlist')) ? include('template/_wishlist.php') : include('template/item-not-found/empty-wishlist.php');
// #INCLUDE WISHLIST FILE IF WISHLIST EMPTY
?>

<?php
// INCLUDE NEW PHONES FILE
include('template/_new-phones.php');
// #INCLUDE NEW PHONES FILE
?>

<?php
// INCLUDE FOOTER
include('footer.php');
?>