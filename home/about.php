<?php

include('../includes/header.php');

session_start();

$user_id = $_SESSION['user_id'];

if (!isset($user_id)) {
    header('location:login.php');
}

?>



<?php include '../includes/nav.php'; ?>

<!-- Heading Section -->
<div class="heading text-center py-5">
    <h3>About Us</h3>
    <p> <a href="index.php">Home</a> / About </p>
</div>

<!-- About Section -->
<section class="about py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <img src="" alt="About Us Image" class="img-fluid">
            </div>
            <div class="col-md-6">
                <h3>Why Choose Us?</h3>
                <p>We have all mobile and beauty services available.  </p>
                <a href="contact.php" class="btn btn-primary">Contact Us</a>
            </div>
        </div>
    </div>
</section>

<!-- Client Reviews Section -->
<section class="reviews bg-light py-5">
    <div class="container text-center">
        <h1 class="title">Client's Reviews</h1>
        <div class="row">
            <?php
            $reviews = [
                ['pic-1.png', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt ad, quo labore fugiat nam accusamus quia.'],
                ['pic-2.png', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt ad, quo labore fugiat nam accusamus quia.'],
                ['pic-3.png', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt ad, quo labore fugiat nam accusamus quia.'],
                ['pic-4.png', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt ad, quo labore fugiat nam accusamus quia.'],
                ['pic-5.png', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt ad, quo labore fugiat nam accusamus quia.'],
                ['pic-6.png', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt ad, quo labore fugiat nam accusamus quia.']
            ];

            foreach ($reviews as $review) {
                echo '<div class="col-md-4 mb-4">
                     <div class="review-box">
                        <img src="images/' . $review[0] . '" alt="Review" class="img-fluid mb-3">
                        <p>' . $review[1] . '</p>
                        <div class="stars">';
                for ($i = 0; $i < 5; $i++) {
                    echo '<i class="fas fa-star"></i>';
                }
                echo '</div>
                     <h3>John Deo</h3>
                  </div>
               </div>';
            }
            ?>
        </div>
    </div>
</section>

<!-- Authors Section -->
<section class="authors py-5">
    <div class="container text-center">
        <h1 class="title">Great Authors</h1>
        <div class="row">
            <?php
            $authors = [
                ['author-1.jpg', 'John Deo'],
                ['author-2.jpg', 'John Deo'],
                ['author-3.jpg', 'John Deo'],
                ['author-4.jpg', 'John Deo'],
                ['author-5.jpg', 'John Deo'],
                ['author-6.jpg', 'John Deo']
            ];

            foreach ($authors as $author) {
                echo '<div class="col-md-4 mb-4">
                     <div class="author-box">
                        <img src="images/' . $author[0] . '" alt="Author" class="img-fluid mb-3">
                        <div class="social-share">
                           <a href="#" class="fab fa-facebook-f"></a>
                           <a href="#" class="fab fa-twitter"></a>
                           <a href="#" class="fab fa-instagram"></a>
                           <a href="#" class="fab fa-linkedin"></a>
                        </div>
                        <h3>' . $author[1] . '</h3>
                     </div>
                  </div>';
            }
            ?>
        </div>
    </div>
</section>

<?php include '../includes/footer.php'; ?>