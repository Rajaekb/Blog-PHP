<?php include 'menu.php';
      include 'connexion.php';
 ?>

 <div class="container"> 	
 	<form action="register.php" method="POST">
  <div class="form-group row">
    <label for="inputNom3" class="col-sm-2 col-form-label">Nom</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputNom3"  name="Nom" placeholder="Nom">
    </div></div>
    <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label" name="Email">Email</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" id="inputEmail3"  name="Email" placeholder="Email">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label" >Password</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="inputPassword3" name="Password" placeholder="Password">
    </div>
  </div>
 
  <div class="form-group row">
    <div class="col-sm-10">
      <button type="submit" class="btn btn-primary" name="signin">Sign in</button>
    </div>
  </div>
</form>
  
</div>
<?php 

if(isset($_POST["signin"])){
  $Nom=$_POST["Nom"];
  $Email=$_POST["Email"];
  $Password=$_POST["Password"];

  $sql="insert into registre (Nom,Email,Password) values ('$Nom','$Email','$Password')";
  if ($conn->query($sql) === TRUE) {
      echo "New article created successfully";
  } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

mysqli_close($conn);

?>
</div>