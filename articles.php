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
			$sql = "SELECT a.id,a.title,a.description,a.image,a.id_autor,r.Id,r.Name from article a,registre r where a.id_autor=r.Id";
			$result = mysqli_query($conn, $sql);

      		?>
	<div class="container"> 
<?php  if ($result->num_rows > 0) {?>
  			<div class="row">
       			<?php while($row = $result->fetch_assoc()) {?>
  					<div class="col-12 col-lg-4 col-md-6 cart">  				
  						<div class="card" style="width: 18rem;">  					
						  <img src="<?php echo $row["image"];?>" class="card-img-top">
						 	<div class="card-body">
							  <h5 class="card-title"><?php echo $row["title"];?></h5>
							  <p class="card-text"><?php echo substr($row["description"], 0, 100). "..."; ?></p>
							   <h5><?php echo $row["Name"];?></h5>
                			<a href="article.php?idAr=<?php echo $row['id'];?>" >Read more</a>
						 	</div>
						</div>
	</div>
				<?php }?>
					
			</div>
		<?php }?>