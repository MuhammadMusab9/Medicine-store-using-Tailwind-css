<?php
require 'admin/include/connection.php';
?>

<?php
require 'include/head.php';
?>

<!--::::::::::::::::::INSERTION:::::::::::::::::::::::::-->
<?php
if (isset($_POST['product']) && $_POST['product'] == 'cart') {
    $cart_id = $_POST['cart_id'];
    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];
    if (isset($_SESSION['CUSTOMERID'])) {
        $customer_id = $_SESSION['CUSTOMERID'];
    } else {
        $customer_id = 1;
    }
    
    // Check if the item already exists in the cart
    $existingQuery = "SELECT * FROM cart_items WHERE customer_id = $customer_id AND product_id = $product_id";
    $existingResult = mysqli_query($connect, $existingQuery);
    $existingCount = mysqli_num_rows($existingResult);
    
    if ($existingCount > 0) {
        ?>
        <script>
            alert("This item is already in your cart");
            window.location.href = 'cart.php';
        </script>
        <?php
        exit;
    }
    
    $query = "INSERT INTO cart_items SET
    cart_id = '$cart_id',
    customer_id = '$customer_id',
    product_id = '$product_id',
    quantity = '$quantity'
    ";
    $result = mysqli_query($connect, $query);

    if ($result) { ?>
        <script>
            alert("insert successfully");
        </script>
    <?php
    } else { ?>
        <script>
            alert("insert error");
        </script>
    <?php
    }
}

if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    $delete = "DELETE FROM carts WHERE product_id = $delete_id";
    $result = mysqli_query($connect, $delete);
    if ($result) { ?>
        <script>
            alert("delete successfully");
            window.location.href = 'cart.php';
        </script>
    <?php } else { ?>
        <script>
            alert("delete error");
        </script>
    <?php
    }
}
?>
<!--::::::::::::::::::INSERTION:::::::::::::::::::::::::-->

<body>

    <?php
    require 'include/header.php';
    ?>

    <!--mb-28 gap between main and footer-->
    <main class="max-w-[1320px] mx-auto lg:grid-cols-5 md:grid-cols-2 gap-5 px-3 mb-28 ">

        <div id="medicine">

            <div class="max-w-[1320px] mx-auto my-auto mb-4">
                <h1 class="text-4xl text-center py-5 "><a href="cart_items.php"><?php echo $_SESSION['CUSTOMERNAME']; ?> CART</a></h1>
                <hr class="w-96 ml-[450px] border-green-200 ">
            </div>
            <div class="flex space-x-4 mb-8">
                <!-- <div class="text-center  px-3 py-3">
                    <h1 class="font-bold text-lg underline  bg-green-300 mb-8">Tablets and Capsule </h1> -->

                    <?php
                    $result = mysqli_query($connect, "SELECT * FROM carts  
                    INNER JOIN customers ON customers.id = carts.customer_id
                    INNER JOIN products ON products.id = carts.product_id
                    WHERE customer_id = {$_SESSION['CUSTOMERID']}
                    ");
                    $count = mysqli_num_rows($result);
                    ?>

                    <div class="grid grid-cols-5 gap-4 ">
                        <?php
                        while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                            <form action="cart.php" method="post" class="col-span-1">
                                <input type="hidden" value="<?php echo $row['id']; ?>" name="cart_id">
                                <input type="hidden" value="<?php echo $row['product_id']; ?>" name="product_id">
                                <div class="w-60">
                                    <img class="w-32 h-32 cursor-pointer hover:scale-90" src="admin/images/<?php echo $row['product_img']; ?>">

                                    <!-- ADD TO CART ICON -->
                                    <span class="flex items-center">
                                        <?php
                                        if (isset($_SESSION['CUSTOMERID'])) {
                                            ?>
                                            <button type="submit">
                                                <i class="fas fa-shopping-cart hover:scale-110 ml-4 text-gray-500">Buy</i>
                                            </button>
                                            <a href="cart.php?delete_id=<?php echo $row['product_id']; ?>">
                                                <i class="fas fa-trash hover:scale-110 ml-4 text-gray-500">Delete</i>
                                            </a>
                                        <?php
                                        } else {
                                            ?>
                                            <i onclick="return alert('please first login')" class="fas fa-shopping-cart hover:scale-110 ml-4 text-gray-500"></i>
                                        <?php
                                        }
                                        ?>
                                    </span>
                                    <input type="number" name="quantity" value="1" min="1" max="10" class="w-16 text-center" required>
                                    <p class="font-bold text-slate-700 mt-2"><?php echo $row['name']; ?></p>
                                    <h4 class="text-green-500 font-medium font-serif"><?php echo $row['price']; ?></h4>
                                </div>
                                <input type="hidden" name="product" value="cart">
                            </form>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
                     <h1 style="text-align: center; font-size: 28px; font-family:verdana; font-weight:700; color:aqua">   <a href="cartitems.php">Order the product</a></h1>
    </main>

    <?php
    require 'include/footer.php';
    ?>
</body>

</html>
