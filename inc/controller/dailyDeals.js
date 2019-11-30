

var slideIndex = 0;
showSlides();
/**
 * slider to show images of new deals after 5 sec
 */
function showSlides() {
  var i;
  var slides = document.getElementsByClassName("today_deals_slides");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}
  slides[slideIndex-1].style.display = "block";
  setTimeout(showSlides, 4000); // Change image every 4 seconds
}