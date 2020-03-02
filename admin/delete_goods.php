<?php

include_once "../config/config.php";
include_once "../lib/db.class.php";
include_once "../models/admin.class.php";

if($_GET['id']){
    $id = (int)$_GET['id'];
    Admin::deleteGood($id);
    header("Location: ../admin/index.php");
}
?>