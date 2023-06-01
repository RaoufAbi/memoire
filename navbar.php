<?php

include ('config.php');


if (isset($_GET['logout'] )) {
  unset($user_name);
  session_decode();
  header('location:login_form.php');
}
?> 




<header class="nav-bar">
    <a href="#"class="logo">Votre Santé</a>

    <nav class="nav_links">
    <ul>
    <li><a href="<?php if ($row['user_type']=='médecin') { echo "médecin_page.php";}
                  else if ($row['user_type']=='patient') {
                  echo"user_page.php";} else{echo"délégué_médical_page.php"; } ?>">Accueil</a></li>
    <li><a href="<?php if ($row['user_type']=='médecin') { echo "search_patient.php";}
                  else {
                  echo"search_medecin.php";} ?>">
                  <?php if ($row['user_type']=='médecin') { echo "Patient";}
                  else if ($row['user_type']=='patient') {
                  echo"Medecin";}else{
                    echo"Medecin";} ?></a></li>
 <li><a href="medicament.php">médecament</a></li>
    <?php
    
    if ($row['user_type']=='médecin') { echo " <li><a href='propose_a_vous.php'>propose a vous</a></li>";}
    
    ?>
   <?php  if ($row['user_type'] !='délégué_médical') { ?>
    <li><a href="<?php 
  
                  if ($row['user_type']=='médecin') { echo "médecin-notification.php";}
                  else if ($row['user_type']=='patient') {
                  echo"patient-notification.php";} else{echo"#"; } ?>">Notifcation</a></li>   
  </ul> 
  <?php  } ?>
    </nav>
    <div onclick="menuToggle();" class="profile">
    <img src="img/photoProfile/<?php echo $row['photo_profile'];?>" class="photo_profil"> 
    </div> 


</header>

<div class="menu">
            
              <div class="user-info">
              <img src="img/photoProfile/<?php echo $row['photo_profile'];?>" >
              <h2><?php echo $row['name']; ?></h2>
              </div>
              <hr>
              <div class="menu-function">
                <ul>
                  <li><img src="img/utilisateur.png"><a href="
                  <?php if ($row['user_type']=='médecin') { echo "profile.php";}
                  elseif ($row['user_type']=='patient') {echo "profile-patient.php";}
                   else {echo"délégué_médical_profile.php"; } ?>">Profil</a></li>

                  <li><img src="img/edit.png"><a href="
                  <?php if ($row['user_type']=='médecin') { echo "médecin-edit-profil.php";}
                   else if ($row['user_type']=='patient') {
                    echo"patient-edit-profil.php";} else{echo"délégué_médical_edit_profile.php"; } ?>">Edit Profil</a></li>

                  <li><img src="img/help.png"><a href="help.php">Aider</a></li>
                  <li><img src="img/logout.png"><a href="index.php?logout=<?php echo $_SESSION['user_id'] ?>">Déconnecter</a></li>
                </ul>
              </div>
</div>



