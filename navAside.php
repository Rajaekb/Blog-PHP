<?php 

if (isset($_SESSION['Id'] ) ) {?>
<ul class="nav flex-column">
  <li class="nav-item">
    <a class="nav-link " href="add.php">Add article</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">Delete article</a>
  </li>
    <li class="nav-item">
    <a class="nav-link" href="#">My articles</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="logout.php">Logout</a>
  </li>

</ul>
<?php } 
else {?><a class="nav-link" href="login.php">Login</a>
<?php } ?>

