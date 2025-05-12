
  const swiper = new Swiper('.mySwiper', {
    loop: true,
    pagination: {
      el: '.swiper-pagination',
    },
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
  });
  function openModal(id) {
  const modal = document.getElementById(id);
  if (modal) {
    modal.classList.remove('hidden');
    document.body.classList.add('backdrop-blur-sm'); // Ajoute le flou
  }
}

function openModal(id) {
  const modal = document.getElementById(id);
  if (modal) {
    modal.classList.remove('hidden');
    document.body.classList.add('backdrop-blur-sm');
  }
}

function closeModal(id) {
  const modal = document.getElementById(id);
  if (modal) {
    modal.classList.add('hidden');
    document.body.classList.remove('backdrop-blur-sm');
  }
}

  function switchModal(current, target) {
    closeModal(current);
    openModal(target);
  }

  document.getElementById('registerForm').addEventListener('submit', function(e) {
    e.preventDefault();
    closeModal('registerModal');
    document.getElementById('reservationForm').classList.remove('hidden');
  });

  document.getElementById('loginForm').addEventListener('submit', function(e) {
    e.preventDefault();
    closeModal('loginModal');
    document.getElementById('reservationForm').classList.remove('hidden');
  });

  function updateSieges(nombre) {
    const select = document.getElementById('selectSiege');
    select.innerHTML = '<option value="">-- Choisissez un siège --</option>';
    for (let i = 1; i <= nombre; i++) {
      const option = document.createElement('option');
      option.value = i;
      option.text = 'Siège ' + i;
      // Ex: ajouter une vérification ici si place déjà réservée → désactiver
      // if (placeEstReservee(i)) option.disabled = true;
      select.appendChild(option);
    }
  }

  // Simuler les horaires dynamiques
  const horairesSemaine = ['08:00 - 12:00', '13:00 - 17:00'];
  const horairesWeekend = ['09:00 - 13:00', '15:00 - 19:00'];
  document.getElementById('horaireSelect').addEventListener('focus', () => {
    const date = new Date();
    const day = date.getDay(); // 0 = dimanche, 6 = samedi
    const horaires = (day === 0 || day === 6) ? horairesWeekend : horairesSemaine;
    const select = document.getElementById('horaireSelect');
    select.innerHTML = '<option value="">-- Choisissez un horaire --</option>';
    horaires.forEach(h => {
      const option = document.createElement('option');
      option.value = h;
      option.text = h;
      select.appendChild(option);
    });
  });
  window.addEventListener('DOMContentLoaded', () => {
  const reservationForm = document.getElementById('reservationForm');
  if (reservationForm) {
    reservationForm.classList.remove('hidden'); // Affiche le formulaire
  }
});
document.querySelector('select[name="trajet"]').addEventListener('change', function() {
  const horaireSelect = document.getElementById('horaireSelect');
  horaireSelect.innerHTML = ''; // Vide la sélection existante

  if (this.value === 'Douala - Yaoundé') {
    horaireSelect.innerHTML = `
      <option value="08:00">08:00</option>
      <option value="12:00">12:00</option>
      <option value="16:00">16:00</option>
    `;
  } else if (this.value === 'Douala - Bafoussam') {
    horaireSelect.innerHTML = `
      <option value="09:00">09:00</option>
      <option value="13:00">13:00</option>
      <option value="17:00">17:00</option>
    `;
  }
});
//  Fonction pour mettre à jour les sièges et l'état des options
  function updateSieges(sieges, type) {
    // Afficher le nombre de sièges en fonction du type de bus
    console.log(`Bus choisi: ${type} - Nombre de sièges: ${sieges}`);

    // Ajouter une bordure active pour l'image sélectionnée
    const vipImage = document.getElementById('vipImage');
    const classiqueImage = document.getElementById('classiqueImage');
    
    // Réinitialiser les bordures
    vipImage.classList.remove('border-blue-600');
    classiqueImage.classList.remove('border-green-600');

    // Ajouter la bordure active sur l'image sélectionnée
    if (type === 'VIP') {
      vipImage.classList.add('border-blue-600');
    } else {
      classiqueImage.classList.add('border-green-600');
    }

    // Mettre à jour la logique des sièges ici (si nécessaire)
    // Par exemple, tu pourrais afficher un nombre de sièges disponibles ou autres informations
  }


