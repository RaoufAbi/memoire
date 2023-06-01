<?php
include ('config.php');
include ('sessionPatient.php');

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- displays site properly based on user's device -->
    <link
      rel="icon"
      type="image/png"
      sizes="32x32"
      href="./images/favicon-32x32.png"
    />
    <link rel="stylesheet" href="css/navbar.css" />
    <link rel="stylesheet" href="css/notification.css" />
    <title>Notifications page</title>
  </head>
  <body>

  <?php
include ('navbar.php');


?>

    <div class="container">
      <header >
        <div class="notif_box">
          <h2 class="title">Notifications</h2>
          
        </div>
        
      </header>
      <main>
      <!--   <div class="notif_card unread">
          <img src="img/photo_profil.jpg" alt="avatar" />
          <div class="description">
            <p class="user_activity">
              <strong>Mark Webber</strong> reacted to your recent post
              <b>My first tournament today!</b>
            </p>
            <p class="time">1m ago</p>
          </div>
        </div> -->

        


        <?php
        
        // get les notfications from table notification_médecin
        $getNot = mysqli_query($conn ,"SELECT * FROM notification_médecin WHERE id_médecin ='$user_id' ORDER BY not_date DESC");

        while ($not = mysqli_fetch_array($getNot)) {
            $d = strtotime($not['not_date']);
            $pat_id = $not['id_patient'];
            $user_type = $not['user_type'];

            // get les informations de patient 
            $getpat = mysqli_query($conn ,"SELECT * FROM $user_type WHERE id_pers ='$pat_id'");
            if ($pat = mysqli_fetch_assoc($getpat)) {
              // si type de notfication est abonnement :
                if ($not["not_type"] == "follow") {
                    echo "
                    <div class='notif_card unread'>
                        <img src='img/photoProfile/{$pat['photo_profile']}' alt='avatar' />
                        <div class='description'>
                            <p class='user_activity'>
                                <strong>{$pat['name']}</strong> a commencé à vous suivre 
                            </p>
                            <p class='time'> à ".date("Y-m-d H:i",$d)."</p>
                        </div>
                    </div>";

                    // si type de notfication est rendez-vous :
                } elseif ($not["not_type"] == "rendez_vous") {
                    echo "
                    <div class='notif_card unread'>
                        <img src='img/photoProfile/{$pat['photo_profile']}' alt='avatar' />
                        <div class='description'>
                            <p class='user_activity'>
                                <strong>{$pat['name']}</strong> a demandé un rendez-vous 
                            </p>
                            <p class='time'> à ".date("Y-m-d H:i",$d)."</p>
                        </div>
                    </div>";

                    // si type de notfication est propose medicamenet :
                } elseif ($not["not_type"] == "medicamenet") {
                  echo "
                  <div class='notif_card unread'>
                      <img src='img/photoProfile/{$pat['photo_profile']}' alt='avatar' />
                      <div class='description'>
                          <p class='user_activity'>
                              <strong>{$pat['name']}</strong> Suggérer un médicament 
                          </p>
                          <p class='time'> à ".date("Y-m-d H:i",$d)."</p>
                      </div>
                  </div>";
              }
              elseif ($not["not_type"] == "effet") {
                echo "
                <div class='notif_card unread'>
                    <img src='img/photoProfile/{$pat['photo_profile']}' alt='avatar' />
                    <div class='description'>
                        <p class='user_activity'>
                            <strong>{$pat['name']}</strong> A des effets secondaires 
                        </p>
                        <p class='time'> à ".date("Y-m-d H:i",$d)."</p>
                    </div>
                </div>";
            }
            }
        }

        ?>
<div>

        

       <!--  <div class="notif_card">
          <img src="img/photo_profil.jpg" alt="avatar" />
          <div class="description">
            <p class="user_activity">
              <strong>Nathan Pererson</strong> reacted to your recent post
              <b>5 end-game strategies to increase your win rate</b>
            </p>
            <p class="time">2 weeks ago</p>
          </div>
        </div> -->

      </main>
    </div>

    
    <script src="script/index.js"></script>
  </body>
</html>