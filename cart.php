<?php

include 'config.php';
session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
   exit();
}

if(isset($_POST['update_cart'])){
   $cart_id = intval($_POST['cart_id']);
   $cart_quantity = intval($_POST['cart_quantity']);
   if($cart_quantity > 0){
      mysqli_query($conn, "UPDATE `cart` SET quantity = '$cart_quantity' WHERE id = '$cart_id'") or die('query failed');
      $message[] = '✅ Cart quantity updated!';
   }
}

if(isset($_GET['delete'])){
   $delete_id = intval($_GET['delete']);
   mysqli_query($conn, "DELETE FROM `cart` WHERE id = '$delete_id'") or die('query failed');
   header('location:cart.php');
   exit();
}

if(isset($_GET['delete_all'])){
   mysqli_query($conn, "DELETE FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
   header('location:cart.php');
   exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>SpareHub LK - Cart</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'header.php'; ?>

<div class="heading">
   <h3>Your Shopping Cart</h3>
   <p><a href="home.php">Home</a> / Cart</p>
</div>

<section class="shopping-cart">

   <h1 class="title">Products in Your Cart</h1>

   <div class="box-container">
      <?php
         $grand_total = 0;
         $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
         if(mysqli_num_rows($select_cart) > 0){
            while($fetch_cart = mysqli_fetch_assoc($select_cart)){   
      ?>
      <div class="box">
         <a href="cart.php?delete=<?php echo $fetch_cart['id']; ?>" class="fas fa-times" onclick="return confirm('Remove this item from cart?');"></a>
         <img src="uploaded_img/<?php echo htmlspecialchars($fetch_cart['image']); ?>" alt="">
         <div class="name"><?php echo htmlspecialchars($fetch_cart['name']); ?></div>
         <div class="price">Rs.<?php echo number_format($fetch_cart['price'], 2); ?></div>
         
         <form action="" method="post" class="cart-form">
            <input type="hidden" name="cart_id" value="<?php echo $fetch_cart['id']; ?>">
            <input type="number" min="1" name="cart_quantity" value="<?php echo $fetch_cart['quantity']; ?>" class="qty">
            <input type="submit" name="update_cart" value="Update" class="option-btn">
         </form>

         <div class="sub-total"> 
            Sub Total : 
            <span>Rs.<?php echo number_format($sub_total = ($fetch_cart['quantity'] * $fetch_cart['price']), 2); ?></span> 
         </div>
      </div>
      <?php
         $grand_total += $sub_total;
         }
      }else{
         echo '<p class="empty">Your cart is empty. <a href="shop.php" class="btn">Go Shopping</a></p>';
      }
      ?>
   </div>

   <?php if($grand_total > 0){ ?>
   <div style="margin-top: 2rem; text-align:center;">
      <a href="cart.php?delete_all" class="delete-btn" onclick="return confirm('Are you sure you want to remove all items from the cart?');">Delete All</a>
   </div>
   <?php } ?>

   <div class="cart-total">
      <p>Grand Total : <span>Rs.<?php echo number_format($grand_total, 2); ?></span></p>
      <div class="flex">
         <a href="shop.php" class="option-btn">Continue Shopping</a>
         <a href="checkout.php" class="btn <?php echo ($grand_total > 0)?'':'disabled'; ?>">Proceed to Checkout</a>
      </div>
   </div>

</section>

<?php include 'footer.php'; ?>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>
