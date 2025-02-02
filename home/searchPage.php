<?php
include '../includes/header.php';


session_start();

$user_id = $_SESSION['user_id'];

if (!isset($user_id)) {
    header('location:login.php');
};

if (isset($_POST['add_to_cart'])) {

    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_image = $_POST['product_image'];
    $product_quantity = $_POST['product_quantity'];

    $check_cart_numbers = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');

    if (mysqli_num_rows($check_cart_numbers) > 0) {
        $message[] = 'already added to cart!';
    } else {
        mysqli_query($conn, "INSERT INTO `cart`(user_id, name, price, quantity, image) VALUES('$user_id', '$product_name', '$product_price', '$product_quantity', '$product_image')") or die('query failed');
        $message[] = 'product added to cart!';
    }
};

?>


<!-- Search Heading -->
<div class="heading text-center my-5">
    <h3>Search Page</h3>
    <p> <a href="index.php">Home</a> / Search </p>
</div>

<!-- Search Form Section -->
<section class="search-form my-5">
    <div class="container">
        <form action="" method="post" class="d-flex justify-content-center">
            <input type="text" name="search" placeholder="Search products..." class="form-control w-50">
            <button type="submit" name="submit" class="btn btn-primary ms-2">Search</button>
        </form>
    </div>
</section>

<!-- Products Section -->
<section class="products py-5">
    <div class="container">
        <div class="row row-cols-1 row-cols-md-3 row-cols-lg-4 g-4">
            <?php
            if (isset($_POST['submit'])) {
                $search_item = $_POST['search'];
                $select_products = mysqli_query($conn, "SELECT * FROM `products` WHERE name LIKE '%{$search_item}%'") or die('query failed');
                if (mysqli_num_rows($select_products) > 0) {
                    while ($fetch_product = mysqli_fetch_assoc($select_products)) {
            ?>
                        <div class="col">
                            <form action="" method="post" class="card">
                                <img src="../uploaded_img/<?php echo $fetch_product['image']; ?>" alt="<?php echo $fetch_product['name']; ?>" class="card-img-top">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $fetch_product['name']; ?></h5>
                                    <p class="card-text">$<?php echo $fetch_product['price']; ?>/-</p>
                                    <input type="number" class="form-control" name="product_quantity" min="1" value="1">
                                    <input type="hidden" name="product_name" value="<?php echo $fetch_product['name']; ?>">
                                    <input type="hidden" name="product_price" value="<?php echo $fetch_product['price']; ?>">
                                    <input type="hidden" name="product_image" value="<?php echo $fetch_product['image']; ?>">
                                    <button type="submit" class="btn btn-primary w-100 mt-3" name="add_to_cart">Add to Cart</button>
                                </div>
                            </form>
                        </div>
            <?php
                    }
                } else {
                    echo '<p class="empty text-center w-100">No results found!</p>';
                }
            } else {
                echo '<p class="empty text-center w-100">Please search for a product!</p>';
            }
            ?>
        </div>
    </div>
</section>

<?php include '../includes/footer.php'; ?>