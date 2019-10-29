<?php session_start();
include 'menu.php';

if (isset($_SESSION['Id'] ) ) {
  include 'connexion.php';
  $sql = "SELECT Name FROM categories";
  $result = mysqli_query($conn, $sql);?>

 <div class="container"> 	
 	<form  action="add.php" method="POST" class="form" enctype="multipart/form-data">
	 <div class="form-group">
    <label for="inputTitle"> Title :</label>
    <input type="text" class="form-control" id="inputTitle" name="title">
  </div>
   
  <div class="form-group">
    <label for="categorie">Categorie</label>
      
    <select class="form-control" id="categorie" name="categorie">
       <?php 
            if ($result->num_rows > 0){
            ?>
        <option value="" disabled selected>Choose a categorie</option>
        <?php while($row = $result->fetch_assoc()){?>
                <option><?php echo $row["Name"];}?></option>
             
    </select>
          <?php} ?>  
  </div> 

  <div class="form-group">
    <label for="inputDesc"> Description :</label>
    <textarea class="form-control" id="inputDesc" rows="5" name="description"></textarea> 
  </div>
    
  <div class="form-group row">
    <label for="inputImage" class="col-sm-2 col-form-label">choose Image :</label>
      <div class="col-sm-10">
        <input type="file" class="form-control-file" id="inputImage" name="image">
      </div>
  <input type="submit" name="add">Save
   
  </form>
 
</div>
<?php 

if(isset($_POST["add"])){
  $Title=$_POST["title"];
  $Categorie=$_POST["categorie"];
  $Description=$_POST["description"];
    
  //image upload file

  $target_dir = "images/uploads/";
  $target_file = $target_dir . basename($_FILES["image"]["name"]);

  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  // Check if image file is a actual image or fake image

  $check = getimagesize($_FILES["image"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
  // Check if file already exists
  if (file_exists($target_file)) {
      echo "Sorry, file already exists.";
      $uploadOk = 0;
  }
  // Check file size
  if ($_FILES["image"]["size"] > 500000) {
      echo "Sorry, your file is too large.";
      $uploadOk = 0;
  }
  // Allow certain file formats
  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
  && $imageFileType != "gif" ) {
      echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
      $uploadOk = 0;
  }
  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) {
      echo "Sorry, your file was not uploaded.";
  // if everything is ok, try to upload file
  } else {
      if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
          echo "The file ". basename( $_FILES["image"]["name"]). " has been uploaded.";
      } else {
          echo "Sorry, there was an error uploading your file.";
      }
  }
  $sql="insert into article (title,categorie,description,image) values ('$Title','$Categorie','$Description','$target_file')";
  if ($conn->query($sql) === TRUE) {
      echo "New article created successfully";
      
     } 
   }
  ?><a href="logout.php">Logout</a>
  <?php
  } 
}

else{
      header("location:login.php");
}
?>
</div>

</body>

</html>