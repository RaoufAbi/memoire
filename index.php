<?php

include ('config.php');


session_start();

if(isset($_POST['submit'])){

  
   
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = $_POST['password'];
  

   $select = " SELECT * FROM personne WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($conn, $select);
   
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
     
   }else{
      $error[] = 'incorrect email or password!';
   }

};
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Votre Santé</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->


  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <style>


.form-container form h3 {
   text-align: center;
   font-size: 30px;
   text-transform: uppercase;
   margin-bottom: 10px;
   color: #fff;
}


.form-container form input,
.form-container form select {
   width: 100%;
   padding: 10px 15px;
   font-size: 17px;
   margin: 8px 0;
   background: #eee;
   border-radius: 5px;
   border: none;
}



.form-container form label {
   font-size: medium;
   margin-left: 5px;
}

.inputcontrol {
   margin: 15px 0;
   display: flex;
   flex-direction: column;
}



.inputcontrol.error input {
   border: rgb(255, 0, 0) solid 2px;
}

.inputcontrol.succes input {
   border: rgb(0, 255, 76) solid 2px;
}

.inputcontrol .error {
   color: red;
}


.form-container form .form-btn {
   background: #0096C7;
   color: #fff;
   text-transform: capitalize;
   font-size: 20px;
   cursor: pointer;
   border: none;
}

.form-container form .form-btn:hover {
   background: #0077B6;
   color: #fff;
}

.form-container form p {
   margin-top: 10px;
   font-size: 20px;
   color: #fff;
   text-align: center;
}

.form-container form p a {
   color: crimson;
}

.form-container form .error-msg {
   margin: 10px 0;
   display: block;
   background: crimson;
   color: #fff;
   border-radius: 5px;
   font-size: 20px;
   padding: 10px;
}

  </style>

</head>

