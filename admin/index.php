<?php
include_once "../config/config.php";
include_once "../lib/db.class.php";
include_once "../models/goods.class.php";

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Administration</title>

    <link href="../public/styles/style.css" rel="stylesheet">

    <!--Google fonts-->
	<link href="https://fonts.googleapis.com/css?family=Handlee|Open+Sans:300i" rel="stylesheet">

	<!-- Jquery embeded -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<!-- Script -->
	<script type="text/javascript" src="../public/scripts/script.js" defer></script>
</head>
<body>
	<header>
		<nav id="nav" role="navigation">
			<div  class="menu">
				<ul id="menu">
					<li id="menu-item"><a href="../public/index.php">Main page</a></li>
					<? if (isset($_GET['page'])) :?>
						<li id="menu-item"><a href="index.php">Home</a></li>
					<? endif; ?>
					<li id="menu-item"><a href="index.php?page=add">Add good</a></li>
					<li id="menu-item"><a href="index.php?page=orders">Orders</a></li>
				</ul>
			</div>
		</nav>
	</header>
<div class="page-container">
	<?
	if(isset($_GET['page'])) {
		switch ($_GET['page']) {
			case 'add':
				require 'add_good.php';
			break;
			case 'edit':
				require 'edit_good.php';
			break;
			case 'orders':
				require 'orders.php';
			break;
			default:	
			break;
		}
	} else {
		require 'admin_main.php';
	}
	?>	
</div>
</body>
</html>