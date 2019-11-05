<?php 
include 'connexion.php';
include 'menu.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php 
			$sql = "SELECT * FROM registre";
			$result = mysqli_query($conn, $sql);
      		?>
	<div class="container"> 
		<?php 
			while($row = $result->fetch_assoc()){?>
				<ul class="list-unstyled">
			  		<li class="media">
			   		 <a href="profile.php?name=<?php echo $row['Name']?>"><img src="<?php echo $row['Photo']?>" style="border-radius: 50%" width="100" height="100" class="mr-3"></a>
			   		 <div class="media-body">
					      <h5 class="mt-0 mb-1"><?php echo $row["Name"];?></h5>
					      <?php echo $row["Description"];
							?>
    				</div>
  					</li><BR>
  				</ul>
<?php } ?>

	</div>
</body>
</html>