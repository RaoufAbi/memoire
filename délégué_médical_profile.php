<?php
include ('config.php');
include ('sessionPatient.php');



    //si existe post remove alors delete this médicament
    if (isset($_POST['remove'])) {
        $id_m = $_POST["id_m"];
        mysqli_query($conn, "DELETE FROM medicament  WHERE id ='$id_m'");
      
        header('Location: ' . $_SERVER['REQUEST_URI']);
        exit();
    }

    //si existe post upbio and not vide modifier le bio
    if (isset($_POST['UPbio'])) {
        $UPbio = mysqli_real_escape_string($conn,$_POST['bio']); 
    
    if ((!empty($UPbio))) {
        $upmedecin ="UPDATE délégué_médical SET bio = '$UPbio' WHERE id_pers = '$user_id' ";
        mysqli_query($conn,$upmedecin) or die('query failed');
        header('Location: ' . $_SERVER['REQUEST_URI']);
        exit();
    }
    }
    
    



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>profile deg midecal</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/medecin_page.css">
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
                    </div>
                </div>
            </div>


        </div>

       <div class="profile-info">
            <div class="info-col">

                <div class="profile-intro">
                    <h3>Bio : </h3>
                    <p class="intro-text"><?php echo $row['bio']; ?></p>
                    <button class="button_popup" onclick ="toggle()" >Modifier le Bio</button>
                    <hr>
                    <ul>
                        <li><img src="img/profile-job.png"><?php echo $row['name']; ?></li>
                        <li><img src="img/profile-job.png"><?php echo $row['email'];?></li>
                        <li><img src="img/profile-job.png"><?php echo $row['numéro_de_téléphone']; ?></li>
                        <li><img src="img/profile-location.png"> <?php echo $row['Adresse']; ?></li>


                    </ul>
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
                        <p class="pe">Ajouter des Médecaments</p>
                        <br>
                        <div class="add-post-links">
                            
                            <a href="upload_medecament.php"><img src="img/profile_page/add.png" ><strong>Ajouter</strong> </a>
                        </div>
                    </div>
                </div>

    
                <div class="containe">


<section class="main">

  <section class="attendance">
    <div class="attendance-list">
      <h1>Liste des medicament</h1>
      <table class="table">
        <thead>
          <tr>
            <th>Name</th>
            <th>prix</th>
            <th>pdf</th>
            <th>delete</th>
          </tr>
        </thead>
        <tbody>
        <?php  
       $getmedicament = mysqli_query($conn ,"SELECT * FROM medicament WHERE id_deg ='$user_id' ORDER BY id ASC");
        
        //get les medicament in bdd and afficher
        while ( $medicament = mysqli_fetch_array($getmedicament)) {
             
              echo "
              <tr class='active'>
             
                <td>$medicament[name_m]</td>
                <td>$medicament[prix] DA</td>
                <td><a download='$medicament[name_m]' href='img/medicament/$medicament[pdf]'><img class='remove_img' src='img/profile_page/file.png' ></a></td>
                <form method='post'>
                <td class='id-patient'><input type='text' name='id_m' value='$medicament[id]'></td>
                <td><button type='submit' name='remove' class='form-btn'  ><img class='remove_img' src='img/profile_page/remove.png'></button></td>
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
</div>
</div>
</div>


      <!-- POPUP -->
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