const signup = document.querySelector('#signup-form');
signup?.addEventListener('submit', (event) => {
  event.preventDefault();
  if (!signup.reportValidity()) return;
  document.querySelector('#form-feedback').textContent = 'Parcours testé : votre adresse n’a été ni enregistrée ni transmise. Dans le site final, un e-mail de confirmation serait envoyé.';
  signup.reset();
});
const descriptions = {
  'Bâtiments': 'Consultez les bâtiments de votre cité, leurs niveaux et le chantier en cours. Cette direction privilégie une liste lisible à côté du plan de la ville.',
  'Héros': 'Explorateur · Disponible. L’écran du héros présentera ses talents, son équipement et son rôle de gouverneur. Le sceau est ici un substitut graphique au portrait.',
  'Recherche': 'L’Institut Arcanique ouvre l’accès aux recherches. Ce panneau illustre la transition depuis l’accueil vers les études disponibles.',
  'Missions': 'La préparation d’une mission réunira le héros, les unités et la destination. Aucune mission n’est lancée dans cette maquette.',
  'Alliance': 'L’espace d’alliance réunira les échanges et les informations du groupe. Son contenu détaillé n’est pas simulé ici.',
  'Carte': 'La navigation du monde présentera des listes de Régions, Contrées et Éclats. Les cartes gravées de cette proposition sont uniquement des illustrations de style, sans navigation ni géographie canonique.',
  'Rapports': 'Vos rapports regrouperont les événements de votre royaume. Cet aperçu ne contient aucune donnée de compte.'
};
const dialog = document.querySelector('#detail-dialog');
document.querySelectorAll('[data-panel]').forEach(button => button.addEventListener('click', () => {
  document.querySelector('#detail-title').textContent = button.dataset.panel === 'Carte' ? 'Régions et Contrées' : button.dataset.panel;
  document.querySelector('#detail-content').textContent = descriptions[button.dataset.panel];
  dialog.showModal();
}));
let complete = false;
document.querySelector('#finish-demo')?.addEventListener('click', (event) => {
  complete = !complete;
  document.querySelector('#queue-progress').value = complete ? 100 : 65;
  document.querySelector('#queue-state').textContent = complete ? 'Terminée' : 'En cours';
  document.querySelector('#queue-time').textContent = complete ? 'Scierie niveau 5 · simulation' : '00:24:18 · durée illustrative';
  event.currentTarget.textContent = complete ? 'Réinitialiser' : 'Simuler la fin';
  document.querySelector('#game-feedback').textContent = complete ? 'Simulation terminée : la Scierie est passée au niveau 5. Les ressources affichées restent des données fictives.' : 'La simulation de construction a été réinitialisée.';
});
