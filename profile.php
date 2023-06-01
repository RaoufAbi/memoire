<?php
include ('config.php');
include ('sessionPatient.php');

//si existe upbio alors update le bio
$posts = "SELECT * FROM post WHERE id_pers = '$user_id' ORDER BY id_post DESC";
$rows = mysqli_query($conn,$posts); 
if (isset($_POST['UPbio'])) {
    $UPbio = mysqli_real_escape_string($conn,$_POST['bio']); 

if ((!empty($UPbio))) {
    $upmedecin ="UPDATE médecin SET bio = '$UPbio' WHERE id_pers = '$user_id' ";
    mysqli_query($conn,$upmedecin) or die('query failed');
    header('location:profile.php');  
}
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
                    <img id="pd-img" src="img/photoProfile/<?php echo $row["photo_profile"]?>" class="pd-image" >
                    <div>
                        <h3><?php echo $row['name']; ?></h3>
                        <p><?php 
                                $nbs = "SELECT COUNT(id_follow) AS nombre_de_suiveurs FROM folllowing WHERE receiver_id ='$user_id'";
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


        </div>

        <div class="profile-info">
            <div class="info-col">

                <div class="profile-intro">
                    <h3>Bio : </h3>
                    <p class="intro-text"><?php echo $row['bio']; ?></p>
                    <button class="button_popup" onclick ="toggle()" >Edit Bio</button>
                    <hr>
                    <ul>
                        <li><img src="img/profile-job.png"><?php echo $row['spécialite']; ?></li>
                        <li><img src="img/profile-job.png"><?php echo $row['annes_dexperience'];?> annes d'experience</li>
                        <li><img src="img/profile-study.png"><?php echo $row['nom_de_létablissement_de_formation']; ?></li>
                        <li><img src="img/profile-home.png"><?php echo $row['numéro_de_téléphone'];?> </li>
                        <li><img src="img/profile-location.png"> <?php echo $row['adresse_de_domicile']; ?></li>
                        <li><img src="img/profile-location.png"> <?php echo $row['ville']; ?></li>


                    </ul>
                </div>

        <div class="profile-intro">
                    <div class="title-box">
                        <h3>Photos</h3>
                    </div>

            <div class="photo-box">
            <?php foreach ($rows as $rw) :?>
                
                <div> <img src="img/post/<?php echo $rw["photo"]?>" class="post-img" ></div>
            <?php endforeach ;?>    
            </div>

        </div>

            </div>




            <div class="post-col">

                <div class="write-post-container">
                    <div class="user-profile">
                        <div class="user-profile">
                         <img src="img/photoProfile/<?php echo $row["photo_profile"]?>" >
                        </div>
                        <div>
                            <p><?php echo $row['name']; ?></p>
                            <small>public <i class="fas fa-caret-down"></i></small>
                        </div>
                    </div>
                    <div class="post-input-container">
                        <p class="pe"> publiez un Photo</p>
                        <br>
                        <div class="add-post-links">
                            
                            <a href="upload_post.php"><img src="img/profile_page/photo.png" >Photo / Statu</a>
                        </div>
                    </div>
                </div>

             <?php foreach ($rows as $rw) :?>
             
            <div class="post..">
                <div class="post-container">
                    <div class="post-row">
                        <div class="user-profile">
                            <img src="img/photoProfile/<?php echo $row["photo_profile"]?>" >
                        
                        <div>
                            <p><?php echo $row['name']; ?></p>
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
            <label for="">bio :</label>
            <textarea  rows="3"  name="bio" ></textarea>
      </div>
        
        <div class="btn-cont">
        <input type="submit" name="UPbio" value="upload" class="popup-btn"  >
        <button  class="popup-btn close" onclick ="toggle()" >go back</button>
        </div>
    </form>
    
    </div>




    <script src="script/index.js"></script>

</body>
</html>