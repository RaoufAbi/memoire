<?php
include ('config.php');
include ('sessionPatient.php');


// effet secondaire
if (isset($_POST['submit_effact'])) {
    $effact = mysqli_real_escape_string($conn,$_POST['effact']); 
    $id_med = mysqli_real_escape_string($conn,$_POST['id_med_effact']); 
// si formilaire not vide
if (!empty($effact)) {
  // ajoute a table effact_secondaire
    $date_time = date("Y-m-d h:i");
    $upeffact ="INSERT INTO effact_secondaire (id_patient	,id_medecin,effact) VALUES  ('$user_id','$id_med','$effact') ";
    mysqli_query($conn,$upeffact) or die('query failed');
    mysqli_query($conn, "INSERT INTO notification_médecin (id_patient, id_médecin,not_type,not_date,user_type) VALUES ('$user_id', '$id_med','effet','$date_time','$user_type')");
    header('location:profile-patient.php');  
}
}

//si existe upbio alors update le bio
if (isset($_POST['UPbio'])) {
  $UPbio = mysqli_real_escape_string($conn,$_POST['bio']); 

if ((!empty($UPbio))) {
  $uppatient ="UPDATE patient SET bio = '$UPbio' WHERE id_pers = '$user_id' ";
  mysqli_query($conn,$uppatient) or die('query failed');
  header('location:profile-patient.php');  
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>profile patient</title>
    <link rel="stylesheet" href="css/medecin_page.css">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/popup.css">
    <link rel="stylesheet" href="css/style.css">


</head>
<body>

    
<?php
include ('navbar.php');
?>
    
    <div class="profile-container" >
        <div class="profile-detailes">
            <div class="pd-left">
                <div class="pd-row">
                    <img id="pd-img" src="img/photoProfile/<?php echo $row["photo_profile"]?>" class="pd-image" >
                    <div>
                        <h3><?php echo $row['name']; ?></h3>

                    </div>
                </div>
            </div>

        </div>

        <div class="profile-info">
            <div class="info-col">

                <div class="profile-intro">
                    <h3>Bio : </h3>
                    <p class="intro-text"><?php echo $row['bio']; ?></p>
                    <button class="button_popup" onclick ="toggle()" >Edit Bio</button>
                    <hr>
                    <ul>
                        <li><img src="img/profile_page/date-of-birth.png"><?php echo $row['date_naissance']; ?></li>
                        <li><img src="img/profile_page/home.png"><?php echo $row['ville'];?> </li>
                        
                    </ul>
                </div>
        </div>



              <div class="post-col">

                      <div class="margin">


              <section class="main">

                <section class="attendance">
                  <div class="attendance-list">
                    <h1>Liste des Médecin qui vous suivent</h1>
                    <table class="table">
                      <thead>
                        <tr>

                          <th>profile</th>
                          <th>Name</th>
                          <th>email</th>
                          <th>effet</th>
                        </tr>
                      </thead>
                      <tbody>
                    


                            <?php  
                          $getsuive = mysqli_query($conn,"SELECT * FROM suive WHERE id_patient = '$user_id' ORDER BY id ASC");
                          
                          
                          while ( $suive = mysqli_fetch_array($getsuive)) {
                            $med_id = $suive['id_medecin'];
                            $Getmed = mysqli_query($conn ,"SELECT * FROM médecin WHERE id_pers ='$med_id'");   
                            
                            
                            while( $med = mysqli_fetch_array($Getmed)) {
                              
                              
                                echo "
                                <tr class='active'>
                                <td><a href='profile-medecin-show.php?id=$med[id_pers]' class='button'><img src='img/photoProfile/$med[photo_profile]' class='photo_profil' ></a></td>
                                  <td><a href='profile-medecin-show.php?id=$med[id_pers]'>$med[name]</a></td>
                                  <td>$med[email]</td>

                                  <td><img src='img/profile_page/add.png' class='png add' onclick ='toggle1($med[id_pers])'></td>

                                </tr>
                  
                                ";
                              
                      } }?>

                      </tbody>
                    </table>
                  </div>
                </section>
              </section>


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

    </div>
    </div>
    </div>


<div class="popup">
    
    <form method="post" class="" autocomplete="off" enctype="multipart/form-data">
        <div class="inputcontrol ">
            <label for="">bio :</label>
            <textarea  rows="3"  name="bio" ></textarea>
      </div>
        
        <div class="btn-cont">
        <input type="submit" name="UPbio" value="ajouter" class="popup-btn"  >
        <button  class="popup-btn close" onclick ="toggle()" >Annuler</button>
        </div>
    </form>
    
  </div>


    <div class="popup popup2">
    
    <form method="post" class="" autocomplete="off" enctype="multipart/form-data">
        <div class="inputcontrol ">
          <input type='text' name='id_med_effact' id='id_med_effact' value='' class='id-patient'>
            <label for="">effet secondaire :</label>
            <textarea  rows="3"  name="effact" ></textarea>
      </div>
        
        <div class="btn-cont">
        <input type="submit" name="submit_effact" value="Envoyer" class="popup-btn"  >
        <button  class="popup-btn close" onclick ="toggle1('')" >Annuler</button>
        </div>
    </form>
    
    </div> 
<script src="script/index.js"></script>
         
     <script>
      function toggle1(id) {
    const id_med_effact = document.getElementById('id_med_effact').value = id;
    var blur = document.querySelector('.profile-container');
    var blur1 = document.querySelector('.nav-bar');
    blur.classList.toggle('BlurActive');
    blur1.classList.toggle('BlurActive');

    var popup = document.querySelector('.popup2');
    popup.classList.toggle('BlurActive');
}

    </script> 


</body>
</html>