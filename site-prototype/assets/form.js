/* Démonstration du formulaire : en production, envoi vers une Pages Function qui relaie à Brevo (double opt-in).
   Les messages viennent de la page (attributs data-err-*), donc de la langue de la page, rien n'est injecté par script. */
(function () {
  /* Le choix de langue se mémorise (stockage local, aucune donnée personnelle) ; la racine le relit. */
  var sw = document.querySelector('.lang a');
  if (sw) sw.addEventListener('click', function () { try { localStorage.setItem('kalendrath-lang', sw.getAttribute('hreflang')); } catch (e) {} });
  var form = document.querySelector('.form');
  if (!form) return;
  var email = form.querySelector('#email');
  var consent = form.querySelector('[name="consentement"]');
  var err = form.querySelector('#email-err');
  form.addEventListener('submit', function (e) {
    e.preventDefault();
    var badEmail = !email.value || !email.checkValidity();
    var msg = badEmail ? form.dataset.errEmail : (!consent.checked ? form.dataset.errConsent : '');
    if (msg) {
      err.textContent = msg; err.hidden = false;
      email.setAttribute('aria-invalid', String(badEmail));
      (badEmail ? email : consent).focus();
      return;
    }
    err.hidden = true; email.removeAttribute('aria-invalid');
    form.classList.add('is-done');
    form.querySelector('.form__done').focus();
  });
})();
