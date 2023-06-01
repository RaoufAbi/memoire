<?php
include ('config.php');
include ('sessionPatient.php');

if (isset($_POST['submit'])) {
    
    $name = $_POST['name'];
    $usage_med = $_POST['usage_med'];
    $prix = $_POST['prix'];
    if ($_FILES["pdf"]["error"] === 4) {
        echo "<script> alert('image not exist');</script>";
    }else {
        $file_name = $_FILES["pdf"]["name"];
        $file_size = $_FILES["pdf"]["size"];
        $tmp_name = $_FILES["pdf"]["tmp_name"];

        $validImageExtension = ['pdf'];
        $pdfExtension = explode('.',$file_name); // explode تضع في array حسب كل .
        $pdfExtension = strtolower(end($pdfExtension));
        if (!in_array($pdfExtension,$validImageExtension)) {
            echo "<script> alert('Invalid image extention');</script>";
        } 
        else if ($file_size > 10000000) {
            echo "<script> alert('image size is to large');</script>";
        }
        else{
            $newpdfName = uniqid();
            $newpdfName .='.'. $pdfExtension;
            move_uploaded_file($tmp_name,'img/medicament/'.$newpdfName);
            
            $upmed ="INSERT INTO medicament(name_m,usage_medicament,prix,pdf,id_deg)VALUE('$name','$usage_med','$prix','$newpdfName','$user_id') ";
            mysqli_query($conn,$upmed);
            header('Location: ' . $_SERVER['REQUEST_URI']);
            exit();        }
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
            <label for="">name</label>
            <input type="text" name="name">
      </div>

      <div class="inputcontrol ">
            <label for="">usage </label>
            <textarea  rows="2"  name="usage_med"></textarea>
      </div>

      <div class="inputcontrol ">
            <label for="">Prix </label>
            <input type="number" name="prix">
      </div>

      <div class="inputcontrol ">
        <label for="">Notice "pdf"</label>
        <input type="file" name="pdf" accept=".pdf">
  </div>

  <input type="submit" name="submit" value="upload" class="form-btn"  >
  <a href="délégué_médical_profile.php" class="btn" id="back-btn">go back</a>
</form>
    
    </div>
</body>
</html>