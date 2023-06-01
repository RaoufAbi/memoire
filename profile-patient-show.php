<?php
include ('config.php');
include ('sessionPatient.php');


 

//// get id patient avc methode get 
$result = mysqli_query($conn ,"SELECT * FROM patient");
$pers_id = (int) $_GET['id'];


// si existe get les informations de patient
if (isset($_GET['id'])) {
    $get_pers_id = "SELECT * FROM patient where id_pers = '$pers_id'";
    $run_pers_id = mysqli_query($conn, $get_pers_id);
    $row_pers_id = mysqli_fetch_array($run_pers_id);
   }
// verificaton  suivi ou no
   $suiviBDD = mysqli_query($conn,"SELECT * FROM suive");
   $suiv = mysqli_fetch_array($suiviBDD);
   $is_suivi = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM suive WHERE id_medecin = '$user_id' AND id_patient = '$pers_id' AND status ='en attend'"));
   

   // si click btn suivi alors insert les infos
   if (isset($_POST['suivi'])) {
    $date_time = date("Y-m-d H:i:s");
    $date_fin = $_POST["date_fin"];
    //verification la date de fin suive si a9l mn date de aujourd'hui alors afficher alert
    if ($date_time < $date_fin) {
        mysqli_query($conn, "INSERT INTO suive (id_medecin, id_patient,date_time,date_fin_suive,status) VALUES ('$user_id', '$pers_id','$date_time','$date_fin','en attend')");
        mysqli_query($conn, "INSERT INTO notification_patient (id_patient, id_médecin,not_type,not_date) VALUES ('$pers_id', '$user_id','suive','$date_time')");
    
        header('Location: ' . $_SERVER['REQUEST_URI']);
        exit();
    }else {
        echo'<script>alert("vérifier la date de fin du suivi");</script>';
    }
}
    // si click btn desabonner alors update stauts to annuler
if (isset($_POST['desabonner'])) {
    mysqli_query($conn, "UPDATE suive SET status = 'annuler' WHERE id_medecin = '$user_id' AND id_patient = '$pers_id'");
    header('Location: ' . $_SERVER['REQUEST_URI']);
    exit();
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>profile medecin</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/navbar.css">


</head>
<body>

    
<?php
include ('navbar.php');
?>
    
    <div class="profile-container" style="  height: 630px; ;">
        <div class="profile-detailes">
            <div class="pd-left">
                <div class="pd-row">
                    <img id="pd-img" src="img/photoProfile/<?php echo $row_pers_id["photo_profile"]?>" class="pd-image" >
                    <div>
                        <h3><?php echo $row_pers_id['name']; ?></h3>
                    </div>
                </div>
            </div>
            <div class="pd-right">

            <form method="post">
                
                <?php if ($is_suivi) { ?>
                   <form method="post">
                       <button type="submit" name="desabonner" id="btn-follow" class="follow-btn follow">
                           <img src="img/profile_page/add-friends.png"> Désabonner
                       </button>
                   </form>
               <?php } else { ?>
                   <form method="post">
                       <button type="button"onclick ="toggle()"  id="btn-follow" class="follow-btn"><img src="img/profile_page/add-friends.png"> Suivi</button>
                   
                           <?php } ?>
                          
                   </form>

                <br>
               
            </div>

        </div>


        <div class="profile-info">
            <div class="info-col">

                <div class="profile-intro">
                    <h3>Bio : </h3>
                    <p class="intro-text"><?php echo $row['bio']; ?></p>
                    <hr>
                    <ul>
                        <li><img src="img/profile_page/date-of-birth.png"><?php echo $row_pers_id['date_naissance']; ?></li>
                        <li><img src="img/profile_page/home.png"><?php echo $row_pers_id['ville'];?> </li>
                        
                    </ul>
                </div>
        </div>


    </div>
    </div>
    </div>


    <div class="popup">
    
    <form method="post" class="" autocomplete="off" enctype="multipart/form-data">
        <div class="inputcontrol ">
            <label for="">suive :</label>
            <h4>Date de fin du suivi</h4>
            <input class="date_rendez_vous" type="date" name="date_fin" required>
      </div>
        
        <div class="btn-cont">
        <input type="submit" name="suivi" value="suivi" class="popup-btn"  >
        <button  class="popup-btn close" onclick ="toggle()" >Fremer</button>
        </div>
    </form>
    
    </div>


    <script src="script/index.js"></script>

</body>
</html>