
<?php
include ('config.php');
include ('sessionPatient.php');

if (isset($_POST['envoyer'])) {
  // get les information de formilaire
  $time_rv = $_POST["time_r"];
  $msj_rv = $_POST["msj_rv"];
  $id_patient_rv = $_POST["id_patient_rv"];
  $id_rv = $_POST["id_rv"];
  $date_demande = date("Y-m-d h:i");

  // ajout a table rendez_vous message , date de rv et le status ='confirm'
  mysqli_query($conn, "UPDATE rendez_vous SET time_rv ='$time_rv' WHERE id ='$id_rv'");
  mysqli_query($conn, "UPDATE rendez_vous SET msg_rv ='$msj_rv' WHERE id ='$id_rv'");
  mysqli_query($conn, "UPDATE rendez_vous SET status ='confirm' WHERE id_medecin ='$user_id' AND id ='$id_rv'");

  // envoyer notfication a patient
  mysqli_query($conn, "INSERT INTO notification_patient (id_patient, id_médecin,not_type,not_date) VALUES ('$id_patient_rv','$user_id','rendez_vous','$date_demande')");

  header('Location: ' . $_SERVER['REQUEST_URI']);
  exit();
}


// si existe submit_ordonnance alors update la table effact_secondaire
if (isset($_POST['submit_ordonnance'])) {
  //si pdf no eexiste
  if ($_FILES["pdf"]["error"] === 4) {
    echo "<script> alert('pdf not exist');</script>";
}else {
    $file_name = $_FILES["pdf"]["name"];
    $file_size = $_FILES["pdf"]["size"];
    $tmp_name = $_FILES["pdf"]["tmp_name"];

    $validImageExtension = ['pdf'];
    $pdfExtension = explode('.',$file_name); 
    $pdfExtension = strtolower(end($pdfExtension));
    if (!in_array($pdfExtension,$validImageExtension)) {
      //si ficher not pdf
        echo "<script> alert('Invalid pdf extention');</script>";
    } 
    else if ($file_size > 10000000000) {
      // si pdf est grand
        echo "<script> alert('pdf size is to large');</script>";
    }
    else{
        $newpdfName = uniqid();
        $newpdfName .='.'. $pdfExtension;
        move_uploaded_file($tmp_name,'ordonnace/'.$newpdfName);
          
          $conseils = $_POST["conseils"];
          $id_effact = $_POST["id_effact"];
          $id_patient = mysqli_real_escape_string($conn,$_POST['id_med_effact']); 
          mysqli_query($conn,"UPDATE effact_secondaire SET date_ordonnance = NOW() WHERE id_medecin= '$user_id' AND id_patient = '$id_patient' AND id = '$id_effact' ");
          mysqli_query($conn,"UPDATE effact_secondaire SET ordonnance = '$newpdfName' WHERE id_medecin= '$user_id' AND id_patient = '$id_patient' AND id = '$id_effact' ");
          mysqli_query($conn,"UPDATE effact_secondaire SET conseils = '$conseils' WHERE id_medecin= '$user_id' AND id_patient = '$id_patient' AND id = '$id_effact' ");
          header('Location: ' . $_SERVER['REQUEST_URI']);
      }
  }
}


//get suive
$getsuive = mysqli_query($conn,"SELECT * FROM suive WHERE id_medecin = '$user_id' ORDER BY status ASC ");


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Attendance Dashboard </title>


  <link rel="stylesheet" href="css/style.css"/>
  <link rel="stylesheet" href="css/medecin_page.css"/>
  <link rel="stylesheet" href="css/popup.css"/>
  <link rel="stylesheet" href="css/navbar.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>

</head>
<body>

<?php

