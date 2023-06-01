<?php

   

   $name = mysqli_real_escape_string($conn, $_POST['namep']);
   $email = mysqli_real_escape_string($conn, $_POST['emailp']);
   $daten =  $_POST['date_naissance'];
   $ville = mysqli_real_escape_string($conn, $_POST['Ville_de_résidence']);
   $bio = mysqli_real_escape_string($conn, $_POST['biop']);

  /*  $Adresse = mysqli_real_escape_string($conn, $_POST['Adressep']);
   $numéro_de_téléphone = mysqli_real_escape_string($conn, $_POST['numéro_de_téléphonep']); */
   $pass = $_POST['passwordp']; // تشفير الكلمة
   $cpass = $_POST['cpasswordp'];

   $select = " SELECT * FROM personne WHERE email = '$email' ";

   $result = mysqli_query($conn, $select); //تنفيذ استعلام على قاعدة البيانات

   if(mysqli_num_rows($result) > 0){

      $error[] = 'cet utilisateur existe déja!';

   }else{

      if($pass != $cpass){
         $error[] = 'le mot de passe n est pas le meme!';
      }else{
         $insert1 = "INSERT INTO personne (name,email, password , user_type ) VALUES ('$name','$email','$pass','patient')";
         mysqli_query($conn, $insert1);
         
               
         $select2 = " SELECT * FROM personne WHERE email = '$email' && password = '$pass' ";
         $result2 = mysqli_query($conn, $select2);
         $row = mysqli_fetch_array($result2); 


         $id_pers = $row['id'];



        $ins = "INSERT INTO patient (name, email, password,user_type, id_pers ,photo_profile , ville , date_naissance ,bio) VALUES ('$name','$email','$pass','patient','$id_pers','Default.png','$ville','$daten','$bio')";
        mysqli_query($conn, $ins);
         header('location:login_form.php');
      }
   }





?>
