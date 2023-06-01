<?php
include ('config.php');
include ('sessionPatient.php');
// get les input
if (isset($_POST['update_profile'])) {
 $UPname = mysqli_real_escape_string($conn,$_POST['update_name']); 
 $UPville = mysqli_real_escape_string($conn,$_POST['ville']); 
 $UPemail = mysqli_real_escape_string($conn,$_POST['update_email']);
 $UPadresse = mysqli_real_escape_string($conn, $_POST['adresse_de_domicile']);
 $UPnuméro_de_téléphone = mysqli_real_escape_string($conn, $_POST['numéro_de_téléphone']);
 $UPannes_dexperience = mysqli_real_escape_string($conn, $_POST['annes_dexperience']);
 $UPspécialite = mysqli_real_escape_string($conn, $_POST['spécialite']);
 $UPnom_de_létablissement_de_formation = mysqli_real_escape_string($conn, $_POST['nom_de_létablissement_de_formation']);  
 $oldpass = $_POST['update-password']; 
 $newpass = $_POST['new-password'];
 $confirmpass = $_POST['confirm-password'];

 // si les inputs de mot pass not vide et old pass = old pass BDD alors update
    if ((!empty($oldpass))||(!empty($newpass))||(!empty($confirmpass))) {
        if ($oldpass == $row['password'] || $newpass == $confirmpass) {
            $upmedecin ="UPDATE médecin SET password = '$newpass' WHERE id_pers = '$user_id' ";
            $upPersonne ="UPDATE personne SET password = '$newpass' WHERE id= '$user_id' ";
            mysqli_query($conn,$upmedecin) or die('query failed');
            mysqli_query($conn,$upPersonne) or die('query failed');
            header('location:médecin_page.php');  
            }
    }


    if ((!empty($UPname))) {
        $upmedecin ="UPDATE médecin SET name = '$UPname' WHERE id_pers = '$user_id' ";
        $upPersonne ="UPDATE personne SET name = '$UPname' WHERE id= '$user_id' ";
        mysqli_query($conn,$upmedecin) or die('query failed');
        mysqli_query($conn,$upPersonne) or die('query failed');
        header('location:médecin_page.php');  
    }

    if ((!empty($UPname))) {
        $upmedecin ="UPDATE médecin SET ville = '$UPville' WHERE id_pers = '$user_id' ";
        mysqli_query($conn,$upmedecin) or die('query failed');
        header('location:médecin_page.php');  
    }

    if ((!empty($UPemail))) {
        $upmedecin ="UPDATE médecin SET email = '$UPemail' WHERE id_pers = '$user_id' ";
        $upPersonne ="UPDATE personne SET email = '$UPemail' WHERE id= '$user_id' ";
        mysqli_query($conn,$upmedecin) or die('query failed');
        mysqli_query($conn,$upPersonne) or die('query failed');
        header('location:médecin_page.php');  
    }

    if ((!empty($UPadresse))) {
        $upmedecin ="UPDATE médecin SET adresse_de_domicile = '$UPadresse' WHERE id_pers = '$user_id' ";
        mysqli_query($conn,$upmedecin) or die('query failed');
        header('location:médecin_page.php');  
    }

    if ((!empty($UPnuméro_de_téléphone))) {
        $upmedecin ="UPDATE médecin SET numéro_de_téléphone = '$UPnuméro_de_téléphone' WHERE id_pers = '$user_id' ";
        mysqli_query($conn,$upmedecin) or die('query failed');
        header('location:médecin_page.php');  
    }

    if ((!empty($UPannes_dexperience))) {
        $upmedecin ="UPDATE médecin SET annes_dexperience = '$UPannes_dexperience' WHERE id_pers = '$user_id' ";
        mysqli_query($conn,$upmedecin) or die('query failed');
        header('location:médecin_page.php');  
    }

    if ((!empty($UPspécialite))) {
        $upmedecin ="UPDATE médecin SET spécialite = '$UPspécialite' WHERE id_pers = '$user_id' ";
        mysqli_query($conn,$upmedecin) or die('query failed');
        header('location:médecin_page.php');  
    }
    
    if ((!empty($UPnom_de_létablissement_de_formation))) {
        $upmedecin ="UPDATE médecin SET nom_de_létablissement_de_formation = '$UPnom_de_létablissement_de_formation' WHERE id_pers = '$user_id' ";
        mysqli_query($conn,$upmedecin) or die('query failed');
        header('location:médecin_page.php');  
    }
    


    if ((!empty($_FILES["update_image"]["name"]))) {
        

            $file_name = $_FILES["update_image"]["name"];
            $file_size = $_FILES["update_image"]["size"];
            $tmp_name = $_FILES["update_image"]["tmp_name"];
    
            $validImageExtension = ['jpg','jpeg','png'];
            $imageExtension = explode('.',$file_name); // explode تضع في array حسب كل .
            $imageExtension = strtolower(end($imageExtension));
            if (!in_array($imageExtension,$validImageExtension)) {
                echo "<script> alert('Invalid image extention');</script>";
            } 
            elseif ($file_size > 10000000) {
                echo "<script> alert('image size is to large');</script>";
            }
            else{
                $newImageName = uniqid();
                $newImageName .='.'. $imageExtension;                
                $upPhotoProfile ="UPDATE médecin SET photo_profile = '$newImageName' WHERE id_pers = '$user_id' ";
                mysqli_query($conn,$upPhotoProfile);
                move_uploaded_file($tmp_name,'img/photoProfile/'.$newImageName);
                header('location:médecin_page.php');
            }
        }

    }
    





