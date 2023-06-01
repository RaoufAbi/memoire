<?php
include ('config.php');
include ('sessionPatient.php');

if (isset($_POST['update_profile'])) {
 $UPname = mysqli_real_escape_string($conn,$_POST['update_name']); 
 $UPemail = mysqli_real_escape_string($conn,$_POST['update_email']); 
 $ville = mysqli_real_escape_string($conn,$_POST['ville']); 
 $date_naissance = mysqli_real_escape_string($conn,$_POST['date_naissance']); 

 $oldpass = $_POST['update-password']; 
 $newpass = $_POST['new-password'];
 $confirmpass = $_POST['confirm-password'];
    if ((!empty($oldpass))||(!empty($newpass))||(!empty($confirmpass))) {
        if ($oldpass == $row['password'] || $newpass == $confirmpass) {
            $upPatient ="UPDATE patient SET password = '$newpass' WHERE id_pers = '$user_id' ";
            $upPersonne ="UPDATE personne SET password = '$newpass' WHERE id= '$user_id' ";
            mysqli_query($conn,$upPatient) or die('query failed');
            mysqli_query($conn,$upPersonne) or die('query failed');
            header('location:user_page.php');  
            }
    } 

    if ((!empty($date_naissance))) {
        $upPatient ="UPDATE patient SET date_naissance = '$date_naissance' WHERE id_pers = '$user_id' ";
        mysqli_query($conn,$upPatient) or die('query failed');
        header('location:user_page.php');  
    }

    if ((!empty($ville))) {
        $upPatient ="UPDATE patient SET ville = '$ville' WHERE id_pers = '$user_id' ";
        mysqli_query($conn,$upPatient) or die('query failed');
        header('location:user_page.php');  
    }



    if ((!empty($UPname))) {
        $upPatient ="UPDATE patient SET name = '$UPname' WHERE id_pers = '$user_id' ";
        $upPersonne ="UPDATE personne SET name = '$UPname' WHERE id= '$user_id' ";
        mysqli_query($conn,$upPatient) or die('query failed');
        mysqli_query($conn,$upPersonne) or die('query failed');
        header('location:user_page.php');  
    }

    if ((!empty($UPemail))) {
        $upPatient ="UPDATE patient SET email = '$UPemail' WHERE id_pers = '$user_id' ";
        $upPersonne ="UPDATE personne SET email = '$UPemail' WHERE id= '$user_id' ";
        mysqli_query($conn,$upPatient) or die('query failed');
        mysqli_query($conn,$upPersonne) or die('query failed');
        header('location:user_page.php');  
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
                $upPhotoProfile ="UPDATE patient SET photo_profile = '$newImageName' WHERE id_pers = '$user_id' ";
                mysqli_query($conn,$upPhotoProfile);
                move_uploaded_file($tmp_name,'img/photoProfile/'.$newImageName);
                header('location:user_page.php');
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
    <title>patient edit profil</title>
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

                <span>ville :</span>
                <input type="text" name="ville" class="box" value="<?php echo $row['ville'];?>">
                
                <span>photo profile :</span>
                <input type="file" name="update_image" class="box" >
            </div>
            <div class="inputbox">

            <span>date_naissance :</span>
                <input type="date" name="date_naissance" class="box" value="<?php echo $row['date_naissance'];?>">
                
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
            <a href="user_page.php" class="btn" id="back-btn">go back</a>
        </div>
    </form>
            
</div>



    
</body>
</html>