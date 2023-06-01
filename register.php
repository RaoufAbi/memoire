 <?php
include('config.php');

if (isset($_POST['submit'])) {
    $user_type = $_POST['user_type'];
    if($user_type == 'patient'){
       
        include('user_form.php');

    }elseif ($user_type == 'médecin') {

       include('médecin_form.php'); 

        
    }elseif($user_type == 'délégué médical'){
        include('délégué_médical_form.php');
       
    }
        



}
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register</title>
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

<div class="form-container">

   <form action="" method="post" id="form_valid" autocomplete="off">
      <h3>S'inscrire maintenant</h3>

      <select name="user_type" id="type" onchange = "changefunc()">
            <option style = "display:none;" value ="vide">&#160;</option>
            <option value="patient" >patient</option>
            <option value="médecin">médecin</option>
            <option value="délégué médical">délégué médical</option>         
        </select>
      <div class="alldivform" style = "display:none;">
      <div class="patform">
      <div class="part part1">
      <div class="inputcontrol ">
            <label for="">le nom complet</label>
            <input type="text" name="namep"   id="username">
            <div class="error"></div>
      </div>
      <div class="inputcontrol">
            <label for="">Adresse e-mail </label>
            <input type="text" name="emailp"   id="email" >
            <div class="error"></div>
      </div>

      <div class="inputcontrol">
            <label for="">date naissance </label>
            <input type="date" name="date_naissance" id="date_naissance_p">
            <div class="error"></div>
      </div>
      <div class="inputcontrol">
            <label for="">bio "max 30 mot" </label>
            <input type="text" name="biop" id="biop">
            <div class="error"></div>
      </div>
      </div>
      <div class="part part2">
      <div class="inputcontrol">
            <label for="">Ville de résidence </label>
            <input type="text" name="Ville_de_résidence" id="ville_p">
            <div class="error"></div>
      </div>

      <div class="inputcontrol">
            <label for="">mot de pass </label>
            <input type="password" name="passwordp"   id="password" id="password" >
            <div class="error"></div>
      </div>
      <div class="inputcontrol">
            <label for="">confirmez mot de pass</label>
            <input type="password" name="cpasswordp"   id="cpassword" >        
            <div class="error"></div>
      </div>
      </div>
      

      </div>

      <div class="medform">
            <div class="part part1">
            <div class="inputcontrol ">
                  <label for="">le nom complet</label>
                  <input type="text" name="namem"   id="usernameMedecin">
                  <div class="error"></div>
            </div>
            <div class="inputcontrol">
                  <label for=""> e-mail </label>   
                  <input type="email" name="emailm"  id="emailMedecin">
                  <div class="error"></div>
            </div>
            <div class="inputcontrol">
                  <label for="">ville </label>
                  <input type="text" name="ville" id="ville_m">
                  <div class="error"></div>
            </div>

            <div class="inputcontrol ">
                  <label for="">adresse</label>
                  <input type="text" name="adresse_de_domicile" id="adresse_m">
                  <div class="error"></div>
            </div>
            </div>
            <div class="part part2">
            <div class="inputcontrol ">
                  <label for="">bio "max 30 mot"</label>
                  <input type="text" name="biom" id="biom">
                  <div class="error"></div>
            </div>
            <div class="inputcontrol">
                  <label for="">numéro_de_téléphone</label>   
                  <input type="text" name="numéro_de_téléphonem" id="numtelm">
                  <div class="error"></div>
            </div>
            
            


            <div class="inputcontrol ">
                  <label for="">annes_dexperience</label>
                  <input type="number" name="annes_dexperience" id="ansexp">
                  <div class="error"></div>
            </div>
        
        
            <div class="inputcontrol">
                  <label for="">spécialite</label>   
                  <input type="text" name="spécialite" id="spcm">
                  <div class="error"></div>
            </div>
            </div>
            <div class="part part3">
            <div class="inputcontrol ">
                  <label for="">numéro_dénregistrement</label>
                  <input type="text" name="numéro_dénregistrement" id="numdenm" >
                  <div class="error"></div>
            </div>
            <div class="inputcontrol">
                  <label for="">nom_de_létablissement</label>   
                  <input type="text" name="nom_de_létablissement_de_formation" id="nomdeletm">
                  <div class="error"></div>
            </div>

            <div class="inputcontrol">
                  <label for="">mot de pass </label>
                  <input type="password" name="passwordm"   id="passwordMedecin">
                  <div class="error"></div>
            </div>
            <div class="inputcontrol">
                  <label for="">confirmez</label>
                  <input type="password" name="cpasswordm" id="cpasswordMedecin" >      
                  
                  <div class="error"></div>
            </div>
            </div>
            

      </div>

            

      <div class="degform">
        <div class="part part1">
            <div class="inputcontrol">
                  <label for="">Nom de compangine </label>
                  <input type="text" name="name" id="usernamedeg" >
                  <div class="error"></div>
            </div>
            <div class="inputcontrol">
                  <label for="">Adresse e-mail </label>
                  <input type="email" name="email" id="emaildeg">
                  <div class="error"></div>
            </div>

            <div class="inputcontrol">
                  <label for="">Adresse </label>
                  <input type="text" name="Adresse" id="adressedeg">
                  <div class="error"></div>
            </div>
            </div>

            <div class="part part2">
            <div class="inputcontrol">
                  <label for="">numéro de téléphone </label>
                  <input type="text" name="numéro_de_téléphone" id="numdeg">
                  <div class="error"></div>
            </div>
            <div class="inputcontrol">
                  <label for="">mot de pass </label>
                  <input type="password" name="password" id="passworddeg">
                  <div class="error"></div>
            </div>
            <div class="inputcontrol">
                  <label for="">confirmez mot de pass</label>
                  <input type="password" name="cpassword" id="cpassworddeg" >        
                  <div class="error"></div>
            </div>
            </div>

            
      </div> 

      <input type="submit" name="submit" value="S'inscrire" class="form-btn" >
      
