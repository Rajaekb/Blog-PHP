<?php session_start();
include 'menu.php';
  include 'connexion.php';

?>
<!DOCTYPE html>
<html>
<head><link rel="stylesheet" type="text/css" href="css/style.css">
    <script>
    $(document).ready(function() {
    $("#formButton").click(function() {
      $("#form1").toggle();
    });
  });</script>
  <title></title>

</head>
<body> 
  <div class="container">
    <div class="row">
      <div class="col-9">
      <?php
        if(isset($_GET["idAr"])){
          $id_article=$_GET["idAr"];
          $sql = "SELECT * FROM article where id LIKE '$id_article'";
            $result = mysqli_query($conn, $sql);
            $row=mysqli_fetch_array($result);?>                     
            <h5><?php echo $row["title"];?></h5>
            <p><?php echo $row["description"];?></p>
             <img src="<?php echo $row['image']?>" width=500 height=400 class=img-fluid/><br><br><?php if(isset($_SESSION['Id'] )){?>
             <button type="button" id="formButton"><h4>Add more photos </h4></button>
             <form id="form1" method="POST" enctype="multipart/form-data">
              <input type="hidden" name="idAr" value="<?php echo $_GET['idAr'] ?>">
              <label for="inputImage" class="col-sm-2 col-form-label">choose Image :</label>
              <input type="file" class="form-control-file" id="inputImage" name="image">
                <input type="submit" name="upload" value="Upload">
            </form> 
        <?php }?>
      </div>
      <div class="col-3">
      <?php include 'navAside.php';  ?>
      </div>

    </div>
     <?php 
          $sql3 = "SELECT * FROM gallery where id_article LIKE '$id_article'";
          $result3 = mysqli_query($conn, $sql3);?>  
      
           <div class="row text-center text-lg-left">       
             <?php
              while($row3 = mysqli_fetch_array($result3)){?>  
            <div class="col-3"> 
              <a href="<?php echo $row3['image']?>" data-size="1600x1067">      
              <img src="<?php echo $row3['image']?>" width="300" height="300" class="img-thumbnail"/></a></div> 
                <?php
              }?>
           </div>
           
      <?php $sql2 = "SELECT * FROM commentaires where id_article LIKE '$id_article'";
      $result2 = mysqli_query($conn, $sql2);?>
      <ul class="list-group list-group-flush">
        <?php if ($result2->num_rows > 0) {?>
       <?php while($row2 = $result2->fetch_assoc()) {?>
        <li class="list-group-item"><?php echo $row2["commentaire"];?>
        <span style="float: right"><?php echo $row2["date"]; }}?></span>

 
       </li></ul>
      
      <form  method="POST" class="form" enctype="multipart/form-data">

        <div class="form-group">
          <label for="inputDesc"> Write a comment :</label>
          <textarea class="form-control" id="inputDesc" rows="5" name="comment"></textarea> 
        </div>
        <input type="hidden" name="idAr" value="<?php echo $_GET['idAr']?>">
        <input type="submit" name="addcoment" value="Add your comment">

      </form>
    
  
      <?php  
    
        if(isset($_POST["upload"])){    
         
          $idar=$_POST["idAr"];
          $target_dir = "images/uploads/";
          $target_file = $target_dir . basename($_FILES["image"]["name"]);

          $uploadOk = 1;
          $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  

              if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                  echo "The file ". basename( $_FILES["image"]["name"]). " has been uploaded.";
              } else {
                  echo "Sorry, there was an error uploading your file.";
              }
          
          $sql="insert into gallery (image,id_article) values ('$target_file','$idar')";
          if ($conn->query($sql) === TRUE) {
              echo "New photo created successfully";
              
             }
              }
           
      if(isset($_POST["addcoment"])){
        $idar=$_POST["idAr"];
        $Comment=$_POST["comment"];
        $idRe=$_SESSION["Id"];
        $date=date('D M j');
        

        $sql="insert into commentaires(commentaire,id_article,id_registre,date) values ('$Comment','$idar','$idRe','$date')";
        if ($conn->query($sql) === TRUE) {
            echo "New comment created successfully";
            header("location:article.php?idAr=$idar");
            
           } 
        }
      }
     
        ?>
        <a href="">Delete this Posts</a>

</div>
</body>

</html>
