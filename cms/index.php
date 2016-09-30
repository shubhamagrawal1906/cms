<?php 
include 'includes/connectdatabase.php';
include 'includes/article.php';
?>
<html>
	<head>
		<title>CMS</title>
		<link rel="stylesheet" href="asset/style.css" />
	</head>

	<body>
		<div class="container">
		<h2><a href="index.php" id="logo">CMS</a></h2><br/>
		<ol>
		<?php if(mysqli_num_rows($query_run)>0){
				while($asso_array=mysqli_fetch_assoc($query_run)){
			?>
			<li><a href="article.php?id=<?php echo $asso_array["id"]?>"><?php echo $asso_array["title"];?></a><small style="text-style:none;"><?php echo "  - posted ".date("D jS M, Y @ h:i a",$asso_array["timestamp"]); ?></small></li><br/>
		<?php
		}
	}else{
		$error = "No content exist.";
	}
	?>
		</ol>
			
			<b><small style="color:#197419"><?php
			if(isset($error)){
				echo $error."<br/><br/>";
			}
			?></small></b>
		<br/><br/><hr><b><i><a href="admin/index.php">admin &rarr;</a></i><b>
		</div>
	</body>
</html>