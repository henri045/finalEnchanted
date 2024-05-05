<?php 
session_start();
include('/home/betafactor/public_html/config/conn.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <title>Dashboard</title>
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
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://unpkg.com/motion"></script>
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
                    <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>Ensorcelé</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="https://betafactor.maurice.webcup.hodi.host/assets/images/admin_profile.png" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0"><?php echo $_SESSION['username']; ?></h6>
                        <span>Admin</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="index.html" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Tableau De Bord</a>
                    <a href="https://betafactor.maurice.webcup.hodi.host/src/models/adminTableList.php" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Tables</a>
                    <a href="https://betafactor.maurice.webcup.hodi.host/src/models/displayChart.php" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>Charts</a>
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-secondary navbar-dark sticky-top px-4 py-0">
                <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-user-edit"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img class="rounded-circle me-lg-2" src="https://betafactor.maurice.webcup.hodi.host/assets/images/admin_profile.png" alt="" style="width: 40px; height: 40px;">
                            <span class="d-none d-lg-inline-flex"><?php echo $_SESSION['username']; ?></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">My Profile</a>
                            <a href="https://betafactor.maurice.webcup.hodi.host/src/controllers/logout.php" class="dropdown-item">Log Out</a>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->


           
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-line fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Ventes du jour</p>
                                <h6 class="mb-0">$1234</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-bar fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Ventes totales</p>
                                <h6 class="mb-0">$1234</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-area fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Revenu du jour</p>
                                <h6 class="mb-0">$1234</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-pie fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Revenu total</p>
                                <h6 class="mb-0">$1234</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sale & Revenue End -->


            <!-- Sales Chart Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-secondary text-center rounded p-4">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h6 class="mb-0">Vendeur Nouvellement Enregistré</h6>
                                <a href="">Afficher tout</a>
                            </div>
                             <div style="max-height: 100px; overflow-y: auto;"> 
                             <?php 
                $today = date('Y-m-d'); // Gets today's date
                try {
                    $sql = "SELECT username, email, date_registered FROM Users WHERE role = 's' AND date_registered = ?";
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute([$today]);
                    if ($stmt->rowCount() > 0) {
                        echo "<table class='table'>";
                        echo "<thead><tr><th>Username</th><th>Email</th><th>Date Registered</th></tr></thead>";
                        echo "<tbody>";
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            echo "<tr><td>" . htmlspecialchars($row['username']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['date_registered']) . "</td></tr>";
                        }
                        echo "</tbody></table>";
                    } else {
                        echo "<p>No users found registered today.</p>";
                    }
                } catch (PDOException $e) {
                    echo "Error: " . $e->getMessage();
                }
                ?>
                </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-xl-6">
    <div class="bg-secondary text-center rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h6 class="mb-0">Acheteur Nouvellement Enregistré</h6>
            <a href="">Afficher tout</a>
        </div>
        <div style="max-height: 100px; overflow-y: auto;"> <!-- Set max height and enable vertical scrolling -->
            <?php 
            $today = date('Y-m-d'); // Gets today's date
            try {
                $sql = "SELECT username, email, date_registered FROM Users WHERE role = 'b' AND date_registered = ?";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([$today]);
                if ($stmt->rowCount() > 0) {
                    echo "<table class='table'>";
                    echo "<thead><tr><th>Username</th><th>Email</th><th>Date Registered</th></tr></thead>";
                    echo "<tbody>";
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo "<tr><td>" . htmlspecialchars($row['username']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['date_registered']) . "</td></tr>";
                    }
                    echo "</tbody></table>";
                } else {
                    echo "<p>No buyers found registered today.</p>";
                }
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
            ?>
        </div>
    </div>
