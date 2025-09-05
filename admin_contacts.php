<?php

include 'config.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:login.php');
};

if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   mysqli_query($conn, "DELETE FROM `message` WHERE id = '$delete_id'") or die('Query Failed');
   header('location:admin_contacts.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>SpareHub Admin - Customer Messages</title>

   <!-- font awesome cdn link -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom admin css file link -->
   <link rel="stylesheet" href="css/admin_style.css">

</head>
<body>
   
<?php include 'admin_header.php'; ?>

<section class="messages">

   <h1 class="title"><i class="fas fa-envelope"></i> Customer Messages</h1>
   <p class="subtitle">Here you can view and manage all customer inquiries from SpareHub LK.</p>

   <div class="box-container">
   <?php
      $select_message = mysqli_query($conn, "SELECT * FROM `message` ORDER BY id DESC") or die('Query Failed');
      if(mysqli_num_rows($select_message) > 0){
         while($fetch_message = mysqli_fetch_assoc($select_message)){
   ?>
   <div class="box">
      <p><i class="fas fa-user"></i> <strong>Name:</strong> <span><?php echo $fetch_message['name']; ?></span></p>
      <p><i class="fas fa-id-card"></i> <strong>User ID:</strong> <span><?php echo $fetch_message['user_id']; ?></span></p>
      <p><i class="fas fa-phone"></i> <strong>Number:</strong> <span><?php echo $fetch_message['number']; ?></span></p>
      <p><i class="fas fa-envelope"></i> <strong>Email:</strong> <span><?php echo $fetch_message['email']; ?></span></p>
      <p><i class="fas fa-comment-dots"></i> <strong>Message:</strong></p>
      <blockquote class="message-text"><?php echo $fetch_message['message']; ?></blockquote>
      
      <div class="action-btns">
         <a href="mailto:<?php echo $fetch_message['email']; ?>" class="reply-btn">
            <i class="fas fa-reply"></i> Reply
         </a>
         <a href="admin_contacts.php?delete=<?php echo $fetch_message['id']; ?>" 
            onclick="return confirm('Are you sure you want to delete this message?');" 
            class="delete-btn">
            <i class="fas fa-trash"></i> Delete
         </a>
      </div>
   </div>
   <?php
         }
      } else {
         echo '<p class="empty"><i class="fas fa-inbox"></i> You have no new messages.</p>';
      }
   ?>
   </div>

</section>

<!-- custom admin js file link -->
<script src="js/admin_script.js"></script>

</body>
</html>
