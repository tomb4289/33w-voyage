// your-theme-name/js/animations.js

document.addEventListener("DOMContentLoaded", function () {
  const heroContent = document.querySelector(".hero-content");

  if (heroContent) {
    // Add the 'animate-in' class to trigger the CSS animation on page load
    heroContent.classList.add("animate-in");
  }

  // Your existing carousel.js will likely handle the `carrousel` class fading.
  // The previous animation.js included a basic carousel, but since you have
  // `script/carrousel.js`, we'll assume it handles the image transitions.
  // The `mytheme-animations` script here focuses only on the hero content animation.
});
