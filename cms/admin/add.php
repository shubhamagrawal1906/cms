<?php
include '../includes/connectdatabase.php';
include '../includes/article.php';
session_start();
if(isset($_SESSION['logged_in'])){
	if(isset($_POST['title'])&&isset($_POST['content'])){
		$title=$_POST['title'];
		$content=nl2br($_POST['content']);
		if(!empty($title)&&!empty($content)){
			$time=time();
			$query="INSERT INTO `cms`.`article` VALUES ('','$title','".mysql_real_escape_string($content)."','$time')";
			if($query_run=mysqli_query($conn,$query)){
				header('Location:index.php');
			}else{
				echo mysqli_error($conn);
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
		<h4>Add Article</h4>
		<small style="color:#197419"><?php
		if(isset($error)){
			echo $error."<br/><br/>";
		}
		?></small>
		<form action="add.php" method="POST" autocomplete="off">
		<input type="text" placeholder="Title" name="title"/><br/><br/>
		<textarea rows="15" cols="67" placeholder="Content" name="content"></textarea><br/><br/>
		<input type="submit" value="Add Article" id="span"/>
		</form>
		<br/><br/><hr><b><a href="index.php">&larr; Menu</a></b>
		</div>
	</body>
</html>
<?php
}else{
	header('Location: index.php');
	exit();
}
?>
