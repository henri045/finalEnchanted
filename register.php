<?php
$err = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include('/home/betafactor/public_html/config/conn.php');
    // Get data from HTML form
    if (isset($_POST['submit'])) {
        $username = $_POST['username'] ?? '';
        $email = $_POST['email'] ?? '';
        $password = isset($_POST['password']) ? password_hash($_POST['password'], PASSWORD_DEFAULT) : '';
        $role = $_POST['role'] ?? '';

        // Check if the user already exists
        if (checkEntry($pdo, $email, $username)) {
            $err = "User already exists";
        } else {
            // Prepare SQL statement to insert user data
            $stmt = $pdo->prepare("INSERT INTO Users (username, email, password, role, date_registered) VALUES (:username, :email, :password, :role, :date_registered)");

            // Bind parameters
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $password);
            $stmt->bindParam(':role', $role);
            $date_registered = date('Y-m-d');
            $stmt->bindParam(':date_registered', $date_registered);

            // Execute the prepared statement
            try {
                $stmt->execute();
                // Redirect to login page after successful registration
                header("Location: https://betafactor.maurice.webcup.hodi.host/src/pages/login.php");
                exit();
            } catch (PDOException $e) {
                $err = "Error: " . $e->getMessage();
            }
        }
    }
}

/**
 * Checks if a user with the given email or username already exists in the database.
 */
function checkEntry($pdo, $email, $username)
{
    $stmt = $pdo->prepare("SELECT * FROM Users WHERE username = :username OR email = :email LIMIT 1");
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                        
                            </div>
                            <form id="registrationForm" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                                <div class="form-group mt-3">
                                    <input id="username" type="text" name="username" class="form-control" required>
                                    <label class="form-control-placeholder" for="username">Username</label>
                                </div>
                                <div class="form-group">
                                    <input id="email" type="email" name="email" class="form-control" required>
                                    <label class="form-control-placeholder" for="email">Email</label>
                                </div>
                                <div class="form-group">
                                    <input id="password" type="password" name="password" class="form-control" required>
                                    <label class="form-control-placeholder" for="password">Password</label>
                                </div>
                                <div class="form-group">
                                    <select id="role" name="role" class="form-control" required>
                                        <option value="" selected disabled>Select Role</option>
                                        <option value="s">Seller</option>
                                        <option value="b">Buyer</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <button type="submit" name="submit" class="form-control btn btn-primary rounded submit px-3">Register</button>
                                </div>
                            </form>
                            <p class="text-center">Already a member? <a href="login.php">Login</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>
<script src="https://betafactor.maurice.webcup.hodi.host/assets/js/scriptAnimation.js"></script>

  <script>
    document.getElementById('registrationForm').addEventListener('submit', function(event) {
      const usernameInput = document.getElementById('username');
      const emailInput = document.getElementById('email');
      const passwordInput = document.getElementById('password');
      const ageInput = document.getElementById('age');
      const usernameError = document.getElementById('usernameError');
      const emailError = document.getElementById('emailError');
      const passwordError = document.getElementById('passwordError');
      const ageError = document.getElementById('ageError');
      
      const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

      if (!emailRegex.test(emailInput.value)) {
        emailError.textContent = 'Invalid email format';
        event.preventDefault();
      } else {
        emailError.textContent = '';
      }

      if (passwordInput.value.length < 8) {
        passwordError.textContent = 'Password must be at least 8 characters long';
        event.preventDefault();
      } else {
        passwordError.textContent = '';
      }
    });
  </script>

