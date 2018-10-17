<?php
	include "config.php";
	require "db.php";
	$ID = $_GET['ID'];
	$db = new Db;

	$delete = $db->delete($ID);
	header('location:index.php');
?>