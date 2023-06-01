<?php
include ('config.php');
include ('sessionPatient.php');

if (isset($_POST['update_profile'])) {

// get les données form formilaire

 $UPname = mysqli_real_escape_string($conn, $_POST['update_name']);
 $UPemail = mysqli_real_escape_string($conn, $_POST['update_email']);
 $Adresse = mysqli_real_escape_string($conn, $_POST['update_Adresse']);
 $numéro_de_téléphone = mysqli_real_escape_string($conn, $_POST['update_numéro_de_téléphone']);
 $oldpass = mysqli_real_escape_string($conn, $_POST['update-password']);
 $newpass = mysqli_real_escape_string($conn, $_POST['new-password']);
 $confirmpass = mysqli_real_escape_string($conn, $_POST['confirm-password']);

    //si mot pass et cpass et newpass not vide
    if ((!empty($oldpass))||(!empty($newpass))||(!empty($confirmpass))) {

        // si mot pass = cpass et oldpass = pass in bdd
        // alors update
        if ($oldpass == $row['password'] || $newpass == $confirmpass) {
            $upPatient ="UPDATE délégué_médical SET password = '$newpass' WHERE id_pers = '$user_id' ";
            $upPersonne ="UPDATE personne SET password = '$newpass' WHERE id= '$user_id' ";
            mysqli_query($conn,$upPatient) or die('query failed');
            mysqli_query($conn,$upPersonne) or die('query failed');
            header('location:délégué_médical_page.php');            }
    } 


        // si name not vide
        // alors update

    if ((!empty($UPname))) {
        $upPatient ="UPDATE délégué_médical SET name = '$UPname' WHERE id_pers = '$user_id' ";
        $upPersonne ="UPDATE personne SET name = '$UPname' WHERE id= '$user_id' ";
        mysqli_query($conn,$upPatient) or die('query failed');
        mysqli_query($conn,$upPersonne) or die('query failed');
        header('location:délégué_médical_page.php');     
    }

        // si email not vide
        // alors update

    if ((!empty($UPemail))) {
        $upPatient ="UPDATE délégué_médical SET email = '$UPemail' WHERE id_pers = '$user_id' ";
        $upPersonne ="UPDATE personne SET email = '$UPemail' WHERE id= '$user_id' ";
        mysqli_query($conn,$upPatient) or die('query failed');
        mysqli_query($conn,$upPersonne) or die('query failed');
        header('location:délégué_médical_page.php');    }

        // si adress not vide
        // alors update
        if ((!empty($Adresse))) {
            $upPatient ="UPDATE délégué_médical SET Adresse = '$Adresse' WHERE id_pers = '$user_id' ";
            mysqli_query($conn,$upPatient) or die('query failed');
            header('location:délégué_médical_page.php');      }
        
        // si numero not vide
        // alors update
        if ((!empty($numéro_de_téléphone))) {
            $upPatient ="UPDATE délégué_médical SET numéro_de_téléphone = '$numéro_de_téléphone' WHERE id_pers = '$user_id' ";
            mysqli_query($conn,$upPatient) or die('query failed');
            header('location:délégué_médical_page.php');   }
        
    

        // si photo not vide
        
    if ((!empty($_FILES["update_image"]["name"]))) {
        

            $file_name = $_FILES["update_image"]["name"];
            $file_size = $_FILES["update_image"]["size"];
            $tmp_name = $_FILES["update_image"]["tmp_name"];
    
            $validImageExtension = ['jpg','jpeg','png'];
            $imageExtension = explode('.',$file_name);
            $imageExtension = strtolower(end($imageExtension));
            if (!in_array($imageExtension,$validImageExtension)) {
                echo "<script> alert('Invalid image extention');</script>";
            } 
            elseif ($file_size > 10000000) {
                echo "<script> alert('image size is to large');</script>";
            }
            else{        
                // alors update
                $newImageName = uniqid();
                $newImageName .='.'. $imageExtension;                
                $upPhotoProfile ="UPDATE délégué_médical SET photo_profile = '$newImageName' WHERE id_pers = '$user_id' ";
                mysqli_query($conn,$upPhotoProfile);
                move_uploaded_file($tmp_name,'img/photoProfile/'.$newImageName);
                header('location:délégué_médical_page.php'); 
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
    <title>deg edit profil</title>
</head>
<body>

<div class="update-profile">

    
    

    <form action="" method="post" enctype="multipart/form-data">
        <img src="img/photoProfile/<?php echo $row['photo_profile'];?>">
        <div class="flex">
            <div class="inputbox">
                <span>le nom complet :</span>
                <input type="text" name="update_name" class="box" value="<?php echo $row['name'];?>" > 

                <span>email :</span>
                <input type="text" name="update_email" class="box" value="<?php echo $row['email'];?>">
                
                <span>Adresse :</span>
                <input type="text" name="update_Adresse" class="box" value="<?php echo $row['Adresse'];?>" > 

                <span>numéro_de_téléphone:</span>
                <input type="number" name="update_numéro_de_téléphone" class="box" value="<?php echo $row['numéro_de_téléphone'];?>" > 

                <span>photo profile:</span>
                <input type="file" name="update_image" class="box" >
            </div>
            <div class="inputbox">
                
                <input type="hidden" name="old_password" >
                <span>ancien mot de passe :</span>
                <input type="password" name="update-password" placeholder="entre old password" class="box" >

                <span>nouveau mot de passe :</span>
                <input type="password" name="new-password" placeholder="entre new password" class="box" >

                <span>Confirmez le mot de passe :</span>
                <input type="password" name="confirm-password" placeholder="confirm password" class="box" >
            </div>
        </div>

        <div class="btn-cont">
            <input type="submit" value="Confirmer" name="update_profile" class="btn" id="update-btn">
            <a href="délégué_médical_page.php" class="btn" id="back-btn">Annuler</a>
        </div>
    </form>
            
</div>



    
</body>
</html>