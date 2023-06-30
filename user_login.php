<?php require 'include/connection.php'; ?>
<?php ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.7/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gradient-to-r from-green-400 to-blue-500  flex items-center justify-center h-screen">
    <div class="bg-white p-8 rounded shadow-md w-1/3">
        <h2 class="text-2xl mb-4 text-center">Login</h2>
        <hr class="w-24 ml-36 -mt-2 ">
        <form>
            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-bold mb-2">Email</label>
                <input type="email" id="email" name="email" class="w-full p-2 border border-gray-300 rounded">
            </div>
            <div class="mb-4">
                <label for="password" class="block text-gray-700 font-bold mb-2">Password</label>
                <input type="password" id="password" name="password" class="w-full p-2 border border-gray-300 rounded">
            </div>
            <div class="flex items-center justify-between mb-4">
                <label for="remember" class="flex items-center">
                    <input type="checkbox" id="remember" name="remember" class="mr-2">
                    <span class="text-sm">Remember me</span>
                </label>
                <a href="#" class="text-sm text-blue-500 hover:text-blue-700">Forgot password?</a>
            </div>
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-full">Login</button>
        </form>
        <p class="mt-4 text-center">Don't have an account? <a href="signup.html" class="text-blue-500 hover:text-blue-700">Sign up</a></p>
    </div>
</body>
</html>
