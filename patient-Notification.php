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


      <?php
        
        $getNot = mysqli_query($conn ,"SELECT * FROM notification_patient WHERE id_patient ='$user_id' ORDER BY not_date DESC");

        while ($not = mysqli_fetch_array($getNot)) {
            $d = strtotime($not['not_date']);
            $pat_id = $not['id_médecin'];
            $user_type = "médecin";

            // get les informations de medein 
            $getpat = mysqli_query($conn ,"SELECT * FROM $user_type WHERE id_pers ='$pat_id'");
            if ($pat = mysqli_fetch_assoc($getpat)) {
              // si type de notfication est suivi :
                if ($not["not_type"] == "suive") {
                    echo "
                    <div class='notif_card unread'>
                        <img src='img/photoProfile/{$pat['photo_profile']}' alt='avatar' />
                        <div class='description'>
                            <p class='user_activity'>
                                <strong>{$pat['name']}</strong> a commencé à vous suivi 
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
                                <strong>{$pat['name']}</strong> a envoyé un date de rendez-vous
                            </p>
                            <p class='time'> à ".date("Y-m-d H:i",$d)."</p>
                        </div>
                    </div>";

                    // si type de notfication est propose medicamenet :
                }
            }
        }

        ?>
<!-- <div>
<div class="notif_card">
          <div class="message_card">
            <img
            src="img/photo_profil.jpg"
            alt="avatar"
          />
          <div class="description">
            <p class="user_activity">
              <strong>Rizky Hasanuddin</strong> sent you a private message
            </p>
            <p class="time">5 days ago</p>
          </div>
          </div>
        </div>
        <div class="message">
              <p>
                Hello, thanks for setting up the Chess Club. I've been a member
                for a few weeks now and I'm already having lots of fun and
                improving my game.
              </p>
            </div>
        </div> -->
        

      </main>
    </div>

    
    <script src="script/navbar.js"></script>
    <script src="script/index.js"></script>
  </body>
</html>