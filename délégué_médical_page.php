<?php
include('config.php');
include('sessionPatient.php');

// si exist post remove 
// delete this médicament
if (isset($_POST['remove'])) {
  $id_m = $_POST["id_m"];
  mysqli_query($conn, "DELETE FROM medicament WHERE id ='$id_m'");

  header('Location: ' . $_SERVER['REQUEST_URI']);
  exit();
}

// si exist post propose 
// ajout this médicament a table propose_medicament 
if(isset($_POST['propose'])){
    $medecin_id = $_POST['medecin'];
    $medicamentId = $_POST['medicamentId'];
    $date_demande = date("Y-m-d h:i");
     
    //boucle -- insert a les medecin selected in formilaire 
    foreach($medecin_id as $item){
         
        $query = "INSERT INTO propose_medicament (id_medecin,id_delegue,id_medicament) VALUES ('$item','$user_id','$medicamentId')";
        $query_run = mysqli_query($conn, $query);

        $not = "INSERT INTO notification_médecin (id_médecin,id_patient,not_type,not_date,user_type) VALUES ('$item','$user_id','medicamenet','$date_demande','$user_type')";
        $not_run = mysqli_query($conn, $not);
     }
 } 


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
  <style>
    .card a {
      display: block;
      border: none;
      font-size: 16px;
      color: #FFF;
      padding: 8px 16px;
      background-color: #4070F4;
      border-radius: 6px;
      margin: 0 14px;
      margin-top: 10px;
      cursor: pointer;
      transition: all 0.3s ease;
      text-decoration: none;
      bottom: 0;
    }

    .card a:hover {
      background: #265DF2;
    }

    .popupOverlay {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.5);
      display: none;
      justify-content: center;
      align-items: center;
      z-index: 9999;
    }

    .popupContent {
      background-color: #fff;
      padding: 20px;
      max-height: 80%;
      overflow-y: auto;
      border-radius: 5px;
    }

    .scrollableContent {
      height: 700px;
      width: 1400px;
    }

    .closePopup {
      position: absolute;
      top: 100px;
      right: 100px;
      z-index: 99999;
      box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px;
    }
    .btn-envoyer{
      position: absolute;
      top: 530px;
      right: 70px;
      z-index: 99999;
      box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px;

    }

    .openPopup {
      padding: 10px;
      background-color: #ccc;
    }

    .popupOverlay {
      transition: opacity 0.3s ease;
    }

    .popupContent {
      transition: transform 0.3s ease;
    }

    .popupOverlay.active {
      display: flex;
      opacity: 1;
    }

    .popupContent.active {
      transform: scale(1);
    }
    .main1{
      width:95%;
    }
    .my-button {
        width: 70px;
        height: 70px;
        border: none;
        border-radius: 100px;
        outline: none;
        background: hsl(120,95%,65%);;
        color: black; 
        cursor: pointer;
        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.15);
      }
      .my-button:hover {
        background: hsla(120, 96%, 65%, 0.788);;
      }


  </style>
</head>

