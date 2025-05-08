document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("contactForm").addEventListener("submit",
        function (event) {



            let isValid = true;

            let nom = document.getElementById("nom");
            let prenom = document.getElementById("prenom");
            let pseudo = document.getElementById("pseudo");
            let courriel = document.getElementById("courriel");

            let erreurNom = document.getElementById("erreurNom");
            let erreurPrenom = document.getElementById("erreurPrenom");
            let erreurPseudo = document.getElementById("erreurPseudo");
            let erreurCourriel = document.getElementById("erreurCourriel");

            if (nom.value !== "") {
                erreurNom.textContent = "";
                nom.classList.remove("controle-erreur");
            } else {
                erreurNom.textContent = "Le nom est obligatoire.";
                nom.classList.add("controle-erreur");
                isValid = false;
            }

            if (prenom.value !== "") {
                erreurPrenom.textContent = "";
                prenom.classList.remove("controle-erreur");
            } else {
                erreurPrenom.textContent = "Le prénom est obligatoire.";
                prenom.classList.add("controle-erreur");
                isValid = false;
            }

            if (pseudo.value !== "") {
                erreurPseudo.textContent = "";
                pseudo.classList.remove("controle-erreur");
            } else {
                erreurPseudo.textContent = "Le pseudo est obligatoire.";
                pseudo.classList.add("controle-erreur");
                isValid = false;
            }

            const regexCourriel = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (regexCourriel.test(courriel.value)) {
                erreurCourriel.textContent = "";
                courriel.classList.remove("controle-erreur");
            } else {
                erreurCourriel.textContent = "Veuillez entrer un courriel valide.";
                courriel.classList.add("controle-erreur");
                isValid = false;
            }

            if (!isValid) {
                event.preventDefault();
            }
        });
});