<?php session_start();
	include 'menu.php';
	include 'connexion.php';

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>

</head>
<body>

	<div class="container">
		<div class="row">
			<div class="col-9">
		<?php
		if(isset($_GET["idAr"])){
		$id_article=$_GET["idAr"];
	  $sql = "SELECT * FROM article where id LIKE '$id_article'";
	  $result = mysqli_query($conn, $sql);
	  $row=mysqli_fetch_array($result);?>  			 						 	
	  <h5><?php echo $row["title"];?></h5>
	  <p><?php echo $row["description"];?></p>
	   <img src="<?php echo $row["image"];?>" width=500 height=400 class=img-fluid>
		</div>
		<div class="col-3">
		<?php include 'navAside.php';  ?>
		</div>
		<?php 
		$sql2 = "SELECT * FROM commentaires where id_article LIKE '$id_article'";
		$result2 = mysqli_query($conn, $sql2);?>
		<ul class="list-group list-group-flush"><?php if ($result2->num_rows > 0) {?>
		 <?php while($row2 = $result2->fetch_assoc()) {?>
			<li class="list-group-item"><?php echo $row2["commentaire"];}?>
			<span><?php echo $_SESSION["Name"];?></span></li><?php }?></ul>
	<?php}?>
	</div>

<form  action="article.php" method="POST" class="form" enctype="multipart/form-data">
	
  	<div class="form-group">
    <label for="inputDesc"> Your comment :</label>
    <textarea class="form-control" id="inputDesc" rows="5" name="comment"></textarea> 
  	</div>
    <input type="hidden" name="idAr" value="<?php echo $_GET['idAr'] ?>">
    <input type="submit" name="addcoment" value="Add your comment">
   
  </form>
 
</div>
<?php 
}

if(isset($_POST["addcoment"])){
 	$idar=$_POST["idAr"];
  	$Comment=$_POST["comment"];

  $sql="insert into commentaires(commentaire,id_article) values ('$Comment','$idar')";
  if ($conn->query($sql) === TRUE) {
      echo "New comment created successfully";
      header("location:article.php?idAr=$idar");
      
     } 
  }
  ?>

  <a href="logout.php">Logout</a>

</div>


	</div>