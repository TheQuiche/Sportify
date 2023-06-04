// Récupérer le bouton "Voir son CV" du coach de football
var voirCvBtn = document.querySelector('#Football #voir-cv');

// Récupérer la div contenant le CV
var cvContainer = document.querySelector('#Football #cv-container');

// Ajouter un gestionnaire d'événement pour le clic sur le bouton
voirCvBtn.addEventListener('click', function() {
  cvContainer.style.display = 'block';
});
