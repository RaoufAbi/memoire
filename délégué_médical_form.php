<?php

  // get les données de la formilaire

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $Adresse = mysqli_real_escape_string($conn, $_POST['Adresse']);
   $numéro_de_téléphone = mysqli_real_escape_string($conn, $_POST['numéro_de_téléphone']);
   $pass = $_POST['password']; 
   $cpass = $_POST['cpassword'];




   //get les données from personne where email dans la table egale email de la form 
   $select = " SELECT * FROM personne WHERE email = '$email'";
   $result = mysqli_query($conn, $select); 



   // si existe déja
   if(mysqli_num_rows($result) > 0){

      $error[] = 'cet utilisateur existe déja!';


      
   }else{
      // si mot pass n'est pas égal connfirem mot pass
      if($pass != $cpass){
         $error[] = 'le mot de passe n est pas le meme!';

         //sinon ajoute cet compet
      }else{

          // ajoute cet compet a table personne
         $insert1 = "INSERT INTO personne (name,email, password , user_type) VALUES ('$name','$email','$pass','délégué_médical')";
         mysqli_query($conn, $insert1);
         
         // select id de cet compte in table perssone pour ajouter id in table deg
         $select2 = " SELECT * FROM personne WHERE email = '$email' && password = '$pass' ";
         $result2 = mysqli_query($conn, $select2);
         $row = mysqli_fetch_array($result2); 
         $id_pers = $row['id'];


                   // ajoute cet compet a table deg
        $ins = "INSERT INTO délégué_médical (name, email, password,user_type, id_pers, Adresse , numéro_de_téléphone, photo_profile ) 
        VALUES ('$name','$email','$pass','délégué_médical','$id_pers','$Adresse','$numéro_de_téléphone' , 'Default.png')";
        mysqli_query($conn, $ins);

         header('location:login_form.php');
      }
   }





?>
