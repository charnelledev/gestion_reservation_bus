<?php
include 'includes/header.php';
require_once 'includes/database.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="src/output.css">
    <link
rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
/>
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

</head>
<body>
<style>
  @keyframes fade-in {
    from {
      opacity: 0;
      transform: translateY(20px);
    }
    to {
      opacity: 1;
      transform: translateY(0);
    }
  }

  .animate-fade-in {
    animation: fade-in 0.7s ease-out forwards;
  }
</style>


  <!-- SECTION ACCUEIL -->
  <section class="text-center py-10 bg-white">
    <h2 class="text-3xl font-bold mb-2">Bienvenue chez Blue Bird</h2>
    <p class="text-lg text-gray-600">Votre confort est notre priorité — Réservez vos billets facilement et voyagez en toute sécurité.</p>
  </section>
<!-- IMAGES DE L'AGENCE ET BUS -->
<section class="p-6 bg-gray-50">
  <div class="swiper mySwiper relative">
    <div class="swiper-wrapper">
      <div class="relative swiper-slide">
        <img src="images/" alt="Bus Bubble" class="w-full rounded-xl shadow">
        <div class="absolute bottom-2 left-2 bg-white p-2 text-blue-900 font-semibold rounded">Voyagez avec élégance</div>
      </div>
      <div class="swiper-slide relative">
        <img src="images/" alt="Bus Bubble" class="w-full rounded-xl shadow">
        <div class="absolute bottom-2 left-2 bg-white p-2 text-blue-900 font-semibold rounded">Confort garanti</div>
      </div>
      <div class="swiper-slide relative">
        <img src="images/image.png" alt="Bus Bubble" class="w-full rounded-xl shadow">
        <div class="absolute bottom-2 left-2 bg-white p-2 text-blue-900 font-semibold rounded">Plaisir de voyager</div>
      </div>
      <div class="swiper-slide relative">
        <img src="uploads/images/bus4.jpg" alt="Bus Bubble" class="w-full rounded-xl shadow">
        <div class="absolute bottom-2 left-2 bg-white p-2 text-blue-900 font-semibold rounded">Sécurité assurée</div>
      </div>
    </div>

    <!-- Pagination & navigation -->
    <div class="swiper-pagination"></div>
    <div class="swiper-button-prev"></div>
    <div class="swiper-button-next"></div>
  </div>
</section>


  <!-- BUS VIP -->
  <section class="p-6">
    <h3 class="text-2xl font-bold text-center mb-4 text-blue-700">Bus VIP</h3>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
      <div class="text-center">
        <img src="uploads/images/vip1.jpg" class="w-full rounded shadow mb-2" alt="VIP 1">
        <p class="text-blue-800 font-semibold">Le luxe à votre portée</p>
      </div>
      <div class="text-center">
        <img src="uploads/images/vip2.jpg" class="w-full rounded shadow mb-2" alt="VIP 2">
        <p class="text-blue-800 font-semibold">Détendez-vous tout le long du trajet</p>
      </div>
      <div class="text-center">
        <img src="uploads/images/vip3.jpg" class="w-full rounded shadow mb-2" alt="VIP 3">
        <p class="text-blue-800 font-semibold">Un confort inégalé pour nos clients exigeants</p>
      </div>
    </div>
  </section>

  <!-- BUS CLASSIQUE -->
  <section class="p-6 bg-gray-100">
    <h3 class="text-2xl font-bold text-center mb-4 text-green-700">Bus Classique</h3>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
      <div class="text-center">
        <img src="uploads/images/classique1.jpg" class="w-full rounded shadow mb-2" alt="Classique 1">
        <p class="text-green-800 font-semibold">Économisez sans compromis sur la sécurité</p>
      </div>
      <div class="text-center">
        <img src="uploads/images/classique2.jpg" class="w-full rounded shadow mb-2" alt="Classique 2">
        <p class="text-green-800 font-semibold">Un voyage simple, rapide et sûr</p>
      </div>
      <div class="text-center">
        <img src="uploads/images/classique3.jpg" class="w-full rounded shadow mb-2" alt="Classique 3">
        <p class="text-green-800 font-semibold">Idéal pour vos trajets quotidiens</p>
      </div>
    </div>
  </section>

  <!-- RESPONSABLE AGENCE -->
  <section class="p-6 flex flex-col md:flex-row items-center bg-white">
    <img src="uploads/images/responsable.jpg" alt="Responsable" class="w-48 h-48 rounded-full shadow mb-4 md:mb-0 md:mr-6">
    <div>
      <h4 class="text-xl font-bold mb-2">Responsable d’Agence</h4>
      <p>« Notre objectif est de vous garantir un service fiable, rapide et professionnel. Nous sommes à votre écoute pour vous offrir le meilleur du transport. »</p>
    </div>
  </section>

  <!-- DG -->
  <section class="p-6 flex flex-col md:flex-row items-center bg-gray-50">
    <img src="uploads/images/dg.jpg" alt="Directeur Général" class="w-48 h-48 rounded-full shadow mb-4 md:mb-0 md:mr-6">
    <div>
      <h4 class="text-xl font-bold mb-2">Directeur Général</h4>
      <p>« Chez Bubble, chaque client est une priorité. Notre mission : rendre vos déplacements plus agréables et sûrs grâce à un service irréprochable. »</p>
    </div>
  </section>

<!-- AVIS CLIENTS -->
<section class="p-6 bg-white">
  <h3 class="text-2xl font-bold text-center mb-6 text-blue-900">Avis des clients</h3>
  <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    <?php
      $stmt = $pdo->query("SELECT * FROM avis ORDER BY date_creation DESC LIMIT 12");
      $delay = 0;
      while ($row = $stmt->fetch()) {
        echo '<div class="bg-gray-100 p-4 rounded-lg shadow text-center transform opacity-0 animate-fade-in" style="animation-delay: '.($delay * 0.1).'s">';
        echo '<img src="' . htmlspecialchars($row['photo']) . '" class="w-16 h-16 rounded-full mx-auto mb-3" alt="photo">';
        echo '<h4 class="font-bold text-blue-800 mb-1">' . htmlspecialchars($row['nom']) . '</h4>';
        echo '<p class="text-gray-700 text-sm">"' . htmlspecialchars($row['commentaire']) . '"</p>';
        echo '</div>';
        $delay++;
      }
    ?>
  </div>
</section> 



  </div>
</section>
  <!-- MAP LOCALISATION -->
  <section class="p-6">
    <h4 class="text-xl font-bold mb-4 text-center">Notre Localisation</h4>
    <div class="flex justify-center">
      <iframe class="w-full md:w-2/3 h-64 border rounded" src="https://maps.google.com/maps?q=Douala,Cameroun&t=&z=13&ie=UTF8&iwloc=&output=embed"></iframe>
    </div>
  </section>
  <script src="js/main.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
</body>
</html>
<?php include 'includes/footer.php'; ?>