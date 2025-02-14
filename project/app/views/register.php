<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Airbnb Clone</title>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

</head>
<body class="bg-gray-50">
    <!-- Navbar (same as home page) -->
  

    <div class="min-h-screen pt-20 pb-6 flex flex-col justify-center py-12 sm:px-6 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-md">
            <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                Create your account
            </h2>
        </div>

        <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
            <div class="bg-white py-8 px-4 shadow sm:rounded-lg sm:px-10">
                <?php if (isset($_SESSION['error'])): ?>
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
                        <?php echo $_SESSION['error']; unset($_SESSION['error']); ?>
                    </div>
                <?php endif; ?>

                <form class="space-y-6" action="/register" method="POST">
                    <div>
                        <label for="username" class="block text-sm font-medium text-gray-700">
                            Username
                        </label>
                        <div class="mt-1">
                            <input id="username" name="username" type="text" required 
                                class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-rose-500 focus:border-rose-500 sm:text-sm">
                        </div>
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">
                            Email address
                        </label>
                        <div class="mt-1">
                            <input id="email" name="email" type="email" required 
                                class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-rose-500 focus:border-rose-500 sm:text-sm">
                        </div>
                    </div>

                    <div>
                        <label for="phone" class="block text-sm font-medium text-gray-700">
                            Phone Number
                        </label>
                        <div class="mt-1">
                            <input id="phone" name="phone" type="tel" required 
                                class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-rose-500 focus:border-rose-500 sm:text-sm">
                        </div>
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700">
                            Password
                        </label>
                        <div class="mt-1">
                            <input id="password" name="password" type="password" required 
                                class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-rose-500 focus:border-rose-500 sm:text-sm">
                        </div>
                    </div>

                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700">
                            Confirm Password
                        </label>
                        <div class="mt-1">
                            <input id="password_confirmation" name="password_confirmation" type="password" required 
                                class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-rose-500 focus:border-rose-500 sm:text-sm">
                        </div>
                    </div>

                    <div>
                        <button type="submit" 
                            class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-rose-600 hover:bg-rose-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-rose-500">
                            Create Account
                        </button>
                    </div>
                </form>

                <div class="mt-6">
                    <div class="relative">
                        <div class="absolute inset-0 flex items-center">
                            <div class="w-full border-t border-gray-300"></div>
                        </div>
                        <div class="relative flex justify-center text-sm">
                            <span class="px-2 bg-white text-gray-500">
                                Or sign up with
                            </span>
                        </div>
                    </div>

                    <!-- Social Media Icons -->
                    <div class="mt-6 flex justify-center space-x-6">
                        <a href="/google-login?mode=register" class="text-gray-400 hover:text-gray-500 transition-colors">
                            <span class="sr-only">Sign up with Google</span>
                            <i class="fab fa-google text-[#4285F4] text-3xl hover:scale-110 transition-transform"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-gray-500 transition-colors">
                            <span class="sr-only">Sign up with Facebook</span>
                            <i class="fab fa-facebook text-[#1877F2] text-3xl hover:scale-110 transition-transform"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-gray-500 transition-colors">
                            <span class="sr-only">Sign up with LinkedIn</span>
                            <i class="fab fa-linkedin text-[#0A66C2] text-3xl hover:scale-110 transition-transform"></i>
                        </a>
                    </div>
                </div>

                <p class="mt-6 text-center text-sm text-gray-600">
                    Already have an account?
                    <a href="/login" class="font-medium text-rose-600 hover:text-rose-500">
                        Sign in instead
                    </a>
                </p>
            </div>
        </div>
    </div>
</body>
</html>