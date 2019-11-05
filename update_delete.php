<?php session_start();
include 'menu.php';

if (isset($_SESSION['Id'] ) ) {
  include 'connexion.php';


 if (isset($_GET['del'])) {
  $ID=$_GET['del']; 

   $sql = "DELETE FROM article WHERE id=$ID";

if ($conn->query($sql) === TRUE) {
    echo "Post deleted successfully";

} else {
    echo "Error deleting Post: " . $conn->error;
}
header('Location: myspace.php');
 }?>

 