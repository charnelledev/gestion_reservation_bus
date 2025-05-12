<?php
// reservation.php
include 'includes/header.php';
require_once 'includes/database.php';


?>


<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Réservation - Bubble</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <style>
    body {
  min-height: 100vh;
  display: flex;
  flex-direction: column;
}

footer {
  margin-top: auto;
}
</style>

<!-- Modal Inscriptions -->
<div id="registerModal" class="hidden fixed inset-0 items-center justify-center bg-black bg-opacity-50 backdrop-blur-sm z-50">
  <div class="bg-white rounded-lg shadow-lg w-full max-w-md p-6 relative">
    <button onclick="closeModal('registerModal')" class="absolute top-2 right-2 text-gray-500 text-2xl">&times;</button>
    <h2 class="text-xl font-bold mb-4">Inscription</h2>
    <form id="registerForm">
      <input type="text" placeholder="Nom" class="w-full p-2 mb-2 border rounded" required>
      <input type="text" placeholder="Prénom" class="w-full p-2 mb-2 border rounded" required>
      <input type="email" placeholder="Email" class="w-full p-2 mb-2 border rounded" required>
      <input type="password" placeholder="Mot de passe" class="w-full p-2 mb-2 border rounded" required>
      <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded w-full">Valider</button>
    </form>
    <p class="mt-4 text-sm text-gray-600">Déjà un compte ? 
      <a href="#" class="text-blue-600 underline" onclick="switchModal('registerModal', 'loginModal')">Se connecter</a>
    </p>
  </div>
</div>

<!-- Modal Connexion -->
<div id="loginModal" class="hidden fixed inset-0  items-center justify-center bg-black bg-opacity-50 backdrop-blur-sm z-50">
  <div class="bg-white rounded-lg shadow-lg w-full max-w-md p-6 relative">
    <button onclick="closeModal('loginModal')" class="absolute top-2 right-2 text-gray-500 text-2xl">&times;</button>
    <h2 class="text-xl font-bold mb-4">Connexion</h2>
    <form id="loginForm">
      <input type="email" placeholder="Email" class="w-full p-2 mb-2 border rounded" required>
      <input type="password" placeholder="Mot de passe" class="w-full p-2 mb-2 border rounded" required>
      <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded w-full">Se connecter</button>
    </form>
  </div>
</div>

<!-- Formulaire Réservation -->
<section class="max-w-4xl mx-auto bg-white p-6 rounded shadow mt-10 " id="reservationForm">
  <h2 class="text-2xl font-bold mb-6">Formulaire de réservation</h2>
  <form id="formReservation">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
      <input name="nom" type="text" placeholder="Nom" class="p-2 border rounded" required>
      <input name="prenom" type="text" placeholder="Prénom" class="p-2 border rounded" required>
      <input name="email" type="email" placeholder="Email" class="p-2 border rounded" required>
      <input name="cni" type="text" placeholder="Numéro de CNI" class="p-2 border rounded" required>
      <select name="trajet" class="p-2 border rounded" required>
        <option value="">-- Choisissez un trajet --</option>
        <option value="Douala - Yaoundé">Douala - Yaoundé</option>
        <option value="Douala - Bafoussam">Douala - Bafoussam</option>
      </select>
      <select name="horaire" class="p-2 border rounded" required id="horaireSelect">
        <option value="">-- Choisissez un horaire --</option>
        <option value="05h00-10h00">05h00-10h00</option>
        <option value="10h00-15h00">10h00-15h00</option>
        <option value="22h00-04h00">22h00-04h00</option>
      </select>
    </div>

    <!-- <div class="my-6">
      <p class="font-semibold mb-2">Choix du bus :</p>
      <div class="flex space-x-4">
        <label class="cursor-pointer">
          <input type="radio" name="type_bus" value="vip" class="hidden" onchange="updateSieges(50)">
          <img src="uploads/images/vip1.jpg" class="w-32 border-4 border-transparent hover:border-blue-600 rounded">
          <p class="text-center mt-2">VIP</p>
        </label>
        <label class="cursor-pointer">
          <input type="radio" name="type_bus" value="classique" class="hidden" onchange="updateSieges(70)">
          <img src="uploads/images/classique1.jpg" class="w-32 border-4 border-transparent hover:border-green-600 rounded">
          <p class="text-center mt-2">Classique</p>
        </label>
      </div>
    </div> -->

    <div class="my-6">
  <p class="font-semibold mb-2">Choix du bus :</p>
  <div class="flex space-x-4">
    <!-- Option VIP -->
    <label class="cursor-pointer" id="vipOption">
      <input type="radio" name="type_bus" value="vip" class="" onchange="updateSieges(50, 'VIP')">
      <img src="uploads/images/vip1.jpg" class="w-32 border-4 border-transparent hover:border-blue-600 rounded" id="vipImage">
      <p class="text-center mt-2">VIP</p>
    </label>

    <!-- Option Classique -->
    <label class="cursor-pointer" id="classiqueOption">
      <input type="radio" name="type_bus" value="classique" class="" onchange="updateSieges(70, 'Classique')">
      <img src="uploads/images/classique1.jpg" class="w-32 border-4 border-transparent hover:border-green-600 rounded" id="classiqueImage">
      <p class="text-center mt-2">Classique</p>
    </label>
  </div>
</div>

    <div class="mb-6">
      <label class="block font-semibold mb-2">Choix du siège :</label>
      <select name="siege" id="selectSiege" class="w-full p-2 border rounded">
        <option value="">-- Choisissez un siège --</option>
        <option value="2">2</option>
      </select>
    </div>

    <button type="submit" class="bg-blue-700 text-white px-6 py-2 rounded">Réserver</button>
  </form>
</section>

<!-- Affichage automatique du modal d'inscription -->
<?php if (isset($_GET['showRegister']) && $_GET['showRegister'] === 'true'): ?>
<script>
  window.addEventListener('DOMContentLoaded', () => {
    openModal('registerModal');
  });
</script>
<?php endif; ?>

<!-- JavaScript -->
<script>
function openModal(id) {
  const modal = document.getElementById(id);
  if (modal) {
    modal.classList.remove('hidden');
    document.body.classList.add('overflow-hidden');
  }
}

function closeModal(id) {
  const modal = document.getElementById(id);
  if (modal) {
    modal.classList.add('hidden');
    document.body.classList.remove('overflow-hidden');
  }
}

function switchModal(hideId, showId) {
  closeModal(hideId);
  setTimeout(() => {
    openModal(showId);
  }, 300);
}
</script>

<script src="js/main.js"></script>
</body>
</html>

<?php include 'includes/footer.php'; ?>
