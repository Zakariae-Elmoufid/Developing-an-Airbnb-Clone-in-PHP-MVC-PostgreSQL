  <!-- Sidebar -->
  <div class="w-64 h-screen bg-white border-r border-gray-200 fixed left-0 top-0 shadow-sm">
        <!-- Logo -->
        <div class="px-6 py-4 border-b border-gray-200">
            <div class="text-red-500 text-2xl font-bold">Airbnb Admin</div>
        </div>

        <!-- Navigation Menu -->
        <nav class="px-4 py-4">
            <ul class="space-y-2">
                <!-- Dashboard -->
                <li>
                    <a href="#" class="flex items-center px-4 py-3 text-gray-700 hover:bg-red-50 rounded-lg transition-colors duration-200 group">
                        <i data-lucide="home" class="w-5 h-5 mr-3 text-red-500"></i>
                        <span class="font-medium">Dashboard</span>
                    </a>
                </li>

                <!-- Gestion des catégories -->
                <li>
                    <a href="#" class="flex items-center px-4 py-3 text-gray-700 hover:bg-red-50 rounded-lg transition-colors duration-200 group">
                        <i data-lucide="list" class="w-5 h-5 mr-3 text-red-500"></i>
                        <span class="font-medium">Gestion catégories</span>
                    </a>
                </li>

                <!-- Validation des hébergements -->
                <li>
                    <a href="#" class="flex items-center px-4 py-3 text-gray-700 hover:bg-red-50 rounded-lg transition-colors duration-200 group">
                        <i data-lucide="check-circle" class="w-5 h-5 mr-3 text-red-500"></i>
                        <span class="font-medium">Validate accommodation</span>
                    </a>
                </li>

                <!-- Gestion des conflits -->
                <li>
                    <a href="#" class="flex items-center px-4 py-3 text-gray-700 hover:bg-red-50 rounded-lg transition-colors duration-200 group">
                        <i data-lucide="alert-triangle" class="w-5 h-5 mr-3 text-red-500"></i>
                        <span class="font-medium">Conflict management</span>
                    </a>
                </li>

                <!-- Modération des avis -->
                <li>
                    <a href="#" class="flex items-center px-4 py-3 text-gray-700 hover:bg-red-50 rounded-lg transition-colors duration-200 group">
                        <i data-lucide="message-square" class="w-5 h-5 mr-3 text-red-500"></i>
                        <span class="font-medium">Moderation of reviews</span>
                    </a>
                </li>

                <!-- Statistiques globales -->
                <li>
                    <a href="#" class="flex items-center px-4 py-3 text-gray-700 hover:bg-red-50 rounded-lg transition-colors duration-200 group">
                        <i data-lucide="bar-chart-2" class="w-5 h-5 mr-3 text-red-500"></i>
                        <span class="font-medium">Global statistics</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>

    <!-- Initialize Lucide Icons -->
    <script>
        lucide.createIcons();
    </script>