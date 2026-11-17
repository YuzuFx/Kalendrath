// Les interactions de cette maquette restent exclusivement en mémoire.
document.querySelectorAll('[data-signup]').forEach(form => form.addEventListener('submit', event => {
  event.preventDefault();
  if (!form.reportValidity()) return;
  form.querySelector('.form-feedback').textContent = 'Parcours testé. Aucune adresse n’a été enregistrée ou envoyée. Le site final vous demanderait de confirmer votre inscription par e-mail.';
  form.reset();
}));
let miniComplete = false;
document.querySelector('#mini-finish')?.addEventListener('click', event => {
  miniComplete = !miniComplete;
  document.querySelector('#mini-progress').value = miniComplete ? 100 : 68;
  document.querySelector('#mini-state').textContent = miniComplete ? 'Chantier terminé' : 'En construction';
  event.currentTarget.textContent = miniComplete ? 'Réinitialiser la démonstration ↺' : 'Simuler la fin du chantier ↗';
  document.querySelector('#mini-feedback').textContent = miniComplete ? 'Simulation : la Scierie atteint le niveau V.' : 'Votre royaume avance, décision après décision.';
});
const cityNames = ['cite-palier01-hameau','cite-palier02-village','cite-palier03-bourg','cite-palier04-ville-franche','cite-palier05-place-forte'];
const roman = ['I','II','III','IV','V'];
const cityDialog = document.querySelector('#city-dialog');
document.querySelectorAll('[data-stage]').forEach(button => button.addEventListener('click', () => {
  const index = Number(button.dataset.stage) - 1;
  const picture = document.querySelector('#city-large');
  picture.src = '../../../direction-artistique/references/' + cityNames[index] + '.png';
  picture.alt = 'Illustration de cité au palier ' + roman[index];
  document.querySelector('#city-dialog-title').textContent = 'Palier ' + roman[index];
  cityDialog.showModal();
}));
document.querySelectorAll('[data-close]').forEach(button => button.addEventListener('click', () => button.closest('dialog').close()));
let buildingComplete = false;
document.querySelector('#build-finish')?.addEventListener('click', event => {
  buildingComplete = !buildingComplete;
  document.querySelector('#build-progress').value = buildingComplete ? 100 : 68;
  document.querySelector('#build-percent').textContent = buildingComplete ? '100 %' : '68 %';
  document.querySelector('#build-time').textContent = buildingComplete ? 'Terminée · simulation' : '00:24:18';
  document.querySelector('#build-state').textContent = buildingComplete ? 'Terminée' : 'En cours';
  event.currentTarget.textContent = buildingComplete ? 'Réinitialiser ↺' : 'Simuler la fin ↗';
  document.querySelector('#game-feedback').textContent = buildingComplete ? 'Simulation : la Scierie atteint le niveau V. Aucune ressource réelle n’a été consommée.' : 'Le chantier de démonstration a été réinitialisé.';
});
document.querySelector('#dismiss-tutorial')?.addEventListener('click', () => {
  document.querySelector('#tutorial').remove();
  document.querySelector('#build-finish').focus();
});
document.querySelectorAll('[data-filter]').forEach(button => button.addEventListener('click', () => {
  document.querySelectorAll('[data-filter]').forEach(filter => {
    filter.classList.toggle('selected', filter === button);
    filter.setAttribute('aria-pressed', String(filter === button));
  });
  let visible = 0;
  document.querySelectorAll('[data-kind]').forEach(row => {
    row.hidden = button.dataset.filter !== 'all' && row.dataset.kind !== button.dataset.filter;
    if (!row.hidden) visible++;
  });
  document.querySelector('#movement-count').textContent = String(visible);
  document.querySelector('#game-feedback').textContent = visible + (visible > 1 ? ' mouvements affichés.' : ' mouvement affiché.') + ' Filtre : ' + button.textContent + '.';
}));
const details = {
 'Bâtiments': ['La cité, bâtiment par bâtiment.', 'La Scierie, la Mine de fer et le Puits de mana assurent la production. Le détail d’un bâtiment présentera les prérequis, le coût et la durée calculés par le jeu. Ces valeurs ne sont pas inventées ici.'],
 'Héros & conseil': ['Le chef de votre royaume.', 'Le héros personnifie le joueur. Ses talents, son équipement et ses conseillers seront réunis dans cet espace. Le sceau remplace provisoirement un portrait ; aucun nom, bonus ou nombre de sièges n’est ajouté.'],
 'Recherches': ['L’Institut Arcanique.', 'Consultez les recherches et leurs conditions réelles. Cet aperçu montre une destination de navigation, sans ordre de recherche ni coût simulé.'],
 'Missions': ['Préparer un départ.', 'La préparation réunira la destination, les unités et les informations nécessaires avant confirmation. Aucune mission n’est envoyée par cette maquette.'],
 'Garnison': ['Les troupes présentes dans votre cité.', 'La liste illustrée présente les Soldats, les Francs-Archers et les Cavaliers. Les effectifs sont fictifs, sans lien avec une composition militaire ou un équilibrage recommandé.'],
 'Soldats': ['Soldats · 120 présents dans cet exemple.', 'Illustration de Soldat validée dans le projet. Effectif fictif.'],
 'Francs-Archers': ['Francs-Archers · 48 présents dans cet exemple.', 'Illustration de Franc-Archer validée dans le projet. Effectif fictif.'],
 'Cavaliers': ['Cavaliers · 16 présents dans cet exemple.', 'Illustration de Cavalier validée dans le projet. Effectif fictif.'],
 'Régions & Contrées': ['Le monde, présenté en listes.', 'Les Régions, Contrées et Éclats structurent la navigation. Aucun monde parcourable ni nouvelle géographie n’est inventé pour cette maquette.'],
 'Alliance': ['L’espace de votre alliance.', 'Cette destination réunira les informations collectives et les échanges du groupe. Aucun nom d’alliance ou engagement de guerre n’est simulé.'],
 'Métiers': ['Métiers et commerce · en conception.', 'Les métiers du royaume et le commerce entre joueurs sont actés. Les noms, recettes, monnaie et ordre de livraison restent à préciser. Cette maquette ne propose ni catalogue ni économie fictive.'],
 'Marché': ['Marché · en conception.', 'Le commerce entre joueurs fait partie du projet. Les règles détaillées et la monnaie sont encore à définir ; aucune transaction n’est proposée ici.'],
 'Prestige d’Empire': ['Un repère de progression.', 'Le nombre affiché est purement illustratif. Aucun rang, seuil ou bonus de Prestige n’est proposé dans cette direction graphique.'],
 'Menace PvE': ['Une activité hostile à examiner.', 'Exemple de rapport : des hordes sont actives dans les environs. Ce signal est une illustration d’interface, sans compte à rebours d’attaque, déclenchement d’événement ou perte de ressources.'],
 'Mission en route': ['Des Éclaireurs en déplacement.', 'Cette ligne illustre la lecture d’une mission en route. Destination et durée sont fictives.'],
 'Retour de mission': ['Un Convoi regagne la capitale.', 'Cette ligne illustre un retour. Elle ne contient aucun butin, gain ou marchandise réelle.'],
 'Préférences': ['Une interface à votre rythme.', 'Le bouton « Réduire les effets » du rail coupe toutes les animations et transitions de cette étude. La préférence système de réduction du mouvement est également respectée automatiquement.']
};
const detailDialog = document.querySelector('#detail-dialog');
document.querySelectorAll('[data-detail]').forEach(button => button.addEventListener('click', () => {
  const key = button.dataset.detail;
  document.querySelector('#detail-title').textContent = key;
  const box = document.querySelector('#detail-copy');
  box.replaceChildren(...details[key].map(text => { const p = document.createElement('p'); p.textContent = text; return p; }));
  detailDialog.showModal();
}));
document.querySelector('#motion-toggle')?.addEventListener('click', event => {
  const reduced = document.documentElement.classList.toggle('reduced-motion');
  event.currentTarget.setAttribute('aria-pressed', String(reduced));
  event.currentTarget.lastElementChild.textContent = reduced ? 'Effets réduits' : 'Réduire les effets';
});
