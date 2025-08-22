(function () {
  console.log("voici le carrousel");
  const carrousels = document.querySelectorAll(".carrousel");
  const radios = document.querySelectorAll(".carrousel__radio");

  radios.forEach((radio, index) => {
    radio.addEventListener("change", () => {
      initialise_carrousel();
      carrousels[index].style.opacity = 1;
    });
  });

  function initialise_carrousel() {
    carrousels.forEach((carrousel, i) => {
      carrousel.style.opacity = 0;
    });
  }
})();
