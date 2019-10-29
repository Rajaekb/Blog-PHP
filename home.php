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
<div class="row"><div class="col-12">
<div class="bd-example">
  <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="images/slider/1.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>First slide label</h5>
          <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="images/slider/2.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>Second slide label</h5>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="images/slider/3.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>Third slide label</h5>
          <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
</div></div>
	<br><hr><br>

		<?php
	  $sql = "SELECT * FROM article";
	  $result = mysqli_query($conn, $sql);
    $sqlvid="SELECT * from videos";
    $resultvid = mysqli_query($conn, $sqlvid);
    $sqlc1="select count(*) from article";
    $sqlc2="select count(*) from registre";
    $sqlc3="select count(*) from videos";
    $result1 = mysqli_query($conn, $sqlc1);
    $result2 = mysqli_query($conn, $sqlc2);
    $result3 = mysqli_query($conn, $sqlc3);
    $row1=mysqli_fetch_array($result1);
    $row2=mysqli_fetch_array($result2);
    $row3=mysqli_fetch_array($result3);


  		?>
  	<div class="container-fluid">
		<?php  if ($result->num_rows > 0) {?>
  			<div class="row">
        
  				<?php while($row = $result->fetch_assoc()) {?>
  					<div class="col-12 col-lg-3 col-md-6 cart">  				
  						<div class="card" style="width: 18rem;">  					
						  <img src="<?php echo $row["image"];?>" class="card-img-top">
						 	<div class="card-body">
							  <h5 class="card-title"><?php echo $row["title"];?></h5>
							  <p class="card-text"><?php echo $row["description"];?></p>
                <a href="article.php?idAr=<?php echo $row['id']; ?>" >Read more</a>
						 	</div>
						</div>
	</div>
				<?php }?>
						
			</div>
		<?php }?>

      <br><hr><br>
      <?php  if ($resultvid->num_rows > 0) {?>
        <div class="row">
        
          <?php while($row = $resultvid->fetch_assoc()){?>
            <div class="col-12 col-lg-4 col-md-6">         
            <h5><?php echo $row["title"];?></h5>        
           <iframe width="400" height="300" src="<?php echo $row['url'];?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>            
               
              </div> <?php }?>
            </div>
     </div>
    <?php }?>
<br><hr><br>
<div class="bar row">
<div class="col-4">
  <h2><?php echo $row1[0];?> Articles </h2>
</div>
  <div class="col-4">
  <h2><?php echo $row2[0];?> Members </h2>
</div>
<div class="col-4">
  <h2><?php echo $row3[0];?> Videos </h2>
</div>
</div>



<?php mysqli_close($conn);?>
</div> 
  </body>
</html>
   