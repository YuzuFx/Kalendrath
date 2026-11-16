'use strict';
const form = document.querySelector('#signup-form');
form?.addEventListener('submit', (event) => {
  event.preventDefault();
  document.querySelector('#form-message').textContent = 'Parcours testé : le formulaire est valide. Aucune inscription réelle n’a été créée et aucune adresse n’a été transmise.';
  form.reset();
});
document.querySelector('#complete-build')?.addEventListener('click', (event) => {
  document.querySelector('#build-status').textContent = 'Niveau 7 · Terminé';
  document.querySelector('#build-progress').style.width = '100%';
  document.querySelector('#build-progress').parentElement.setAttribute('aria-label', 'Progression fictive : 100 %');
  document.querySelector('#build-progress').parentElement.nextElementSibling.textContent = 'Progression illustrative · 100 %';
  document.querySelector('#build-message').textContent = 'Simulation terminée : la Scierie atteint le niveau 7. Rechargez la page pour réinitialiser cet exemple.';
  event.currentTarget.disabled = true;
  event.currentTarget.textContent = 'Construction simulée achevée';
});
document.querySelector('#hero-action')?.addEventListener('click', (event) => {
  const prepared = event.currentTarget.dataset.prepared === 'yes';
  event.currentTarget.dataset.prepared = prepared ? 'no' : 'yes';
  event.currentTarget.textContent = prepared ? 'Préparer une mission ↗' : 'Annuler la préparation';
  document.querySelector('#hero-state').textContent = prepared ? 'Disponible dans la capitale' : 'Préparation d’une mission · Démonstration';
  document.querySelector('#hero-message').textContent = prepared ? 'Préparation annulée dans cette maquette.' : 'Le futur écran de mission permettra de choisir une cible et un contingent. Aucun départ réel n’est effectué.';
});
