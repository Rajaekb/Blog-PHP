<?php
include 'menu.php';
include 'connexion.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php 
			$nm=$_GET["name"];
			$sql = "SELECT * FROM registre  where Name LIKE '$nm'";
			$result = mysqli_query($conn, $sql);
      		?>
	<div class="container">
		<div class="row">
			<?php $row=mysqli_fetch_array($result);?>
			<div class="col-3">
				<img src="<?php echo $row['Photo'];?>" width="280" height="280"/>
			</div>
			<div class="col-9">
				<div style="border:1px solid grey;">
				<h3><?php echo $row["Description"];?></h3>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-3"><br>
				<h5>Name : <?php echo $row["Name"];?></h5>
				<h5>City : <?php echo $row["City"];?></h5>
				<h5>Country : <?php echo $row["Country"];?></h5>
				<h5>Join date : <?php echo $row["Joindate"];?></h5>
			</div>
			
		</div>
		
	</div>