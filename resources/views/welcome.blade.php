<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <script src="https://cdn.tailwindcss.com"></script>
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <title>Site Officiel de l'État civil de la Côte d'Ivoire</title>

  <style>
    header {
      position: relative;
      width: 100%;
      height: 600px;
      overflow: hidden;
    }

    /* Styles pour les slides */
    .slide {
      position: absolute;
      inset: 0;
      background-size: cover;
      background-position: center;
      transition: opacity 0.7s ease-in-out;
    }

    /* Texte et bouton au-dessus des slides */
    .header-content {
      position: relative;
      z-index: 20;
      text-align: center;
      color: white;
      padding-top: 200px; /* Décalage du texte et du bouton */
    }

    /* Flèches de navigation */
    .arrow-btn {
      position: absolute;
      top: 50%;
      transform: translateY(-50%);
      background-color: rgba(0, 0, 0, 0.4);
      color: white;
      padding: 10px;
      border-radius: 50%;
      cursor: pointer;
      z-index: 30;
    }

    .arrow-btn:hover {
      background-color: rgba(0, 0, 0, 0.6);
    }

    .left-arrow {
      left: 20px;
    }

    .right-arrow {
      right: 20px;
    }

    /* Filtre noir appliqué uniquement aux images */
    .overlay {
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background-color: rgba(0, 0, 0, 0.6);
      z-index: 10; /* Assurez-vous que le filtre est sous les éléments de texte et les boutons */
    }

    /* Pour s'assurer que la nav est toujours en haut et non affectée par le filtre */
    nav {
      z-index: 40;
    }
  </style>
</head>

