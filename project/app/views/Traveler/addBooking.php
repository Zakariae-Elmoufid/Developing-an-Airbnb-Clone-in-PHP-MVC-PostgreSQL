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
            <h1 class="text-2xl font-bold text-[#FF385C]"> <?= $title?></h1>
            <div class="flex gap-4">
                <button class="px-4 py-2 text-gray-600 hover:bg-gray-100 rounded-full">Sign in</button>
                <button class="px-4 py-2 bg-[#FF385C] text-white rounded-full hover:bg-[#E31C5F]">Book now</button>
            </div>
        </div>
    </nav>

<div class=" mx-auto p-4 ">
    <div class="grid grid-cols-4 gap-4 ">
        <?php
        $photos = trim($photos, '{}');
        $photose = explode(',', $photos);

            foreach ($photose as $index => $photo) {
                if ($index === 0) {
                    echo "<div class='col-span-2 row-span-2 '>";
                    echo "<img src='" . htmlspecialchars($photo) . "' alt='Photo' class='w-full h-full  rounded-lg'>";
                    echo "</div>";
                }
                elseif ($index < 5) {
                    echo "<div class='col-span-1 row-span-1  '>";
                    echo "<img src='" . htmlspecialchars($photo) . "' alt='Photo' class= ' w-full h-full  rounded-lg'>";
                    echo "</div>";
                }
            }
        
        ?>
    </div>
</div>

<!-- Main content -->
<div class=" mx-auto px-4 py-8">
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
                    <?php echo htmlspecialchars($description); ?>
                    </p>
                </div>

                <!-- Reviews -->
                <div>
                    <h2 class="text-xl font-semibold mb-4">Recent reviews</h2>
                    <div class="space-y-4">
                        <div class="border-b pb-4">
                            <div class="flex items-center gap-4 mb-2">
                                <img src="" alt="Profile" class="w-12 h-12 rounded-full">
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
            <div class="bg-white rounded-xl p-6 shadow-sm  ">
                <div class="flex justify-between items-center mb-6">
                    <div>
                        <span class="text-2xl font-bold" >€<p id="price"><?php echo htmlspecialchars($baseprice); ?></p></span>
                        <span class="text-gray-500"> / night</span>
                    </div>
                    <div class="flex items-center">
                        <span class="text-[#FF385C]">⭐</span>
                        <span class="ml-1 font-semibold">4.8</span>
                    </div>
                </div>


                <form class="space-y-4" >
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label  class="block text-sm font-medium mb-1">date start</label>
                            <input type="text" 
                                   id="datePicker" 
                                   data="check_in" 
                                   placeholder="check_in"
                                   class="w-full p-2 border rounded-lg focus:ring-2 focus:ring-[#FF385C] focus:outline-none"
                                   >
                        </div>
                        <div>
                            <label  class="block text-sm font-medium mb-1">date end</label>
                            <input type="date" 
                                   id="datePicker" 
                                   data="check_out" 
                                   placeholder="check_out"
                                   class="w-full p-2 border rounded-lg focus:ring-2 focus:ring-[#FF385C] focus:outline-none"
                                   >
                        </div>
                    </div>

                    <div>
                        <label for="guests" class="block text-sm font-medium mb-1">Guests</label>
                        <select id="guests" 
                                data="guests"
                                
                                class="w-full p-2 border rounded-lg focus:ring-2 focus:ring-[#FF385C] focus:outline-none">

                            <?php for($i=1 ; $i <= $maxguests ; $i++){?>
                                <option value="<?= $i ?>"><?=$i?>Ttaveler</option>
                           <?php }?>    
                          
                        </select>
                    </div>

                    <div>
                    <p class="text-2xl font-bold" >Total:<span id="total"><?php echo htmlspecialchars($baseprice); ?></span> €</p>
                    </div>

                    <button  id="submit" onclick="addBooking()" type="button"
                            class="w-full py-3 bg-[#FF385C] text-white rounded-lg hover:bg-[#E31C5F] transition-colors">
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