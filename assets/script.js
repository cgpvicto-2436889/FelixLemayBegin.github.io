const cards = document.querySelectorAll('.memory-card');

let hasFlippedCard = false;
let lockBoard = false;
let firstCard, secondCard;

function flipCard() {
  if (lockBoard) return;
  if (this === firstCard) return;

  this.classList.add('flip');

  if (!hasFlippedCard) {
    // first click
    hasFlippedCard = true;
    firstCard = this;

    return;
  }

  // second click
  secondCard = this;

  checkForMatch();
}

function checkForMatch() {
  let isMatch = firstCard.dataset.framework === secondCard.dataset.framework;

  isMatch ? disableCards() : unflipCards();
}

function disableCards() {
  firstCard.removeEventListener('click', flipCard);
  secondCard.removeEventListener('click', flipCard);

  resetBoard();

  // Vérifie si les cartes sont retourner
  FiniOuNon();
}

function unflipCards() {
  lockBoard = true;

  setTimeout(() => {
    firstCard.classList.remove('flip');
    secondCard.classList.remove('flip');

    resetBoard();

    // Vérifie si les cartes sont retourner
    FiniOuNon();
  }, 1500);
}

function resetBoard() {
  [hasFlippedCard, lockBoard] = [false, false];
  [firstCard, secondCard] = [null, null];
}

(function shuffle() {
  cards.forEach(card => {
    let randomPos = Math.floor(Math.random() * 12);
    card.style.order = randomPos;
  });
})();

cards.forEach(card => card.addEventListener('click', flipCard));

/*Mon code*/
/*===============================================================================================*/

/*variables*/
let debutButon = document.getElementById("debut-compteur");
let temps = document.getElementById("temps");
// Variables pour le cronomètre
let intervalId = null;
  //Variables pour la convertion du temps
  let secondes = 0;
  let minutes = 0;
  let heures = 0;

// Active le timer quand on appuie sur le bouton commencer
debutButon.addEventListener("click", () =>
{
  if (intervalId) return;
    {
      // Ajoute +1 aux secondes a chaque secondes
      intervalId = setInterval(() => {
      secondes++;
      let lettreEnNombre = parseInt(temps.value);
      ConvertirTemps(secondes);
    }, 1000);
  }
});

// Cette fonction sert à vérifier si toutes les cartes sont retournées
// Si toutes les cartes sont retournées, sa désactive le timer
//J'ai mit cette fonction dans disablecard et unflipcard
function FiniOuNon()
{
  if (Array.from(cards).every(cards => cards.classList.contains("flip")))
  {
    clearInterval(intervalId);
  }
}

// Convertit le temps (secondes) en minutes quabd le timer atteind 60 secondes. Quand sa atteint 60 secondes, sa ajoute 1 minutes
// Sa affiche aussi le temps dans la input du cronomètre
function ConvertirTemps()
{
  if(secondes == 60)
  {
    secondes = 0;
    minutes++;
  }
  temps.value = minutes + ":" + secondes;
}


// Pour le dialog
//
//
//
/*=========================================*/

const dialog = document.getElementById("dialog");
const fermerFenetre = document.getElementById("fermerFenetre");
const fermerIndefiniment = document.getElementById("nePlusAfficherCetteFenetre");

// Vérification du localStorage pour savoir si on doit afficher le dialog
if(localStorage.getItem("nePlusAfficher") !== "true")
{
  // Affiche le dialogue si "nePlusAfficher" n'est pas défini ou n'est pas "true"
  dialog.showModal();
}


// Fonction pour fermer la fenêtre temporairement
function FermerFenetre()
{
    dialog.close();
}

// Fonction pour ne plus afficher la fenêtre définitivement
function FermerIndefiniment()
{
  localStorage.setItem("nePlusAfficher", "true");  
  FermerFenetre();
}
