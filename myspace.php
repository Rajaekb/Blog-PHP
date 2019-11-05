<?php session_start();
include 'menu.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php 
	include 'connexion.php';
	if($_SESSION["Name"]) {
	?>
	
			<?php 
			$name=$_SESSION["Name"];
			$sql = "SELECT * FROM article a ,registre r where r.Id=a.id_autor AND r.Name LIKE '$name'";
			$result = mysqli_query($conn, $sql);
      		?>

  	<div class="container">
  		<h1>Welcome <?php echo $_SESSION["Name"];?></h1>
  		<div class="row">
  			<div class="col-9">
		<?php  if ($result->num_rows > 0) {?>
  			<div class="row">
  				<?php while($row = $result->fetch_assoc()) {?>
  					<div class="col-12 col-lg-6 col-md-6 cart">  				
  						<div class="card" style="width: 18rem;">  					
						  <img src="<?php echo $row["image"];?>" class="card-img-top">
						 	<div class="card-body">
							  <h5 class="card-title"><?php echo $row["title"];?></h5>
							  <p class="card-text"><?php echo substr($row["description"], 0, 100). "...";?></p>
							 
							  <a href="article.php?idAr=<?php echo $row['id']; ?>" >Read more</a>
						 	</div>
						</div>
						<a href="update_delete.php?del=<?php echo $row['id']; ?>">Delete</a>
						<a href="">Update</a>
					</div>
				<?php }?>
			</div>
		<?php }?></div>
		<div class="col-3">
			<?php
			include 'navAside.php';

}
else {
	      header("location:login.php");}
?>
		</div>
	</div>


		<?php mysqli_close($conn);?>	
	</div>

</body>
</html>