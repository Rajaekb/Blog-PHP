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
	

		<?php
	  $sql = "SELECT * FROM article ORDER BY id DESC LIMIT 4";
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
      <div class="row">
      <center> <h2>About us</h2></center> <hr><br>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
      cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
         <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
      cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p></div>
       <br> <hr><br>
      
     <center> <h2>Recents Posts</h2></center>
     <hr><br>
		<?php  if ($result->num_rows > 0) {?>
  			<div class="row">        
  				<?php while($row = $result->fetch_assoc()) {?>
  					<div class="col-12 col-lg-3 col-xl-3 cart">  				
  						<div class="card" style="width: 18rem;">  					
						  <img src="<?php echo $row["image"];?>" class="card-img-top">
						 	<div class="card-body">
							  <h5 class="card-title"><?php echo $row["title"];?></h5>
							  <p class="card-text"><?php echo substr($row["description"], 0, 100). "..."; ?></p>
                <a href="article.php?idAr=<?php echo $row['id']; ?>" >Read more</a>
						 	</div>
						</div>
	</div>
				<?php }?>
					
			</div>
		<?php }?><a href="articles.php" style="float: right">See All Posts</a>  

      <br><hr><br>
      <?php  if ($resultvid->num_rows > 0) {?>
        <div class="row">
        
          <?php while($row = $resultvid->fetch_assoc()){?>
            <div class="col-12 col-lg-4 col-md-6">         
            <h5><?php echo $row["title"];?></h5>        
           <iframe width="400" height="300" src="<?php echo $row['url'];?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>            
               
              </div> <?php }?>
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
<br><hr><br>
<div class="row">
  <div class="col-lg-4">
    <a href="members.php" style="font-size:20px;font-weight:bold;">New Members
    <?php 
      $sql6 = "SELECT * FROM registre ORDER BY id DESC LIMIT 4";
      $result6 = mysqli_query($conn, $sql6);
      while($row6 = $result6->fetch_assoc()){?>
        <ul>
          <li class="media">
             <a href="profile.php?name=<?php echo $row6['Name']?>"><img src="<?php echo $row6['Photo']?>" style="border-radius: 50%" width="100" height="100" class="mr-3">
              <div class="media-body">
                <h5><?php echo $row6["Name"];?></h5></a>
                <?php echo substr($row6["Description"], 0, 50). "..."; ?>
              </div>
          </li>
        </ul>
<?php } ?><a href="members.php" style="float:right;">See All</a>
  </div>
   <div class="col-lg-4"><h3>Like our facebook Page</h3><iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FPhographyArt&tabs=timeline&width=340&height=500&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="400" height="400" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe></div>
    
    <div class="col-lg-4">
      <?php
      $sql4 = "SELECT Name FROM categories";
      $result4 = mysqli_query($conn, $sql4);?>

  <a href="categories.php"><h3>Travel By</h3></a>
  <ul>
  
            <li>Car</li> 
            <li>Fly</li> 
            <li>Bus</li> 
            <li>Boat</li> 

          </ul>
        <div class="card bg-light mb-3" style="max-width: 22rem;">
        <div class="card-header"><h3>Join our Newsletter</h3></div>
        <div class="card-body">
        <p class="card-text">
        <form method="POST">
        <div class="form-group">
        <label for="exampleInputEmail1">Stay up to date with our latest News</label>
        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name=newsemail placeholder="Enter email">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div><button type="submit" class="btn btn-primary" name="Subscribe" width="auto">Subscribe</button>
</form>
 <?php  if(isset($_POST["Subscribe"])){
  $Email=$_POST["newsemail"];
   $sql="insert into email_newsletter (Email) values ('$Email')";
  if ($conn->query($sql) === TRUE) {
      echo "New article created successfully";
      
     } 
   }?>
  </div>
</div>
    </div></div>

</div>
<?php mysqli_close($conn);?>
<footer>
  <?php include'footer.php' ?>
</footer>
  </body>
</html>
   