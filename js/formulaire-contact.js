document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("contactForm").addEventListener("submit",
        function (event) {



            let isValid = true;

            let nom = document.getElementById("nom");
            let sujet = document.getElementById("sujet");
            let message = document.getElementById("message");
            let courriel = document.getElementById("courriel");

            let erreurNom = document.getElementById("erreurNom");
            let erreurSujet = document.getElementById("erreurSujet");
            let erreurMessage = document.getElementById("erreurMessage");
            let erreurCourriel = document.getElementById("erreurCourriel");

            if (nom.value !== "") {
                erreurNom.textContent = "";
                nom.classList.remove("controle-erreur");
            } else {
                erreurNom.textContent = "Le nom est obligatoire.";
                nom.classList.add("controle-erreur");
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

            if (sujet.value !== "") {
                erreurSujet.textContent = "";
                sujet.classList.remove("controle-erreur");
            } else {
                erreurSujet.textContent = "Le sujet est obligatoire.";
                sujet.classList.add("controle-erreur");
                isValid = false;
            }

            if (message.value !== "") {
                erreurMessage.textContent = "";
                message.classList.remove("controle-erreur");
            } else {
                erreurMessage.textContent = "Le message est obligatoire.";
                message.classList.add("controle-erreur");
                isValid = false;
            }

            if (!isValid) {
                event.preventDefault();
            }
        });
});