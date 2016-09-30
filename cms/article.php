 <?php 
include 'includes/connectdatabase.php';

if(isset($_GET['id'])){
	$id=$_GET['id'];
?>	
	<html>
		<head>
			<title>CMS</title>
			<link rel="stylesheet" href="asset/style.css" />
		</head>

		<body>
			<div class="container">
			<h2><a href="index.php" id="logo">CMS</a></h2><br/>
			<?php
			$query="SELECT * FROM `cms`.`article` WHERE `id`='$id'";
			$query_run=mysqli_query($conn,$query);			
			if(mysqli_num_rows($query_run)>0){
			$asso_array=mysqli_fetch_assoc($query_run)
				?>
				<h4><?php echo $asso_array["title"];  ?><small><b><?php echo "  - posted ".date("D jS M, Y @ h:i a",$asso_array["timestamp"]); ?></b></small></h4>
				<p><?php echo $asso_array["content"]?></p>
				<br/><br/><hr><b><a href="index.php">&larr; Back</a><b>
			<?php
		}
		?>
			
			</div>
		</body>
	</html>
<?php }else{
	header('Location: index.php');
}
?>
