<?php include 'menu.php';
      include 'connexion.php';
 ?>

 <div class="container"> 	
  <center><h3>To register please fill this form and then click the Join US button</h3></center>
  <br><hr><br>
 	<form action="register.php" method="POST" enctype="multipart/form-data">
  <div class="form-group row">
    <label for="inputNom3" class="col-sm-3 col-form-label">Name</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" id="inputNom3"  name="Nam" placeholder="Your Name">
    </div></div>
    <div class="form-group row">
    <label for="inputEmail3" class="col-sm-3 col-form-label" name="Email">Email</label>
    <div class="col-sm-9">
      <input type="email" class="form-control" id="inputEmail3"  name="Email" placeholder="Your Email">
    </div>
  </div>

  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-3 col-form-label" >Password</label>
    <div class="col-sm-9">
      <input type="password" class="form-control" id="inputPassword3" name="Password" placeholder="Password">
    </div>
 </div>

 <div class="form-group row">
    <label for="inputPassword3" class="col-sm-3 col-form-label" >Repeate Password</label>
    <div class="col-sm-9">
      <input type="password" class="form-control" id="inputPassword3" name="Passwordrep" placeholder="Repeate Password">
    </div>
 </div>

<div class="form-group row">
    <label for="Textarea1" class="col-sm-3 col-form-label">Description</label>
     <div class="col-sm-9">
      <textarea class="form-control" id="Textarea1"  rows="5" name="desc" placeholder="Write a short description of your profile"></textarea>
    </div>
</div>
 <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inp">City</label>
      <input type="text" class="form-control" id="inp" placeholder="City" name="city">
    </div>
    <div class="form-group col-md-6">
      <label for="input">Country</label>
      <input type="text" class="form-control" id="input" placeholder="Country" name="country">
    </div></div>
 <div class="form-group row">
    <label for="inputImage" class="col-sm-3 col-form-label">Upload your profile photo :</label>
      <div class="col-sm-9">
        <input type="file" class="form-control-file" id="inputImage" name="image">
      </div>
</div>
  <div class="form-group row">
    <div class="col-sm-9" >
      <button type="submit" class="btn btn-primary" name="signin">Join us</button>
    </div>
  </div>
</form>
  <br><hr><br>
</div>
<?php 

if(isset($_POST["signin"])){
  $dat=date("Y-m-d");
  $Name=$_POST["Nam"];
  $Email=$_POST["Email"];
  $Password=$_POST["Password"];
  $reppassword=$_POST["Passwordrep"];
  $Description=$_POST["desc"];

  $City=$_POST["city"];
  $Country=$_POST["country"];

  $target_dir = "images/profils/";
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
     if($reppassword==$Password){

      if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
          echo "The file ". basename( $_FILES["image"]["name"]). " has been uploaded.";
      } else {
          echo "Sorry, there was an error uploading your file.";
      }

 $Password=md5($_POST["Password"]);
  $sql="insert into registre (Name,Email,Password,Description,Photo,City,Country,Joindate) values ('$Name','$Email','$Password','$Description','$target_file','$City','$Country','$dat')";
  if ($conn->query($sql) === TRUE) {
      echo "New article created successfully";
      header("location:login.php");
  } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
  }
}
else{echo"error in password try again";}
}
}
mysqli_close($conn);

?>
</div>