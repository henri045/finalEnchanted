<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <title>Customer Dashboard</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet"> 
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="https://betafactor.maurice.webcup.hodi.host/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="https://betafactor.maurice.webcup.hodi.host/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="https://betafactor.maurice.webcup.hodi.host/assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="https://betafactor.maurice.webcup.hodi.host/assets/css/styleadd.css" rel="stylesheet">
</head>
<body>
   <div class="container-fluid position-relative d-flex p-0">
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->

    <!-- Sidebar Start -->
    <div class="sidebar pe-4 pb-3">
        <nav class="navbar bg-secondary navbar-dark">
            <a href="index.html" class="navbar-brand mx-4 mb-3">
                <h3 class="text-primary"><i class="fa fa-user-circle me-2"></i>Customer</h3>
            </a>
            <div class="navbar-nav w-100">
                <a href="index.html" class="nav-item nav-link active"><i class="fa fa-home me-2"></i>Dashboard</a>
                <a href="order-details.html" class="nav-item nav-link"><i class="fa fa-folder-open me-2"></i>Order Details</a>
                <a href="orders-in-progress.html" class="nav-item nav-link"><i class="fa fa-spinner me-2"></i>Orders in Progress</a>
                <a href="all-orders.html" class="nav-item nav-link"><i class="fa fa-list me-2"></i>All Orders</a>
            </div>
        </nav>
    </div>
    <!-- Sidebar End -->

    <!-- Content Start -->
    <div class="content">
        <!-- Navbar Start -->
        <nav class="navbar navbar-expand bg-secondary navbar-dark sticky-top px-4 py-0">
            <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                <h2 class="text-primary mb-0"><i class="fa fa-user-circle"></i></h2>
            </a>
            <a href="#" class="sidebar-toggler flex-shrink-0">
                <i class="fa fa-bars"></i>
            </a>
            <div class="navbar-nav align-items-center ms-auto">
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                        <img class="rounded-circle me-lg-2" src="https://betafactor.maurice.webcup.hodi.host/assets/images/profile_pic.png" alt="" style="width: 40px; height: 40px;">
                        <span class="d-none d-lg-inline-flex"><?php echo htmlspecialchars($_SESSION["username"]) ?></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                        <a href="#" class="dropdown-item">My Profile</a>
                        <a href="#" the="dropdown-item">Log Out</a>
                    </div>
                </div>
            </div>
        </nav>
        <!-- Navbar End -->

        <!-- Orders in Progress Start -->
        <div class="container-fluid pt-4 px-4">
            <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                <h6 class="mb-0">Orders in Progress</h6>
            </div>
            <div class="table-responsive mt-4">
                <table class="table text-start align-middle table-bordered table-hover mb-0">
                    <thead>
                        <tr class="text-white">
                            <th scope="col">Date</th>
                            <th scope="col">Order ID</th>
                            <th scope="col">Status</th>
                            <th scope="col">Estimated Delivery</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Dynamic rows for each order in progress -->
                    </tbody>
                </table>
            </div>
        </div>
        <!-- Orders in Progress End -->

        <!-- Order Details Start -->
        <div class="container-fluid pt-4 px-4">
            <div class="bg-secondary text-center rounded p-4">
                <h6 class="mb-0">Order Details</h6>
                <div class="table-responsive mt-4">
                    <table class="table text-start align-middle table-bordered table-hover mb-0">
                        <thead>
                            <tr class="text-white">
                                <th scope="col">Date</th>
                                <th scope="col">Product Name</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Dynamic rows for each order detail -->
                        </tbody>
                    </table>
                            </div>
        </div>
    </div>
       <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://betafactor.maurice.webcup.hodi.host/lib/chart/chart.min.js"></script>
    <script src="https://betafactor.maurice.webcup.hodi.host/lib/easing/easing.min.js"></script>
    <script src="https://betafactor.maurice.webcup.hodi.host/lib/waypoints/waypoints.min.js"></script>
    <script src="https://betafactor.maurice.webcup.hodi.host/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="https://betafactor.maurice.webcup.hodi.host/lib/tempusdominus/js/moment.min.js"></script>
    <script src="https://betafactor.maurice.webcup.hodi.host/lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="https://betafactor.maurice.webcup.hodi.host/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="https://betafactor.maurice.webcup.hodi.host/assets/js/main.js"></script>
    
    </body>
    </html>
