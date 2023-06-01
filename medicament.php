
<?php
include ('config.php');
include ('sessionPatient.php');
//filter
//formilaire avec methode GET
//get les information mn BDD avec var condition
$condition = "";

if(isset($_GET['nom_du_médicament']) && $_GET['nom_du_médicament']!="") {
  $nom_du_médicament = $_GET['nom_du_médicament'];
  $condition .= " AND name_m LIKE '%$nom_du_médicament%'";
}

if(isset($_GET['usage']) && $_GET['usage']!="") {
  $usage = $_GET['usage'];
  $condition .= " AND usage_medicament LIKE '%$usage%'";
}

if(isset($_GET['prix']) && $_GET['prix']!="") {
  $prix = $_GET['prix'];
  $condition .= " AND prix LIKE '%$prix%'";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>medicament</title>
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/medecin_page.css"/>
  <link rel="stylesheet" href="css/search-medecin.css"/>
  <link rel="stylesheet" href="css/navbar.css" />
  <link rel="stylesheet" href="css/rating.css" />

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>

</head>
<body>

<?php

include ('navbar.php');
?>

<nav class="sidebarFilter">

<form method="GET">


<input type="text" id="form" name="nom_du_médicament" autocomplete="off" placeholder=" nom du médicament">
      
      <input type="text" id="form" name="usage" autocomplete="off" placeholder="usage">
    
      <input type="number" id="form" name="prix" autocomplete="off" placeholder="prix">
    
      <button class="button-58" role="button" type="submit">Recherche</button>



  <br><br>
  

</form>

</nav>


  <div class="containere right-container">


    <section class="main">

      <section class="attendance">
        <div class="attendance-list">
          <h1>Liste des médicaments</h1>
          <table class="table">
            <thead>
              <tr>
                <th>profile</th>
                <th>délégue médical</th>
                <th>name</th>
                <th>prix</th>
                <th>notice</th>
              </tr>
            </thead>
            <tbody>
            <?php  
            $getmedicament = mysqli_query($conn,"SELECT * FROM medicament WHERE 1=1 $condition ORDER BY RAND() ");
            
            
            while ( $medicament = mysqli_fetch_array($getmedicament)) {
              $id_medical = $medicament['id_deg'];
              $Getdeg = mysqli_query($conn ,"SELECT * FROM délégué_médical WHERE id_pers ='$id_medical'");   
              
              
              while( $deg = mysqli_fetch_array($Getdeg)) {
                
                  
                  echo "
                  <tr class='active'>
                    <td><img src='img/photoProfile/$deg[photo_profile]' class='photo_profil' ></td>
                    <td>$deg[name]</td>
                    <td>$medicament[name_m]</td>
                    <td>$medicament[prix]</td>
                    <td><a download='$medicament[name_m]' href='img/medicament/$medicament[pdf]'><img class='remove_img' src='img/profile_page/file.png' ></a></td>

                  </tr>
    
                  ";
                
         ;} }?>
                

<!--                <tr >
                <td>05</td>
                <td>Salina</td>
                <td>Coding</td>
                <td>03-24-22</td>
                <td>9:00AM</td>
                <td>4:00PM</td>
                <td><button>View</button></td>
              </tr>
              <tr >
                <td>06</td>
                <td>Tara Smith</td>
                <td>Testing</td>
                <td>03-24-22</td>
                <td>9:00AM</td>
                <td>4:00PM</td>
                <td><button>View</button></td>
              </tr>  -->
            </tbody>
          </table>
        </div>
      </section>
    </section>
  </div>
  <script src="script/index.js"> </script>
  <script>
      const btn = document.querySelector("button");
      const post = document.querySelector(".post");
      const widget = document.querySelector(".star-widget");
      const editBtn = document.querySelector(".edit");
      btn.onclick = ()=>{
        widget.style.display = "none";
        post.style.display = "block";
        editBtn.onclick = ()=>{
          widget.style.display = "block";
          post.style.display = "none";
        }
        return false;
      }
    </script>
</body>
</html>
