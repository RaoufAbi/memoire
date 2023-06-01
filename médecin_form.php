
<?php

  // get les données de la formilaire

   $name = mysqli_real_escape_string($conn, $_POST['namem']);
   $bio = mysqli_real_escape_string($conn, $_POST['biom']);
   $email = mysqli_real_escape_string($conn, $_POST['emailm']);
   $ville = mysqli_real_escape_string($conn, $_POST['ville']);
   $adresse = mysqli_real_escape_string($conn, $_POST['adresse_de_domicile']);
   $numéro_de_téléphone = mysqli_real_escape_string($conn, $_POST['numéro_de_téléphonem']);
   $annes_dexperience = mysqli_real_escape_string($conn, $_POST['annes_dexperience']);
   $spécialite = mysqli_real_escape_string($conn, $_POST['spécialite']);
   $numéro_dénregistrement = mysqli_real_escape_string($conn, $_POST['numéro_dénregistrement']);
   $nom_de_létablissement_de_formation = mysqli_real_escape_string($conn, $_POST['nom_de_létablissement_de_formation']);
   $pass = $_POST['passwordm']; 
   $cpass = $_POST['cpasswordm'];

   
   //get les données from personne where email dans la table egale email de la form 
   $select = " SELECT * FROM personne WHERE email = '$email' ";
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
        $insert1 = "INSERT INTO personne (name,email, password , user_type) VALUES ('$name','$email','$pass','médecin')";
        mysqli_query($conn, $insert1);
        
        // select id de cet compte in table perssone pour ajouter id in table médecin

        $select2 = " SELECT * FROM personne WHERE email = '$email' && password = '$pass' ";
        $result2 = mysqli_query($conn, $select2);
        $row = mysqli_fetch_array($result2); 


        $id_pers = $row['id'];


                   // ajoute cet compet a table médecin

       $ins = "INSERT INTO médecin 
       (name,email, password,user_type,adresse_de_domicile,numéro_de_téléphone,annes_dexperience,spécialite,numéro_dénregistrement,nom_de_létablissement_de_formation,id_pers , photo_profile,bio , ville) VALUES
       ('$name','$email','$pass','médecin','$adresse','$numéro_de_téléphone','$annes_dexperience','$spécialite','$numéro_dénregistrement','$nom_de_létablissement_de_formation','$id_pers','Default.png','$bio','$ville')";
      
      
       mysqli_query($conn, $ins);
        header('location:login_form.php');
      }
   }




?>