<body>
    <!--  include navbar -->
  <?php include('navbar.php') ?>

  <div class="containere profile-container">

  <!--  include page card slider -->
    <?php include('card_slider.php'); ?>

    <section class="main">

      <section class="attendance">
        <div class="attendance-list">
          <h1>Liste des Médicament</h1>
          <table class="table">
            <thead>
              <tr>
                <th>Name</th>
                <th>prix</th>
                <th>pdf</th>
                <th>delete</th>
                <th>propose</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $getmedicament = mysqli_query($conn, "SELECT * FROM medicament WHERE id_deg ='$user_id' ORDER BY id ASC");

              // afficher les médicament
              while ($medicament = mysqli_fetch_array($getmedicament)) {

                echo "
              <tr class='active'>
             
                <td>$medicament[name_m]</td>
                <td>$medicament[prix] DA</td>
                <td><a download='$medicament[name_m]' href='img/medicament/$medicament[pdf]'><img class='remove_img' src='img/profile_page/file.png' ></a></td>
                <form method='post'>
                <td class='id-patient'><input type='text' name='id_m' value='$medicament[id]'></td>
                <td><button type='submit' name='remove' class='form-btn'><img class='remove_img' src='img/profile_page/remove.png'></button></td>
                <td><button type='button' class='form-btn openPopup' data-medicament-id='$medicament[id]'><img class='remove_img' src='img/profile_page/add.png'></button></td>
                </form>      
              </tr>
              ";
              } ?>

            </tbody>
          </table>
        </div>
      </section>
    </section>


  </div>




  <!--popup qui centient liste des medecin -->
  <div class="popupOverlay">
    <div class="popupContent">
      <button class='form-btn'><img class='remove_img closePopup' src='img/profile_page/close.png'></button>
      <div class="scrollableContent">
        <section class="main main1">

  <section class="attendance">
  <div class="attendance-list">
    <h1>Liste des Médecin qui vous suivi</h1>
    <table class="table">
      <thead>
        <tr>
          <th>profile</th>
          <th>Name</th>
          <th>email</th>
          <th>sélectionner</th>
        </tr>
      </thead>
      <tbody>

      <!-- formilaire propose médicament -->
        <form  method="post">
        <input type="text" class="id-patient" id="medicamentId" name="medicamentId" value="5">
      <?php  
      $getsuive = mysqli_query($conn,"SELECT * FROM folllowing WHERE sender_id = '$user_id' ");
      
      // get les abonnement
      while ( $suive = mysqli_fetch_array($getsuive)) {
        $med_suive_id = $suive['receiver_id'];
        $Getmed = mysqli_query($conn ,"SELECT * FROM médecin WHERE id_pers ='$med_suive_id'");   
        
        //get les médecin
        while( $med = mysqli_fetch_array($Getmed)) {
          // afficher la liste
            echo "
            <tr class='active'>
              <td><img src='img/photoProfile/$med[photo_profile]' class='photo_profil' ></td>
              <td>$med[name]</td>
              <td>$med[email]</td>
              <td><input type='checkbox' name='medecin[]' value='$med[id_pers]'></td>                     
            </tr>

            ";
          }
    }?>
          
      </tbody>
    </table>
  </div>
</section>
</section>
<button type="submit" name="propose" class="my-button btn-envoyer">-></button>
          </form>
      </div>
    </div>
  </div>


  <script src="script/index.js"></script>
  <script>
    var swiper = new Swiper(".slide-content", {
      slidesPerView: 3,
      spaceBetween: 25,
      loop: true,
      centerSlide: 'true',
      fade: 'true',
      grabCursor: 'true',
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
        dynamicBullets: true,
      },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
      breakpoints: {
        0: {
          slidesPerView: 1,
        },
        520: {
          slidesPerView: 2,
        },
        950: {
          slidesPerView: 3,
        },
      },
    });
  </script>
  <script>
    //popup function with parmetr médicament id
    function openPopup(medicamentId) {
      const popupOverlay = document.querySelector('.popupOverlay');
      const medicamentIdInput = document.getElementById('medicamentId');

      medicamentIdInput.value = medicamentId;
      popupOverlay.classList.add('active');
    }

    document.addEventListener('DOMContentLoaded', function() {
      const openButtons = document.querySelectorAll('.openPopup');
      const closeButtons = document.querySelectorAll('.closePopup');
      const popupOverlay = document.querySelector('.popupOverlay');

      //onclick btn open
      openButtons.forEach((button) => {
        button.addEventListener('click', function() {
          const medicamentId = button.dataset.medicamentId;
          openPopup(medicamentId);
        });
      });

      //onclick btn close hidden popup 
      closeButtons.forEach((button) => {
        button.addEventListener('click', function() {
          popupOverlay.classList.remove('active');
        });
      });
    });
  </script>
</body>

</html>