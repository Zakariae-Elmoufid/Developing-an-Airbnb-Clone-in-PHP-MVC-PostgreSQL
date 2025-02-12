<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/svg+xml" href="../../public/asset/images/favicon-removebg-preview.png">
    <title>Airbnb | catégories</title>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.4.5/swiper-bundle.min.css">
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.4.5/swiper-bundle.min.js"></script>
</head>
<body class="bg-gray-50">
    <?php include 'sidebar.php'?>
  
    <!-- Main Content -->
    <div class="ml-64 p-8">
    <div  id="addNewCategoriesModal" class="hidden fixed inset-0 bg-black bg-opacity-50 backdrop-blur-sm overflow-y-auto h-full w-full z-50" class="relative z-10" aria-labelledby="modal-title"  aria-modal="true">
  <div class="fixed inset-0 bg-gray-500/75 transition-opacity" aria-hidden="true"></div>

  <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
    <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
      <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
        <div class="flex justify-between items-center p-6 border-b">
                    <h5 class="text-2xl font-semibold text-gray-800">Add New Categories</h5>

                    <button class="text-gray-400 hover:text-gray-600 transition-colors" onclick="fermModal(modalAddCategories,formAdd)">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
                <div class="p-6">
                    <form id="addCategoriesForm" class="space-y-6" novalidate>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Titel</label>
                            <input type="text" name="title" class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all" placeholder="example" required>
                            <div class="text-red-500 text-sm mt-1 hidden">Titel is required!</div>
                        </div>
                        <button id="addCategoriesBtn" type="submit" class="inline-flex w-full justify-center rounded-md bg-blue-500 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-red-500 sm:ml-3 sm:w-auto">
                            Add categories
                        </button>
                    </form>
                </div>
        </div>
      </div>
    </div>
  </div>
</div>

   

    <!-- Main Content -->
    <div class="container mx-auto px-4 py-8">
        <div class="bg-white rounded-2xl shadow-sm p-6 mb-8">
            <div class="flex justify-between items-center mb-8">
                <div>
                    <h4 class="text-2xl font-bold text-gray-800">Categories</h4>
                    <p class="text-gray-500 mt-1">Manage your categories database</p>
                </div>
                <button class="bg-blue-500 text-white px-6 py-3 rounded-xl hover:bg-blue-600 transform hover:scale-[1.02] transition-all duration-200 flex items-center gap-2" 
                onclick="ouverModal(modalAddCategories)">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                    </svg>
                    Add New categories
                </button>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-50 rounded-xl">
                        <tr>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600">ID</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600">titel</th>
                            <th class="px-6 py-4 text-right text-sm font-semibold text-gray-600">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        <tr>
                            <td class="px-6 py-4 text-gray-600">12</td>
                            <td class="px-6 py-4 text-gray-600">john@example.com</td>
                            <td class="px-6 py-4">
                                <div class="flex items-center justify-end gap-2">
                                    <button class="text-gray-400 hover:text-blue-500 transition-colors">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                                        </svg>
                                    </button>
                                    <button class="text-gray-400 hover:text-red-500 transition-colors">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<script src="../../../public/asset/js/main.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
</body>
</html>

