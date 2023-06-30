<?php 
require 'admin/include/connection.php';

if(isset($_POST['order']) && $_POST['order'] == 'insert'){
    $customerId = $_SESSION['CUSTOMERID'];
    foreach($_POST as $key => $value) {
        if (strpos($key, 'cart_id_') !== false) {
            $cartId = $_POST[$key];
            $query = "INSERT INTO orders SET
            cart_item_id = '$cartId',
            customer_id = '$customerId'
            ";
            $result = mysqli_query($connect, $query);
            if ($result) { 
                header('location:cartitems.php?msg=success');
            } else { 
                header('location:cartitems.php?msg=error');
            }
        }
    }
}
?>