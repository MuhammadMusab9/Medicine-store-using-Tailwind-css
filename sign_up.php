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
    <title>Sign Up Page</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.7/dist/tailwind.min.css" rel="stylesheet">
</head>

<?php
if (isset($_POST['submit'])){
    $name = $_POST["fullname"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    
    $phone = $_POST["phone"];
    $address = $_POST["address"];

   

    $emailquerry = "select * from customers where email = '$email'";
    $query = mysqli_query($connect,$emailquerry);
    
    $customercount = mysqli_num_rows($query);
 
    if($customercount > 0)
    {
     
     ?>
     <script>alert("customer alredy exist");</script>
     <?php
     
    }
    else
    {
        
        $sql = "INSERT INTO customers (full_name, email,password, phone,address) 
        VALUES ('$name', '$email','$password' , '$phone','$address')";
        $insertquerry = mysqli_query($connect,$sql);
         if($insertquerry)
         {
             ?>
 
             <script>
                 alert("insert successfully");
             </script>
             <?php
            header("location:login.php");
         }else{
             ?>
              <script>
                 alert("insert unsuccessfully");
             </script>
             <?php
         }
    }
     
 
 }
     
    ?>


<!-- Customer inseret ended -->
<body class="bg-gradient-to-r from-green-400 to-blue-500 flex items-center justify-center h-screen">
    <div class="bg-white p-8 rounded shadow-md w-1/3 hover:border-yellow-500 hover:border-2">
        <h2 class="text-2xl mb-4 text-center">Sign Up</h2>
        <hr class="w-24 ml-36 -mt-2 ">
        <form action="#" method="post">
            <div class="mb-4">
                <label for="full_name" class="block text-gray-700 font-bold mb-2">Full Name</label>
                <input type="text" id="full_name" name="fullname" class="w-full p-2 border border-gray-300 rounded">
            </div>
            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-bold mb-2">Email</label>
                <input type="email" id="email" name="email" class="w-full p-2 border border-gray-300 rounded">
            </div>
            <div class="mb-4">
                <label for="password" class="block text-gray-700 font-bold mb-2">Password</label>
                <input type="password" id="password" name="password" class="w-full p-2 border border-gray-300 rounded">
            </div>
            <div class="mb-4">
                <label for="phone" class="block text-gray-700 font-bold mb-2">Phone</label>
                <input type="tel" id="phone" name="phone" class="w-full p-2 border border-gray-300 rounded">
            </div>
            <div class="mb-4">
                <label for="address" class="block text-gray-700 font-bold mb-2">Address</label>
                <textarea id="address" name="address" rows="3" class="w-full p-2 border border-gray-300 rounded"></textarea>
            </div>
            <button type="submit" name="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-full">Sign Up</button>
        </form>
        <p class="mt-4 text-center">Already have an account? <a href="login.php" class="text-blue-500 hover:text-blue-700">Login</a></p>
    </div>
</body>
</html>
