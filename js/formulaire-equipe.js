document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("contactForm").addEventListener("submit",
        function (event) {


            let isValid = true;

            let nom = document.getElementById("nom");
            let slogan = document.getElementById("slogan");
            let dateAjout = document.getElementById("dateAjout");

            let erreurNom = document.getElementById("erreurNom");
            let erreurSlogan = document.getElementById("erreurSlogan");
            let erreurDateAjout = document.getElementById("erreurDateAjout");

            if (nom.value !== "") {
                erreurNom.textContent = "";
                nom.classList.remove("controle-erreur");
            } else {
                erreurNom.textContent = "Le nom est obligatoire.";
                nom.classList.add("controle-erreur");
                isValid = false;
            }

            if (slogan.value !== "") {
                erreurSlogan.textContent = "";
                slogan.classList.remove("controle-erreur");
            } else {
                erreurSlogan.textContent = "Le slogan est obligatoire.";
                slogan.classList.add("controle-erreur");
                isValid = false;
            }

            if (dateAjout.value !== "") {
                const dateChoisie = new Date(dateAjout.value);
                const aujourdHui = new Date();
                aujourdHui.setHours(0, 0, 0, 0);

                if (dateChoisie <= aujourdHui) {
                    erreurDateAjout.textContent = "";
                    dateAjout.classList.remove("controle-erreur");
                } else {
                    erreurDateAjout.textContent = "La date ne peut pas être dans le futur.";
                    dateAjout.classList.add("controle-erreur");
                    isValid = false;
                }
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