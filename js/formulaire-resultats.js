document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("contactForm").addEventListener("submit",
        function (event) {



            let isValid = true;

            let rang = document.getElementById("rang");
            let scoreFinal = document.getElementById("scoreFinal");
            let dateAjout = document.getElementById("dateAjout");

            let erreurRang = document.getElementById("erreurRang");
            let erreurScoreFinal = document.getElementById("erreurScoreFinal");
            let erreurDateAjout = document.getElementById("erreurDateAjout");

            if (rang.value !== "" && rang.value >= 1 && rang.value <= 10) {
                erreurRang.textContent = "";
                rang.classList.remove("controle-erreur");
            } else {
                erreurRang.textContent = "Le rang doit est obligatoire, inferieur a 10, superieur a 1";
                rang.classList.add("controle-erreur");
                isValid = false;
            }

            if (scoreFinal.value !== "" && scoreFinal.value <= 100 && scoreFinal.value >= 1) {
                erreurScoreFinal.textContent = "";
                scoreFinal.classList.remove("controle-erreur");
            } else {
                erreurScoreFinal.textContent = "Le score final est obligatoire, inferieur a 100, superieur a 1";
                scoreFinal.classList.add("controle-erreur");
                isValid = false;
            }

            if (dateAjout.value !== "") {
                erreurDateAjout.textContent = "";
                dateAjout.classList.remove("controle-erreur");
            } else {
                erreurDateAjout.textContent = "La date est obligatoire.";
                dateAjout.classList.add("controle-erreur");
                isValid = false;
            }

            if (!isValid) {
                event.preventDefault();
            }
        });
});