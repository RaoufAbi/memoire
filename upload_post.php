<?php
include ('config.php');
include ('sessionPatient.php');

if (isset($_POST['submit'])) {
    
    $statu = $_POST["statu"];
    if ($_FILES["image"]["error"] === 4) {
        echo "<script> alert('image not exist');</script>";
    }else {
        $file_name = $_FILES["image"]["name"];
        $file_size = $_FILES["image"]["size"];
        $tmp_name = $_FILES["image"]["tmp_name"];

        $validImageExtension = ['jpg','jpeg','png'];
        $imageExtension = explode('.',$file_name); // explode تضع في array حسب كل .
        $imageExtension = strtolower(end($imageExtension));
        if (!in_array($imageExtension,$validImageExtension)) {
            echo "<script> alert('Invalid image extention');</script>";
        } 
        else if ($file_size > 10000000) {
            echo "<script> alert('image size is to large');</script>";
        }
        else{
            $newImageName = uniqid();
            $newImageName .='.'. $imageExtension;
            move_uploaded_file($tmp_name,'img/post/'.$newImageName);
            
            $upPost ="INSERT post (date_post,statu,photo,id_pers)VALUE(NOW(),'$statu','$newImageName','$user_id') ";
            mysqli_query($conn,$upPost);
            header('location:profile.php');
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
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="form-container">
    <form method="post" class="" autocomplete="off" enctype="multipart/form-data">
        <div class="inputcontrol ">
            <label for="">statu </label>
            <textarea  rows="2"  name="statu"></textarea>
      </div>

      <div class="inputcontrol ">
        <label for="">image </label>
        <input type="file" name="image" accept=".jpg, .png, .jpeg">
  </div>

  <input type="submit" name="submit" value="upload now" class="form-btn"  >
  <a href="profile.php" class="btn" id="back-btn">go back</a>
</form>
    
    </div>
</body>
</html>