</div>
      <p>Vous avez déjà un compte? <a href="login_form.php">Connexion</a></p>
   </form>
</div>
</div>
   <script>
            
const form = document.getElementById('form_valid');
const type = document.getElementById('type');

const username = document.getElementById('username');
const email = document.getElementById('email');
const password = document.getElementById('password');
const password2 = document.getElementById('cpassword');
const biop = document.getElementById('biop');
const date_naissance_p = document.getElementById('date_naissance_p');
const ville_p = document.getElementById('ville_p');


var uservalid = false;
var emailvalid = false;
var passvalid = false;
var cpassvalid = false;
var biopvalid = false;
var ville_pvalid = false;
var date_naissance_pvalid = false;



form.addEventListener('submit', e => {
    
    var typevalue = type.value;
    console.log(typevalue);
    if (typevalue === "patient") {
        validateInputs();    

        if (uservalid == false || emailvalid == false || passvalid == false  || cpassvalid == false  || biopvalid == false || ville_pvalid == false || date_naissance_pvalid == false ) {
            e.preventDefault();
        }
    } else if (typevalue === "médecin") {
        validateInputsMedecin();
      
        
        if (userMedvalid == false || emailMedvalid == false || passMedvalid == false  || cpassMedvalid == false) {
            e.preventDefault();
        }
    } else if (typevalue === "délégué médical") {
        validateInputsDeg();
      
        
        if (userdegvalid == false || emaildegvalid == false || passdegvalid == false  || cpassdegvalid == false) {
            e.preventDefault();
        }
    }
})





const setError = (element, message) => {
    const inputControl = element.parentElement;
    const errorDisplay = inputControl.querySelector('.error');

    errorDisplay.innerText = message;
    inputControl.classList.add('error');
    inputControl.classList.remove('succes');
      
};

const setSuccess = element => {
    const inputControl = element.parentElement;
    const errorDisplay = inputControl.querySelector('.error');

    errorDisplay.innerText = '';
    inputControl.classList.add('succes');
    inputControl.classList.remove('error');
    
};

const isValidEmail = email => {
    const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
};

const isValidnumber = number => {
    const re = /\d+/;
    return re.test(String(number).toLowerCase());
};


