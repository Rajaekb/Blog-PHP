<?php
session_start();

include 'menu.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php 
	include 'connexion.php';?>

			<?php 
			$cate=$_GET["cate"];
			$sql = "SELECT * FROM article  where categorie LIKE '$cate'";
			$result = mysqli_query($conn, $sql);
      		?>

  	<div class="container">
  		
  		<div class="row">
  			<div class="col-9">
		
  			<div class="row">
  				<?php
  				 while($row = $result->fetch_assoc()) {?>
  					<div class="col-12 col-lg-6 col-md-6 cart">  				
  						<div class="card" style="width: 18rem;"> 				
						  <img src="<?php echo $row["image"];?>" class="card-img-top">
						 	<div class="card-body">
							  <h5 class="card-title"><?php echo $row["title"];?></h5>
							  <p class="card-text"><?php echo substr($row["description"], 0, 100). "...";?></p>
							  <a href="article.php?idAr=<?php echo $row['id']; ?>" >Read more</a>
						 	</div>
						</div>
					</div>
				<?php }?>
			</div>
		</div>