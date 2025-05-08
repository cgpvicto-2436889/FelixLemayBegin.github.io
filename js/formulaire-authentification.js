document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("contactForm").addEventListener("submit",
        function (event) {

            let code = document.getElementById("nom");
            let motDePasse = document.getElementById("motdepasse");

            let erreurCode = document.getElementById("erreurCode");
            let erreurMotDePasse = document.getElementById("erreurMotDePasse");

            let isValid = true;

            if (code.value !== "") {
                erreurCode.textContent = "";
                code.classList.remove("controle-erreur");
            } else {
                erreurCode.textContent = "Le Code est obligatoire.";
                code.classList.add("controle-erreur");
                isValid = false;
            }

            if (motDePasse.value !== "") {
                erreurMotDePasse.textContent = "";
                motDePasse.classList.remove("controle-erreur");
            } else {
                erreurMotDePasse.textContent = "Le mot de passe est obligatoire.";
                motDePasse.classList.add("controle-erreur");
                isValid = false;
            }

            if (!isValid) {
                event.preventDefault();
            }
        });
});