<body class="bg-gray-100">
  <!-- Barre de navigation -->
  
  <nav class="fixed top-0 left-0 right-0 bg-orange-400 shadow-lg shadow-black z-40 px-10 py-4 flex items-center justify-between">
    <!-- Titre bien aligné -->
    <div class="text-white font-bold text-2xl">
      Registre Ivoirien 2.0
    </div>
  
    <!-- Menu -->
    <ul class="flex items-center space-x-4 text-white text-sm">
      <li><a href="/" class="px-3 py-2 rounded border border-white/20 hover:bg-green-700 transition">Accueil</a></li>
      <li><a href="#" class="px-3 py-2 rounded border border-white/20 hover:bg-green-700 transition">Nos services</a></li>
      <li><a href="#" class="px-3 py-2 rounded border border-white/20 hover:bg-green-700 transition">À propos</a></li>
      <li><a href="{{ route('login') }}" class="px-3 py-2 rounded border border-white/20 hover:bg-green-700 transition">Connexion</a></li>
      <li><a href="{{ route('citoyen.create') }}" class="px-3 py-2 rounded border border-white/20 hover:bg-green-700 transition text-center w-32 leading-tight">Formulaires</a></li>
      <li><a href="#" class="px-3 py-2 rounded border border-white/20 hover:bg-green-700 transition">Missions</a></li>
      <li><a href="#" class="px-3 py-2 rounded border border-white/20 hover:bg-green-700 transition text-center w-32 leading-tight">Actes disponibles</a></li>
    </ul>
  </nav>
  
  

  <!-- Header avec Diaporama -->
  <header>
    <div id="slider" class="relative w-full h-full">
      <!-- Filtre noir appliqué uniquement sur les images -->
      <div class="overlay"></div>

      <!-- Slides -->
      <div class="slide bg-cover bg-center opacity-100" style="background-image: url('collection-elements-papeterie-drapeau-conception-cote-ivoire_1078-154.avif');"></div>
      <div class="slide bg-cover bg-center opacity-0" style="background-image: url('concept-de-controle-qualite-standard-m.jpg');"></div>
      <div class="slide bg-cover bg-center opacity-0" style="background-image: url('photo-recadree-de-jeune-homme-serieux-assis-dans-le-coworking-de-bureau.jpg');"></div>

      <!-- Texte et bouton -->
      <div class="header-content">
        <h1 class="font-extrabold text-4xl sm:text-5xl">Bienvenue sur Registre Ivoirien 2.0</h1>
        <!-- MODIFICATION ICI : Bouton "Savoir Plus" transformé en lien vers le formulaire -->
        <a href="{{ route('citoyen.create') }}" class="mt-8 px-4 py-2 border border-orange-500 text-orange-500 hover:bg-orange-500 hover:text-white transition duration-200 rounded flex items-center gap-2 mx-auto">
          Faire une Demande
          <i class='bx bx-chevron-right'></i>
        </a>
      </div>
    </div>

    <!-- Flèches de navigation -->
    <button onclick="prevSlide()" class="arrow-btn left-arrow">
      <i class='bx bx-chevron-left'></i>
    </button>
    <button onclick="nextSlide()" class="arrow-btn right-arrow">
      <i class='bx bx-chevron-right'></i>
    </button>
  </header>
  <main>
    <section>
      <div class="container mx-auto py-10 px-4">
        <h2 class="text-3xl font-bold text-center mb-6">Nos Services</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
          <div class="bg-white shadow-lg rounded-lg p-6 text-center">
            <i class='bx bxs-user-check text-4xl text-orange-500'></i>
            <h3 class="text-xl font-semibold mt-4">État Civil</h3>
            <p class="mt-2">Gestion des actes d'état civil.</p>
          </div>
          <div class="bg-white shadow-lg rounded-lg p-6 text-center">
            <i class='bx bxs-file-text text-4xl text-orange-500'></i>
            <h3 class="text-xl font-semibold mt-4">Documents Officiels</h3>
            <p class="mt-2">Émission de documents officiels.</p>
          </div>
          <div class="bg-white shadow-lg rounded-lg p-6 text-center">
            <i class='bx bxs-calendar-check text-4xl text-orange-500'></i>
            <h3 class="text-xl font-semibold mt-4">Rendez-vous</h3>
            <p class="mt-2">Prise de rendez-vous en ligne.</p>
          </div>
        </div>
      </div>
    </section>
    <section>
      <div class="container mx-auto py-10 px-4">
        <h2 class="text-3xl font-bold text-center mb-6">À Propos de Nous</h2>
        <p class="text-center max-w-2xl mx-auto">Nous sommes l'autorité compétente pour la gestion des actes d'état civil en Côte d'Ivoire. Notre mission est de garantir la sécurité et l'intégrité des documents officiels.</p>
      </div>
    </section>
    <section>
      <div class="container mx-auto py-10 px-4">
        <h2 class="text-3xl font-bold text-center mb-6">Contactez-Nous</h2>
        <form class="max-w-lg mx-auto bg-white shadow-lg rounded-lg p-6">
          <div class="mb-4">
            <label for="name" class="block text-gray-700">Nom</label>
            <input type="text" id="name" class="w-full border border-gray-300 rounded-lg p-2" required />
          </div>
          <div class="mb-4">
            <label for="email" class="block text-gray-700">Email</label>
            <input type="email" id="email" class="w-full border border-gray-300 rounded-lg p-2" required />
          </div>
          <div class="mb-4">
            <label for="message" class="block text-gray-700">Message</label>
            <textarea id="message" rows="4" class="w-full border border-gray-300 rounded-lg p-2"></textarea>
          </div>
          <button type="submit" class="px-4 py-2 bg-orange-500 text-white rounded-lg hover:bg-orange-600 transition duration-200">Envoyer</button>
        </form>
      </div>
    </section>
    
  </main>
  <!-- Footer -->
  <footer class="relative text-white pt-16 pb-12">
    <!-- Image de fond avec effet foncé pour contraster le texte -->
    <div class="absolute inset-0">
      <img src="carte-cote-ivoire-carte-ligne-maillage-polygonale-carte-du-drapeau_559531-11210.avif" alt="Décor" class="w-full h-full object-cover opacity-20" />
      <div class="absolute inset-0 bg-[black]/80"></div> <!-- couche vert foncé transparente -->
    </div>
  
    <!-- Contenu du footer -->
    <div class="relative max-w-7xl mx-auto px-6 grid grid-cols-1 md:grid-cols-4 gap-8 z-10">
      <!-- Logo -->
      <div>
        <h2 class="text-2xl font-bold">Registre Ivoirien 2.0</h2>
        <p class="mt-3 text-gray-300">
          Plateforme dédiée à la gestion des actes d'état civil en Côte d'Ivoire. Garantir sécurité et intégrité.
        </p>
      </div>
  
      <!-- Contact -->
      <div>
        <h3 class="text-lg font-semibold">CONTACT</h3>
        <ul class="mt-3 space-y-2 text-gray-300">
          <li>📍 Abidjan, Côte d'Ivoire</li>
          <li>📧 contact@registreivoirien.ci</li>
          <li>📞 +225 07 69 09 95 57</li>
        </ul>
      </div>
  
      <!-- Liens -->
      <div>
        <h3 class="text-lg font-semibold">LIENS UTILES</h3>
        <ul class="mt-3 space-y-2 text-gray-300">
          <li><a href="/" class="hover:text-white">Accueil</a></li>
          <li><a href="#" class="hover:text-white">Nos services</a></li>
          <li><a href="#" class="hover:text-white">À propos</a></li>
          <li><a href="{{ route('login') }}" class="hover:text-white">Connexion</a></li>
          <li><a href="{{ route('citoyen.create') }}" class="hover:text-white">Formulaires</a></li>
          <li><a href="#" class="hover:text-white">Missions</a></li>
          <li><a href="#" class="hover:text-white">Actes disponibles</a></li>
        </ul>
      </div>
  
      <!-- Newsletter -->
      <div>
        <h3 class="text-lg font-semibold">NEWSLETTER</h3>
        <form class="mt-3 flex">
          <input type="email" placeholder="Votre email" class="p-2 rounded-l bg-white text-black outline-none flex-1">
          <button class="bg-green-500 px-4 py-2 rounded-r hover:bg-green-600">📩</button>
        </form>
        <div class="mt-4 flex space-x-3 text-2xl">
          <a href="#" class="hover:text-orange-500">🌍</a>
          <a href="#" class="hover:text-orange-500">📘</a>
          <a href="#" class="hover:text-orange-500">🐦</a>
          <a href="#" class="hover:text-orange-500">📸</a>
        </div>
      </div>
    </div>
  
    <!-- Texte de fin -->
    <div class="relative z-10 mt-8 text-center text-sm text-white">
      <p>© 2025 Registre Ivoirien 2.0. Tous droits réservés.</p>
      <p>Développé par <a href="#" class="text-orange-500 font-semibold">Le groupe Registre Ivoirien 2.0</a></p>
    </div>
  </footer>
  
  

  <!-- JavaScript pour les slides -->
  <script>
    let currentIndex = 0;
    const slides = document.querySelectorAll('.slide');
    
    // Fonction pour afficher la prochaine slide
    function nextSlide() {
      slides[currentIndex].classList.remove('opacity-100');
      slides[currentIndex].classList.add('opacity-0');
      currentIndex = (currentIndex + 1) % slides.length;
      slides[currentIndex].classList.remove('opacity-0');
      slides[currentIndex].classList.add('opacity-100');
    }

    // Fonction pour afficher la slide précédente
    function prevSlide() {
      slides[currentIndex].classList.remove('opacity-100');
      slides[currentIndex].classList.add('opacity-0');
      currentIndex = (currentIndex - 1 + slides.length) % slides.length;
      slides[currentIndex].classList.remove('opacity-0');
      slides[currentIndex].classList.add('opacity-100');
    }

    // Défilement automatique des slides toutes les 5 secondes
    setInterval(nextSlide, 5000);
  </script>
</body>
</html>
