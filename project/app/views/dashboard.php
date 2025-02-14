<?php 
require __DIR__. '/../../vendor/autoload.php'; 

use App\controllers\OwnerController;
use App\core\Session;
$category = new OwnerController();

$categories = $category->dashboardCategories();

Session::start();
if ($_SERVER['REQUEST_METHOD']=='POST') {
    Session::post($_POST['category_id']);
Session::post($_POST['title']);
Session::post($_POST['description']);
Session::post($_POST['address']);
Session::post($_POST['price']);
Session::post($_POST['price']);
Session::post($_POST['fileInput']);
Session::post($_POST['guests']);
}



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
                <!-- Navigation Links -->
                <a href="#"
                    class="flex items-center space-x-3 p-3 rounded-lg bg-rose-50 text-rose-500 transition-all hover:bg-rose-100">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    <span>Tableau de bord</span>
                </a>
                <!-- Other links... -->
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
        <div class="bg-white rounded-xl shadow-md p-8 mb-8 hover-scale">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold">Ajouter un hébergement</h2>
                <div class="flex items-center space-x-2">
                    <span class="text-sm text-gray-500">Statut:</span>
                    <span class="px-3 py-1 bg-yellow-100 text-yellow-700 rounded-full text-sm">Non validé</span>
                </div>
            </div>


            <form action="/dashboard/create" method="POST" enctype="multipart/form-data">

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="group">
                        <label for="category_id" class="block text-gray-700 mb-2">Catégorie</label>
                        <select id="category_id" name="category_id" required
                            class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-rose-500 focus:border-rose-500 hover:border-rose-300 transition-all">
                            <?php foreach ($categories as $category): ?>
                            <option value="<?= $category['id'] ?>"><?= $category['title'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="group">
                        <label for="title" class="block text-gray-700 mb-2">Titre</label>
                        <input type="text" id="title" name="title" required
                            class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-rose-500 focus:border-rose-500 hover:border-rose-300 transition-all">
                    </div>
                </div>

                <div class="group">
                    <label for="description" class="block text-gray-700 mb-2">Description</label>
                    <textarea name="description" id="description" rows="4" required
                        class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-rose-500 focus:border-rose-500 hover:border-rose-300 transition-all"></textarea>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="group">
                        <label for="adresse" class="block text-gray-700 mb-2">Adresse</label>
                        <input type="text" id="adresse" name="address" required
                            class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-rose-500 focus:border-rose-500 hover:border-rose-300 transition-all">
                    </div>

                    <div class="group">
                        <label for="price" class="block text-gray-700 mb-2">Prix de base (par nuit)</label>
                        <input type="number" id="price" name="price" required min="0"
                            class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-rose-500 focus:border-rose-500 hover:border-rose-300 transition-all">
                    </div>
                    <div class="group">
                        <label for="guests" class="block text-gray-700 mb-2">Guests</label>
                        <input type="number" id="guests" name="guests" required min="0"
                            class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-rose-500 focus:border-rose-500 hover:border-rose-300 transition-all">
                    </div>
                </div>

                <!-- Images Upload Section -->
                <div class="space-y-4">
                    <label for="image" class="block text-gray-700 mb-2">Images</label>
                    <div class="drop-zone p-8 rounded-lg text-center" id="dropZone">
                        <input type="file" multiple accept="image/*" id="fileInput" name="photos[]" class="hidden">
                        <label for="fileInput" class="cursor-pointer">
                            <div class="flex flex-col items-center">
                                <svg class="w-12 h-12 text-gray-400 mb-4" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 4v16m8-8H4"></path>
                                </svg>
                                <span class="text-gray-600">Glissez vos images ici ou cliquez pour sélectionner</span>
                            </div>
                        </label>
                    </div>
                    <div id="imagePreview" class="grid grid-cols-2 md:grid-cols-4 gap-4 mt-4"></div>
                </div>

                <!-- Action Buttons -->
                <div class="flex flex-wrap gap-4 mt-6">
                    <button type="submit"
                        class="px-6 py-3 bg-rose-500 text-white rounded-lg hover:bg-rose-600 transition-all">
                        Ajouter l'hébergement
                    </button>
                    <button type="button"
                        class="px-6 py-3 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition-all">
                        Modifier
                    </button>
                    <button type="button"
                        class="px-6 py-3 bg-red-500 text-white rounded-lg hover:bg-red-600 transition-all">
                        Supprimer
                    </button>
                </div>
            </form>

        </div>

        <!-- Property List -->
        <div class="bg-white rounded-xl shadow-md p-8">
            <h2 class="text-2xl font-bold mb-6">Mes hébergements</h2>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Titre</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Catégorie</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Prix</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Statut</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <!-- [Table rows will be populated dynamically] -->
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</body>
<script>
document.getElementById('fileInput').addEventListener('change', function(e) {
    var imagePreview = document.getElementById('imagePreview');


    for (var i = 0; i < e.target.files.length; i++) {
        var file = e.target.files[i];

        var div = document.createElement('div');
        // div.textContent = file.name;
        div.innerHTML = file.name + "<br>";
        imagePreview.appendChild(div);
    }
});
</script>

</html>