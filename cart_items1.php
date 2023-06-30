<?php
require 'admin/include/connection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <table border="1px solid black" cellspacing="5px" cellpadding="4px">
    <?php 
        $result = mysqli_query($connect, "SELECT * FROM cart_items  
        INNER JOIN products ON products.id = cart_items.product_id
        INNER JOIN customers ON customers.id = cart_items.customer_id
        WHERE customer_id = {$_SESSION['CUSTOMERID']}
        "); 
        $count = mysqli_num_rows($result);
    ?>
        <form action="cart_items.php" method="post" enctype="multipart/form-data">
        <thead>
            <tr>
            <th>Product</th>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Full Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Product Total</th>
            </tr>
        </thead>
        <tbody>
        <?php 
        $totalAmount = 0; // Initialize the variable before the loop

        while ($row = mysqli_fetch_assoc($result)) {
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
                <td><img style="width:50px;height:50px;" class="cursor-pointer hover:scale-90" src="admin/images/<?php echo $row['product_img']; ?>"></td>
                <td><?php echo $proname; ?></td>
                <td><?php echo $description; ?></td>
                <td><?php echo $price; ?></td>
                <td><?php echo $quantity; ?></td>
                <td><?php echo $custname; ?></td>
                <td><?php echo $email; ?></td>
                <td><?php echo $phone; ?></td>
                <td><?php echo $cusaddress; ?></td>
                <td><?php echo $total; ?></td>
            </tr>
        <?php } ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="9">Total amount of all the medicines</td>
                <td><span><?php echo $totalAmount; ?></span></td>
            </tr>
        </tfoot>
        </form>
    </table>
    
</body>

</html>
