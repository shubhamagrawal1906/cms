<?php 
include '../includes/connectdatabase.php';
include '../includes/article.php';
session_start();
if(isset($_SESSION['logged_in'])){
	?>
	<html>
		<head>
			<title>CMS</title>
			<link rel="stylesheet" href="../asset/style.css" />
		</head>

		<body>
			<div class="container">
			<h2><a href="/cms/index.php" id="logo">CMS</a></h2><br/>
				<ol>
					<li><a href="add.php">Add Article</a></li><br/>
					<li><a href="delete.php">Delete Article</a></li><br/>
					<li><a href="logout.php">Logout</a></li><br/>
				</ol>
				<br/><br/><hr><b><a href="../index.php">&larr; Home</a></b>
			</div>
		</body>
	</html>	
	<?php
}else{
	if(isset($_POST['username'])&&isset($_POST['password'])){
		$username=$_POST['username'];
		$password=md5($_POST['password']);
		if(!empty($username)&&!empty($password)){
			$query="SELECT `id` FROM `cms`.`users` WHERE `username`= '".mysql_escape_string($username)."' AND `password`= '".mysql_escape_string($password)."'";
			$query_run=mysqli_query($conn,$query);
			if(mysqli_num_rows($query_run)==1){
				$_SESSION['logged_in']=true;
				header('Location:index.php');
				exit();
				}else{
				$error="Incorrect details !";
			}
		}else{
			$error = "All fields are required !";
		}
	}
	?>
	<html>
		<head>
			<title>CMS</title>
			<link rel="stylesheet" href="../asset/style.css" />
		</head>

		<body>
			<div class="container">
			<h2><a href="/cms/index.php" id="logo">CMS</a></h2><br/>
			<small style="color:#197419"><?php
			if(isset($error)){
				echo $error."<br/><br/>";
			}
			?></small>
			<form action="index.php" method="POST" autocomplete="off">
			<input type="text" placeholder="Username" name="username"/><br/><br/>
			<input type="password" placeholder="Password" name="password"/><br/><br/>
			<span><input type="submit" value="Log in" id="span"/>
			</form>
			<br/><br/><hr><b><a href="../index.php">&larr; Home</a></b>
			</div>
		</body>
	</html>
	<?php
}
?>