const validateInputs = () => {
    const usernameValue = username.value.trim();
    const emailValue = email.value.trim();
    const passwordValue = password.value.trim();
    const password2Value = password2.value.trim();
    const biopValue = biop.value.trim();
    const date_naissance_pValue = date_naissance_p.value.trim();
    const ville_pValue = ville_p.value.trim();

    if (usernameValue === '') {
        setError(username, 'Username is required');
      
    } else {
        setSuccess(username);
        uservalid = true; 
          
    }

    if (biopValue === '') {
        setError(biop, 'bio is required');
      
    } else {
        setSuccess(biop);
        biopvalid = biop;       
    }

    
    if (date_naissance_pValue === '') {
        setError(date_naissance_p, 'date naissance is required');
      
    } else {
        setSuccess(date_naissance_p);
        date_naissance_pvalid = date_naissance_p;       
    }
    
    if (ville_pValue === '') {
        setError(ville_p, 'ville is required');
      
    } else {
        setSuccess(ville_p);
        ville_pvalid = ville_p;       
    }

    if (emailValue === '') {
        setError(email, 'Email is required');
       
    } else if (!isValidEmail(emailValue)) {
        setError(email, 'valid email address');
       
    } else {
        setSuccess(email);
        emailvalid = true;
    }

    if (passwordValue === '') {
        setError(password, 'Password is required');
       
    } else if (passwordValue.length < 8) {
        setError(password, 'Password must be at least 8 character.');
        
    } else {
        setSuccess(password);
        passvalid = true;
    
    }

    if (password2Value === '') {
        setError(password2, 'Please confirm your password');
        
    } else if (password2Value !== passwordValue) {
        setError(password2, "Passwords doesn't match");
        
    } else {
        setSuccess(password2);
        cpassvalid =true;
        
    }
}

    const usernameMedecin = document.getElementById('usernameMedecin');
    const emailMedecin = document.getElementById('emailMedecin');
    const passwordMedecin = document.getElementById('passwordMedecin');
    const password2Medecin = document.getElementById('cpasswordMedecin');

    var userMedvalid = false;
    var emailMedvalid = false;
    var passMedvalid = false;
    var cpassMedvalid = false;

    function validateInputsMedecin() {
    const usernameValue = usernameMedecin.value.trim();
    const emailValue = emailMedecin.value.trim();
    const passwordValue = passwordMedecin.value.trim();
    const password2Value = password2Medecin.value.trim();


    if (usernameValue === '') {
        setError(usernameMedecin, 'Username is required');

    } else {
        setSuccess(usernameMedecin);
         userMedvalid = true;
    }

    if (emailValue === '') {
        setError(emailMedecin, 'Email is required');

    } else if (!isValidEmail(emailValue)) {
        setError(emailMedecin, 'valid email address');

    } else {
        setSuccess(emailMedecin);
         emailMedvalid = true;
    }

    if (passwordValue === '') {
        setError(passwordMedecin, 'Password is required');

    } else if (passwordValue.length < 8) {
        setError(passwordMedecin, 'Password must be at least 8 character.');

    } else {
        setSuccess(passwordMedecin);
         passMedvalid = true;
         
    }

    if (password2Value === '') {
        setError(password2Medecin, 'Please confirm your password');

    } else if (password2Value !== passwordValue) {
        setError(password2Medecin, "Passwords doesn't match");

    } else {
        setSuccess(password2Medecin);
        cpassMedvalid = true;
    }

}

    const usernamedeg = document.getElementById('usernamedeg');
    const emaildeg = document.getElementById('emaildeg');
    const passworddeg = document.getElementById('passworddeg');
    const password2deg = document.getElementById('cpassworddeg');
    const adressedeg = document.getElementById('adressedeg');
    const numdeg = document.getElementById('numdeg');



    var userdegvalid = false;
    var emaildegvalid = false;
    var passdegvalid = false;
    var cpassdegvalid = false;
    var adressedegvalid = false;
    var numdegvalid = false;

    function validateInputsDeg() {
    const usernameValue = usernamedeg.value.trim();
    const emailValue = emaildeg.value.trim();
    const passwordValue = passworddeg.value.trim();
    const password2Value = password2deg.value.trim();
    const adressedegValue = adressedeg.value.trim();
    const numdegValue = numdeg.value.trim();



    if (numdegValue === '') {
        setError(numdeg, 'némero is required');

    } else if (!isValidnumber(numdegValue)) {
        setError(numdeg, 'valid némero');

    } else {
        setSuccess(numdeg);
        numdegvalid = true;
    }

    if (usernameValue === '') {
        setError(usernamedeg, 'Username is required');

    } else {
        setSuccess(usernamedeg);
         userdegvalid = true;
    }

    if (adressedegValue === '') {
        setError(adressedeg, 'Username is required');

    } else {
        setSuccess(adressedeg);
        adressedegvalid = true;
    }

    if (emailValue === '') {
        setError(emaildeg, 'Email is required');

    } else if (!isValidEmail(emailValue)) {
        setError(emaildeg, 'valid email address');

    } else {
        setSuccess(emaildeg);
         emaildegvalid = true;
    }

    if (passwordValue === '') {
        setError(passworddeg, 'Password is required');

    } else if (passwordValue.length < 8) {
        setError(passworddeg, 'Password must be at least 8 character.');

    } else {
        setSuccess(passwordMedecin);
         passdegvalid = true;
         
    }

    if (password2Value === '') {
        setError(password2deg, 'Please confirm your password');

    } else if (password2Value !== passwordValue) {
        setError(password2deg, "Passwords doesn't match");

    } else {
        setSuccess(password2Medecin);
        cpassdegvalid = true;
    }

}

// function select type 
function changefunc() {
    var selcted = type.value;

    // get les DIV de in formilaire
    const sizeform = document.getElementById("form_valid");
    const patdiv = document.querySelector(".patform");
    const meddiv = document.querySelector(".medform");
    const degdiv = document.querySelector(".degform");
    const divf= document.querySelector(".alldivform");


    divf.style.display = "block";
    sizeform.style.width = "500px";

    //si l'utilisteur est patient
    //affiche la form patient Rien d'autre
   if (selcted == "patient") {
    sizeform.style.width = "900px";
    patdiv.style.display = "block";
    meddiv.style.display = "none";
    degdiv.style.display = "none";
    console.log(selcted);

    //si l'utilisteur est médecin
    //affiche la form médecin Rien d'autre
   } else if (selcted == "médecin") {
    sizeform.style.width = "900px";
    patdiv.style.display = "none";
    meddiv.style.display = "block";
    degdiv.style.display = "none";

    console.log(selcted);

        //si l'utilisteur est délégué médical
    //affiche la form délégué médical Rien d'autre
} else if (selcted == "délégué médical") {
    sizeform.style.width = "900px";
    patdiv.style.display = "none";
    meddiv.style.display = "none";
    degdiv.style.display = "block";
    console.log(selcted);
   }
} 
 
   </script>

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
    
   </body>
   </html>