<?php

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
   exit();
}

if(isset($_POST['add_to_cart'])){

   $product_name = mysqli_real_escape_string($conn, $_POST['product_name']);
   $product_price = floatval($_POST['product_price']);
   $product_image = $_POST['product_image'];
   $product_quantity = intval($_POST['product_quantity']);

   $check_cart_numbers = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');

   if(mysqli_num_rows($check_cart_numbers) > 0){
      $message[] = '⚠️ This item is already in your cart!';
   }else{
      mysqli_query($conn, "INSERT INTO `cart`(user_id, name, price, quantity, image) VALUES('$user_id', '$product_name', '$product_price', '$product_quantity', '$product_image')") or die('query failed');
      $message[] = '✅ Spare part added to cart!';
   }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>SpareHub LK - Home</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'header.php'; ?>

<section class="home">

   <div class="content">
      <h3>Quality Auto Spare Parts Delivered to You</h3>
      <p>SpareHub LK is your trusted source for genuine and affordable spare parts across Sri Lanka. 
         Browse our latest collection and get them delivered to your doorstep hassle-free.</p>
      <a href="about.php" class="white-btn">Discover More</a>
   </div>

</section>

<section class="products">

   <h1 class="title">Latest Spare Parts</h1>

   <div class="box-container">

      <?php  
         $select_products = mysqli_query($conn, "SELECT * FROM `products` ORDER BY id DESC LIMIT 6") or die('query failed');
         if(mysqli_num_rows($select_products) > 0){
            while($fetch_products = mysqli_fetch_assoc($select_products)){
      ?>
     <form action="" method="post" class="box">
      <img class="image" src="uploaded_img/<?php echo htmlspecialchars($fetch_products['image']); ?>" alt="">
      <div class="name"><?php echo htmlspecialchars($fetch_products['name']); ?></div>
      <div class="price">Rs.<?php echo number_format($fetch_products['price'], 2); ?></div>
      <input type="number" min="1" name="product_quantity" value="1" class="qty">
      <input type="hidden" name="product_name" value="<?php echo htmlspecialchars($fetch_products['name']); ?>">
      <input type="hidden" name="product_price" value="<?php echo $fetch_products['price']; ?>">
      <input type="hidden" name="product_image" value="<?php echo htmlspecialchars($fetch_products['image']); ?>">
      <input type="submit" value="Add to Cart" name="add_to_cart" class="btn">
     </form>
      <?php
         }
      }else{
         echo '<p class="empty">No spare parts added yet!</p>';
      }
      ?>
   </div>

   <div class="load-more" style="margin-top: 2rem; text-align:center">
      <a href="shop.php" class="option-btn">View More Parts</a>
   </div>

</section>

<section class="about">

   <div class="flex">

      <div class="image">
         <img src="images/interface1.png" alt="About SpareHub">
      </div>

      <div class="content">
         <h3>About SpareHub LK</h3>
         <p>We are committed to providing high-quality spare parts that ensure safety, durability, and performance. 
            Our goal is to connect Sri Lankan vehicle owners with reliable and affordable parts while making shopping simple and secure.</p>
         <a href="about.php" class="btn">Read More</a>
      </div>

   </div>

</section>

<section class="home-contact">

   <div class="content">
      <h3>Need Assistance?</h3>
      <p>Have questions about our spare parts or need help with an order? Our support team is here to help you anytime.</p>
      <a href="contact.php" class="white-btn">Contact Us</a>
   </div>

</section>

<?php include 'footer.php'; ?>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>
