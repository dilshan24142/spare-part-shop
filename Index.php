<?php
// Include config.php safely
$config_path = __DIR__ . '/config.php';
if (file_exists($config_path)) {
    include($config_path);
} else {
    die('Configuration file not found. Please make sure config.php exists in the project folder.');
}

// Start session
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SpareHubLK | Genuine Spare Parts in Sri Lanka</title>
  
  <link href="css/bootstrap-4.4.1.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <style>
    body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
    .navbar { background-color: #040000 !important; }
    .navbar .nav-link, .navbar .navbar-brand { color: #ffffff !important; }
    .navbar .nav-link:hover, .navbar .navbar-brand:hover { color: #cccccc !important; }
    .sidebar { position: sticky; top: 80px; }
    .list-group-item { background-color: #f8f9fa; border: none; cursor: pointer; }
    .list-group-item.active { background-color: #cc0000 !important; color: white !important; }
    .list-group-item:hover { background-color: #e0e0e0; }
    .pl-4 { padding-left: 30px !important; }
    .card { border: 1px solid #ddd; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); transition: transform 0.2s; }
    .card:hover { transform: translateY(-5px); }
    .card-img-top { width: 100%; height: 200px; object-fit: cover; border-bottom: 1px solid #ddd; }
    .footer-section { background: linear-gradient(to bottom right, red, #011); color: #fff; padding: 40px 0; margin-top: 40px; }
    .footer-section a { color: #fff; text-decoration: none; }
    .footer-section a:hover { text-decoration: underline; }
    .footer-title { font-weight: bold; margin-bottom: 15px; }
    .social-icons a { font-size: 20px; margin-right: 10px; color: #fff; }
    .social-icons a:hover { color: #ffc107; }
    .carousel-inner img { max-height: 500px; object-fit: cover; }
    .whatsapp-float { position: fixed; bottom: 25px; right: 90px; z-index: 999; }
  </style>
</head>

<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand d-flex align-items-center" href="#">
      <img src="images/logo.jpg.png" alt="SpareHubLK Logo" style="height: 90px; width: 90px; margin-right: 10px;">
      <strong>SpareHubLK</strong>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarMenu"
      aria-controls="navbarMenu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarMenu">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active"><a class="nav-link" href="Index.php">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="About us.php">About Us</a></li>
        <li class="nav-item"><a class="nav-link" href="Contact us.php">Contact Us</a></li>
        <li class="nav-item"><a class="nav-link" href="order.php">Gallery</a></li>
      </ul>

      <!-- Show buttons based on login -->
      <div class="form-inline my-2 my-lg-0">
      <?php if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
        <a href="logout.php" class="btn btn-outline-danger">Logout</a>
      <?php else: ?>
        <a href="Register.php" class="btn btn-outline-primary mr-2">Register</a>
        <a href="login.php" class="btn btn-outline-success">Login</a>
      <?php endif; ?>
      </div>
    </div>
  </nav>

  <!-- Main Content -->
  <div class="container-fluid mt-4">
    <div class="row">
      <!-- Sidebar -->
      <div class="col-md-3 sidebar">
        <div class="list-group" id="sidebarMenu">
          <a href="#" class="list-group-item list-group-item-action active">Browse Categories</a>
          <!-- Toyota -->
          <a href="#toyotaSub" class="list-group-item list-group-item-action" data-toggle="collapse">TOYOTA</a>
          <div class="collapse" id="toyotaSub" data-parent="#sidebarMenu">
            <a href="#" class="list-group-item pl-4">CARINA AT170</a>
            <a href="#" class="list-group-item pl-4">VIOS</a>
            <a href="#" class="list-group-item pl-4">PASSO</a>
            <a href="#" class="list-group-item pl-4">LITEACE</a>
            <a href="#" class="list-group-item pl-4">HIACE</a>
            <a href="#" class="list-group-item pl-4">COROLLA</a>
          </div>
          <!-- Nissan -->
          <a href="#nissanSub" class="list-group-item list-group-item-action" data-toggle="collapse">NISSAN</a>
          <div class="collapse" id="nissanSub" data-parent="#sidebarMenu">
            <a href="#" class="list-group-item pl-4">SUNNY</a>
            <a href="#" class="list-group-item pl-4">NAVARA</a>
            <a href="#" class="list-group-item pl-4">X-TRAIL</a>
          </div>
          <!-- Add other brands similarly... -->
        </div>
      </div>

      <!-- Main Column -->
      <div class="col-md-9">
        <!-- Carousel -->
        <div id="carouselExampleIndicators" class="carousel slide mb-4" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img class="d-block w-100" src="images/interface1.png" alt="first slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="images/interface2.png" alt="Second slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="images/interface3.png" alt="Third slide">
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon"></span>
          </a>
        </div>

        <!-- Product Cards -->
        <div class="container">
          <div class="row">
            <div class="col-md-4 mb-4">
              <div class="card">
                <img class="card-img-top" src="images/toyota5.jpg" alt="TOYOTA">
                <div class="card-body text-center"><h5 class="card-title">TOYOTA</h5></div>
              </div>
            </div>
            <!-- Add other cards similarly... -->
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <footer class="footer-section">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-md-6 mb-4">
          <img src="images/logo.jpg.png" alt="SpareHubLK Logo" style="max-height: 60px;">
          <p class="mt-3">We at SpareHubLK would love to hear from you!<br>
          Please let us know if you have any questions or concerns and we will get back to you soon.</p>
          <div class="social-icons mt-3">
            <a href="#"><i class="fab fa-facebook-f"></i></a>
            <a href="#"><i class="fab fa-whatsapp"></i></a>
            <a href="#"><i class="fas fa-envelope"></i></a>
          </div>
        </div>
      </div>
      <div class="text-center mt-4"><p>© 2025 SpareHubLK. All rights reserved.</p></div>
    </div>
  </footer>

  <!-- Chat & WhatsApp -->
  <div class="chat-now"><i class="fas fa-comments"></i> Chat Now</div>
  <a href="https://wa.me/94762495646" target="_blank" class="whatsapp-float" title="Chat with us on WhatsApp">
    <img src="https://img.icons8.com/color/48/000000/whatsapp.png" alt="WhatsApp Chat" />
  </a>

  <script src="js/jquery-3.4.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap-4.4.1.js"></script>
</body>
</html>
