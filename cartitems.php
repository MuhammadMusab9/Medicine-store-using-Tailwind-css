<?php
require 'admin/include/connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="input.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <title>cartchatgpt</title>
</head>
<body>
   

    <?php 
    $result = mysqli_query($connect, "SELECT *,cart_items.id FROM cart_items  
    INNER JOIN products ON products.id = cart_items.product_id
    INNER JOIN customers ON customers.id = cart_items.customer_id
    WHERE customer_id = {$_SESSION['CUSTOMERID']}
    "); 
    $count = mysqli_num_rows($result);
?>
<div class="container mx-auto">
    <?php if(isset($_GET['msg']) && $_GET['msg'] == 'success'){ ?>
      <h1 class="text-2xl font-medium text-center my-4 bg-gradient-to-r from-green-400 to-blue-500 rounded flex justify-between">Your Order Placed Successfully</h1>
    <?php }else{ ?>
      <h1 class="text-2xl font-medium text-center my-4 bg-gradient-to-r from-green-400 to-blue-500 rounded flex justify-between"><?php echo $_SESSION['CUSTOMERNAME']; ?>   Shopping Cart</h1>
    <?php } ?>
    <form action="cart_items.php" method="post" enctype="multipart/form-data">
    <table class="w-full border text-center">
      <thead>
        <tr>
            <th class="py-2 px-4 border-b">#</th>
            <th class="py-2 px-4 border-b">Product</th>
            <th class="py-2 px-4 border-b">Name</th>
            <th class="py-2 px-4 border-b">Description</th>
            <th class="py-2 px-4 border-b">Price</th>
            <th class="py-2 px-4 border-b">Quantity</th>
            <th class="py-2 px-4 border-b">Full Name</th>
            <th class="py-2 px-4 border-b">Email</th>
            <th class="py-2 px-4 border-b">Phone</th>
            <th class="py-2 px-4 border-b">Address</th>
            <th class="py-2 px-4 border-b">quantity price</th>
        
        </tr>
      </thead>
      <tbody>
        <?php 
        $totalAmount = 0; // Initialize the variable before the loop

        while ($row = mysqli_fetch_assoc($result)) {
          $id = $row['id'];
            $image = $row['product_img'];
            $proname = $row['name'];
            $description = $row['description'];
            $price = $row['price'];
            $phone = $row['phone'];
            $quantity = $row['quantity'];
            $custname = $row['full_name'];
            $email = $row['email'];
            $cusaddress = $row['address']; 
            $total = $price * $quantity;
            $totalAmount += $total; // Accumulate the total amount
            ?>
        <tr>
          <td class="py-2 px-4 border-b"><?php echo $id; ?></td>
        <td><img style="width:50px;height:50px;" class="cursor-pointer hover:scale-90" src="admin/images/<?php echo $row['product_img']; ?>"></td>
                <td class="py-2 px-4 border-b"><?php echo $proname; ?></td>
                <td class="py-2 px-4 border-b"><?php echo $description; ?></td>
                <td class="py-2 px-4 border-b"><?php echo $price; ?></td>
                <td class="py-2 px-4 border-b"><?php echo $quantity; ?></td>
                <td class="py-2 px-4 border-b"><?php echo $custname; ?></td>
                <td class="py-2 px-4 border-b"><?php echo $email; ?></td>
                <td class="py-2 px-4 border-b"><?php echo $phone; ?></td>
                <td class="py-2 px-4 border-b"><?php echo $cusaddress; ?></td>
                <td class="py-2 px-4 border-b"><?php echo $total; ?></td>
        </tr>
        <input type="hidden" name="cart_id_<?php echo $id; ?>" value="<?php echo $id; ?>">
        <input type="hidden" name="order" value="insert">
        <?php } ?>
      </tbody>
    </table>
  
    <div class="my-4">
      <p class="text-lg"><h3>Total Amount of all product:</h3><span style="text-align: center; font-size: 20px; font-family:cursive; font-weight:500; color:black" ><?php echo "$totalAmount" ?></span></p>
      
    </div>

  
    <div class="my-4">
      <button class="py-2 px-4 bg-blue-500 text-white rounded-md hover:bg-blue-700">Order</button>
    </div>
  </div>
</form>
        </body>
        </html>






        <?php
require 'admin/include/connection.php';
?>