</div>
            </div>
            <!-- Sales Chart End -->


            <!-- Recent Sales Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Ventes récentes</h6>
                        <a href="">Afficher tout</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-white">
                                    <th scope="col"><input class="form-check-input" type="checkbox"></th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Invoice</th>
                                    <th scope="col">Customer</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><input class="form-check-input" type="checkbox"></td>
                                    <td>01 Jan 2045</td>
                                    <td>INV-0123</td>
                                    <td>Jhon Doe</td>
                                    <td>$123</td>
                                    <td>Paid</td>
                                    <td><a class="btn btn-sm btn-primary" href="">Detail</a></td>
                                </tr>
                                <tr>
                                    <td><input class="form-check-input" type="checkbox"></td>
                                    <td>01 Jan 2045</td>
                                    <td>INV-0123</td>
                                    <td>Jhon Doe</td>
                                    <td>$123</td>
                                    <td>Paid</td>
                                    <td><a class="btn btn-sm btn-primary" href="">Detail</a></td>
                                </tr>
                                <tr>
                                    <td><input class="form-check-input" type="checkbox"></td>
                                    <td>01 Jan 2045</td>
                                    <td>INV-0123</td>
                                    <td>Jhon Doe</td>
                                    <td>$123</td>
                                    <td>Paid</td>
                                    <td><a class="btn btn-sm btn-primary" href="">Detail</a></td>
                                </tr>
                                <tr>
                                    <td><input class="form-check-input" type="checkbox"></td>
                                    <td>01 Jan 2045</td>
                                    <td>INV-0123</td>
                                    <td>Jhon Doe</td>
                                    <td>$123</td>
                                    <td>Paid</td>
                                    <td><a class="btn btn-sm btn-primary" href="">Detail</a></td>
                                </tr>
                                <tr>
                                    <td><input class="form-check-input" type="checkbox"></td>
                                    <td>01 Jan 2045</td>
                                    <td>INV-0123</td>
                                    <td>Jhon Doe</td>
                                    <td>$123</td>
                                    <td>Paid</td>
                                    <td><a class="btn btn-sm btn-primary" href="">Detail</a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Recent Sales End -->


            <!-- Widgets Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <?php
                    try {
    // SQL query to select users with role 's'
    $sql = "SELECT username, email FROM Users WHERE role = 's'";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    ?>
                    <div class="col-sm-12 col-md-6 col-xl-4">
                        <div class="h-100 bg-secondary rounded p-4">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <h6 class="mb-0">Liste des vendeurs </h6>
                                <a href="https://betafactor.maurice.webcup.hodi.host/src/models/sellerList.php">Afficher tout</a>
                            </div>
                            <div style="max-height: 300px; overflow-y: auto;"> 
                           <?php
                        if ($stmt->rowCount() > 0) {
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            echo '<div class="d-flex align-items-center justify-content-between border-bottom py-2">';
                            echo '<div>';
                            echo '<h6 class="mb-0">' . htmlspecialchars($row['username']) . '</h6>';
                            echo '<small>' . htmlspecialchars($row['email']) . '</small>';
                            echo '</div>';
                            echo '</div>';
                        }
                    } else {
                        echo '<p class="text-white">No users found with role "s".</p>';
                    }
                    ?>
                    </div>
                        </div>
                    </div>
                    <?php
                    } catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
} 
?>

<?php 
try {
    // SQL query to select users with role 'b'
    $sql = "SELECT username, email FROM Users WHERE role = 'b'";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
?>
                    <div class="col-sm-12 col-md-6 col-xl-4">
                        <div class="h-100 bg-secondary rounded p-4">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h6 class="mb-0">Liste des Acheteur</h6>
                                <a href="https://betafactor.maurice.webcup.hodi.host/src/models/buyerList.php">Afficher tout</a>
                            </div>
                             <div style="max-height: 300px; overflow-y: auto;"> 
                            <?php
                            if ($stmt->rowCount() > 0) {
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            echo '<div class="d-flex align-items-center justify-content-between border-bottom py-2">';
                            echo '<div>';
                            echo '<h6 class="mb-0">' . htmlspecialchars($row['username']) . '</h6>';
                            echo '<small>' . htmlspecialchars($row['email']) . '</small>';
                            echo '</div>';
                            echo '</div>';
                        }
                    } else {
                        echo '<p class="text-white">No users found with role "b".</p>';
                    }
                            
                            
                            ?>
                           </div>
                        </div>
                    </div>
                    <?php
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

                    ?>
                    <div class="col-sm-12 col-md-6 col-xl-4">
                        <div class="h-100 bg-secondary rounded p-4">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h6 class="mb-0">Geler et dégeler</h6>
                                <a href="">Afficher tout</a>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
            <!-- Widgets End -->


            <!-- Footer Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary rounded-top p-4">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-center text-sm-start">
                            &copy; <a href="#">Enchanted Commerce</a>, All Right Reserved. 
                        </div>
                        <div class="col-12 col-sm-6 text-center text-sm-end">
                            <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                            Designed By <a href="#">Beta Factor</a>
                            <br>Distributed By: <a href="#" target="_blank">WebCup 2024</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer End -->
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
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
    <script>
        import { animate } from "motion";

const sidebar = document.querySelector('.sidebar');
const sidebarToggler = document.querySelector('.sidebar-toggler');

sidebarToggler.addEventListener('click', () => {
    const isOpen = sidebar.classList.contains('open');
    animate(sidebar, { x: isOpen ? -240 : 0 }, { duration: 0.5 });
    sidebar.classList.toggle('open');
});
   
    
        import { animate } from "motion";

window.addEventListener('load', () => {
    animate('.content', { opacity: [0, 1] }, { duration: 1 });
});
  
    
 
        import { animate } from "motion";

const spinner = document.querySelector('#spinner');
animate(spinner, { rotate: 360 }, { duration: 1, repeat: Infinity, easing: "linear" });
  
    
   
        import { animate } from "motion";

const chartElements = document.querySelectorAll('.chart');
chartElements.forEach(chart => {
    animate(chart, { scaleX: [0, 1] }, { duration: 1 });
});
   
    

        import { animate } from "motion";

const tableRows = document.querySelectorAll('table tr');
tableRows.forEach(row => {
    row.addEventListener('mouseenter', () => {
        animate(row, { backgroundColor: '#f0f0f0' }, { duration: 0.3 });
    });
    row.addEventListener('mouseleave', () => {
        animate(row, { backgroundColor: '#ffffff' }, { duration: 0.3 });
    });
});
    </script>
   
</body>
</html>