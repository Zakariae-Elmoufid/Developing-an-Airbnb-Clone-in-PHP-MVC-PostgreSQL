<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Airbnb Style Layout</title>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.js"></script>
</head>
<body class="bg-white pt-30">

<nav class="bg-white shadow-md fixed w-full z-50 top-0">
    <div class="container mx-auto px-4 py-3">
        <div class="flex items-center justify-between">
            <!-- Logo -->
            <div class="flex-shrink-0">
                <img src="../../public/asset/images/logo.png" alt="airbnb" class="w-20">
            </div>

            <!-- Navigation Menu - Desktop -->
            <div class="hidden md:block">
                <ul class="flex space-x-8">
                    <li>
                        <a href="/accommodation" class="text-gray-600 hover:text-[#FF385C] px-3 py-2 text-sm font-medium transition-colors">
                            Accommodation
                        </a>
                    </li>
                    <li>
                        <a href="/myBooking" class="text-gray-600 hover:text-[#FF385C] px-3 py-2 text-sm font-medium transition-colors">
                            My Bookings
                        </a>
                    </li>
                    <li>
                        <a href="#profile" class="text-gray-600 hover:text-[#FF385C] px-3 py-2 text-sm font-medium transition-colors">
                            Profile
                        </a>
                    </li>
                </ul>
            </div>

            <!-- User Menu -->
            <div class="flex items-center space-x-4">
                <p class="hidden md:block font-medium text-gray-700">Username</p>
                <div class="relative group">
                    <button class="flex items-center focus:outline-none">
                        <img class="h-8 w-8 rounded-full object-cover border-2 border-[#FF385C]" 
                             src="https://intranet.youcode.ma/storage/users/profile/thumbnail/1130-1727859974.JPG" 
                             alt="User profile">
                    </button>
                    
                    <!-- Dropdown Menu -->
                    <div class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 hidden group-hover:block">
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Your Profile</a>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Settings</a>
                        <a href="#" class="block px-4 py-2 text-sm text-red-600 hover:bg-gray-100">Sign out</a>
                    </div>
                </div>
            </div>

            <!-- Mobile Menu Button -->
            <div class="md:hidden flex items-center">
                <button class="mobile-menu-button p-2 rounded-md hover:bg-gray-100 focus:outline-none">
                    <svg class="h-6 w-6 text-gray-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div class="md:hidden hidden mobile-menu">
            <div class="px-2 pt-2 pb-3 space-y-1">
                <a href="#" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-[#FF385C] hover:bg-gray-50">
                    Accommodation
                </a>
                <a href="#" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-[#FF385C] hover:bg-gray-50">
                    My Bookings
                </a>
                <a href="#" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-[#FF385C] hover:bg-gray-50">
                    Profile
                </a>
            </div>
        </div>
    </div>
 </nav>

    <!-- Navigation des catégories -->
    <div class="border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex space-x-8 overflow-x-auto py-4 no-scrollbar">
                <div class="flex flex-col items-center space-y-2 min-w-fit cursor-pointer">
                    <span class="text-2xl">🏊‍♂️</span>
                    <span class="text-sm text-gray-600">Piscines</span>
                </div>
                <div class="flex flex-col items-center space-y-2 min-w-fit cursor-pointer">
                    <span class="text-2xl">🎫</span>
                    <span class="text-sm text-gray-600">Iconiques</span>
                </div>
                <div class="flex flex-col items-center space-y-2 min-w-fit cursor-pointer">
                    <span class="text-2xl">🖼️</span>
                    <span class="text-sm text-gray-600">Avec vue</span>
                </div>
                <div class="flex flex-col items-center space-y-2 min-w-fit cursor-pointer">
                    <span class="text-2xl">🌊</span>
                    <span class="text-sm text-gray-600">Bord de mer</span>
                </div>
                <div class="flex flex-col items-center space-y-2 min-w-fit cursor-pointer">
                    <span class="text-2xl">🏛️</span>
                    <span class="text-sm text-gray-600">Villes emblématiques</span>
                </div>
                <div class="flex flex-col items-center space-y-2 min-w-fit cursor-pointer">
                    <span class="text-2xl">🎨</span>
                    <span class="text-sm text-gray-600">Art et créativité</span>
                </div>
                <div class="flex flex-col items-center space-y-2 min-w-fit cursor-pointer">
                    <span class="text-2xl">🌾</span>
                    <span class="text-sm text-gray-600">Campagne</span>
                </div>
                <div class="flex flex-col items-center space-y-2 min-w-fit cursor-pointer">
                    <span class="text-2xl">🛏️</span>
                    <span class="text-sm text-gray-600">Chambres</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Grille des logements -->
    <div class="max-w-7xl mx-auto px-4 py-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Logement 1 -->
            <div class="space-y-3">
                <div class="relative aspect-square rounded-xl overflow-hidden">
                    <img src="/api/placeholder/400/300" alt="Logement à San Roque" class="w-full h-full object-cover">
                    <button class="absolute top-3 right-3 p-2 rounded-full bg-white/80 hover:bg-white">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                        </svg>
                    </button>
                </div>
                <div class="space-y-1">
                    <div class="flex justify-between">
                        <h3 class="font-medium">San Roque, Espagne</h3>
                        <span class="flex items-center">⭐ 4,84</span>
                    </div>
                    <p class="text-gray-500">Hôte : James</p>
                    <p class="text-gray-500">13-18 févr.</p>
                    <p class="font-medium">210 € par nuit</p>
                </div>
            </div>

            <!-- Logement 2 -->
            <div class="space-y-3">
                <div class="relative aspect-square rounded-xl overflow-hidden">
                    <img src="/api/placeholder/400/300" alt="Logement à Benalup" class="w-full h-full object-cover">
                    <button class="absolute top-3 right-3 p-2 rounded-full bg-white/80 hover:bg-white">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                        </svg>
                    </button>
                </div>
                <div class="space-y-1">
                    <div class="flex justify-between">
                        <h3 class="font-medium">Benalup-Casas Viejas, Espagne</h3>
                        <span class="flex items-center">⭐ 4,78</span>
                    </div>
                    <p class="text-gray-500">Hôte professionnel</p>
                    <p class="text-gray-500">16-21 févr.</p>
                    <p class="font-medium">361 € par nuit</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Bouton Carte -->
    <div class="fixed bottom-6 left-1/2 transform -translate-x-1/2">
        <button class="bg-black text-white px-6 py-3 rounded-full font-medium flex items-center gap-2">
            Afficher la carte
            <span class="text-lg">🗺️</span>
        </button>
    </div>
</body>
</html>