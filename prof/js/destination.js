(function () {
  console.log("destination.js");
  const domaine = window.location.href;
  const categorie__ul__li = document.querySelectorAll(".categorie__ul__li");
  console.log(categorie__ul__li.length);
  categorie__ul__li.forEach((li) => {
    console.log(li.getAttribute("data-category-id"));
    li.addEventListener("click", function () {
      let categoryId = li.getAttribute("data-category-id");
      console.log(categoryId);
      const apiUrl = `${domaine}wp-json/wp/v2/posts?categories=${categoryId}`;
      console.log(apiUrl);
      mon_fetch(apiUrl);
    });
  });

  function mon_fetch(apiUrl) {
    fetch(apiUrl)
      .then((response) => response.json())
      .then((data) => {
        const destinationList = document.querySelector(".destination__list");
        destinationList.innerHTML = "";

        console.log(data);
        data.forEach((article) => {
          const articleElement = document.createElement("div");
          articleElement.innerHTML = `
                    <h3>${article.title.rendered}</h3>
                  
                    <a href="${article.link}">Lire plus</a>
                `;
          destinationList.appendChild(articleElement);
        });
      })
      .catch((error) =>
        console.error("Erreur lors de la récupération des articles:", error)
      );
  }
})();
