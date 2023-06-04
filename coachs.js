// Récupérer l'élément de la section coach
const coachInfo = document.querySelector('.coach-info');

// Récupérer les données du coach à partir des attributs data
const coachName = coachInfo.getAttribute('data-coach-name');
const coachSpecialty = coachInfo.getAttribute('data-coach-specialty');
const coachOffice = coachInfo.getAttribute('data-coach-office');
const coachPhone = coachInfo.getAttribute('data-coach-phone');
const coachEmail = coachInfo.getAttribute('data-coach-email');

// Afficher les données du coach dans la section appropriée
const coachNameElement = coachInfo.querySelector('h2');
const coachSpecialtyElement = coachInfo.querySelector('p:nth-of-type(1)');
const coachOfficeElement = coachInfo.querySelector('p:nth-of-type(2)');
const coachPhoneElement = coachInfo.querySelector('p:nth-of-type(3)');
const coachEmailElement = coachInfo.querySelector('p:nth-of-type(4)');

coachNameElement.textContent = coachName;
coachSpecialtyElement.textContent = coachSpecialty;
coachOfficeElement.textContent = coachOffice;
coachPhoneElement.textContent = coachPhone;
coachEmailElement.textContent = coachEmail;
