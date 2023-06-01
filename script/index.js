

// popup function

function toggle() {

    // sellect les DIVs
    var blur = document.querySelector('.profile-container');
    var blur1 = document.querySelector('.nav-bar');
    
    // switch class  BlurActive
    blur.classList.toggle('BlurActive');
    blur1.classList.toggle('BlurActive');

    var popup = document.querySelector('.popup');
    popup.classList.toggle('BlurActive');
}



/**** NAVBARSCROOL ****/

/* var lastScrollTop = 0;
const navbar = document.querySelector('.nav-bar');

window.addEventListener('scroll',function (){
    var scrollTop = window.pageYOffset || document.documentElement.scrollTop;
    if (lastScrollTop < scrollTop) {
        navbar.style.top = "-80px";
    } else{
        navbar.style.top = " 0";
    }
    lastScrollTop = scrollTop;
}) */


/****** Go page Search on foucs input search in navbar */



function gopage() {
    window.location.href = "search_medecin.php";
}


/******************** Menu profile ***********************/

function menuToggle() {
  const toggleMenu = document.querySelector('.menu');
  toggleMenu.classList.toggle('active');
}

/************ Side bar filter ************/

