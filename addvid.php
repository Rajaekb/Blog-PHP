<?php session_start();
include 'menu.php';

if (isset($_SESSION['Id'] ) ) {
  include 'connexion.php';
?>
 <div class="container"> 	
 	<form  action="addvid.php" method="POST" class="form" enctype="multipart/form-data">
	 <div class="form-group">
    <label for="inputTitle"> Title :</label>
    <input type="text" class="form-control" id="inputTitle" name="title">
  </div>

  <div class="form-group">
    <label for="inputDesc"> Url :</label>
    <input type="text"  class="form-control" name="url"></div>
    
  <input type="submit" name="add" value="Add video">
   
  </form>
 
</div>
<?php 

if(isset($_POST["add"])){
  $Title=$_POST["title"];
  $url=$_POST["url"];
 
 $sql="insert into videos (title,url) values ('$Title','$url')";
  if ($conn->query($sql) === TRUE) {
      echo "New video created successfully";
      } 
   }
  ?><a href="logout.php">Logout</a>
  <?php
  } 

else{
      header("location:login.php");
}
?>
</div>

</body>

</html>