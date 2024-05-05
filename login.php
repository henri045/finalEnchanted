<?php
$err = "";
session_start();

// Include your database connection file
include('/home/betafactor/public_html/config/conn.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    try {
        // First, attempt to log in as an admin
        $sqlAdmin = "SELECT admin_id, password FROM admin WHERE username = :username";

        $stmtAdmin = $pdo->prepare($sqlAdmin);
        $stmtAdmin->bindParam(":username", $username, PDO::PARAM_STR);
        $stmtAdmin->execute();
        $admin = $stmtAdmin->fetch();

        if ($admin && $admin['password'] === $password) {
            // Admin login successful
            $_SESSION["loggedin"] = true;
            $_SESSION["id"] = $admin['admin_id'];
            $_SESSION["username"] = $username;

            header("Location: https://betafactor.maurice.webcup.hodi.host/src/models/dashboard.php");
            exit;
        } else {
            // If not an admin or password does not match, check regular user table
            $sqlUser = "SELECT UserID, username, password, role FROM Users WHERE username = :username";
            $stmtUser = $pdo->prepare($sqlUser);
            $stmtUser->bindParam(":username", $username, PDO::PARAM_STR);
            $stmtUser->execute();
            $user = $stmtUser->fetch();

            if ($user && password_verify($password, $user['password'])){
                // User login successful
                $_SESSION["loggedin"] = true;
                $_SESSION["id"] = $user["UserID"];
                $_SESSION["username"] = $user["username"];
                $_SESSION["role"] = $user['role'];

                // Redirect based on user role
                if ($user['role'] === 's') {
                    header("Location: https://betafactor.maurice.webcup.hodi.host/src/models/sellerDashboard.php");
                } elseif ($user['role'] === 'b') {
                    header("Location: https://betafactor.maurice.webcup.hodi.host/src/models/custDashboard.php");
                }
                exit;
            } else {
                // Incorrect username or password
                $err = "Incorrect username or password.";
            }
        }
    } catch (PDOException $e) {
        $err = "Database error: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="icon" href="https://betafactor.maurice.webcup.hodi.host/assets/images/wizard.png" type="image/x-icon">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://betafactor.maurice.webcup.hodi.host/assets/css/styleFormLogin.css">
</head>
<body>
    <section class="services">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                    <?php if (!empty($err)): ?>
                        <div class="error-box">
                            <?php echo $err; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-7 col-lg-5">
                    <div class="wrap">
                        <div class="img" style="background-image: url(https://betafactor.maurice.webcup.hodi.host/images/loginBG.jpg);"></div>
                        <div class="login-wrap p-4 p-md-5">
                            <div class="d-flex">
                                <div class="w-100">
                                    <h3 class="mb-4">Sign In</h3>
                                </div>
                            </div>
                            <form id="loginform" method="POST" class="signin-form">
                                <div class="form-group mt-3">
                                    <input id="username" type="text" name="username" class="form-control" required>
                                    <label class="form-control-placeholder" for="username">Username</label>
                                </div>
                                <div class="form-group">
                                    <input id="password" type="password" name="password" class="form-control" required>
                                    <label class="form-control-placeholder" for="password">Password</label>
                                    <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                </div>
                                <div class="form-group">
                                    <button type="submit" name="submit" class="form-control btn btn-primary rounded submit px-3">Sign In</button>
                                </div>
                            </form>
                            <p class="text-center">Not a member? <a data-toggle="tab" href="https://betafactor.maurice.webcup.hodi.host/src/pages/register.php">Sign Up</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
<script src="https://betafactor.maurice.webcup.hodi.host/assets/js/scriptAnimation.js"></script>