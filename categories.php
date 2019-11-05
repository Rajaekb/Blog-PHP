<?php session_start();
include 'menu.php';
include 'connexion.php';
?>

<?php 
      $sql = "SELECT * FROM categories";
      $result = mysqli_query($conn, $sql);
          ?>
<div class="container">
  <div class="row">
     <?php while($row = $result->fetch_assoc()){?>
       <a href="categorie.php?cate=<?php echo $row['Name']?>">
        <div class="col-4">     
        <div style="background-image: url(<?php echo $row['image']?>); height: 300px; width: 300px; background-size:100% 100%; text-align: center;color:white;box-shadow:5px 10px 18px #888888;">
          <div style="width: 300px;height: 80px;background-color:black;opacity: 50%;padding-top: 20px; margin-top:10%;">
          <h2><?php echo $row['Name']?></h2>
          </div>   
        </div>
    </div><?php }?></a>
  </div>
</div>
</body>