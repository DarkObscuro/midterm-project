// When the user scrolls the page, execute myFunction
window.onscroll = function() {myFunction()};

// Get the header
var header = document.getElementById("id-header");

// Get the offset position of the navbar
var sticky = header.offsetTop;

// Add the sticky class to the header when you reach its scroll position. Remove "sticky" when you leave the scroll position

/* 
Function to make the header sticky on scroll 
*/
function myFunction() {
  if (window.pageYOffset > sticky) {
    header.classList.add("sticky");
  } else {
    header.classList.remove("sticky");
  }
}

/* 
Function to swap the header to the mobile menu
*/
$WIN = $(window);
var MobileMenu = function() {

  // Get the mobile menu button and the header
  var toggleButton = $('.header-menu-toggle'), nav = $('.header-nav-wrap');

  // We create a event that listens to the click
  toggleButton.on('click', function(event){
      event.preventDefault();

      toggleButton.toggleClass('is-clicked');
      nav.slideToggle();
  });

  // We check if the conditions are met to go in mobile display
  if (toggleButton.is(':visible')) nav.addClass('mobile');

  $WIN.on('resize', function() {
      if (toggleButton.is(':visible')) nav.addClass('mobile');
      else nav.removeClass('mobile');
  });

  nav.find('a').on("click", function() {

      if (nav.hasClass('mobile')) {
          toggleButton.toggleClass('is-clicked');
          nav.slideToggle(); 
      }
  });

};

/*
Highlight current page in the header
*/
const scrollHandler = () => {

  // Get the header
  let menu = document.querySelector('.header-main-nav')

  // Get the sections
  let intro = document.getElementById('intro');
  let about = document.getElementById('about');
  let skills = document.getElementById('skills');
  let works = document.getElementById('works');

  // Get the header and sections position
  let pos_menu = window.pageYOffset + menu.offsetHeight;

  let pos_intro = intro.offsetTop + intro.offsetHeight;
  let pos_about = about.offsetTop + about.offsetHeight;
  let pos_skills = skills.offsetTop + skills.offsetHeight;
  let pos_works = works.offsetTop + works.offsetHeight;
  
  // Get the distances between the header and the sections
  let distance_intro = pos_intro - pos_menu;
  let distance_about = pos_about - pos_menu;
  let distance_skills = pos_skills - pos_menu;
  let distance_works = pos_works - pos_menu;

  // Determine the current section
  let min = Math.min(...[distance_intro, distance_about, distance_skills, distance_works].filter(num => num > 0));

  // Remove the current class from all sections in the header (re-initialisation)
  document.querySelectorAll('.header-main-nav .Item')[0].classList.remove('current');
  document.querySelectorAll('.header-main-nav .Item')[1].classList.remove('current');
  document.querySelectorAll('.header-main-nav .Item')[2].classList.remove('current');
  document.querySelectorAll('.header-main-nav .Item')[3].classList.remove('current');

  // Add the current class to the current section
  if(min === distance_intro) document.querySelectorAll('.header-main-nav .Item')[0].classList.add('current');
  if(min === distance_about) document.querySelectorAll('.header-main-nav .Item')[1].classList.add('current');
  if(min === distance_skills) document.querySelectorAll('.header-main-nav .Item')[2].classList.add('current');
  if(min === distance_works) document.querySelectorAll('.header-main-nav .Item')[3].classList.add('current');

}

MobileMenu();
window.addEventListener('scroll', scrollHandler);