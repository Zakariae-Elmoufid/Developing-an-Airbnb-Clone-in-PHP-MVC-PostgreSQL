<?php 
require __DIR__. '/../../vendor/autoload.php'; 

// var_dump(__DIR__);
// exit;

use App\controllers\OwnerController;
$category = new OwnerController();

$categories = $category->dashboardCategories();
// var_dump($categories);
// exit;
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Propriétaire - Airbnb Clone</title>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
    @keyframes slideIn {
        from {
            transform: translateX(-100%);
        }

        to {
            transform: translateX(0);
        }
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
        }

        to {
            opacity: 1;
        }
    }

    .animate-slide-in {
        animation: slideIn 0.5s ease-out;
    }

    .animate-fade-in {
        animation: fadeIn 0.5s ease-out;
    }

    .hover-scale {
        transition: transform 0.2s;
    }

    .hover-scale:hover {
        transform: scale(1.02);
    }
    </style>
</head>

<body class="bg-gray-50 flex">
    <!-- Sidebar -->
    <aside class="w-64 h-screen bg-white shadow-xl fixed left-0 animate-slide-in">
        <div class="p-6">
            <div class="mb-8">
                <img src="../../public/asset/images/logo.png" alt="airbnb" class="w-24">
            </div>

            <nav class="space-y-2">
                <a href="#"
                    class="flex items-center space-x-3 p-3 rounded-lg bg-rose-50 text-rose-500 transition-all hover:bg-rose-100">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    <span>Tableau de bord</span>
                </a>

                <a href="#"
                    class="flex items-center space-x-3 p-3 rounded-lg text-gray-600 transition-all hover:bg-gray-100">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    <span>Réservations</span>
                </a>

                <a href="#"
                    class="flex items-center space-x-3 p-3 rounded-lg text-gray-600 transition-all hover:bg-gray-100">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                    </svg>
                    <span>Propriétés</span>
                </a>

                <a href="#"
                    class="flex items-center space-x-3 p-3 rounded-lg text-gray-600 transition-all hover:bg-gray-100">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span>Revenus</span>
                </a>

                <a href="#"
                    class="flex items-center space-x-3 p-3 rounded-lg text-gray-600 transition-all hover:bg-gray-100">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    <span>Paramètres</span>
                </a>
            </nav>
        </div>

        <div class="absolute bottom-0 w-full p-6 border-t">
            <div class="flex items-center space-x-3">
                <img src="https://api.dicebear.com/7.x/avataaars/svg?seed=Felix" alt="Profile"
                    class="w-10 h-10 rounded-full">
                <div>
                    <p class="text-sm font-medium">John Doe</p>
                    <p class="text-xs text-gray-500">Propriétaire</p>
                </div>
            </div>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="ml-64 flex-1 p-8 animate-fade-in">
        <!-- Statistics Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div class="bg-white rounded-xl shadow-md p-6 hover-scale transition-all duration-300 cursor-pointer">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-gray-500 text-sm mb-2">Revenus totaux</h3>
                        <p class="text-3xl font-bold text-gray-800">€4,520</p>
                        <div class="text-green-500 text-sm mt-2">+12% ce mois</div>
                    </div>
                    <div class="w-12 h-12 bg-rose-100 rounded-full flex items-center justify-center">
                        <svg class="w-6 h-6 text-rose-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-md p-6 hover-scale transition-all duration-300 cursor-pointer">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-gray-500 text-sm mb-2">Taux d'occupation</h3>
                        <p class="text-3xl font-bold text-gray-800">78%</p>
                        <div class="text-green-500 text-sm mt-2">+5% ce mois</div>
                    </div>
                    <div class="w-12 h-12 bg-rose-100 rounded-full flex items-center justify-center">
                        <svg class="w-6 h-6 text-rose-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-md p-6 hover-scale transition-all duration-300 cursor-pointer">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-gray-500 text-sm mb-2">Réservations</h3>
                        <p class="text-3xl font-bold text-gray-800">24</p>
                        <div class="text-green-500 text-sm mt-2">+3 ce mois</div>
                    </div>
                    <div class="w-12 h-12 bg-rose-100 rounded-full flex items-center justify-center">
                        <svg class="w-6 h-6 text-rose-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Add Property Form -->
        <div class="bg-white rounded-xl shadow-md p-8 mb-8 hover-scale transition-all duration-300">
            <h2 class="text-2xl font-bold mb-6">Ajouter un hébergement</h2>
            <form class="space-y-6">
                <!-- Category Selection -->
                <div class="group">
                    <label class="block text-gray-700 mb-2">Catégorie</label>
                    <select
                        class="w-full p-3 border rounded-lg transition-all duration-300 focus:ring-2 focus:ring-rose-500 focus:border-rose-500 group-hover:border-rose-300">
                        <?php foreach ($categories as $category): ?>
                        <option value="<?= $category['id'] ?>"><?= $category['title'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <!-- Title & Description -->
                <div class="group">
                    <label class="block text-gray-700 mb-2">Titre</label>
                    <input type="text"
                        class="w-full p-3 border rounded-lg transition-all duration-300 focus:ring-2 focus:ring-rose-500 focus:border-rose-500 group-hover:border-rose-300">
                </div>

                <div class="group">
                    <label class="block text-gray-700 mb-2">Description</label>
                    <textarea rows="4"
                        class="w-full p-3 border rounded-lg transition-all duration-300 focus:ring-2 focus:ring-rose-500 focus:border-rose-500 group-hover:border-rose-300"></textarea>
                </div>

                <!-- Address -->
                <div class="group">
                    <label class="block text-gray-700 mb-2">Adresse</label>
                    <input type="text"
                        class="w-full p-3 border rounded-lg transition-all duration-300 focus:ring-2 focus:ring-rose-500 focus:border-rose-500 group-hover:border-rose-300">
                </div>

                <!-- Price & Guests -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="group">
                        <label class="block text-gray-700 mb-2">Prix de base (par nuit)</label>
                        <input type="number"
                            class="w-full p-3 border rounded-lg transition-all duration-300 focus:ring-2 focus:ring-rose-500 focus:border-rose-500 group-hover:border-rose-300">
                    </div>
                    <div class="group">
                        <label class="block text-gray-700 mb-2">Prix de base (par nuit)</label>
                        <input type="number"
                            class="w-full p-3 border rounded-lg transition-all duration-300 focus:ring-2 focus:ring-rose-500 focus:border-rose-500 group-hover:border-rose-300">
                    </div>
                </div>