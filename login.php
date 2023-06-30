
<?php
require 'admin/include/connection.php';
?>


<?php

if (isset($_POST['customer']) && $_POST['customer'] == 'login') {

  $email = $_POST['email'];
  $password = $_POST['password'];


  $query = "select * from customers where email='$email' and password = '$password' and status = '1'";
  $login = mysqli_query($connect, $query);
  if ($login === false) {
    echo "Query execution error: " . mysqli_error($connect);
    exit();
  }
  $number = mysqli_num_rows($login);
  if ($number > 0) {
    $customer = mysqli_fetch_array($login);

    $_SESSION['CUSTOMERNAME'] = $customer['full_name'];
    $_SESSION['CUSTOMERID'] = $customer['id'];
    $_SESSION['CUSTOMEREMAIL'] = $customer['email'];

    // print_r($_SESSION);
    // exit;
    header('location:product.php?success');
    exit();
  } else {
    header('location:login.php?error');
    exit();
  }
}
?>

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
        <form action="login.php" method="post">
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
            <input type="hidden" name="customer" value="login">
        </form>
        <p class="mt-4 text-center">Don't have an account? <a href="sign_up.php" class="text-blue-500 hover:text-blue-700">Sign up</a></p>
    </div>
</body>
</html>
