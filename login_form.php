<?php

include ('config.php');

session_start();

if(isset($_POST['submit'])){

  
   // get email et password form formilaire
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = $_POST['password'];
  
   // select from table personne colonne where email and motpass egal les données de formilaire
   $select = " SELECT * FROM personne WHERE email = '$email' && password = '$pass' ";
   $result = mysqli_query($conn, $select);
   
   //si existe ce compte
   if(mysqli_num_rows($result) > 0){

      $row = mysqli_fetch_array($result); 

      if($row['user_type'] == 'patient'){

         
         $_SESSION['user_id'] = $row['id'];

         header('location:user_page.php');

      }elseif($row['user_type'] == 'médecin'){

         
         $_SESSION['user_id'] = $row['id'];
         header('location:médecin_page.php');

      }elseif($row['user_type'] == 'délégué_médical') {
         
        $_SESSION['user_id'] = $row['id'];
         header('location:délégué_médical_page.php');
      }
     // si mot pass ou email faux
   }else{
      $error[] = 'incorrect email ou mot pass!';
   }

};
?>


<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login form</title>
   <link rel="stylesheet" href="css/style.css">
   <style>
                body {
   background: var(--color-4);
   overflow: hidden;
}  
   </style>
</head>
<body>
<div  class="header finisher-header" style="width: 100%; height: 100%;">
<div class="form-container" >

   <form action="" method="post">
      <h3>connexion</h3>
      
      <?php
      // si existe error alors affiche 
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>


      <input type="email" name="email" required placeholder="enter your email" autocomplete="off">
      <input type="password" name="password" required placeholder="enter your password">
      <input type="submit" name="submit" value="connexion" class="form-btn">
      <p>vous n'avez pas de compte ? <a href="register.php">S'inscrire</a></p>
   </form>

</div>
</div>

<script src="script/index.js"></script>
<script src="script/finisher-header.es5.min.js" type="text/javascript"></script>
<script type="text/javascript">
new FinisherHeader({
  "count": 100,
  "size": {
    "min": 2,
    "max": 19,
    "pulse": 0
  },
  "speed": {
    "x": {
      "min": 0,
      "max": 0.4
    },
    "y": {
      "min": 0,
      "max": 0.6
    }
  },
  "colors": {
    "background": "#759cff",
    "particles": [
      "#0048ff",
      "#ffffff",
      "#000000"
    ]
  },
  "blending": "overlay",
  "opacity": {
    "center": 1,
    "edge": 0
  },
  "skew": 0,
  "shapes": [
    "c"
  ]
});
</script>
</script>
</body>
</html>