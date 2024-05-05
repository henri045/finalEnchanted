<?php
session_start(); // Start the session at the beginning of the script

$err = '';

if (isset($_POST['submit'])) {
    if (isset($_SESSION['username'])) { // Ensure the session variable 'username' is set
        try {
            include('/home/betafactor/public_html/config/conn.php');

            // Query to fetch the UserID based on the username
            $userQuery = $pdo->prepare("SELECT UserID FROM Users WHERE Username = ?");
            $userQuery->execute([$_SESSION['username']]);
            $user = $userQuery->fetch();

            if ($user) {
                $userID = $user['UserID'];

                // Prepare SQL statement for insertion
                $stmt = $pdo->prepare("INSERT INTO Products (name, description, category, sellerID, price, quantity, status) VALUES (?, ?, ?, ?, ?, ?, ?)");
                $stmt->execute([
                    $_POST["Name"],
                    $_POST["Description"],
                    $_POST["Category"],
                    $userID, // Use the fetched user ID
                    $_POST["Price"],
                    $_POST["Quantity"],
                    "available",
                ]);

                // Get the last inserted product ID
                $productID = $pdo->lastInsertId();

                // Prepare SQL statement for product image insertion
                $stmt_image = $pdo->prepare("INSERT INTO ProductImages (ProductID, ImageURL, Description) VALUES (?, ?, ?)");
                for ($i = 1; $i <= 3; $i++) {
                    $imageFieldName = "Image$i";
                    $imageFileName = $_FILES[$imageFieldName]["name"];
                    $imageDescription = null;

                    $stmt_image->execute([$productID, "https://betafactor.maurice.webcup.hodi.host/assets/product_gallery/" . $imageFileName, $imageDescription]);
                    // Attempt to move the uploaded file to the destination directory

// Attempt to move the uploaded file to the destination directory
if (move_uploaded_file($_FILES[$imageFieldName]["tmp_name"], "/home/betafactor/public_html/assets/product_gallery/". $imageFileName)) {
    $err = "Product and images added successfully.";
} else {
    $err = "Failed to move uploaded file. Error: " . error_get_last()['message'];
}

                }

                $err = "Product and images added successfully.";
            } else {
                $err = "User ID not found. Please log in.";
            }
            
        } catch(PDOException $e) {
            $err = "Error: " . $e->getMessage();
        }

        // Close the database connection
        $pdo = null;
    } else {
        $err = "Username not found in session. Please log in again.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="https://betafactor.maurice.webcup.hodi.host/assets/images/wizard.png" type="image/x-icon">
  <title>Magical Product Form</title>
  <style>
    /* Basic styles */
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      background-image: linear-gradient(to bottom right, #f2f2f2, #e3e3e3); /* Gradient background */
    }

    .form-container {
      max-width: 600px;
      margin: 0 auto;
      border: 1px solid #ddd;
      padding: 30px;
      border-radius: 5px;
      background-color: #fff; /* White background for the form */
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); /* Subtle shadow effect */
    }

    h1 {
      text-align: center;
      margin-bottom: 20px;
      color: #333; /* Darker text color */
    }

    /* Form styles */
    form {
      display: flex;
      flex-wrap: wrap;
    }

    .form-group2 {
      margin-bottom: 15px;
      width: 100%;
    }

    label {
      display: block;
      margin-bottom: 5px;
      font-weight: bold;
      color: #333; /* Darker text color */
    }

    input[type="text"],
    input[type="number"],
    textarea,
    select {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 3px;
      box-sizing: border-box;
      resize: vertical; /* Allow textarea resizing */
    }

    /* Button styles */
    button[type="submit"] {
      background-color: #4CAF50; /* Green */
      border: none;
      color: white;
      padding: 10px 20px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      margin-top: 15px;
      cursor: pointer;
      border-radius: 5px;
    }

    button[type="submit"]:hover {
      background-color: #45A049; /* Green darkened */
    }

    /* Error message box styles */
    .error-box {
      background-color: #f0ad4e; /* Light orange */
      color: #fff;
      padding: 10px;
      border: 1px solid #f08000; /* Orange */
      border-radius: 5px;
      margin-bottom: 15px;
    }

    /* Image upload section styles */
    .form-group {
      width: 100%; /* Adjust width if needed for image previews */
    }

    .image-container {
      display: inline-block;
      margin-right: 10px;
      text-align: center;
    }

    .image-container:last-child {
      margin-right: 0;
    }

    .preview-image {
      width: 100px;
      height: 100px;
      object-fit: cover; /* Scale image to fit container */
      display: none; /* Initially hide preview images */
    }

    .image-label {
      margin-top: 5px;
      font-size: 12px;
      color: #3
    }
    
    </style>
</head>

<body>
  <div class="form-container">
    <h1>Add Enchanted Item</h1>
    <form id="product-form" method="POST" action="#" enctype="multipart/form-data">

      <?php if (!empty($err)): ?>
        <div class="error-box">
          <?php echo $err; ?>
        </div>
      <?php endif; ?>

      <div class="form-group2">
        <label for="product-name">Product Name</label>
        <input type="text" id="product-name" name="Name" maxlength="255" required>
      </div>
      <div class="form-group2">
        <label for="product-description">Description</label>
        <textarea id="product-description" name="Description" required></textarea>
      </div>
      <div class="form-group2">
        <label for="product-category">Category</label>
        <select id="product-category" name="Category" required>
          <option value="" disabled selected>Select Category</option>
          <option value="Enchanted Books">Enchanted Books</option>
          <option value="Magical Potions">Magical Potions</option>
          <option value="Enchanted Jewelry">Enchanted Jewelry</option>
          <option value="Mystical Artifacts">Mystical Artifacts</option>
        </select>
      </div>
      <div class="form-group2">
        <label for="product-price">Price:</label>
        <input type="number" step="0.01" id="product-price" name="Price" required>
      </div>
      <div class="form-group2">
        <label for="product-quantity">Quantity:</label>
        <input type="number" id="product-quantity" name="Quantity" required>
      </div>


      <div class="form-group">
        <div class="image-container" onclick="document.getElementById('product-image1').click()">
          <img class="preview-image" id="preview1" src="#" alt="Preview Image">
          <div class="image-label">Image 1 (Potion, Book, etc.)</div>
          <input type="file" id="product-image1" name="Image1" accept="image/*" required onchange="previewImage(event, 'preview1')" class="file-input">
        </div>
        <div class="image-container" onclick="document.getElementById('product-image2').click()">
          <img class="preview-image" id="preview2" src="#" alt="Preview Image">
          <div class="image-label">Image 2 (Optional)</div>
          <input type="file" id="product-image2" name="Image2" accept="image/*" required onchange="previewImage(event, 'preview2')" class="file-input">
        </div>

        <div class="image-container" onclick="document.getElementById('product-image3').click()">
          <img class="preview-image" id="preview3" src="#" alt="Preview Image">
          <div class="image-label">Image 3 (Optional)</div>
          <input type="file" id="product-image3" name="Image3" accept="image/*" required onchange="previewImage(event, 'preview3')" class="file-input">
        </div>
      </div>

      <button type="submit" name="submit" class="submit-btn">Submit Product <i class="fas fa-star"></i></button>
    </form>
  </div>

  <script>
    function previewImage(event, previewId) {
      const input = event.target;
      const reader = new FileReader();
      reader.onload = function() {
        const preview = document.getElementById(previewId);
        preview.src = reader.result;
        preview.style.display = 'block';
      };
      reader.readAsDataURL(input.files[0]);
    }
  </script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
</body>

</html>      