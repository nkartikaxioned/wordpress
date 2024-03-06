document.addEventListener('DOMContentLoaded', function () {

  const hamburger = document.querySelector('.hamburger'),
    navbar = document.querySelector('.navbar'),
    html = document.querySelector('html'),
    wpadminbar = document.querySelector('#wpadminbar'),
    header = document.querySelector('header'),
    speakerContainer = document.querySelectorAll('.speaker-container');
    var screenWidth = window.innerWidth;

  hamburger.addEventListener('click', () => {
    hamburger.classList.toggle("active");
    navbar.classList.toggle("active-nav");
    html.classList.toggle('html-scroll');
  });

  if (wpadminbar) {
    header.style.marginTop = '2rem';
  }

  speakerContainer.forEach(function(speaker, index) {
    
    // if(index+1%3==0 && index!= 0 && screenWidth > 1023){
    //   console.log(index + "==>");
    //   speaker.style.marginRight='0';
    // }else if(index+1%2==0 && index!= 0 && screenWidth > 767){
    //   speaker.style.marginRight='0';
    // }else{
    //   speaker.style.marginRight='10px';
    // }

    console.log(index+1, screenWidth);
    if(screenWidth <= 1024){
      speaker.style.marginRight = "20px";
    }
    if(screenWidth <= 767){
      speaker.style.marginRight = "5px";
    }
  });
});