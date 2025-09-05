<?php

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>About SpareHub LK</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'header.php'; ?>

<div class="heading">
   <h3>About Us</h3>
   <p> <a href="home.php">Home</a> / About </p>
</div>

<!-- About Section -->
<section class="about">
   <div class="flex">

      <div class="image">
         <img src="images/interface3.png" alt="SpareHub LK">
      </div>

      <div class="content">
         <h3>Why Choose SpareHub LK?</h3> 
           <h4> Whether you’re a car enthusiast, a professional mechanic, or a daily commuter, we ensure a seamless shopping experience that is fast, safe, and customer-friendly.<h4></p>
         <p>අපිගේ අරමුණ වන්නේ ඔබගේ වාහන පවත්වා ගැනීමේ ගැටලු මිනිස්සුන්ට නොමැතිව කිරීමයි. ඔබට අවශ්‍ය සියලුම spare parts, අඩු මිලකට, ඉක්මනින් සහ ආරක්ෂිතව ලබා ගැනීමට ඔබට මෙහි අවස්ථාව තිබේ.</p>
         <a href="contact.php" class="btn">Contact Us</a>
      </div>

   </div>
</section>

<!-- Customer Reviews Section -->
<section class="reviews">
   <h1 class="title">Customer Reviews</h1>

   <div class="box-container">

      <div class="box">
         <img src="images/pic-3.jpg" alt="">
         <p>“I found the exact spare part I needed for my car. Fast delivery and excellent quality!”</p>
         <div class="stars">
            <i class="fas fa-star"></i><i class="fas fa-star"></i>
            <i class="fas fa-star"></i><i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Sudeesha Ravisara</h3>
      </div>

      <div class="box">
         <img src="images/pic-4.png" alt="">
         <p>“මෙහි ඇති spare parts ගණනාවම විශ්වාසදායකයි. මිල අඩුයි, සේවාව හොඳයි. මම හැමෝටම recommend කරනවා.”</p>
         <div class="stars">
            <i class="fas fa-star"></i><i class="fas fa-star"></i>
            <i class="fas fa-star"></i><i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
         </div>
         <h3>Kavishka Dewduni</h3>
      </div>

      <div class="box">
         <img src="images/pic-2.jpg" alt="">
         <p>“Affordable spare parts with reliable service. SpareHub LK is my first choice now.”</p>
         <div class="stars">
            <i class="fas fa-star"></i><i class="fas fa-star"></i>
            <i class="fas fa-star"></i><i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Chamodya Peshan</h3>
      </div>

      <div class="box">
         <img src="images/pic-1.jpg" alt="">
         <p>“මම සෑම වාරයක්ම මෙහිින් spare parts මිලදී ගන්නවා. ගුණාත්මක සේවාවක් සහ වේගවත් බෙදාහැරීමක්.”</p>
         <div class="stars">
            <i class="fas fa-star"></i><i class="fas fa-star"></i>
            <i class="fas fa-star"></i><i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Sachintha Dilshan</h3>
      </div>

      <div class="box">
         <img src="images/pic-6.png" alt="">
         <p>“Excellent service, fair pricing, and high-quality spare parts. Definitely my go-to shop.”</p>
         <div class="stars">
            <i class="fas fa-star"></i><i class="fas fa-star"></i>
            <i class="fas fa-star"></i><i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Piyumi Edirisingha</h3>
      </div>
<div class="box">
         <img src="images/pic-5.png" alt="">
         <p>“ඉතාමත් හොද සෙවයක් . ඇත්තටම මම හැමොටම recommend කරනවා .. thankyou Sparehub.❤️”</p>
         <div class="stars">
            <i class="fas fa-star"></i><i class="fas fa-star"></i>
            <i class="fas fa-star"></i><i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Hashini Sathyamoorthi</h3>
      </div>

   </div>
</section>

<!-- Team Section -->
<section class="team">
   <h1 class="title">Our Team</h1>

   <div class="box-container">

      <div class="box">
         <img src="images/team-1.jpg" alt="">
         <div class="share">
            <a href="#" class="fab fa-facebook-f"></a>
            <a href="#" class="fab fa-twitter"></a>
            <a href="#" class="fab fa-instagram"></a>
            <a href="#" class="fab fa-linkedin"></a>
         </div>
         <h3>Shashin Peris</h3>
         <p>Founder & CEO</p>
      </div>

      <div class="box">
         <img src="images/team-2.jpg" alt="">
         <div class="share">
            <a href="#" class="fab fa-facebook-f"></a>
            <a href="#" class="fab fa-twitter"></a>
            <a href="#" class="fab fa-instagram"></a>
            <a href="#" class="fab fa-linkedin"></a>
         </div>
         <h3>Yathushiha Shivanandan</h3>
         <p>Head of Operations</p>
      </div>

      <div class="box">
         <img src="images/team-3.jpg" alt="">
         <div class="share">
            <a href="#" class="fab fa-facebook-f"></a>
            <a href="#" class="fab fa-twitter"></a>
            <a href="#" class="fab fa-instagram"></a>
            <a href="#" class="fab fa-linkedin"></a>
         </div>
         <h3>Menuri Madushika</h3>
         <p>Customer Support Lead</p>
      </div>

   </div>
</section>

<?php include 'footer.php'; ?>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>
