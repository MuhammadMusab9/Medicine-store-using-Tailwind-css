<!DOCTYPE html>
<html lang="en">

<?php
require 'admin/include/connection.php';
?>

<?php
require 'include/head.php';
?>

<!--::::::::::::::::::INSERTION:::::::::::::::::::::::::-->
<?php

if (isset($_POST['product']) && $_POST['product'] == 'cart') {
    $id = $_POST['id'];


    if (isset($_SESSION['CUSTOMERID'])) {
        $customer_id = $_SESSION['CUSTOMERID'];
    } else {
        $customer_id = 1;
    }
    $query = "INSERT INTO carts SET
    customer_id = '$customer_id',
    product_id = '$id'
    ";
    $result = mysqli_query($connect, $query);

    if ($result) { ?>
        <script>
            alert("insert successfully");
        </script>
    <?php
    } else {

    ?>
        <script>
            alert("insert error");
        </script>
    <?php }
} ?>
<!--::::::::::::::::::INSERTION:::::::::::::::::::::::::-->

<body>

    <?php
    require 'include/header.php';
    ?>

    <!--mb-28 gap between main and footer-->
    <main class="max-w-[1320px] mx-auto lg:grid-cols-5 md:grid-cols-2 gap-5 px-3 mb-28 ">

        <div id="medicine">

            <div class="max-w-[1320px] mx-auto my-auto mb-4 mr-4">
                <form action="" method="GET" class="flex justify-center mt-3">
                    <input type="text" name="search" placeholder="Search products" class="px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-green-500">
                    <button type="submit" class="px-4 py-2 ml-2 text-white bg-green-500 rounded-md hover:bg-green-600 focus:outline-none">Search</button>
                </form>
                
            </div>
            <div class="flex space-x-4 mb-8">
                <div class="text-center  px-3 py-3">

                    <?php
                    $sql = "SELECT id, name FROM categories";
                    $result = $connect->query($sql);

                    // Check if there are any categories
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $categoryId = $row['id'];
                            $categoryName = $row['name'];

                            // Display products for each category
                            $productSql = "SELECT * FROM products WHERE category_id = '$categoryId'";

                            // Check if a search query is provided
                            if (isset($_GET['search']) && !empty($_GET['search'])) {
                                $search = $_GET['search'];
                                $productSql .= " AND name LIKE '%$search%'";
                            }

                            $productResult = $connect->query($productSql);

                            // Display category name
                            echo "<h1 class='font-bold text-lg underline bg-green-300 mb-8'>$categoryName</h1>";

                            if ($productResult->num_rows > 0) {
                                echo "<div class='grid grid-cols-5 gap-4'>";

                                // Display products
                                while ($row = mysqli_fetch_assoc($productResult)) {
                                    ?>
                                    <form action="product.php" method="post" class="col-span-1">
                                        <input type="hidden" value="<?php echo $row['id']; ?>" name="id">
                                        <div class="w-60">
                                            <img class="w-32 h-32 cursor-pointer hover:scale-90" src="admin/images/<?php echo $row['product_img']; ?>">
                                            
                                            <!--ADD TO CART ICON-->
                                            <span class="flex items-center">
                                                <?php
                                                if (isset($_SESSION['CUSTOMERID'])) {
                                                ?>
                                                    <button type="submit">
                                                        <i class="fas fa-shopping-cart hover:scale-110 ml-4 text-gray-500"></i>
                                                    </button>

                                                <?php } else { ?>
                                                    <i onclick="return alert('Please log in first.')" class="fas fa-shopping-cart hover:scale-110 ml-4 text-gray-500"></i>
                                                <?php } ?>
                                            </span>

                                            <p class="font-bold text-slate-700 mt-2 text-center"><?php echo $row['name']; ?></p>
                                            <h4 class="text-green-500 font-medium font-serif"><?php echo $row['price']; ?></h4>
                                        </div>
                                        <hr class="w-[70px] ml-20">
                                        <div class=" invisible">
                                            <p class="">This medicine is used to treat eyes that are dry due to tear deficiency.</p>
                                        </div>

                                        <input type="hidden" name="product" value="cart">
                                    </form>
                                    <?php
                                }

                                echo "</div>";
                            } else {
                                echo "<p>No products found.</p>";
                            }
                        }
                    } else {
                        echo 'No categories found.';
                    }
                    ?>

                </div>
            </div>
        </div>

    </main>

    <?php
    require 'include/footer.php';
    ?>
</body>

</html>