include ('navbar.php');
?>


  <div class="containere profile-container">


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
                <th>envoyer</th>
              </tr>
            </thead>
            <tbody>
            <?php  
            // get RDV
            $getRV = mysqli_query($conn,"SELECT * FROM rendez_vous WHERE id_medecin = '$user_id' ORDER BY date_demande DESC");
            
            
            while ( $rendez_v = mysqli_fetch_array($getRV)) {
              //get patient
              $patient_rv_id = $rendez_v['id_patient'];
              $GetPatient = mysqli_query($conn ,"SELECT * FROM patient WHERE id_pers ='$patient_rv_id'");   
              
              
              while( $rv_patient = mysqli_fetch_array($GetPatient)) {
                if ($rendez_v['status'] == 'confirm') {
             
                  echo "
                  <tr class='active'>
                    
                    <td>$rv_patient[name]</td>
                    <td>$rv_patient[email]</td>
                    <td>$rendez_v[date_de_rv]</td>
                    <td>$rendez_v[msg_rv]</td>
                    <td>$rendez_v[time_rv]</td>
                    <td><button type='button' class='btn-active table-btn' >Réussi</button></td>
                    
                  </tr>
    
                  ";
                }else {
                  
                
        echo "
              <tr>
                <form method='post'>
                <td class='id-patient'><input type='text' name='id_patient_rv' value='$rendez_v[id_patient]'></td>
                <td class='id-patient'><input type='text' name='id_rv' value='$rendez_v[id]'></td>
                <td>$rv_patient[name]</td>
                <td>$rv_patient[email]</td>
                <td>$rendez_v[date_de_rv]</td>
                <td><input type='text' name='msj_rv' placeholder='message'></td>
                <td><input type='time' name='time_r'></td>
                <td><button class='table-btn' type='submit' name='envoyer'>envoyer</button></td>
                </form>
              </tr>

              "; }
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


    

    <section class="main">

      <section class="attendance">
        <div class="attendance-list">
          <h1>Liste des patients qui vous suivi</h1>
          <table class="table">
            <thead>
              <tr>
                <th>profile</th>
                <th>Name</th>
                <th>email</th>
                <th>date de fin</th>
                <th>status</th>
              </tr>
            </thead>
            <tbody>
            <?php  
            
            
            
            while ( $suive = mysqli_fetch_array($getsuive)) {
              $id_suiv = $suive['id'];
              $patient_suive_id = $suive['id_patient'];
              $GetPatient = mysqli_query($conn ,"SELECT * FROM patient WHERE id_pers ='$patient_suive_id'");   
              
              
              while( $suive_patient = mysqli_fetch_array($GetPatient)) {
                  $datefin =date("Y/m/d",  strtotime($suive["date_fin_suive"]));
                  $currentDate = date("Y/m/d");

                  if (strtotime($currentDate) > strtotime($datefin)) {
                    // Update the status column to "fin"
                    mysqli_query($conn, "UPDATE suive SET status = 'fin' WHERE id = '$id_suiv'");
                  }

                  echo "
                  <tr class='active'>
                    <td><img src='img/photoProfile/$suive_patient[photo_profile]' class='photo_profil' ></td>
                    <td>$suive_patient[name]</td>
                    <td>$suive_patient[email]</td>
                    <td>$datefin</td>  
                    <td>$suive[status]</td>                     
                  </tr>
    
                  ";
                }
          }?>
                

            </tbody>
          </table>
        </div>
      </section>
    </section>


    <section class="main">

<section class="attendance">
  <div class="attendance-list">
    <h1>Liste des patients ayant des effets escondaires</h1>
    <table class="table">
      <thead>
        <tr>
          <th>profile</th>
          <th>Name</th>
          <th>email</th>
          <th>effact</th>
          <th>ordonnance</th>
          <th>statut</th>
        </tr>
      </thead>
      <tbody>
      <?php  
      $getsuive = mysqli_query($conn,"SELECT * FROM effact_secondaire WHERE id_medecin = '$user_id' ");
      
      
      while ( $suive = mysqli_fetch_array($getsuive)) {
        $patient_suive_id = $suive['id_patient'];
        $GetPatient = mysqli_query($conn ,"SELECT * FROM patient WHERE id_pers ='$patient_suive_id'");   
        
        
        while( $suive_patient = mysqli_fetch_array($GetPatient)) {
          if ($suive['date_ordonnance'] == '0000-00-00 00:00:00.000000') {
                  echo "
                 
                  <tr>
                    
                  <tr>
                  <td><img src='img/photoProfile/$suive_patient[photo_profile]' class='photo_profil' ></td>
                  <td>$suive_patient[name]</td>
                  <td>$suive_patient[email]</td>
                  <td><details class='dropdown'>
                  <summary role='button'>
                    <a class='button'><img src='img/profile_page/right.png' class='png add'></a>
                  </summary>
                    <p class='summarypar'>$suive[effact]</p>
                 </details></td>
                  <td><img src='img/profile_page/add.png' class='png add'onclick ='toggle2($suive_patient[id_pers],$suive[id])'></td>
                  <td><img src='img/profile_page/cross.png' class='png add'></td>
                  </tr>



                  ";   
          }else {

            echo "
            
            <tr class='active'>
            <td><img src='img/photoProfile/$suive_patient[photo_profile]' class='photo_profil' ></td>
            <td>$suive_patient[name]</td>
            <td>$suive_patient[email]</td>
            <td><details class='dropdown'>
            <summary role='button'>
              <a class='button'><img src='img/profile_page/right.png' class='png add'></a>
            </summary>
              <p class='summarypar'>$suive[effact]</p>
           </details></td>
           <td><img src='img/profile_page/add.png' class='png add'onclick ='toggle2($suive_patient[id_pers],$suive[id])'></td>
            <td><img src='img/profile_page/success.png' class='png add'></td>
           </tr>

           
           
           
          

          

                  ";
          
  }

          }
    }?>
          

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


<!--   <div class="popup">
    
    <form method="post" class="" autocomplete="off" enctype="multipart/form-data">
    <input type='text' name='id_med_effact' id='id_med_effact' value='' class='id-patient'>

              <div class="inputcontrol ">
                  <label for="">consails :</label>
                  <textarea  rows="3"  name="cnseils" ></textarea>
              </div>

              <div class="inputcontrol ">
              <label for="">consails "Pdf" :</label>
              <input type="file" name="pdf" accept=".pdf">
              </div>
              
              <div class="btn-cont">
              <input type="submit" name="submit_ordonnance" value="upload" class="popup-btn"  >
              <button  class="popup-btn close" onclick ="toggle2('','')" >go back</button>
              </div>
    </form>
    
    </div> -->

    

    
    <div class='popup popup2'>
    
    <form method='post' class='' autocomplete='off' enctype='multipart/form-data'>
    <input type='text' name='id_med_effact' id='id_med_effact' value='' class='id-patient'>
    <input type='text' name='id_effact' id='id_effact' value='' class='id-patient'>
              <div class='inputcontrol'>
                  <label for=''>consails "text" :</label>
                  <textarea  rows='2'  name='conseils'></textarea>
              </div>

              <div class='inputcontrol'>
              <label for=''>consails "Pdf" :</label>
              <input type='file' name='pdf' accept='.pdf'>
              </div>
              
              <div class='btn-cont'>
              <input type='submit' name='submit_ordonnance' value='upload' class='popup-btn'  >
              <button  class='popup-btn close' onclick ="toggle2('','')" >go back</button>
              </div>
              
    </form>
    
    </div>



  <script src="script/index.js"> </script>
  <script>
function toggle2(id , id_effact) {
    const id_med_effact = document.getElementById('id_med_effact').value = id;
    const id_eff = document.getElementById('id_effact').value = id_effact;
    var blur = document.querySelector('.profile-container');
    var blur1 = document.querySelector('.nav-bar');
    blur.classList.toggle('BlurActive');
    blur1.classList.toggle('BlurActive');

    var popup = document.querySelector('.popup2');
    popup.classList.toggle('BlurActive');
}
    </script>

    <script>
      // countdown



    </script>
</body>
</html>
