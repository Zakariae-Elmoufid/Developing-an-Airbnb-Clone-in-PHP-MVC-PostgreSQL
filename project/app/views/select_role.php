<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select Role - Airbnb Clone</title>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
</head>
<body class="bg-gray-50">
    <!-- Navbar -->
    <nav class="bg-white shadow-md fixed w-full z-50">
        <div class="container mx-auto px-4 py-4 flex items-center justify-between">
            <!-- Logo -->
            <div class="w-26">
                <img src="../../public/asset/images/logo.png" alt="airbnb">
            </div>
        </div>
    </nav>

    <!-- Role Selection Form -->
    <div class="min-h-screen pt-20 pb-12 flex flex-col bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="max-w-md mx-auto bg-white rounded-xl shadow-md overflow-hidden md:max-w-2xl p-8 mt-8">
                <div class="text-center mb-8">
                    <h2 class="text-3xl font-bold text-gray-900">Select Your Role</h2>
                    <p class="mt-2 text-gray-600">Choose how you want to use Airbnb Clone</p>
                </div>

                <form action="/select-role" method="POST">
                    <div class="space-y-6">
                        <!-- Owner Role -->
                        <div class="relative flex items-center p-4 border rounded-lg hover:border-rose-500 cursor-pointer">
                            <input type="radio" 
                                   name="role_id" 
                                   value="2" 
                                   id="role_2"
                                   class="h-4 w-4 text-rose-500 border-gray-300 focus:ring-rose-500">
                            <label for="role_2" class="ml-3 block text-sm font-medium text-gray-700 cursor-pointer">
                                <span class="text-lg font-semibold block">Owner</span>
                                <span class="text-gray-500">List and manage your properties</span>
                            </label>
                        </div>

                        <!-- Traveler Role -->
                        <div class="relative flex items-center p-4 border rounded-lg hover:border-rose-500 cursor-pointer">
                            <input type="radio" 
                                   name="role_id" 
                                   value="3" 
                                   id="role_3"
                                   checked
                                   class="h-4 w-4 text-rose-500 border-gray-300 focus:ring-rose-500">
                            <label for="role_3" class="ml-3 block text-sm font-medium text-gray-700 cursor-pointer">
                                <span class="text-lg font-semibold block">Traveler</span>
                                <span class="text-gray-500">Browse and book unique accommodations worldwide</span>
                            </label>
                        </div>

                        <div class="mt-8">
                            <button type="submit" 
                                    class="w-full bg-rose-500 text-white px-6 py-3 rounded-lg text-lg font-semibold hover:bg-rose-600 transition duration-300">
                                Continue
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-12">
        <div class="container mx-auto px-4">
            <div class="border-t border-gray-800 mt-8 pt-8 text-center text-gray-400">
                <p>&copy; 2025 Airbnb Clone. Tous droits réservés.</p>
            </div>
        </div>
    </footer>
</body>
</html>