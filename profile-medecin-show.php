<?php
include ('config.php');
include ('sessionPatient.php');


 

// get id medecin avc methode get 
$result = mysqli_query($conn ,"SELECT * FROM médecin");
$pers_id = (int) $_GET['id'];

$posts = "SELECT * FROM post WHERE id_pers = '$pers_id' ORDER BY id_post DESC";
$rows = mysqli_query($conn,$posts);

// si existe get les informations de medecin
if (isset($_GET['id'])) {
 $get_pers_id = "SELECT * FROM médecin where id_pers = '$pers_id'";
 $run_pers_id = mysqli_query($conn, $get_pers_id);
 $row_pers_id = mysqli_fetch_array($run_pers_id);
}


// verificaton  abonnee ou no
$fellowBDD = mysqli_query($conn,"SELECT * FROM folllowing");
$fellow = mysqli_fetch_array($fellowBDD);
$is_following = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM folllowing WHERE sender_id = '$user_id' AND receiver_id = '$pers_id'"));

// verificaton  demande RDV ou no
$rvBDD = mysqli_query($conn,"SELECT * FROM rendez_vous");
$rv = mysqli_fetch_array($rvBDD);
$is_make_rv = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM rendez_vous WHERE id_patient = '$user_id' AND id_medecin = '$pers_id' AND status = 'en_attent'"));

// si click btn follow alors insert to table following 
if (isset($_POST['follow'])) {
    $date_time = date("Y-m-d h:i");
    mysqli_query($conn, "INSERT INTO folllowing (sender_id, receiver_id,date_time) VALUES ('$user_id', '$pers_id','$date_time')");
    mysqli_query($conn, "INSERT INTO notification_médecin (id_patient, id_médecin,not_type,not_date,user_type) VALUES ('$user_id', '$pers_id','follow','$date_time','$user_type')");

    header('Location: ' . $_SERVER['REQUEST_URI']);
    exit();
}

// si click btn UNfollow alors DELETE to table following 
if (isset($_POST['unfollow'])) {
    mysqli_query($conn, "DELETE FROM folllowing WHERE sender_id = '$user_id' AND receiver_id = '$pers_id'");
    header('Location: ' . $_SERVER['REQUEST_URI']);
    exit();
}

    // demander rendez-vous
if (isset($_POST['rendez_vous'])) {
    $date_demande = date("Y-m-d");
    $date_rv = $_POST["date_rendez_vous"];
    if ($date_demande < $date_rv) {
            //ajoute les données a table rendez_vous
    mysqli_query($conn, "INSERT INTO rendez_vous (id_medecin, id_patient, date_de_rv ,status,date_demande) VALUES ('$pers_id', '$user_id','$date_rv','en_attent','$date_demande')");

    //ajoute les données a table notification_médecin
    mysqli_query($conn, "INSERT INTO notification_médecin (id_patient, id_médecin,not_type,not_date,user_type) VALUES ('$user_id', '$pers_id','rendez_vous','$date_demande','$user_type')");
    header('Location: ' . $_SERVER['REQUEST_URI']);
    exit();
    }else {
    echo'<script>alert("vérifier la date de fin du suivi");</script>';
}}

    // Annuler rendez-vous
