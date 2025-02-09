<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Airbnb Clone - Find Unique Places to Stay</title>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.4.5/swiper-bundle.min.css">
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.4.5/swiper-bundle.min.js"></script>
</head>
<body class="bg-gray-50">
    <!-- Navbar -->
    <nav class="bg-white shadow-md fixed w-full z-50">
        <div class="container mx-auto px-4 py-4 flex items-center justify-between">
            <!-- Logo -->
             <div class="w-26">
                <img src="../../public/asset/images/logo.png" alt="airbnb">
             </div>
            <!-- Search Bar -->
            <div class="hidden md:flex items-center shadow-sm border rounded-full px-4 py-2 hover:shadow-md transition">
                <input type="text" placeholder="Where are you going?" class="outline-none bg-transparent" />
                <button class="bg-rose-500 text-white rounded-full p-2 ml-4">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </button>
            </div>
            
            <!-- User Menu -->
            <div class="flex items-center space-x-4">
                <a href="#" class="hidden md:block hover:bg-gray-100 px-4 py-2 rounded-full">Become a Host</a>
                <button class="p-2 hover:bg-gray-100 rounded-full">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 10a1 1 0 011-1h4a1 1 0 011 1v4a1 1 0 01-1 1h-4a1 1 0 01-1-1v-4z" />
                    </svg>
                </button>
                <button class="flex items-center space-x-2 border rounded-full p-2 hover:shadow-md transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
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
                        <button class="bg-rose-500 text-white px-8 py-4 rounded-lg text-lg font-semibold hover:bg-rose-600 transition">
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
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold mb-3">Verified Properties</h3>
                <p class="text-gray-600">All our properties are verified for your safety and comfort.</p>
            </div>
            <div class="text-center p-6 bg-white rounded-xl shadow-md hover:shadow-lg transition">
                <div class="w-16 h-16 bg-rose-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-rose-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold mb-3">Instant Booking</h3>
                <p class="text-gray-600">Book in just a few clicks and get instant confirmation.</p>
            </div>
            <div class="text-center p-6 bg-white rounded-xl shadow-md hover:shadow-lg transition">
                <div class="w-16 h-16 bg-rose-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-rose-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold mb-3">24/7 Support</h3>
                <p class="text-gray-600">Our team is available around the clock to help you.</p>
            </div>
        </div>
    </div>

    <!-- Featured Destinations -->
    <div class="container mx-auto px-4 py-16">
        <h2 class="text-2xl font-bold mb-8">Popular Destinations</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="group cursor-pointer">
                <div class="relative aspect-square rounded-xl overflow-hidden">
                    <img src="https://a0.muscache.com/im/pictures/553b58ad-555f-4277-a2da-dacf6ca2eec8.jpg?im_w=720&im_format=avif" alt="Destination" class="w-full h-full object-cover transform group-hover:scale-105 transition duration-300" />
                </div>
                <h3 class="mt-4 text-lg font-semibold">Paris</h3>
                <p class="text-gray-500">From $100/night</p>
            </div>
            <div class="group cursor-pointer">
                <div class="relative aspect-square rounded-xl overflow-hidden">
                    <img src="https://a0.muscache.com/im/pictures/72e992e6-5ba6-4d37-9b5a-408a5817f071.jpg?im_w=720&im_format=avif" alt="Destination" class="w-full h-full object-cover transform group-hover:scale-105 transition duration-300" />
                </div>
                <h3 class="mt-4 text-lg font-semibold">London</h3>
                <p class="text-gray-500">From $120/night</p>
            </div>
            <div class="group cursor-pointer">
                <div class="relative aspect-square rounded-xl overflow-hidden">
                    <img src="https://a0.muscache.com/im/pictures/hosting/Hosting-1200453918336822522/original/639b2314-c5a9-4c72-9ce3-997417a31036.jpeg?im_w=720&im_format=avif" alt="Destination" class="w-full h-full object-cover transform group-hover:scale-105 transition duration-300" />
                </div>
                <h3 class="mt-4 text-lg font-semibold">New York</h3>
                <p class="text-gray-500">From $150/night</p>
            </div>
            <div class="group cursor-pointer">
                <div class="relative aspect-square rounded-xl overflow-hidden">
                    <img src="https://a0.muscache.com/im/pictures/hosting/Hosting-U3RheVN1cHBseUxpc3Rpbmc6MTE1NDkyMjc4ODAwNjQ1MTc4NQ%3D%3D/original/5fc306c0-0354-4604-9619-c36e158af3a7.jpeg?im_w=720&im_format=avif" alt="Destination" class="w-full h-full object-cover transform group-hover:scale-105 transition duration-300" />
                </div>
                <h3 class="mt-4 text-lg font-semibold">Tokyo</h3>
                <p class="text-gray-500">From $90/night</p>
            </div>
        </div>
    </div>


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
            
 
</body>
</html>