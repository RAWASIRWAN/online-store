<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> E-commerce </title>
    
    <!-- Styles and Icons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">

    <!-- Inline CSS -->
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background-color: #081b29;
            color: #FEC103;
        }

        .navbar, footer {
            background-color: #00abf0;
        }

        .navbar-brand, .nav-link {
            color: white;
            font-size: 1.2rem;
        }

        .home {
            background: url('your-background-image.jpg') no-repeat center center/cover;
            height: 100vh;
            display: flex;
            align-items: center;
            text-align: center;
        }

        .home h1 {
            font-size: 2.5rem;
        }

        .btn-box a {
            margin: 10px;
            font-size: 1.1rem;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            color: #fff;
        }

        .section-title {
            color: #00abf0;
            border-bottom: 2px solid #00abf0;
            margin-bottom: 20px;
        }

        .card img {
            max-height: 200px;
            object-fit: cover;
        }

        footer {
            padding: 15px 0;
            text-align: center;
            font-size: 1rem;
        }
    </style>
</head>

<body>
     <!-- connectoin db -->
<?php

include('../includes/header.php');
?>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg p-3">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">ShopNow</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarContent">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#home">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#shop">Shop</a></li>
                    
                </ul>
            
                <ul class="navbar-nav ms-lg-3">
                    <li class="nav-item"><a class="nav-link" href="./home/login.php"><i class="fas fa-user"></i> Account</a></li>
                    <li class="nav-item"><a class="nav-link" href="./home/login.php"><i class="fas fa-shopping-cart"></i> Cart</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Home Section -->
    <section class="home" id="home">
        <div class="container">
            <h1>Welcome to Our Store</h1>
            <p>Explore our latest collections and find what you love!</p>
        </div>
    </section>

    <!-- Products Section -->
     
    <section class="products py-5" id="shop">
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
                            <img src="uploaded_img/<?php echo $fetch_products['image']; ?>" class="card-img-top" alt="Product Image">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $fetch_products['name']; ?></h5>
                                <p class="card-text">$<?php echo $fetch_products['price']; ?></p>
                                <form action="home/login.php" method="post">
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
         
        </div>
    </div>
</section>
    <!-- Footer -->
    <footer>
        <p>Created by Rawa Sirwan and  Zhwan Fayaq </p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
