<?php
// var_dump($data);

?>

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
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>

</head>
<body class=" bg-gray-50">
    <!-- Navigation -->

<nav class="bg-white shadow-md fixed w-full z-50">
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
                        <a href="#" class="text-gray-600 hover:text-[#FF385C] px-3 py-2 text-sm font-medium transition-colors">
                            Accommodation
                        </a>
                    </li>
                    <li>
                        <a href="/myBooking" class="text-gray-600 hover:text-[#FF385C] px-3 py-2 text-sm font-medium transition-colors">
                            My Bookings
                        </a>
                    </li>
                    <li>
                        <a href="#" class="text-gray-600 hover:text-[#FF385C] px-3 py-2 text-sm font-medium transition-colors">
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
<div class=" mx-auto p-4 ">
    <div class="grid grid-cols-4 gap-4 ">
        <?php
        $photos = trim($photos, '{}');
        $photose = explode(',', $photos);

            foreach ($photose as $index => $photo) {
                if ($index === 0) {
                    echo "<div class='col-span-2 row-span-2 '>";
                    echo "<img src='" . htmlspecialchars($photo) . "' alt='Photo' class='w-full h-100  rounded-lg'>";
                    echo "</div>";
                }
                elseif ($index < 5) {
                    echo "<div class='col-span-1 row-span-1  '>";
                    echo "<img src='" . htmlspecialchars($photo) . "' alt='Photo' class= ' w-full h-50  rounded-lg'>";
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
                    <span class="text-gray-500 ml-4">📍<?= $address ?></span>
                </div>

                <div class="mb-6">
                    <h2 class="text-xl font-semibold mb-4">Owner Information</h2>
                    <div class="flex items-center gap-4">
                        <!-- Image of the owner -->
                        <img src="<?= htmlspecialchars($profilepicture)?>" alt="Owner Profile" class="w-12 h-12 rounded-full">
                        <p class="font-semibold"><?= htmlspecialchars($username) ?></p>
                    </div>
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
                <div class="font-bold text-center " id="message"></div>
                <div class="flex justify-between items-center mb-6">
                    <div>
                        <p class="text-2xl font-bold" >€<span id="price"><?php echo htmlspecialchars($baseprice); ?></span></p>
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
                                onchange="Booking()"
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