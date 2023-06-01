<?php
include ('config.php');
include ('sessionPatient.php');


//filter
//formilaire avec methode GET
//get les information mn BDD avec var condition
$condition = "";

if(isset($_GET['search_name']) && $_GET['search_name']!="") {
    $nom_du_méd = $_GET['search_name'];
    $condition .= " AND name LIKE '%$nom_du_méd%'";
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/medecin_page.css"/>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/search_btn.css">


<style>
img{
        display: block;
        width: 100%;
        height: 100%;
}

.post-container {
        margin: 0;
   margin-bottom: 20px ;
}

.wrapper{
    margin-top: 100px ;
}

.wrapper #left,
.wrapper #right,
.wrapper .carousel{
    margin-left:150px;
} 

.wrapper i:first-child{
  left: -82px;
}
.wrapper i:last-child{
  margin-right: -52px;
}

.card a{
    display : block;
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

.card a:hover{
  background: #265DF2;
}

main .container-accueil .right .messages h5{
   color: #000000;
   margin-bottom:5px;
}

main {
    top: -2.2rem;
}

  .hidden {
        display: none;
    }
    .visible {
        display: block;
    }



    </style>

</head>

<body class="user-body">

<?php include('navbar.php');
?> 
        <?php include('card_slider.php'); ?>
    <main>
        <div class="container-accueil">

            <!------------ left-sidebar ---------->
            <div class="left">
 

   
                    <!--- side bar ---->
                    <div class="sidebar">
                        <a id="postesMenuItem" class="menu-item active" onclick="changeStyle('postes')">
                              <span> <i class="uil uil-angle-double-right"></i> </span> <h3>Post</h3>
                        </a>

                        <a id="medecinSuiveMenuItem" class="menu-item" onclick="changeStyle('medecin_suive')">
                              <span> <i class="uil uil-angle-double-right"></i> </span> <h3>Liste des médecin</h3>
                        </a>

                        <a id="rendezVousMenuItem" class="menu-item" onclick="changeStyle('rendez_vous')">
                              <span> <i class="uil uil-angle-double-right"></i> </span> <h3>Rendez-vous</h3>
                        </a>

                        <a id="suivimédicalMenuItem" class="menu-item" onclick="changeStyle('suivi_médical')">
                              <span> <i class="uil uil-angle-double-right"></i> </span> <h3>Liste Des Effets Secondaire</h3>
                        </a>


                    </div>
                

            


            



                <!------------ end-side bar ---------->
            </div>
            <!------------ main-contnet ---------->
            <div class="middle">
                
                <div id="postes" class="section">
                <?php
$GetFellowPost = mysqli_query($conn ,"SELECT * FROM folllowing WHERE sender_id ='$user_id'");



while ($FellowPost = mysqli_fetch_array($GetFellowPost)) {
    $follow_id = $FellowPost['receiver_id'];
    $GetPost = mysqli_query($conn ,"SELECT * FROM post WHERE id_pers ='$follow_id'");
    $Getmed = mysqli_query($conn ,"SELECT * FROM médecin WHERE id_pers ='$follow_id'");
    $med = mysqli_fetch_array($Getmed);
    while ( $pub = mysqli_fetch_array($GetPost)) {
        echo "
        <div class='post'>
        <div class='post-container'>
        <div class='post-row'>
            <div class='user-profile'>
                <img src='img/photoProfile/$med[photo_profile]' >
            
            <div>
                <p>$med[name]</p>
                <span>$pub[date_post]</span>
            </div>
            
        </div>
        <a href=''><i class='fa fa-ellipsis-v'></i></a>
    </div>
    
    <p class='post-text'>$pub[statu]</p>
    <img src='img/post/$pub[photo]' class='post-img' >
    

    </div>
    </div>


" 
         ;} 
}

                
                ?>            
                </div>
                <div id="medecin_suive">
                    
                <section class="main">

            <section class="attendance">
  <div class="attendance-list">
    <h1>Liste des médecins qui vous suivi</h1>
    <table class="table">
      <thead>
        <tr>
          <th>profile</th>
          <th>Name</th>
          <th>email</th>
        </tr>
      </thead>
      <tbody>
      <?php  
      $getsuive = mysqli_query($conn,"SELECT * FROM folllowing WHERE sender_id = '$user_id' ");
      
      
      while ( $suive = mysqli_fetch_array($getsuive)) {
        $med_suive_id = $suive['receiver_id'];
        $Getmed = mysqli_query($conn ,"SELECT * FROM médecin WHERE id_pers ='$med_suive_id'");   
        
        
        while( $suive_med = mysqli_fetch_array($Getmed)) {

            echo "
            <tr class='active'>
              <td><img src='img/photoProfile/$suive_med[photo_profile]' class='photo_profil' ></td>
              <td>$suive_med[name]</td>
              <td>$suive_med[email]</td>                    
            </tr>

            ";
          }
    }?>
          

      </tbody>
    </table>
  </div>
</section>
</section>

                </div>

                
<div id="rendez_vous" >
                <section class="main">

<section class="attendance">
  <div class="attendance-list">
    <h1>Liste des rendez vous</h1>
    <table class="table">
      <thead>
        <tr>
          <th>Name</th>
          <th>email</th>
          <th>Date</th>
          <th>Message</th>
          <th>Heure</th>
        </tr>
      </thead>
      <tbody>
      <?php  
      $getRV = mysqli_query($conn,"SELECT * FROM rendez_vous WHERE id_patient = '$user_id' ORDER BY date_demande DESC");
      
      
      while ( $rendez_v = mysqli_fetch_array($getRV)) {
        $patient_rv_id = $rendez_v['id_medecin'];
        $GetPatient = mysqli_query($conn ,"SELECT * FROM médecin WHERE id_pers ='$patient_rv_id'");   
        
        
        while( $rv_patient = mysqli_fetch_array($GetPatient)) {
          if ($rendez_v['status'] == 'confirm') {
            
            echo "
            <tr class='active'>
              
              <td>$rv_patient[name]</td>
              <td>$rv_patient[email]</td>
              <td>$rendez_v[date_de_rv]</td>
              <td>$rendez_v[msg_rv]</td>
              <td>$rendez_v[time_rv]</td>
              
            </tr>

            ";
          }else {
            
          
  echo "
        <tr>
          
          <td class='id-patient'><input type='text' name='id_patient_rv' value='$rendez_v[id_patient]'></td>
          <td class='id-patient'><input type='text' name='id_rv' value='$rendez_v[id]'></td>
          <td>$rv_patient[name]</td>
          <td>$rv_patient[email]</td>
          <td>$rendez_v[date_de_rv]</td>
          <td>en attend</td>
          <td>en attend</td>
          
        </tr>

        "; }
   ;} }?>
          
      </tbody>
    </table>
  </div>
</section>
</section>

                </div>
                
<div id="suivi_médical" >

                <section class="main">

                <section class="attendance">
                  <div class="attendance-list">
                    <h1>Liste des effets secondaire</h1>
                    <table class="table">
                      <thead>
                        <tr>

                          <th>profile</th>
                          <th>name</th>
                          <th>effet</th>
                          <th>date</th>
                          <th>consiels</th>
                          <th>ordonnace</th>
                        </tr>
                      </thead>
                      <tbody>
                    


                            <?php  
                          $getsuive = mysqli_query($conn,"SELECT * FROM effact_secondaire WHERE id_patient = '$user_id' ORDER BY date_ordonnance DESC");
                          
                          
                          while ( $suive = mysqli_fetch_array($getsuive)) {
                            $med_id = $suive['id_medecin'];
                            $Getmed = mysqli_query($conn ,"SELECT * FROM médecin WHERE id_pers ='$med_id'");   
                            
                            
                            while( $med = mysqli_fetch_array($Getmed)) {

                            $dateord =  strtotime($suive['date_ordonnance']);
                              if ($suive['date_ordonnance'] == "0000-00-00 00:00:00.000000") {
                                echo"
                                <tr class=''>
                                <td><a href='profile-medecin-show.php?id=$med[id_pers]' class='button'><img src='img/photoProfile/$med[photo_profile]' class='photo_profil' ></a></td>
                                  <td><a href='profile-medecin-show.php?id=$med[id_pers]'>$med[name]</a></td>
                                  <td><details class='dropdown'>
                                  <summary role='button'>
                                    <a class='button'><img src='img/profile_page/right.png' class='png add'></a>
                                  </summary>
                                    <p class='summarypar'>$suive[effact]</p>
                                </details></td>
                                  <td>en attente</td>
                                
                                    <td>en attente</td>
                        
                                  <td>en attente</td>

                                </tr>
                                ";
                              }else {
                                echo "
                                <tr class=''>
                                <td><a href='profile-medecin-show.php?id=$med[id_pers]' class='button'><img src='img/photoProfile/$med[photo_profile]' class='photo_profil' ></a></td>
                                  <td><a href='profile-medecin-show.php?id=$med[id_pers]'>$med[name]</a></td>
                                  <td><details class='dropdown'>
                                  <summary role='button'>
                                    <a class='button'><img src='img/profile_page/right.png' class='png add'></a>
                                  </summary>
                                    <p class='summarypar'>$suive[effact]</p>
                                </details></td>
                                  <td>".date("Y-m-d / H:i",$dateord)."</td>
                                
                                    <td><details class='dropdown'>
                                  <summary role='button'>
                                    <a class='button'><img src='img/profile_page/right.png' class='png add'></a>
                                  </summary>
                                    <p class='summarypar'>$suive[conseils]</p>
                                </details></td>
                        
                                  <td><a download='$suive[ordonnance]' href='ordonnace/$suive[ordonnance]'><img class='remove_img' src='img/profile_page/file.png' ></a></td>

                                </tr>
                  
                                ";
                              }

                              
                      } }?>

                      </tbody>
                    </table>
                  </div>
                </section>
              </section>
                </div>
                   
            </div>


            <!------------ right-sidebar ---------->
             <div class="right">
               <div class="messages">
                    <div class="heading">
                        <h4>Médecins qui vous suivez</h4><i class="uil uil-edit"></i>
                    </div>
                    


                 <div class="search-bar-messages">
                            <div class="s003">
      <form method="GET" action="http://localhost/memoir/user_page.php">
        <div class="inner-form">
          <div class="input-field second-wrap">
            <input id="search" type="text" name="search_name" placeholder="Donner le nom de médecin" />
          </div>
          <div class="input-field third-wrap">
            <button class="btn-search" type="submit">
              <svg class="svg-inline--fa fa-search fa-w-16" aria-hidden="true" data-prefix="fas" data-icon="search" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                <path fill="currentColor" d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z"></path>
              </svg>
            </button>
          </div>
        </div>
      </form>
    </div>
                 </div>
           
                <?php

$GetFellowPost = mysqli_query($conn ,"SELECT * FROM folllowing WHERE sender_id ='$user_id'");



while ($FellowPost = mysqli_fetch_array($GetFellowPost)) {
    $med_id = $FellowPost['receiver_id'];
    $Getmed = mysqli_query($conn ,"SELECT * FROM médecin WHERE id_pers ='$med_id' $condition");
    
    while ($med = mysqli_fetch_array($Getmed)) {
        echo "

        
        <a href='profile-medecin-show.php?id=$med[id_pers]' class='message'>
        <div class='profile-photo'>
            <img src='img/photoProfile/$med[photo_profile]'>
            <div class='active'></div>
        </div>
        <div class='message-body'>
            <h5>$med[name]</h5>
            <p class='text-bold'>$med[email]</p>
        </div>
        </a>
 


" ;} 
}

                

                ?>
         


               

                 
                 <div class="message" style="visibility: hidden;overflow: hidden;">
                    <div class="profile-photo">
                        <img src="img/photoProfile/Default.png">
                        <div class="active"></div>
                    </div>
                    <div class="message-body">
                        <h5>vini</h5>
                        <p class="text-bold">iam sory real madrid</p>
                    </div>
                 </div>
                </div> 
            </div>
        </div>

    </main>
    <script src="script/index.js"> </script>
    <script src="script/search_btn.js"></script>
    <script>

function changeStyle(sectionId) {
        var postesSection = document.getElementById('postes');
        var medecinSuiveSection = document.getElementById('medecin_suive');
        var RVSection = document.getElementById('rendez_vous');
        var ESSection = document.getElementById('suivi_médical');

        
        var postesMenuItem = document.getElementById('postesMenuItem');
        var medecinSuiveMenuItem = document.getElementById('medecinSuiveMenuItem');
        var rendezVousMenuItem = document.getElementById('rendezVousMenuItem');
        var suivimédicalMenuItem = document.getElementById('suivimédicalMenuItem');


        if (sectionId === 'postes') {
            postesSection.classList.remove('hidden');
            postesSection.classList.add('visible');

            medecinSuiveSection.classList.remove('visible');
            medecinSuiveSection.classList.add('hidden');

            RVSection.classList.remove('visible');
            RVSection.classList.add('hidden');

            ESSection.classList.remove('visible');
            ESSection.classList.add('hidden');

            postesMenuItem.classList.add('active');
            medecinSuiveMenuItem.classList.remove('active');
            rendezVousMenuItem.classList.remove('active');
            suivimédicalMenuItem.classList.remove('active');

        } else if (sectionId === 'medecin_suive') {
            postesSection.classList.add('hidden');
            postesSection.classList.remove('visible');

            medecinSuiveSection.classList.add('visible');
            medecinSuiveSection.classList.remove('hidden');

            RVSection.classList.remove('visible');
            RVSection.classList.add('hidden');

            ESSection.classList.remove('visible');
            ESSection.classList.add('hidden');

            postesMenuItem.classList.remove('active');
            medecinSuiveMenuItem.classList.add('active');
            rendezVousMenuItem.classList.remove('active');
            suivimédicalMenuItem.classList.remove('active');

        }else if (sectionId === 'rendez_vous') {
            postesSection.classList.add('hidden');
            postesSection.classList.remove('visible');

            medecinSuiveSection.classList.remove('visible');
            medecinSuiveSection.classList.add('hidden');

            RVSection.classList.add('visible');
            RVSection.classList.remove('hidden');

            ESSection.classList.remove('visible');
            ESSection.classList.add('hidden');

            postesMenuItem.classList.remove('active');
            medecinSuiveMenuItem.classList.remove('active');
            rendezVousMenuItem.classList.add('active');
            suivimédicalMenuItem.classList.remove('active');

        }else if (sectionId === 'suivi_médical') {
            postesSection.classList.add('hidden');
            postesSection.classList.remove('visible');

            medecinSuiveSection.classList.remove('visible');
            medecinSuiveSection.classList.add('hidden');

            RVSection.classList.remove('visible');
            RVSection.classList.add('hidden');

            ESSection.classList.add('visible');
            ESSection.classList.remove('hidden');

            postesMenuItem.classList.remove('active');
            medecinSuiveMenuItem.classList.remove('active');
            rendezVousMenuItem.classList.remove('active');
            suivimédicalMenuItem.classList.add('active');

        }
}
    </script>

    
</body>

</html>




    