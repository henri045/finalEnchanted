<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="https:/betafactor.maurice.webcup.hodi.host/images/EST2024.png">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://betafactor.maurice.webcup.hodi.host/assets/css/template.css">
    <title>Misfit Menagerie</title>

    <!-- Bootstrap core CSS -->
    <link href="https://betafactor.maurice.webcup.hodi.host/vendors/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="https://betafactor.maurice.webcup.hodi.host/assets/css/fontawesome.css">
    <link rel="stylesheet" href="https://betafactor.maurice.webcup.hodi.host/assets/css/style.css">
    <link rel="stylesheet" href="https://betafactor.maurice.webcup.hodi.host/assets/css/owl.css">

  </head>

  <body>

    <!-- ** Preloader Start ** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    <!-- ** Preloader End ** -->

    <!-- Header -->
    <header class="">
      <nav class="navbar navbar-expand-lg">
        <div class="container">
          <a class="navbar-brand" href="https://betafactor.maurice.webcup.hodi.host/src/pages/index.php"><h2>Misfit <em>Menagerie</em></h2></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="https://betafactor.maurice.webcup.hodi.host/src/pages/index.php">Home
                      <span class="sr-only">(current)</span>
                    </a>
                </li> 

                <li class="nav-item"><a class="nav-link" href="https://betafactor.maurice.webcup.hodi.host/src/pages/product.php">Products</a></li>              
                <li class="nav-item"><a class="nav-link" href="">Checkout</a></li>
                <li class="nav-item"><a class="nav-link" href="https://betafactor.maurice.webcup.hodi.host/src/pages/register.php">Register</a></li>
                <li class="nav-item"><a class="nav-link" href="https://betafactor.maurice.webcup.hodi.host/src/pages/login.php">Login</a></li>
                <li class="nav-item"><a class="nav-link" href="https://betafactor.maurice.webcup.hodi.host/src/pages/aboutus.php">About Us</a></li>
            </ul>
          </div>
        </div>
      </nav>
    </header>

    <!-- Page Content -->
    <!-- Banner Starts Here -->
    <div class="banner header-text">
      <div class="owl-banner owl-carousel">
        <div class="banner-item-01">
          <div class="text-content">
            <h2>Find your Enchanted Books today!</h2>
          </div>
        </div>
        <div class="banner-item-02">
          <div class="text-content">
            <h2>All Wands and Staffs you want here</h2>
          </div>
        </div>
        <div class="banner-item-03">
          <div class="text-content">           
            <h2>All sorts of Magical Potions Available</h2>
          </div>
        </div>
      </div>
    </div>
    <!-- Banner Ends Here -->

    <div class="latest-products">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Featured Products</h2>
              <a href="products.html">view more <i class="fa fa-angle-right"></i></a>
            </div>
          </div>
          
 <?php
 include('/home/betafactor/public_html/config/conn.php');
// Prepare a query to fetch the desired attributes from the database
try{
$query = "SELECT p.name, p.description, p.price, pi.ImageURL
          FROM Products p
          JOIN (SELECT ProductID, ImageURL FROM ProductImages GROUP BY ProductID) pi
          ON p.ProductID = pi.ProductID";
$stmt = $pdo->query($query);

// Fetch the results
$products = $stmt->fetchAll();
}
catch(Exeption $e){
    exit;
    echo $e->getMessage();
}
?>
                  
  <?php foreach ($products as $product): ?>
  
<div class="col-md-4">
    <div class="product-item">
        <a href="product-details.html"><img src="<?php echo $product['ImageURL']?>" alt=""></a>
        <div class="down-content">
            <a href="product-details.html"><h4><?php echo htmlspecialchars($product['name']); ?></h4></a>
            <h6><?php echo $product['price']; ?></h6>
            <p><?php echo htmlspecialchars($product['description']); ?></p>
        </div>
    </div>
