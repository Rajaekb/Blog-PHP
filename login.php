<?php 
session_start();
include 'menu.php';
?>
<div class="container">
Enter your login and pasword to connect to your space.
<form action="" method="POST">
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" name="Email" aria-describedby="emailHelp" placeholder="Enter email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="Password"placeholder="Password">
  </div>
  <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="submit" class="btn btn-primary" name="signin">Submit</button>
</form></div>

<?php 
$message="";
if(count($_POST)>0) {
   include 'connexion.php';

      $Email=$_POST["Email"];
      $Pass=$_POST["Password"];

      $sql = "select * from registre where Email = '$Email' and Password='$Pass'";
      $result = mysqli_query($conn, $sql);
      $row = mysqli_fetch_assoc($result);
      if (is_array($row)) {
         $_SESSION["Id"] = $row['Id'];
         $_SESSION["Name"] = $row['Name'];
         } else {
         $message = "Invalid Email or Password!";
      }
   }
      if(isset($_SESSION["Id"])) {
      header("Location:myspace.php");
      }

?>
