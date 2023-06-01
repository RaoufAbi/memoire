<?php
include('config.php');
include('sessionPatient.php');

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>deg medical</title>

  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/search-medecin.css">
  <link rel="stylesheet" href="css/medecin_page.css">
  <link rel="stylesheet" href="css/navbar.css">

</head>

<body>

  <?php include('navbar.php') ?>

  <div class="containere profile-container" style="height: 630px; ;">


    <section class="main">

      <section class="attendance">
        <div class="attendance-list">
          <h1>Liste des médecaments</h1>
          <table class="table">
            <thead>
              <tr>
                <th>profile</th>
                <th>Name</th>
                <th>médicament</th>
                <th>prix</th>
                <th>pdf</th>

              </tr>
            </thead>
            <tbody>
              <?php
              $getmedicament = mysqli_query($conn, "SELECT * FROM propose_medicament WHERE id_medecin ='$user_id' ORDER BY id DESC");


              while ($medicament = mysqli_fetch_array($getmedicament)) {
                $delegue_id = $medicament['id_delegue'];
                $medicament_id = $medicament['id_medicament'];
                $Getdelegue = mysqli_query($conn ,"SELECT * FROM délégué_médical WHERE id_pers ='$delegue_id'");   

                
                while( $delegue = mysqli_fetch_array($Getdelegue)) {
                    $Getmedicament = mysqli_query($conn ,"SELECT * FROM medicament WHERE id ='$medicament_id'");
                    while( $medc = mysqli_fetch_array($Getmedicament)) {

                echo "
              <tr class='active'>
              <td><img src='img/photoProfile/$delegue[photo_profile]' class='photo_profil' ></td>
                <td>$delegue[name]</td>
                <td>$medc[name_m]</td>
                <td>$medc[prix] DA</td>
                <td><a download='$medc[name_m]' href='img/medicament/$medc[pdf]'><img class='remove_img' src='img/profile_page/file.png' ></a></td>
    
              </tr>
              ";
              }}} ?>

            </tbody>
          </table>
        </div>
      </section>
    </section>


  </div>



  <script src="script/index.js"></script>
  
</body>

</html>