</div>
<?php endforeach; ?>

    <div class="best-features">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>About Us</h2>
            </div>
          </div>
          <div class="col-md-6">
            <div class="left-content">
              <p>Embark on a journey through realms unknown at our enchanted emporium. Here, amidst the whispers of ancient spells and the shimmer of arcane artifacts, mysteries await. Delve into our trove of wonders, where each item holds a tale untold and every visit unveils new enchantments. Welcome to the realm of Misfit Menagerie, where magic finds its home.</p>
               <a href="about-us.html" class="filled-button">Read More</a>
            </div>
          </div>
          <div class="col-md-6">
            <div class="right-image">
              <img src="https://betafactor.maurice.webcup.hodi.host/images/BetaFactor.jpg" alt="">
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="services" style="background-image: url(https://betafactor.maurice.webcup.hodi.host/images/oujaBoard.jpg);" >
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Latest blog posts</h2>

              <a href="blog.html">read more <i class="fa fa-angle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="service-item">
              <a href="#" class="services-item-image"><img src="assets/images/blog-1-370x270.jpg" class="img-fluid" alt=""></a>

              <div class="down-content">
                <h4><a href="#">Lorem ipsum dolor sit amet, consectetur adipisicing elit hic</a></h4>

                <p style="margin: 0;"> John Doe &nbsp;&nbsp;|&nbsp;&nbsp; 12/06/2020 10:30 &nbsp;&nbsp;|&nbsp;&nbsp; 114</p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="service-item">
              <a href="#" class="services-item-image"><img src="assets/images/blog-2-370x270.jpg" class="img-fluid" alt=""></a>

              <div class="down-content">
                <h4><a href="#">Lorem ipsum dolor sit amet consectetur adipisicing elit</a></h4>

                <p style="margin: 0;"> John Doe &nbsp;&nbsp;|&nbsp;&nbsp; 12/06/2020 10:30 &nbsp;&nbsp;|&nbsp;&nbsp; 114</p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="service-item">
              <a href="#" class="services-item-image"><img src="assets/images/blog-3-370x270.jpg" class="img-fluid" alt=""></a>

              <div class="down-content">
                <h4><a href="#">Aperiam modi voluptatum fuga officiis cumque</a></h4>

                <p style="margin: 0;"> John Doe &nbsp;&nbsp;|&nbsp;&nbsp; 12/06/2020 10:30 &nbsp;&nbsp;|&nbsp;&nbsp; 114</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="inner-content">
       
            </div>
          </div>
        </div>
      </div>
    </footer>


    <!-- Bootstrap core JavaScript -->
    <script src="https://betafactor.maurice.webcup.hodi.host/vendors/jquery/jquery.min.js"></script>
    <script src="https://betafactor.maurice.webcup.hodi.host/vendors/bootstrap/js/bootstrap.bundle.min.js"></script>


    <!-- Additional Scripts -->
    <script src="https://betafactor.maurice.webcup.hodi.host/assets/js/custom.js"></script>
    <script src="https://betafactor.maurice.webcup.hodi.host/assets/js/owl.js"></script>
    <div>

      <!-- Footer -->
      <footer class="footer-distributed">
  
        <div class="footer-left">
  
          <h3>Misfit Menagerie</h3><span>logo</span></h3>
  
          <p class="footer-links">
            <a href="#" class="home.html">Home</a>
            
            <a href="products.html">Product</a>
          
            <a href="checkout.html">Checkout</a>
          
            <a href="register.html">Register</a>
            
            <a href="login.html">Login</a>
                      
          </p>
  
          <p class="footer-company-name">Misfit Menagerie © 2024</p>
        </div>
  
        <div class="footer-center">
  
          <div>
            <i class="fa fa-map-marker"></i>
            <p><span>Orange Business</span> Ebene Tower 2, Ebene</p>
          </div>
  
          <div>
            <i class="fa fa-phone"></i>
            <p>+230 ****</p>
          </div>
  
          <div>
            <i class="fa fa-envelope"></i>
            <p><a href="mailto:misfit.menagerie@gmail.com">misfit.menagerie@gmail.com</a></p>
          </div>
  
        </div>
  
        <div class="footer-right">
  
          <p class="footer-company-about">
            <span>About the company</span>
            Welcome to Misfit Menagerie! Discover mystical treasures crafted with ancient spells. From potions to artifacts, we bring magic to your world. Experience wonder with us!
          </p>
  
          <div class="footer-icons">
  
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-linkedin"></i></a>
            <a href="#"><i class="fa fa-github"></i></a>
  
          </div>
  
        </div>
  
      </footer>
      <!-- End Footer -->
      
    </div>
  </body>
</html>