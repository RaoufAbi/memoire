<?php
include ('config.php');
include ('sessionPatient.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aider</title>
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/help.css">
</head>
<body>

<?php include ('navbar.php'); ?> 

    <div class="containerFluid">
        <h2>Foire aux questions(FAQs)</h2>
        <div class="accordion">
          <div class="icon"></div>
          <h5>Comment fonctionne le système de recommandations médicales de votre site ?</h5>
        </div>
        <div class="panel">
        <p>
            Notre système de recommandations médicales utilise des algorithmes avancés pour analyser les
            informations sur les patients, telles que leurs antécédents médicaux, leurs symptômes et leurs
            préférences personnelles. A partir de ces informations, le système génère des recommandations
            personnalisées pour aider les patients à trouver le traitement le plus approprié pour leur situation.
        </p>
        </div>
      
        <div class="accordion">
          <div class="icon"></div>
          <h5>Comment puis-je suivre mes progrès dans le traitement recommandé ?</h5>
        </div>
        <div class="panel">
          <p>
            Vous pouvez suivre vos progrès en utilisant notre fonction de suivi de traitement. Cette fonction
            vous permet de saisir des informations sur votre état de santé actuel, telles que vos symptômes et
            vos niveaux de douleur, et de suivre l'efficacité de votre traitement au fil du temps.
          </p>
        </div>
      
        <div class="accordion">
          <div class="icon"></div>
          <h5>comment puis-je contacter un médecin pour poser des questions sur mon traitement ?</h5>
        </div>
        <div class="panel">
          <p>
            Nous offrons un service de télémédecine qui vous permet de consulter un médecin en ligne pour
            discuter de votre traitement ou poser des questions sur votre état de santé. Vous pouvez prendre
            rendez-vous en ligne à tout moment qui vous convient.
          </p>
        </div>

        <div class="accordion">
            <div class="icon"></div>
            <h5>comment puis-je trouver des informations sur des maladies ou des conditions médicales spécifiques ?</h5>
          </div>
          <div class="panel">
            <p>
                Nous offrons une fonction de recherche sur notre site qui vous permet de rechercher des
                informations sur des maladies et des conditions médicales spécifiques. Nous avons également une
                bibliothèque de ressources médicales en ligne, y compris des articles sur les symptômes, les causes,
                les traitements et les résultats des maladies courantes.
            </p>
          </div>

          <div class="accordion">
            <div class="icon"></div>
            <h5>comment puis-je signaler un problème technique avec le site ?</h5>
          </div>
          <div class="panel">
            <p>
                si vous rencontrez un problème technique avec notre site, vous pouvez contacter notre équipe
                de support technique pour obtenir de l'aide. Nous sommes disponibles par chat en direct ou par e-
                mail pour vous aider à résoudre tout problème que vous rencontrez.
            </p>
          </div>
        
          <div class="accordion">
            <div class="icon"></div>
            <h5>comment puis-je annuler ou modifier une recommandation médicale?</h5>
          </div>
          <div class="panel">
            <p>
                si vous souhaitez annuler ou modifier une recommandation médicale, vous pouvez contacter
                notre équipe de support technique pour obtenir de l'aide. Nous pouvons vous aider à annuler ou à
                modifier une recommandation en fonction de votre situation médicale actuelle.
            </p>
          </div>
        
          <div class="accordion">
            <div class="icon"></div>
            <h5>Quels sont les types de professionnels de la santé qui sont disponibles via votre service de télémédecine ?</h5>
          </div>
          <div class="panel">
            <p>
                Nous travaillons avec une variété de professionnels de la santé qualifiés pour fournir des
                consultations en ligne via notre service de télémédecine. Les professionnels de la santé peuvent
                inclure des médecins, des psychologues, des conseillers en santé mentale et d'autres professionnels
                de la santé selon les besoins des patients.
            </p>
          </div>
        
          <div class="accordion">
            <div class="icon"></div>
            <h5>comment puis-je payer pour les services de télémédecine ?</h5>
          </div>
          <div class="panel">
            <p>
                Nous acceptons différents modes de paiement, y compris les cartes de crédit et les portes
                feuilles électroniques. Les patients peuvent effectuer un paiement en ligne avant leur consultation
                avec un professionnel de la santé. Les frais de consultation dépendent des services demandés et
                seront communiqué avant la consultation.
            </p>
          </div>
        




      
          

      
        <div class="accordion">
          <div class="icon"></div>
          <h5>comment puis-je savoir si mes informations de santé sont sécurisées sur votre site ?</h5>
        </div>
        <div class="panel">
          <p>
            Nous prenons la sécurité et la confidentialité des informations de santé très aux sérieux.
          </p>
        </div>
      </div>

      <script src="script/help.js"></script>
      <script src="script/index.js"></script>
</body>
</html>