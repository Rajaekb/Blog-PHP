  <?php
  // Create connection 
  $conn = mysqli_connect("localhost","root","","blog");
  // Check connection
  if (!$conn)
  {
    die ("Failed to connect to MySQL: " . mysqli_connect_error());
  }  
  ?>