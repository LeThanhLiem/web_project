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
html{
	background-color: rgb(16,25,34);
}
section{
	padding-left: 25%;
	background-color: grey;
}
.container {
	background-image: url("public/XTOYS.jpg");
	background-size: cover;
	background-repeat: no-repeat;
	height: 500px;
	width: auto;
	color: rgb(165,222,233);
	padding-left: 40%;
	padding-top: 25%;
	padding-right: 35%;
}
.a{
	background-image: url("public/XTOYS.jpg");
	background-repeat: no-repeat;
	margin-left: 30px;
	color: #fff;
}
.a1{
	background-image: url("public/XTOYS.jpg");
	background-repeat: no-repeat;
	margin-left: 33px;	
	color: #fff;
}
.submit{
	border: 2px cyan solid;
	border-radius: 15px;
	background-color:  rgb(165,222,233);
}
form{
	border: 2px cyan double;
	border-radius: 20px;
	margin: 10px;
	padding: 10px;
}
h1{
	padding-left: 30%;
}
video{
	position: fixed;
	left: 10px;
	bottom: 60px;
}
</style>
</head>
<body>	
	<div class="container">
		<h1> LOGIN </h1>
		<form action="" method="get">
			<label>Username<input class="a" type="text" name="user" value="<?php echo isset($_COOKIE['user'])?$_COOKIE['user']:"" ?>"></label><br>
			<label>Password<input class="a1" type="Password" name="pass"></label><br>
			<input type="checkbox" name="remember">Remember
			<label><input class="submit" type="submit" name="" value="Submit"></label>
		</form>
		<video width="400" controls autoplay>
  		<source src="public/yasuo.mp4" type="video/mp4">
	</video>
	</div>

</body>
</html>