<?php
use App\config\Database;
use App\models\OwnerModel;
Database::getConnection();
$ownerModel = new OwnerModel();
$accommodations = $ownerModel->getValidatedAccommodations();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Airbnb Clone - Find Unique Places to Stay</title>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.4.5/swiper-bundle.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.4.5/swiper-bundle.min.css">
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.4.5/swiper-bundle.min.js"></script>

    <style>
    /* Style personnalisé pour les contrôles Swiper */
    .swiper-button-next,
    .swiper-button-prev {
        color: white !important;
        background: rgba(0, 0, 0, 0.3);
        width: 30px !important;
        height: 30px !important;
        border-radius: 50%;
    }

    .swiper-button-next:after,
    .swiper-button-prev:after {
        font-size: 14px !important;
    }

    .swiper-pagination-bullet {
        background: white !important;
        opacity: 0.7;
    }

    .swiper-pagination-bullet-active {
        opacity: 1;
    }

    /* Assurer que le conteneur Swiper prend toute la hauteur disponible */
    .accommodation-swiper {
        height: 100% !important;
    }

    .accommodation-swiper .swiper-slide {
        height: 100% !important;
    }

    .accommodation-swiper .swiper-slide img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    </style>
</head>

<body class="bg-gray-50">
    <!-- Navbar -->
    <nav class="bg-white shadow-md fixed w-full z-50">
        <div class="container mx-auto px-4 py-4 flex items-center justify-between">
            <!-- Logo -->
            <!-- <div class="text-rose-500 text-2xl font-bold">airbnb</div> -->
            <div class="w-26">
                <img src="../../public/asset/images/logo.png" alt="airbnb">
            </div>
            <!-- Search Bar -->
            <div class="hidden md:flex items-center shadow-sm border rounded-full px-4 py-2 hover:shadow-md transition">
                <input type="text" placeholder="Where are you going?" class="outline-none bg-transparent" />
                <button class="bg-rose-500 text-white rounded-full p-2 ml-4">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </button>
            </div>

            <!-- User Menu -->
            <div class="flex items-center space-x-4">
                <a href="#" class="hidden md:block hover:bg-gray-100 px-4 py-2 rounded-full">Become a Host</a>
                <button class="p-2 hover:bg-gray-100 rounded-full">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 10a1 1 0 011-1h4a1 1 0 011 1v4a1 1 0 01-1 1h-4a1 1 0 01-1-1v-4z" />
                    </svg>
                </button>
                <button class="flex items-center space-x-2 border rounded-full p-2 hover:shadow-md transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                </button>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="pt-20">
        <div class="relative h-[500px]">
            <img src="../../public/asset/images/home1.jpg" alt="Hero Image" class="w-full h-full object-cover" />
            <div class="absolute inset-0 bg-gradient-to-r from-black/50 to-transparent">
                <div class="container mx-auto px-4 h-full flex items-center">
                    <div class="text-white max-w-xl">
                        <h1 class="text-5xl font-bold mb-4">Find Unique Places to Stay</h1>
                        <p class="text-xl mb-8">Discover authentic accommodations worldwide</p>
                        <button
                            class="bg-rose-500 text-white px-8 py-4 rounded-lg text-lg font-semibold hover:bg-rose-600 transition">
                            Explore
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Why Choose Us Section -->
    <div class="container mx-auto px-4 py-16">
        <h2 class="text-2xl font-bold mb-12 text-center">Why Choose Us</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="text-center p-6 bg-white rounded-xl shadow-md hover:shadow-lg transition">
                <div class="w-16 h-16 bg-rose-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-rose-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold mb-3">Verified Properties</h3>
                <p class="text-gray-600">All our properties are verified for your safety and comfort.</p>
            </div>
            <div class="text-center p-6 bg-white rounded-xl shadow-md hover:shadow-lg transition">
                <div class="w-16 h-16 bg-rose-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-rose-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold mb-3">Instant Booking</h3>
                <p class="text-gray-600">Book in just a few clicks and get instant confirmation.</p>
            </div>
            <div class="text-center p-6 bg-white rounded-xl shadow-md hover:shadow-lg transition">
                <div class="w-16 h-16 bg-rose-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-rose-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold mb-3">24/7 Support</h3>
                <p class="text-gray-600">Our team is available around the clock to help you.</p>
            </div>
        </div>
    </div>


    <!-- Même conteneur que la section "Why Choose Us" -->
    <div class="container mx-auto px-8 sm:px-12 lg:px-16 py-16">
        <h2 class="text-2xl font-bold mb-8">Cartes des hébergements</h2>

        <!-- Grille des hébergements -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            <?php if(isset($accommodations) && !empty($accommodations)): ?>
            <?php foreach($accommodations as $accommodation): ?>
            <!-- Carte individuelle -->
            <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition-all duration-300 overflow-hidden">
                <!-- Section image -->
                <div class="relative aspect-[4/3]">
                    <?php 
                    $photos = [];
                    if (!empty($accommodation['photos'])) {
                        $photos = is_array($accommodation['photos']) ? $accommodation['photos'] : json_decode($accommodation['photos'], true);
                    }
                    ?>

                    <?php if(!empty($photos)): ?>
                    <div class="swiper-container accommodation-swiper">
                        <div class="swiper-wrapper">
                            <?php foreach($photos as $photo): ?>
                            <div class="swiper-slide">
                                <img src="/public/uploads/<?= htmlspecialchars(trim($photo)) ?>"
                                    alt="<?= htmlspecialchars($accommodation['title']) ?>"
                                    class="w-full h-full object-cover">
                            </div>
                            <?php endforeach; ?>
                        </div>
                        <!-- Pagination -->
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-pagination"></div>
                    </div>
                    <?php else: ?>
                    <div class="w-full h-full bg-gray-100 flex items-center justify-center">
                        <span class="text-gray-400 text-sm">Aucune image</span>
                    </div>
                    <?php endif; ?>
                </div>

                <!-- Contenu de la carte -->
                <div class="p-4">
                    <!-- En-tête -->
                    <div class="flex justify-between items-start mb-3">
                        <div>
                            <h3 class="font-medium text-gray-900 mb-1 line-clamp-1">
                                <?= htmlspecialchars($accommodation['title']) ?>
                            </h3>
                            <p class="text-sm text-rose-500">
                                <?= htmlspecialchars($accommodation['category_name']) ?>
                            </p>
                        </div>
                        <div class="text-right">
                            <p class="font-semibold text-gray-900">
                                <?= number_format((float)($accommodation['baseprice'] ?? 0), 2) ?> €
                            </p>
                            <p class="text-xs text-gray-500">par nuit</p>
                        </div>
                    </div>

                    <!-- Informations -->
                    <div class="space-y-2 mb-4">
                        <div class="flex items-center gap-2 text-gray-600">
                            <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <span class="text-sm truncate">
                                <?= htmlspecialchars($accommodation['address']) ?>
                            </span>
                        </div>
                        <div class="flex items-center gap-2 text-gray-600">
                            <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg>
                            <span class="text-sm">
                                <?= $accommodation['maxguests'] ?> voyageurs max
                            </span>
                        </div>
                    </div>

                    <!-- Actions -->
                    <div class="flex gap-2">
                        <a href="/makeBooking?id=<?= $accommodation['id'] ?>"
                            class="flex-1 bg-rose-500 hover:bg-rose-600 text-white text-center py-2 rounded-lg text-sm font-medium transition-colors">
                            Réserver
                        </a>
                        <button class="p-2 border border-gray-200 rounded-lg hover:bg-gray-50 transition-colors">
                            <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
            <?php else: ?>
            <div class="col-span-full text-center py-8">
                <p class="text-gray-500">Aucun hébergement disponible pour le moment.</p>
            </div>
            <?php endif; ?>
        </div>
    </div>

    <!-- Script pour initialiser Swiper -->



    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-12">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <h3 class="font-semibold mb-4">À propos</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="hover:underline">Comment ça marche</a></li>
                        <li><a href="#" class="hover:underline">Investisseurs</a></li>
                        <li><a href="#" class="hover:underline">Carrières</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="font-semibold mb-4">Communauté</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="hover:underline">Diversité et inclusion</a></li>
                        <li><a href="#" class="hover:underline">Accessibilité</a></li>
                        <li><a href="#" class="hover:underline">Partenaires</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="font-semibold mb-4">Hôte</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="hover:underline">Devenir hôte</a></li>
                        <li><a href="#" class="hover:underline">Protection des hôtes</a></li>
                        <li><a href="#" class="hover:underline">Ressources</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="font-semibold mb-4">Assistance</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="hover:underline">Centre d'aide</a></li>
                        <li><a href="#" class="hover:underline">Confiance et sécurité</a></li>
                        <li><a href="#" class="hover:underline">Nous contacter</a></li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-gray-800 mt-8 pt-8 text-center text-gray-400">
                <p>&copy; 2025 Airbnb Clone. Tous droits réservés.</p>
            </div>
        </div>
    </footer>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
       
        const swipers = document.querySelectorAll('.accommodation-swiper');
        swipers.forEach(swiperElement => {
            new Swiper(swiperElement, {
                loop: true, 
                slidesPerView: 1, 
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },

                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                grabCursor: true, 
                effect: 'slide', 
                speed: 500, 
                observer: true,
                observeParents: true,
                lazy: {
                    loadPrevNext: true,
                },
            });
        });
    });
    </script>
</body>

</html>