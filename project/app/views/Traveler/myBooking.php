<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Parisian Hotel - Details</title>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>

</head>
<body class=" bg-gray-500 pt-30">
    <!-- Navigation -->

 <nav class="bg-white shadow-md fixed w-full z-50 top-0">
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
                        <a href="/accommodation" class="text-gray-600 hover:text-[#FF385C] px-3 py-2 text-sm font-medium transition-colors">
                            Accommodation
                        </a>
                    </li>
                    <li>
                        <a href="/myBooking" class="text-gray-600 hover:text-[#FF385C] px-3 py-2 text-sm font-medium transition-colors">
                            My Bookings
                        </a>
                    </li>
                    <li>
                        <a href="#profile" class="text-gray-600 hover:text-[#FF385C] px-3 py-2 text-sm font-medium transition-colors">
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

  <div class="mb-100">
   <?php foreach ($data as $booking): 
    $isCompleted = strtotime($booking['checkoutdate']) < time();
    $hasReview = isset($booking['rating']);
  ?>
    <div class="bg-white rounded-xl   mb-6 mx-auto w-[90%]">
        <div class="grid grid-cols-1 md:grid-cols-5 gap-4 ">
            <!-- Property Image -->
            <div class="md:col-span-1 flex justify-center items-center p-4">
                <img src="<?= htmlspecialchars($booking['profilepicture']) ?>" 
                     alt="<?= htmlspecialchars($booking['owner_username']) ?>" 
                     class="w-24 h-24 rounded-full object-cover shadow-md">
            </div>

            <!-- Booking Details -->
            <div class="md:col-span-2 p-6">
                <h3 class="text-xl font-semibold mb-2 text-gray-800">Booking Details</h3>
                <div class="space-y-2 text-gray-600">
                    <p>
                        <span class="font-medium">Check-in:</span> 
                        <?= htmlspecialchars($booking['checkindate']) ?>
                    </p>
                    <p>
                        <span class="font-medium">Check-out:</span> 
                        <?= htmlspecialchars($booking['checkoutdate']) ?>
                    </p>
                    <p>
                        <span class="font-medium">Guests:</span> 
                        <?= htmlspecialchars($booking['numberofguests']) ?>
                    </p>
                    <p>
                        <span class="font-medium">Total Price:</span> 
                        €<?= htmlspecialchars($booking['totalprice']) ?>
                    </p>
                    <p class="flex items-center gap-2">
                        <span class="font-medium">Status:</span>
                        <span class="<?= $isCompleted ? 'text-green-600' : 'text-blue-600' ?>">
                            <?= $isCompleted ? 'Completed' : 'Upcoming' ?>
                        </span>
                    </p>
                </div>
            </div>

            <!-- Review Section -->
            <div class="md:col-span-2 p-6 bg-gray-50">
                <?php if ($isCompleted): ?>
                    <?php if ($hasReview): ?>
                        <!-- Existing Review -->
                        <div class="space-y-2">
                            <div class="text-[#FF385C]">
                                <?php for ($i = 0; $i < $booking['rating']; $i++): ?>
                                    ⭐
                                <?php endfor; ?>
                            </div>
                            <p class="text-gray-600"><?= htmlspecialchars($booking['comment']) ?></p>
                        </div>
                    <?php else: ?>
                        <!-- Review Form -->
                        <form action="submit-review.php" method="POST" class="space-y-4">
                            <input type="hidden" name="booking_id" value="<?= htmlspecialchars($booking['id']) ?>">

                            <div>
                                <label class="block text-sm font-medium mb-1">Rating</label>
                                <select name="rating" 
                                        class="w-full p-2 border rounded-lg focus:ring-2 focus:ring-[#FF385C] focus:outline-none" 
                                        required>
                                    <option value="">Select rating</option>
                                    <option value="5">5 - Excellent</option>
                                    <option value="4">4 - Very Good</option>
                                    <option value="3">3 - Good</option>
                                    <option value="2">2 - Fair</option>
                                    <option value="1">1 - Poor</option>
                                </select>
                            </div>

                            <div>
                                <label class="block text-sm font-medium mb-1">Your Review</label>
                                <textarea name="review" 
                                          rows="3" 
                                          class="w-full p-2 border rounded-lg focus:ring-2 focus:ring-[#FF385C] focus:outline-none"
                                          placeholder="Share your experience..." 
                                          required></textarea>
                            </div>

                            <button type="submit" 
                                    class="w-full py-2 bg-[#FF385C] text-white rounded-lg hover:bg-[#E31C5F] transition-colors">
                                Submit Review
                            </button>
                        </form>
                    <?php endif; ?>
                <?php else: ?>
                    <div class="text-gray-500 text-center">
                        Review available after check-out
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
 <?php endforeach; ?>

 <?php if (empty($data)): ?>
    <div class="text-center py-12 bg-white rounded-xl shadow-sm">
        <p class="text-gray-500">You don't have any bookings yet.</p>
        <a href="/" class="inline-block mt-4 text-[#FF385C] hover:underline">
            Start exploring places to stay
        </a>
    </div>
 <?php endif; ?>

<script>
    const btn = document.querySelector(".mobile-menu-button");
    const menu = document.querySelector(".mobile-menu");

    btn.addEventListener("click", () => {
        menu.classList.toggle("hidden");
    });
 </script>

</body>
</html>