<?php
include "../models/functions.php";

include_once "../config/config.php";
include_once "../lib/db.class.php";
include_once "../models/admin.class.php";
include_once "../models/order.class.php";

if (isset($_POST['submit'])) {
	$name = trim(strip_tags($_POST['name']));
	$desc_short = trim(strip_tags($_POST['desc-short']));
	$desc_full = trim(strip_tags($_POST['desc-full']));
	$price = (int)trim(strip_tags($_POST['price']));
	$health = trim(strip_tags($_POST['health']));
	$taste = trim(strip_tags($_POST['taste']));
	$aroma = trim(strip_tags($_POST['aroma']));
	$mouth = trim(strip_tags($_POST['mouth']));

// Doesn't work!!!

	$selected = $_FILES['img']['name'];
	if ($_FILES['img']['error']) {
		$picture = $_POST['img'];
	} else {
		$picture = $selected;
	}
	$type = $_FILES['img']['type'];
	$filePath  = $_FILES['img']['tmp_name'];
	$size = $_FILES['img']['size'];

	if($type == 'image/jpeg' || $type == 'image/png' || $type == 'image/gif'){
		$file = translit($selected);
		$path = "../public/images/".$file;
		move_uploaded_file($file, $path);
		if (move_uploaded_file($file,$path)) {
			$message = "File uploaded";
		} else {
			$message = $_FILES['img']['error'];
		}
	} else {
		$message = "Wrong type";
	}
	
// ------------------ //
	if (isset($_POST['edit_good'])) {
		$id = (int)trim(strip_tags($_POST['edit_good']));
		Admin::editGood ($id, $name, $desc_short, $desc_full, $price, $health, $taste, $aroma, $mouth, $picture);
		header("Location: ../admin/index.php");
	} else {
		Admin::addGood ([$name, $desc_short, $desc_full, $price, $health, $taste, $aroma, $mouth, $picture]);
		header("Location: ../admin/index.php");
	}
	
}

if(isset($_POST['order_id'])) {
	$order_id = (int)$_POST['order_id'];
	$date_complete = $_POST['date_complete'];
	$order_status = $_POST['order_status'];
	$result = Order::editOrder($order_id, $date_complete, $order_status);
}




?>