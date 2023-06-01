<?php
include ('config.php');
include ('sessionPatient.php');

//filter
//formilaire avec methode GET
//get les information mn BDD avec var condition

$condition = "";
if(isset($_GET['name']) && $_GET['name']!="") {
  $name = $_GET['name'];
  $condition .= " AND name LIKE '%$name%'";
}
if(isset($_GET['specialty']) && $_GET['specialty']!="") {
  $specialty = $_GET['specialty'];
  $condition .= " AND spécialite LIKE '%$specialty%'";
}

if(isset($_GET['exp']) && $_GET['exp']!="") {
  $exp = $_GET['exp'];
  $condition .= " AND annes_dexperience LIKE '%$exp%'";
}

if(isset($_GET['ville']) && $_GET['ville']!="") {
  $ville = $_GET['ville'];
  $condition .= " AND ville LIKE '%$ville%'";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>médecins</title>
  <link rel="stylesheet" href="css/search-medecin.css">
  <link rel="stylesheet" href="css/navbar.css">

</head>

<body>
<?php include('navbar.php'); ?>

  <nav class="sidebarFilter">

  <form method="GET">


        
  <input type="text" id="form" name="name" autocomplete="off" placeholder="Name">
      
  <input type="text" id="form" name="specialty" autocomplete="off" placeholder="spécialité">

  <input type="text" id="form" name="ville" autocomplete="off" placeholder="ville">

  <input type="text" id="form" name="exp" autocomplete="off" placeholder="annes_dexperience">



  <button class="button-58" role="button" type="submit">Recherche</button>
  
  
    <br><br>
    

</form>

  </nav>


  <div class="right-container">
    
    <div class="cards-cont">

    <?php 
    $GetMedecin = mysqli_query($conn ,"SELECT * FROM médecin WHERE 1=1 $condition ORDER BY RAND()");
    while ($row = mysqli_fetch_array($GetMedecin)) {
            echo "
            <div class='card swiper-slide'>
            <div class='image-content'>
              <span class='overlay'></span>
    
              <div class='card-image'>
                <img src='img/photoProfile/$row[photo_profile]' alt='' class='card-img'>
              </div>
            </div>
    
            <div class='card-content'>
              <h2 class='name'>$row[name]</h2>
              <h4 class='description'>$row[spécialite]</h4>
              <h4 class='description'>$row[ville]</h4>
              <a href='profile-medecin-show.php?id=$row[id_pers]' class='button'> Vien Profile</a>
              
            </div>
          </div>
    " 
             ;} 
     ?>



    </div>
  </div>



  

  <script src="script/index.js"></script>
  <script></script>
</body>

</html>