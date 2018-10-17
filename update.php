<?php
	require "config.php";
	require "db.php";
	
	if (isset($_POST['name'])){
		$name = $_POST['name'];
		$ID = $_POST['ID'];
				$type_ID = $_POST['type_ID'];
				$manu_ID = $_POST['manu_ID'];
				$image =  $_FILES["fileToUpload"]["name"];
				$des  = $_POST['description'];	
				$price = $_POST['price'];
	}
	$db = new Db;
	$db->update($ID,$name,$type_ID,$manu_ID,$image,$des,$price);
	$targetDir = "uploads/";
	$targetFile = $targetDir.basename($_FILES["fileToUpload"]["name"]);
	$uploadOk = 1;
	$imageFileType = pathinfo($targetFile,PATHINFO_EXTENSION);
	if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif"){
		echo "Sai định dạng hình hoặc không có hình !! ";
		$uploadOk = 0;
	}
	if ($uploadOk = 0){
		echo "Thất bại!!!";
	}
	else{
		move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],"public/images/".$_FILES["fileToUpload"]["name"] );

	}
	
	if(isset($_POST["submit"])){
		$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
		if($check !== false){
			echo "File is an image - ".$check["mine"].".";
			$uploadOk = 1;

		}
		else{
			echo "File is not an image";
			$uploadOk = 0;
		}
	}
	header('location:index.php');
?>