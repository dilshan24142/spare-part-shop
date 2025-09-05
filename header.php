<?php
// Show popup messages if available
if(isset($message) && is_array($message)){
   foreach($message as $msg){
      echo '
      <div class="message">
         <span>'.htmlspecialchars($msg).'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?>

<header class="header">

   <div class="header-1">
      <div class="flex">
         <div class="share">
            <a href="#" class="fab fa-facebook-f"></a>
            <a href="#" class="fab fa-twitter"></a>
            <a href="#" class="fab fa-instagram"></a>
            <a href="#" class="fab fa-linkedin"></a>
         </div>
         <p>
            <?php if(!isset($_SESSION['user_id'])): ?>
               New? <a href="login.php">Login</a> | <a href="register.php">Register</a>
            <?php else: ?>
               Welcome, <strong><?php echo htmlspecialchars($_SESSION['user_name']); ?></strong>
            <?php endif; ?>
         </p>
      </div>
   </div>

   <div class="header-2">
      <div class="flex">
         <!-- Logo -->
         <a href="home.php" class="logo">SpareHub LK</a>

         <!-- Navbar -->
         <nav class="navbar">
            <a href="home.php">Home</a>
            <a href="about.php">About</a>
            <a href="shop.php">Shop</a>
            <a href="contact.php">Contact</a>
            <a href="orders.php">Orders</a>
         </nav>

         <!-- Icons -->
         <div class="icons">
            <div id="menu-btn" class="fas fa-bars"></div>
            <a href="search_page.php" class="fas fa-search"></a>
            <div id="user-btn" class="fas fa-user"></div>
            <?php
               if(isset($conn) && isset($user_id)){
                  $select_cart_number = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
                  $cart_rows_number = mysqli_num_rows($select_cart_number); 
               } else {
                  $cart_rows_number = 0;
               }
            ?>
            <a href="cart.php">
               <i class="fas fa-shopping-cart"></i> <span>(<?php echo $cart_rows_number; ?>)</span>
            </a>
         </div>

         <!-- User Box -->
         <?php if(isset($_SESSION['user_id'])): ?>
         <div class="user-box">
            <p>Username : <span><?php echo htmlspecialchars($_SESSION['user_name']); ?></span></p>
            <p>Email : <span><?php echo htmlspecialchars($_SESSION['user_email']); ?></span></p>
            <a href="logout.php" class="delete-btn">Logout</a>
         </div>
         <?php endif; ?>
      </div>
   </div>

</header>
