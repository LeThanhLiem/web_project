<?php
session_start();
require_once "user.php";
if(isset($_GET['user'])){
	$user1 = new User($_GET['user'],$_GET['pass']);
	if($user1->login($_GET['user'],$_GET['pass'])){
		if(isset($_GET['remember'])){
			setcookie('user',$_GET['user'],time()+3600);
			setcookie('pass',$_GET['pass'],time()+3600);
		}
		//echo "Logged in successfully";
		//Luu thong tin vao session
		$_SESSION['user']=$_GET['user'];
		header('location:index.php?page=1');
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>


<style type="text/css">
section{
	padding-left: 25%;
	background-color: grey;
}
.container {
	background-image: url("public/dang.jpg");
	background-size: cover;
	background-repeat: no-repeat;
	height: 500px;
	width: auto;
	color: #fff;
	padding-left: 40%;
	padding-top: 25%;
}
.a{
	background-image: url("public/dang.jpg");
	background-repeat: no-repeat;
	margin-left: 30px;

}
</style>
</head>
<body>	
	<div class="container">
		
		<form action="" method="get">
			Username<input class="a" type="text" name="user" value="<?php echo isset($_COOKIE['user'])?$_COOKIE['user']:"" ?>"><br>
			password <input class="a" type="Password" name="pass"><br>
			<input type="checkbox" name="remember">Remember
			<input type="submit" name="" value="Submit">
		</form>
	</div>

</body>
</html>