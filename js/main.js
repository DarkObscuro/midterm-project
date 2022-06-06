// When the user scrolls the page, execute myFunction
window.onscroll = function() {myFunction()};

// Get the header
var header = document.getElementById("id-header");

// Get the offset position of the navbar
var sticky = header.offsetTop;

// Add the sticky class to the header when you reach its scroll position. Remove "sticky" when you leave the scroll position
function myFunction() {
  if (window.pageYOffset > sticky) {
    header.classList.add("sticky");
  } else {
    header.classList.remove("sticky");
  }
}

/* Mobile Menu  */ 
$WIN = $(window);
var MobileMenu = function() {

  var toggleButton = $('.header-menu-toggle'),
      nav = $('.header-nav-wrap');

  toggleButton.on('click', function(event){
      event.preventDefault();

      toggleButton.toggleClass('is-clicked');
      nav.slideToggle();
  });

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

MobileMenu();