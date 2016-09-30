<?php 
include '../includes/connectdatabase.php';
include '../includes/article.php';
session_start();

if($_SESSION['logged_in']){
	if(isset($_POST['delete'])){
		$id=$_POST['delete'];
		$query="DELETE FROM `cms`.`article` WHERE `id`= '$id'";
		$query_run1=mysqli_query($conn,$query);
		header('Location:delete.php');
		exit();
	}
	if(mysqli_num_rows($query_run)==0){
		$error="No content exist.";
	}
	?>
<html>
	<head>
		<title>CMS</title>
		<link rel="stylesheet" href="../asset/style.css" />
	</head>

	<body>
		<div class="container">
		<h2><a href="/cms/index.php" id="logo">CMS</a></h2><hr><br/>
		<h4>Delete Article</h4>
		<?php
		if(isset($error)){
		?>
		<b><small style="color:#197419"><?php
			echo $error."<br/><br/>";?></small></b><?php
		}else{
			?>
			<p><i><b>Select :</b></i></p>
				<form action="delete.php" method="POST">
					<select name="delete">
						<?php while($asso_array=mysqli_fetch_assoc($query_run)){
							?>
							<option value="<?php echo $asso_array["id"];?>" name="<?php echo $asso_array["id"];?>"><?php echo $asso_array["title"];?></option>
							<?php
						}?>
					</select><br/><br/>
					<input type="submit" value="Delete" id="span">
				</form>
				<?php
			}
			?>
			<br/><br/><hr><b><a href="index.php">&larr; Menu</a></b>
		</div>
	</body>
</html>
	
	<?php
	
}else{
	header('Location: index.php');
}
?>