?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/edit-profil.css">
    <title>médecin edit profil</title>
</head>
<body>

<div class="update-profile">

    
    

    <form action="" method="post" enctype="multipart/form-data">
        <img src="img/photoProfile/<?php echo $row['photo_profile'];?>">
        <div class="flex">
            <div class="inputbox">
                <span>user name :</span>
                <input type="text" name="update_name" class="box" value="<?php echo $row['name'];?>" > 

                <span>email :</span>
                <input type="text" name="update_email" class="box" value="<?php echo $row['email'];?>">

                <span>adresse_de_domicile</span>
                <input type="text" name="adresse_de_domicile" class="box" value="<?php echo $row['adresse_de_domicile'];?>">
                
                <span for="">numéro_de_téléphone</span>   
                <input type="text" name="numéro_de_téléphone" class="box" value="<?php echo $row['numéro_de_téléphone'];?>">

                <span for="">annes_dexperience</span>
                  <input type="number" name="annes_dexperience" class="box" value="<?php echo $row['annes_dexperience'];?>">

                <span>photo profile :</span>
                <input type="file" name="update_image" class="box" >
            </div>
            <div class="inputbox">

            <span for="">spécialite</span>   
            <input type="text" name="spécialite"  class="box" value="<?php echo $row['spécialite'];?>">

            <span for="">ville</span>   
            <input type="text" name="ville"  class="box" value="<?php echo $row['ville'];?>">

            <span for="">nom_de_létablissement_de_formation </span>   
                  <input type="text" name="nom_de_létablissement_de_formation" class="box" value="<?php echo $row['nom_de_létablissement_de_formation'];?>" >
                
                <input type="hidden" name="old_password" >
                <span>old password :</span>
                <input type="password" name="update-password" placeholder="entre old password" class="box" >

                <span>new password :</span>
                <input type="password" name="new-password" placeholder="entre new password" class="box" >

                <span>confirm password :</span>
                <input type="password" name="confirm-password" placeholder="confirm password" class="box" >
            </div>
        </div>
            <div class="btn-cont">
            <input type="submit" value="update profile" name="update_profile" class="btn" id="update-btn">
            <a href="médecin_page.php" class="btn" id="back-btn">go back</a>
            </div>
    </form>
            
</div>



    
</body>
</html>