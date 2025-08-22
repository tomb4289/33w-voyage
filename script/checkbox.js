(function () {
  function mettreAJourCheckbox() {
    const burgerBtn = document.querySelector(".entete__burger");
    const checkbox = document.querySelector("#chk__menu");

    if (burgerBtn && checkbox) {
      const style = window.getComputedStyle(burgerBtn);
      const isVisible = style.display !== "none";

      if (!isVisible) {
        checkbox.checked = false;
      }
    }
  }

  window.addEventListener("load", mettreAJourCheckbox);

  window.addEventListener("resize", mettreAJourCheckbox);
})();
