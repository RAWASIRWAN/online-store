<?php
include('../includes/header.php');
session_start();

$user_id = $_SESSION['user_id'];

if (!isset($user_id)) {
    header('location:login.php');
}

if (isset($_POST['add_to_cart'])) {
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_image = $_POST['product_image'];
    $product_quantity = $_POST['product_quantity'];

    $check_cart_numbers = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');

    if (mysqli_num_rows($check_cart_numbers) > 0) {
        $message[] = 'Already added to cart!';
    } else {
        mysqli_query($conn, "INSERT INTO `cart`(user_id, name, price, quantity, image) VALUES('$user_id', '$product_name', '$product_price', '$product_quantity', '$product_image')") or die('query failed');
        $message[] = 'Product added to cart!';
    }
}

if (isset($message)) {
    foreach ($message as $msg) {
        echo '
      <div class="alert alert-warning alert-dismissible fade show" role="alert">
         ' . $msg . '
         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }
}
include('../includes/nav.php');
?>

<section class="text-center py-5 bg-light">
    <div class="container">
        <h1 class="display-4">Hand-Picked Books to Your Door</h1>
        <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi, quod? Reiciendis ut porro iste totam.</p>
        <a href="about.php" class="btn btn-primary">Discover More</a>
    </div>
</section>

<section class="products py-5">
    <div class="container">
        <h1 class="text-center mb-5">Latest Products</h1>
        <div class="row g-4">
            <?php
            $select_products = mysqli_query($conn, "SELECT * FROM `products` LIMIT 6") or die('query failed');
            if (mysqli_num_rows($select_products) > 0) {
                while ($fetch_products = mysqli_fetch_assoc($select_products)) {
            ?>
                    <div class="col-md-4">
                        <div class="card h-100 text-center">
                            <img src="../uploaded_img/<?php echo $fetch_products['image']; ?>" class="card-img-top" alt="Product Image">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $fetch_products['name']; ?></h5>
                                <p class="card-text">$<?php echo $fetch_products['price']; ?></p>
                                <form action="" method="post">
                                    <input type="number" min="1" name="product_quantity" value="1" class="form-control mb-2">
                                    <input type="hidden" name="product_name" value="<?php echo $fetch_products['name']; ?>">
                                    <input type="hidden" name="product_price" value="<?php echo $fetch_products['price']; ?>">
                                    <input type="hidden" name="product_image" value="<?php echo $fetch_products['image']; ?>">
                                    <button type="submit" name="add_to_cart" class="btn btn-outline-primary btn-block">Add to Cart</button>
                                </form>
                            </div>
                        </div>
                    </div>
            <?php
                }
            } else {
                echo '<p class="text-center">No products added yet!</p>';
            }
            ?>
        </div>
        <div class="text-center mt-4">
            <a href="shop.php" class="btn btn-outline-secondary">Load More</a>
        </div>
    </div>
</section>

<section class="about py-5 bg-light">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <img src="images/about-img.jpg" class="img-fluid rounded" alt="About Us">
            </div>
            <div class="col-md-6">
                <h3>About Us</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit quos enim minima ipsa dicta officia corporis ratione saepe sed adipisci?</p>
                <a href="about.php" class="btn btn-primary">Read More</a>
            </div>
        </div>
    </div>
</section>

<section class="contact-section py-5 text-center">
    <div class="container">
        <h3>Have Any Questions?</h3>
        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Atque cumque exercitationem repellendus, amet ullam voluptatibus?</p>
        <a href="contact.php" class="btn btn-primary">Contact Us</a>
    </div>
</section>

<?php include('../includes/footer.php'); ?>