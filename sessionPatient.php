<?php
// start siosion
//si not existe alors anvoyer a page index
session_start();
if (!isset($_SESSION['user_id'])) {
    header('location:index.php');
}else {
   

// get user id
$user_id = $_SESSION['user_id'];

$getdataPersonne = mysqli_query($conn,"SELECT * FROM personne WHERE id = '$user_id' ");
$res = mysqli_fetch_assoc($getdataPersonne);

// get les info de persson

if($res['user_type'] == 'patient'){

    $getdataPatient = mysqli_query($conn,"SELECT * FROM patient WHERE id_pers = '$user_id' ");
    $user_type = 'patient';
    $row = mysqli_fetch_assoc($getdataPatient);
         
 }elseif($res['user_type'] == 'médecin'){

    $getdataMedecin = mysqli_query($conn,"SELECT * FROM médecin WHERE id_pers = '$user_id' ");
    $user_type = 'médecin';
    $row = mysqli_fetch_assoc($getdataMedecin);
    

 }elseif($res['user_type'] == 'délégué_médical') {
   $user_type = 'délégué_médical';
    $getdataDeg = mysqli_query($conn,"SELECT * FROM délégué_médical WHERE id_pers = '$user_id' ");
    $row = mysqli_fetch_assoc($getdataDeg);
 
 }
}
?>