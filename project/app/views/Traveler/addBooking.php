<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Parisian Hotel - Details</title>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
</head>
<body class="min-h-screen bg-gray-50">
    <!-- Navigation -->
    <nav class="bg-white shadow-sm py-4">
        <div class="max-w-7xl mx-auto px-4 flex justify-between items-center">
            <h1 class="text-2xl font-bold text-[#FF385C]">The Parisian Hotel</h1>
            <div class="flex gap-4">
                <button class="px-4 py-2 text-gray-600 hover:bg-gray-100 rounded-full">Sign in</button>
                <button class="px-4 py-2 bg-[#FF385C] text-white rounded-full hover:bg-[#E31C5F]">Book now</button>
            </div>
        </div>
    </nav>

    <!-- Photo gallery -->
    <div class="max-w-7xl mx-auto p-4">
        <div class="grid grid-cols-4 gap-4 h-[500px]">
            <div class="col-span-2 row-span-2">
                <img src="https://a0.muscache.com/im/pictures/553b58ad-555f-4277-a2da-dacf6ca2eec8.jpg?im_w=720&im_format=avif" alt="Main view" class="w-full h-120 object-cover rounded-lg">
            </div>
            <div>
                <img src="https://a0.muscache.com/im/pictures/72e992e6-5ba6-4d37-9b5a-408a5817f071.jpg?im_w=720&im_format=avif" alt="Bedroom" class="w-full h-60 object-cover rounded-lg">
            </div>
            <div>
                <img src="https://a0.muscache.com/im/pictures/hosting/Hosting-1200453918336822522/original/639b2314-c5a9-4c72-9ce3-997417a31036.jpeg?im_w=720&im_format=avif" alt="Bathroom" class="w-full h-60 object-cover rounded-lg">
            </div>
            <div>
                <img src="https://a0.muscache.com/im/pictures/hosting/Hosting-1200453918336822522/original/639b2314-c5a9-4c72-9ce3-997417a31036.jpeg?im_w=720&im_format=avif" alt="Restaurant" class="w-full h-60 object-cover rounded-lg">
            </div>
            <div>
                <img src="https://a0.muscache.com/im/pictures/hosting/Hosting-U3RheVN1cHBseUxpc3Rpbmc6MTE1NDkyMjc4ODAwNjQ1MTc4NQ%3D%3D/original/5fc306c0-0354-4604-9619-c36e158af3a7.jpeg?im_w=720&im_format=avif" alt="Location view" class="w-full h-full object-cover transform group-hover:scale-105 transition duration-300">
            </div>
        </div>
    </div>

    <!-- Main content -->
    <div class="max-w-7xl mx-auto px-4 py-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Main information -->
            <div class="lg:col-span-2">
                <div class="bg-white rounded-xl p-6 shadow-sm">
                    <div class="flex items-center gap-2 mb-4">
                        <span class="text-[#FF385C]">⭐</span>
                        <span class="font-semibold">4.8</span>
                        <span class="text-gray-500">(324 reviews)</span>
                        <span class="text-gray-500 ml-4">📍 8th District, Paris</span>
                    </div>

                    <!-- Description -->
                    <div class="mb-6">
                        <h2 class="text-xl font-semibold mb-4">About this place</h2>
                        <p class="text-gray-600">
                            Experience Parisian luxury in our 4-star hotel located in the heart of the 8th district. 
                            Just steps away from the Champs-Élysées, our establishment offers an unforgettable stay 
                            in an elegant and refined atmosphere.
                        </p>
                    </div>

                    <!-- Reviews -->
                    <div>
                        <h2 class="text-xl font-semibold mb-4">Recent reviews</h2>
                        <div class="space-y-4">
                            <div class="border-b pb-4">
                                <div class="flex items-center gap-4 mb-2">
                                    <img src="/api/placeholder/40/40" alt="Profile" class="w-12 h-12 rounded-full">
                                    <div>
                                        <p class="font-semibold">Mary L.</p>
                                        <div class="text-[#FF385C]">⭐⭐⭐⭐⭐</div>
                                    </div>
                                </div>
                                <p class="text-gray-600">
                                    "Excellent stay! Perfect location and very attentive staff."
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Booking module -->
            <div class="lg:col-span-1">
                <div class="bg-white rounded-xl p-6 shadow-sm sticky top-4">
                    <div class="flex justify-between items-center mb-6">
                        <div>
                            <span class="text-2xl font-bold">€189</span>
                            <span class="text-gray-500"> / night</span>
                        </div>
                        <div class="flex items-center">
                            <span class="text-[#FF385C]">⭐</span>
                            <span class="ml-1 font-semibold">4.8</span>
                        </div>
                    </div>

                    <form class="space-y-4">
                        <div class="grid grid-cols-2 gap-4">
                            <input type="text" id="datePicker" class="w-full bg-white border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-[#FF385C] focus:outline-none" />
                        </div>

                        <div>
                            <label class="block text-sm font-medium mb-1">Guests</label>
                            <select class="w-full p-2 border rounded-lg focus:ring-2 focus:ring-[#FF385C] focus:outline-none">
                                <option>1 guest</option>
                                <option>2 guests</option>
                                <option>3 guests</option>
                                <option>4 guests</option>
                            </select>
                        </div>

                        <button class="w-full py-3 bg-[#FF385C] text-white rounded-lg hover:bg-[#E31C5F]">
                            Book now
                        </button>

                        <p class="text-center text-sm text-gray-500">
                            Free cancellation up to 48 hours before check-in
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="../../../public/asset/script/Booking.js"></script>
</body>
</html>