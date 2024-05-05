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

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">


    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>Misfit Menagerie</title>

    <!-- Bootstrap core CSS -->
    <link href="https://betafactor.maurice.webcup.hodi.host/vendors/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
      <link rel="stylesheet" href="https://betafactor.maurice.webcup.hodi.host/assets/css/fontawesome.css">
      <link rel="icon" href="https://betafactor.maurice.webcup.hodi.host/assets/images/wizard.png" type="image/x-icon">
    <link rel="stylesheet" href="https://betafactor.maurice.webcup.hodi.host/assets/css/style.css">
    <link rel="stylesheet" href="https://betafactor.maurice.webcup.hodi.host/assets/css/owl.css">

  </head>

  <body>


    <!-- Header -->
    <header class="">
      <nav class="navbar navbar-expand-lg">
        <div class="container">
          <a class="navbar-brand" href="https://betafactor.maurice.webcup.hodi.host/index.php"><h2>Misfit <em>Menagerie</em></h2></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="https://betafactor.maurice.webcup.hodi.host/index.php">Home
                      <span class="sr-only">(current)</span>
                    </a>
                </li> 

                <li class="nav-item active"><a class="nav-link" href="https://betafactor.maurice.webcup.hodi.host/src/pages/product.php">Products</a></li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">More</a>
                    
                    <div class="dropdown-menu">
                            <a class="dropdown-item" href="https://betafactor.maurice.webcup.hodi.host/src/pages/login.php">Sign_in</a>
                      <a class="dropdown-item" href="https://betafactor.maurice.webcup.hodi.host/src/pages/aboutus.php">About Us</a>
                 
                    </div>
                </li>
                
                <li class="nav-item"><a class="nav-link" href="contact.html">Contact Us</a></li>
            </ul>
          </div>
        </div>
      </nav>
    </header>

    <!-- Page Content -->
    <div class="page-heading about-heading header-text" style="background-image: url(https://betafactor.maurice.webcup.hodi.host/assets/images/R.jpg); background-size:cover;">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="text-content">
              <h4>one thousand and one night</h4>
              <h2>The 
              Mystical cave</h2>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="products">
      <div class="container">
        <div class="row">
         
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

          <div class="col-md-12">
            <ul class="pages">
              <li><a href="#">1</a></li>
              <li class="active"><a href="#">2</a></li>
              <li><a href="#">3</a></li>
              <li><a href="#">4</a></li>
              <li><a href="#"><i class="fa fa-angle-double-right"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="inner-content">
              <p>Copyright © 2020 Company Name - Template by: <a href="https://www.phpjabbers.com/">PHPJabbers.com</a></p>
            </div>
          </div>
        </div>
      </div>
  </footer>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Book Now</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="contact-form">
              <form action="#" id="contact">
                  <div class="row">
                       <div class="col-md-6">
                          <fieldset>
                            <input type="text" class="form-control" placeholder="Pick-up location" required="">
                          </fieldset>
                       </div>

                       <div class="col-md-6">
                          <fieldset>
                            <input type="text" class="form-control" placeholder="Return location" required="">
                          </fieldset>
                       </div>
                  </div>

                  <div class="row">
                       <div class="col-md-6">
                          <fieldset>
                            <input type="text" class="form-control" placeholder="Pick-up date/time" required="">
                          </fieldset>
                       </div>

                       <div class="col-md-6">
                          <fieldset>
                            <input type="text" class="form-control" placeholder="Return date/time" required="">
                          </fieldset>
                       </div>
                  </div>
                  <input type="text" class="form-control" placeholder="Enter full name" required="">

                  <div class="row">
                       <div class="col-md-6">
                          <fieldset>
                            <input type="text" class="form-control" placeholder="Enter email address" required="">
                          </fieldset>
                       </div>

                       <div class="col-md-6">
                          <fieldset>
                            <input type="text" class="form-control" placeholder="Enter phone" required="">
                          </fieldset>
                       </div>
                  </div>
              </form>
           </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-primary">Book Now</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="https://betafactor.maurice.webcup.hodi.host/vendors/jquery/jquery.min.js"></script>
    <script src="https://betafactor.maurice.webcup.hodi.host/vendors/bootstrap/js/bootstrap.bundle.min.js"></script>


    <!-- Additional Scripts -->
    <script src="https://betafactor.maurice.webcup.hodi.host/assets/js/custom.js"></script>
    <script src="https://betafactor.maurice.webcup.hodi.host/assets/js/owl.js"></script>
  </body>

</html>
    