<body>


  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="index.html">Votre Santé</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">accueil</a></li>
          <li><a class="nav-link scrollto" href="#about">à propos</a></li>
          <li><a class="nav-link scrollto" href="#services">Services</a></li>
          <li><a class="nav-link scrollto" href="#doctors">Médecins</a></li>

        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
      <a href="register.php" class="appointment-btn scrollto"><span class="d-none d-md-inline"></span>S'inscrire</a>
      <div onclick="menuToggle();" style="cursor: pointer;" class="appointment-btn scrollto"><span class="d-none d-md-inline"></span>Connexion</div>

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container">
      <h1>Bienvenue chez Votre Santé</h1>
      <h2>Trouvez des conseils et un suivi médical de qualité grâce à notre site web multidisciplinaire.</h2>
      <a href="#about" class="btn-get-started scrollto">Commencer</a>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us">
      <div class="container">

        <div class="row">
          <div class="col-lg-4 d-flex align-items-stretch">
            <div class="content">
              <h3>utilisateurs ?</h3>
              <p>
              Notre site est composé de médecins, de patients ainsi que de délégués médicaux, tous désireux de vous trouver des informations précises et fiables sur la santé et les traitements.
              </p>
            
            </div>
          </div>
          <div class="col-lg-8 d-flex align-items-stretch">
            <div class="icon-boxes d-flex flex-column justify-content-center">
              <div class="row">
                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                  <i class="ri-user-3-fill"></i>
                    <h4>Patients</h4>
                    <p>Les patients jouent un rôle actif dans leur santé en suivant les conseils médicaux  et en adoptant des modes de vie sains</p>
                  </div>
                </div>
                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i class="ri-user-3-fill"></i>
                    <h4>médecins</h4>
                    <p>Les médecins accomplissent un travail essentiel en offrant des soins de qualité et en améliorant la santé de leurs patients</p>
                  </div>
                </div>
                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                  <i class="ri-user-3-fill"></i>
                    <h4>délégués médical</h4>
                    <p>Les délégués médicaux sont un lien vital entre les professionnels de la santé et l'industrie pharmaceutique, en fournissant des informations précieuses sur les traitements et les médicaments</p>
                  </div>
                </div>
              </div>
            </div><!-- End .content-->
          </div>
        </div>

      </div>
    </section><!-- End Why Us Section -->

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container-fluid">

        <div class="row">
          <div class="col-xl-5 col-lg-6 video-box d-flex justify-content-center align-items-stretch position-relative">
            <a href="https://www.youtube.com/watch?v=jDDaplaOz7Q" class="glightbox play-btn mb-4"></a>
          </div>

          <div class="col-xl-7 col-lg-6 icon-boxes d-flex flex-column align-items-stretch justify-content-center py-5 px-lg-5">
            <h3>"Votre santé" qui est proposons nous !</h3>
            <p>Notre mission est de fournir aux utilisateurs une plateforme complète dédiée aux recommandations de thèmes et au suivi médical. Que vous cherchiez des informations sur un thème spécifique, des recommandations de professionnels de la santé ou un suivi médical personnalisé, nous sommes là pour vous accompagner</p>

            <div class="icon-box">
              <div class="icon"><i class="bx bx-fingerprint"></i></div>
              <h4 class="title"><a href="">Recommandations</a></h4>
              <p class="description">Nous comprenons que chaque individu est unique et a des besoins de santé spécifiques. Sur notre site, vous trouverez un large éventail de médecins dans divers domaines qui répondront à vos besoins</p>
            </div>

            <div class="icon-box">
              <div class="icon"><i class="bx bx-gift"></i></div>
              <h4 class="title"><a href="">Optimiser l'accès médical</a></h4>
              <p class="description">Élargir la portée du travail du médecin et attirer un grand nombre de patients</p>
            </div>

            <div class="icon-box">
              <div class="icon"><i class="bx bx-atom"></i></div>
              <h4 class="title"><a href="">Support en ligne pour délégués médicaux</a></h4>
              <p class="description">Fournir le service au délégué médical pour exercer ses activités sur notre site Web</p>
            </div>

          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts">
      <div class="container">

        <div class="row">

          <div class="col-lg-3 col-md-6">
            <div class="count-box">
              <i class="fas fa-user-md"></i>
              <span data-purecounter-start="0" data-purecounter-end="
              <?php 
              $query = "SELECT COUNT(*) AS member_count FROM médecin";
              $result = mysqli_query($conn, $query);
              $row = mysqli_fetch_assoc($result);
              $memberCount = $row['member_count'];
              echo $memberCount;
              ?>"
               data-purecounter-duration="1" class="purecounter"></span>
              <p>médecins</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mt-5 mt-md-0">
            <div class="count-box">
              <i class="far fa-hospital"></i>
              <span data-purecounter-start="0" data-purecounter-end="
              <?php 
              $délégué_médical = "SELECT COUNT(*) AS member_count FROM délégué_médical";
              $resultdélégué_médical = mysqli_query($conn, $délégué_médical);
              $rowdélégué_médical = mysqli_fetch_assoc($resultdélégué_médical);
              $memberCountdélégué_médical = $rowdélégué_médical['member_count'];
              echo $memberCountdélégué_médical;
              ?>
              " data-purecounter-duration="1" class="purecounter"></span>
              <p>Délégués Médical</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
            <div class="count-box">
              <i class="fas fa-flask"></i>
              <span data-purecounter-start="0" data-purecounter-end="
              <?php 
              $medicament = "SELECT COUNT(*) AS member_count FROM medicament";
              $resultmedicament = mysqli_query($conn, $medicament);
              $rowmedicament = mysqli_fetch_assoc($resultmedicament);
              $membermedicament = $rowmedicament['member_count'];
              echo $membermedicament;
              ?>
              
              " data-purecounter-duration="1" class="purecounter"></span>
              <p>Médicaments</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
            <div class="count-box">
            <i class="ri-user-3-fill"></i>
              <span data-purecounter-start="0" data-purecounter-end="
              <?php 
              $querypatient = "SELECT COUNT(*) AS member_count FROM patient";
              $resultpatient = mysqli_query($conn, $querypatient);
              $rowpatient = mysqli_fetch_assoc($resultpatient);
              $memberCountpatient = $rowpatient['member_count'];
              echo $memberCountpatient;
              ?>
              " data-purecounter-duration="1" class="purecounter"></span>
              <p>Patients</p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Counts Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
      <div class="container">

        <div class="section-title">
          <h2>Services</h2>
          <p>Notre site est dédié à fournir des services de qualité aux médecins, aux patients et aux délégués médicaux. Nous fournissons des informations fiables et à jour sur la santé, les traitements et les médicaments. Nous proposons également des outils pratiques tels que des forums de discussion pour faciliter les échanges entre les professionnels de santé et les patients, ainsi que des fonctionnalités de suivi pour aider les patients à gérer leur santé</p>
        </div>

        <div class="row">
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
            <div class="icon-box">
              <div class="icon"><i class="fas fa-heartbeat"></i></div>
              <h4>suiver en ligne</h4>
              <p>Un service de suivi en ligne permet de suivre l'évolution d'un patient  . Cela permet de connaître l'état de ton patient à tout moment .</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0">
            <div class="icon-box">
              <div class="icon"><i class="fas fa-pills"></i></div>
              <h4>Rechercher un médicament</h4>
              <p>Il est possible de rechercher un médicament en ligne à l'aide de sites Web sans passer par les pharmacies </p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0">
            <div class="icon-box">
              <div class="icon"><i class="fas fa-hospital-user"></i></div>
              <h4><a href="">prendre un rendez-vous</a></h4>
              <p>La fonctionnalité de prise de rendez-vous permet aux utilisateurs de planifier facilement des rendez-vous en ligne avec des professionnels de la santé sur le site</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4">
            <div class="icon-box">
              <div class="icon"><i class="fas fa-dna"></i></div>
              <h4><a href="">présenté les médicaments</a></h4>
              <p>Les délégués médicaux sont autorisés à présenter et valoriser leurs médicaments</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4">
            <div class="icon-box">
              <div class="icon"><i class="fas fa-wheelchair"></i></div>
              <h4><a>Notifications</a></h4>
              <p>le site envoie des notifications aux utilisateurs pour les avertir que quelque chose s'est passé</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4">
            <div class="icon-box">
              <div class="icon"><i class="fas fa-notes-medical"></i></div>
              <h4><a href="">Recommandations</a></h4>
              <p>le site permet des recommandations personnalisées en fonction des besoins de santé de chaque utilisateur. Ces recommandations peuvent inclure des articles, des ressources, des programmes d'exercices, des conseils nutritionnels, etc.</p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Services Section -->



    <!-- ======= Departments Section ======= -->
    <!-- End Departments Section -->

    <!-- ======= Doctors Section ======= -->
    <section id="doctors" class="doctors">
      <div class="container">

        <div class="section-title">
          <h2>Médecins</h2>
          <p>médecins experts sont dévoués à votre bien-être. Ils offrent des soins de qualité, alliant compétence médicale et compassion. Avec leurs spécialités variées, ils sont là pour répondre à vos besoins de santé, vous guider et vous soutenir tout au long de votre parcours médical. Votre santé est notre priorité</p>
        </div>

        <div class="row">

          <div class="col-lg-6">
            <div class="member d-flex align-items-start">
              <div class="pic"><img src="assets/img/doctors/doctors-1.jpg" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Emily Anderson</h4>
                <span>Médecine générale</span>
                <p>Le Dr Emily Anderson est un médecin généraliste dévoué qui met l'accent sur les soins préventifs et la promotion de la santé</p>
                <div class="social">
                  <a href=""><i class="ri-twitter-fill"></i></a>
                  <a href=""><i class="ri-facebook-fill"></i></a>
                  <a href=""><i class="ri-instagram-fill"></i></a>
                  <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-6 mt-4 mt-lg-0">
            <div class="member d-flex align-items-start">
              <div class="pic"><img src="assets/img/doctors/doctors-2.jpg" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Benjamin Lee</h4>
                <span>Chirurgie orthopédique</span>
                <p>Expert en réparation musculo-squelettique et récupération fonctionnelle</p>
                <div class="social">
                  <a href=""><i class="ri-twitter-fill"></i></a>
                  <a href=""><i class="ri-facebook-fill"></i></a>
                  <a href=""><i class="ri-instagram-fill"></i></a>
                  <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-6 mt-4">
            <div class="member d-flex align-items-start">
              <div class="pic"><img src="assets/img/doctors/doctors-3.jpg" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>William Anderson</h4>
                <span>Cardiologie</span>
                <p> Spécialiste des maladies cardiaques et promoteur d'une vie saine pour le cœur.</p>
                <div class="social">
                  <a href=""><i class="ri-twitter-fill"></i></a>
                  <a href=""><i class="ri-facebook-fill"></i></a>
                  <a href=""><i class="ri-instagram-fill"></i></a>
                  <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-6 mt-4">
            <div class="member d-flex align-items-start">
              <div class="pic"><img src="assets/img/doctors/doctors-4.jpg" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Amanda Jepson</h4>
                <span>Neurologie</span>
                <p> Dédiée à aider les patients atteints de troubles neurologiques à vivre une vie meilleure.</p>
                <div class="social">
                  <a href=""><i class="ri-twitter-fill"></i></a>
                  <a href=""><i class="ri-facebook-fill"></i></a>
                  <a href=""><i class="ri-instagram-fill"></i></a>
                  <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                </div>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Doctors Section -->

    <!-- ======= Frequently Asked Questions Section ======= -->
    <section id="faq" class="faq section-bg">
      <div class="container">

        <div class="section-title">
          <h2>Questions fréquemment posées</h2>
        </div>

        <div class="faq-list">
          <ul>
            <li data-aos="fade-up">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" class="collapse" data-bs-target="#faq-list-1">Comment fonctionne le système de recommandations médicales de votre site ? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-1" class="collapse show" data-bs-parent=".faq-list">
                <p>
                  Notre système de recommandations médicales utilise des algorithmes avancés pour analyser les
                  informations sur les patients, telles que leurs antécédents médicaux, leurs symptômes et leurs
                  préférences personnelles. A partir de ces informations, le système génère des recommandations
                  personnalisées pour aider les patients à trouver le traitement le plus approprié pour leur situation.
                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="100">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-2" class="collapsed">Comment puis-je suivre mes progrès dans le traitement recommandé ? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-2" class="collapse" data-bs-parent=".faq-list">
                <p>
                  Vous pouvez suivre vos progrès en utilisant notre fonction de suivi de traitement. Cette fonction
                  vous permet de saisir des informations sur votre état de santé actuel, telles que vos symptômes et
                  vos niveaux de douleur, et de suivre l'efficacité de votre traitement au fil du temps.
              </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="200">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-3" class="collapsed">comment puis-je contacter un médecin pour poser des questions sur mon traitement ? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-3" class="collapse" data-bs-parent=".faq-list">
                <p>
                Nous offrons un service de télémédecine qui vous permet de consulter un médecin en ligne pour
            discuter de votre traitement ou poser des questions sur votre état de santé. Vous pouvez prendre
            rendez-vous en ligne à tout moment qui vous convient.
              </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="300">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-4" class="collapsed">comment puis-je trouver des informations sur des maladies ou des conditions médicales spécifiques ? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-4" class="collapse" data-bs-parent=".faq-list">
                <p>
                Nous offrons une fonction de recherche sur notre site qui vous permet de rechercher des
                informations sur des maladies et des conditions médicales spécifiques. Nous avons également une
                bibliothèque de ressources médicales en ligne, y compris des articles sur les symptômes, les causes,
                les traitements et les résultats des maladies courantes.
              </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="400">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-5" class="collapsed">comment puis-je signaler un problème technique avec le site ? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-5" class="collapse" data-bs-parent=".faq-list">
                <p>
                si vous rencontrez un problème technique avec notre site, vous pouvez contacter notre équipe
                de support technique pour obtenir de l'aide. Nous sommes disponibles par chat en direct ou par e-
                mail pour vous aider à résoudre tout problème que vous rencontrez.
              </p>
              </div>
            </li>

          </ul>
        </div>

      </div>
    </section><!-- End Frequently Asked Questions Section -->

    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials">
      <div class="container">

        <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
          <div class="swiper-wrapper">

            <div class="swiper-slide">
              <div class="testimonial-wrap">
                <div class="testimonial-item">
                  <img src="assets/img/testimonials/testimonials-1.jpg" class="testimonial-img" alt="">
                  <h3>Saul Goodman</h3>
                  <h4>Ingénieur</h4>
                  <p>
                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                    Votre geste est vraiment apprécié et je tiens à vous exprimer ma gratitude sincère. Les recommandations pour un site et un suivi médical sont d'une grande valeur, car ils peuvent contribuer à améliorer ma santé et mon bien-être.                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                  </p>
                </div>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-wrap">
                <div class="testimonial-item">
                  <img src="assets/img/testimonials/testimonials-2.jpg" class="testimonial-img" alt="">
                  <h3>Sara Wilsson</h3>
                  <h4>Avocat</h4>
                  <p>
                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                    Je suis reconnaissant d'avoir accès à un site recommandé qui peut fournir des informations et des ressources fiables en matière de santé. Cela me permettra d'obtenir des conseils et des renseignements précieux pour prendre soin de ma santé de manière éclairée.                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                  </p>
                </div>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-wrap">
                <div class="testimonial-item">
                  <img src="assets/img/testimonials/testimonials-3.jpg" class="testimonial-img" alt="">
                  <h3>Jena Karlis</h3>
                  <h4>Architecte</h4>
                  <p>
                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                    En ce qui concerne le suivi médical, je suis reconnaissant de votre recommandation. Un suivi médical régulier est essentiel pour détecter et prévenir les problèmes de santé, et votre suggestion de bénéficier de ce service est vraiment précieuse. Je suis reconnaissant de votre souci pour ma santé et de votre engagement à m'assurer un suivi médical adéquat.                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                  </p>
                </div>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-wrap">
                <div class="testimonial-item">
                  <img src="assets/img/testimonials/testimonials-4.jpg" class="testimonial-img" alt="">
                  <h3>Matt Brandon</h3>
                  <h4>Comptable</h4>
                  <p>
                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                    Je tiens à vous remercier sincèrement pour ces recommandations. Votre générosité et votre considération sont inestimables, et je suis honoré de compter sur votre soutien dans ma quête pour une meilleure santé. Votre geste est une preuve tangible de votre bienveillance et de votre désir de m'aider, et je ne pourrais être plus reconnaissant. Merci encore pour votre recommandation pour un site et un suivi médical, je vais certainement les prendre en compte et en profiter au maximum.                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                  </p>
                </div>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-wrap">
                <div class="testimonial-item">
                  <img src="assets/img/testimonials/testimonials-5.jpg" class="testimonial-img" alt="">
                  <h3>John Larson</h3>
                  <h4>Pilote</h4>
                  <p>
                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                    Je suis extrêmement reconnaissant pour votre recommandation d'un site et d'un suivi médical. Votre geste témoigne de votre souci pour ma santé et de votre volonté de m'aider à prendre soin de moi de manière optimale.                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                  </p>
                </div>
              </div>
            </div><!-- End testimonial item -->

          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section><!-- End Testimonials Section -->

    <!-- ======= Gallery Section ======= -->
    <section id="gallery" class="gallery">
      <div class="container">

        <div class="section-title">
          <h2>Gallery</h2>
          <p>La galerie du site offre une variété de ressources visuelles liées à la santé et au bien-être. Explorez des images, informatives pour approfondir votre compréhension. Une expérience visuelle immersive pour vous inspirer à prendre des décisions éclairées pour votre bien-être.</p>
        </div>
      </div>

      <div class="container-fluid">
        <div class="row g-0">

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/gallery-1.jpg" class="galelry-lightbox">
                <img src="assets/img/gallery/gallery-1.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/gallery-2.jpg" class="galelry-lightbox">
                <img src="assets/img/gallery/gallery-2.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/gallery-3.jpg" class="galelry-lightbox">
                <img src="assets/img/gallery/gallery-3.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/gallery-4.jpg" class="galelry-lightbox">
                <img src="assets/img/gallery/gallery-4.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/gallery-5.jpg" class="galelry-lightbox">
                <img src="assets/img/gallery/gallery-5.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/gallery-6.jpg" class="galelry-lightbox">
                <img src="assets/img/gallery/gallery-6.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/gallery-7.jpg" class="galelry-lightbox">
                <img src="assets/img/gallery/gallery-7.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/gallery-8.jpg" class="galelry-lightbox">
                <img src="assets/img/gallery/gallery-8.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Gallery Section -->

    
  </main><!-- End #main -->



  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>


  <div class="login_menu">
  <div class="form-container" >

<form action="" method="post">
   <h3>login now</h3>
   
   <?php
   if(isset($error)){
      foreach($error as $error){
         echo '<span class="error-msg">'.$error.'</span>';
      };
   };
   ?>


   <input type="email" name="email" required placeholder="enter your email" autocomplete="off">
   <input type="password" name="password" required placeholder="enter your password">
   <input type="submit" name="submit" value="login now" class="form-btn">
</form>

</div>
  </div>

  <!-- Vendor JS Files -->
  <script>
    function menuToggle() {
  const toggleMenu = document.querySelector('.login_menu');
  toggleMenu.classList.toggle('active');
}
  </script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>