if (isset($_POST['annuler_rv'])) {

    //supprimer les données a table rendez_vous 
    mysqli_query($conn, "DELETE FROM rendez_vous WHERE id_patient = '$user_id' AND id_medecin = '$pers_id'");
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
    
    <div class="profile-container">
        <div class="profile-detailes">
            <div class="pd-left">
                <div class="pd-row">
                    <img id="pd-img" src="img/photoProfile/<?php echo $row_pers_id["photo_profile"]?>" class="pd-image" >
                    <div>
                        <h3><?php echo $row_pers_id['name']; ?></h3>
                        <p><?php 
                                $nbs = "SELECT COUNT(id_follow) AS nombre_de_suiveurs FROM folllowing WHERE receiver_id ='$pers_id'";
                                $nbsuivers = mysqli_query($conn, $nbs); 
                                if (mysqli_num_rows($nbsuivers) > 0) {
                                    
                                    $nombersuive = mysqli_fetch_assoc($nbsuivers);
                                    
                                    // Display the number of followers
                                    echo $nombersuive["nombre_de_suiveurs"] ." suiveurs";
                                } else {
                                    echo "Aucun suiveurs";
                                }
                                
                                ?>
                            
                        </p>
                    </div>
                </div>
            </div>
            <div class="pd-right">
            
                <form method="post">
                
             <?php if ($is_following) { ?>
                <form method="post">
                    <button type="submit" name="unfollow" id="btn-follow" class="follow-btn follow">
                        <img src="img/profile_page/add-friends.png"> Unfollow
                    </button>
                </form>
            <?php } else { ?>
                <form method="post">
                    <button type="submit" name="follow" id="btn-follow" class="follow-btn"><img src="img/profile_page/add-friends.png"> follow</button>
                
                        <?php } ?>
                       
                </form>
                
                <br>

                <?php 

                // si l'utilisteur est patient alors afficher
                if ($row['user_type']=='patient') {
                   
                // si le patient a fait une demande
                if ($is_make_rv) { ?>
                <form method="post">
                    <button type="submit" name="annuler_rv" id="btn-follow" class="follow-btn follow">
                        <img src="img/profile_page/add-friends.png"> annuler RV
                    </button>
                </form>
            <?php }
            // sinon afficher
             else { ?>
                <button type="button" onclick ="toggle()" class="follow-btn"><img src="img/profile_page/add-friends.png">rendez vous</button>
                        <?php }} ?>
                

            </div>

        </div>

        <div class="profile-info">
            <div class="info-col">

                <div class="profile-intro">
                    <h3>Bio : </h3>
                    <p class="intro-text"><?php echo $row_pers_id['bio']; ?></p>
                    <hr>
                    <ul>
                        <li><img src="img/profile-job.png"><?php echo $row_pers_id['spécialite']; ?></li>
                        <li><img src="img/profile-job.png"><?php echo $row_pers_id['annes_dexperience'];?> annes d'experience</li>
                        <li><img src="img/profile-study.png"><?php echo $row_pers_id['nom_de_létablissement_de_formation']; ?></li>
                        <li><img src="img/profile-home.png"><?php echo $row_pers_id['numéro_de_téléphone'];?> </li>
                        <li><img src="img/profile-location.png"> <?php echo $row_pers_id['adresse_de_domicile']; ?></li>


                    </ul>
                </div>

        <div class="profile-intro">
                    <div class="title-box">
                        <h3>Photos</h3>
                        <a href="">Tout les photos</a>
                    </div>

            <div class="photo-box">
            <?php foreach ($rows as $rw) :?>
                
                <div> <img src="img/post/<?php echo $rw["photo"]?>" class="post-img" ></div>
            <?php endforeach ;?>    
            </div>

        </div>

            </div>




            <div class="post-col">


             <?php foreach ($rows as $rw) :?>
             
            <div class="post..">
                <div class="post-container">
                    <div class="post-row">
                        <div class="user-profile">
                            <img src="img/photoProfile/<?php echo $row_pers_id["photo_profile"]?>" >
                        
                        <div>
                            <p><?php echo $row_pers_id['name']; ?></p>
                            <span><?php echo $rw['date_post']; ?></span>
                        </div>
                        
                    </div>
                    <a href=""><i class="fa fa-ellipsis-v"></i></a>
                </div>
                
                <p class="post-text"><?php echo $rw["statu"]?></p>
                <img src="img/post/<?php echo $rw["photo"]?>" class="post-img" >
                

                </div>

            </div>
            <?php endforeach ;?>

            
                
                
               
                </div>
            </div>
        </div>
         


    </div>

    <div class="popup">
    
    <form method="post" class="" autocomplete="off" enctype="multipart/form-data">
        <div class="inputcontrol ">
            <label for="">rendez_vous :</label>
            <h4>Date</h4>
            <input class="date_rendez_vous" type="date" name="date_rendez_vous" required>
      </div>
        
        <div class="btn-cont">
        <input type="submit" name="rendez_vous" value="Rendez vous" class="popup-btn"  >
        <button  class="popup-btn close" onclick ="toggle()" >Fremer</button>
        </div>
    </form>
    
    </div>



    <script src="script/index.js"></script>

</body>
</html>