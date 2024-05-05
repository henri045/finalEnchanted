<?php
session_start();
include('/home/betafactor/public_html/config/conn.php');
try {
    $sql = "SELECT username, email FROM Users WHERE role = 'b'";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Liste de tous les acheteurs</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #121212; /* Dark background */
            color: #E0E0E0; /* Light text */
            font-family: 'Garamond', serif; /* Elegant font */
        }
        h2 {
            color: #FFD700; /* Golden color for headings */
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.6); /* Text shadow for depth */
        }
        .list-group-item {
            background-color: #333; /* Darker elements */
            border: 1px solid #444; /* Slight border for definition */
            color: #E0E0E0; /* Maintain light text in elements */
            transition: transform 0.3s ease-in-out; /* Smooth transform */
        }
        .list-group-item:hover {
            transform: scale(1.05); /* Scale up on hover */
            background-color: #1c1c1c; /* Slightly lighter on hover */
        }
        .container {
            border-left: 5px solid #FFD700; /* Magical line to the left */
            padding-left: 20px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h2>Liste de tous les acheteurs</h2>
        <?php 
        if ($stmt->rowCount() > 0) {
            echo '<ul class="list-group">';
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo '<li class="list-group-item">';
                echo 'Username: ' . htmlspecialchars($row['username']) . ' - Email: ' . htmlspecialchars($row['email']);
                echo '</li>';
            }
            echo '</ul>';
        } else {
            echo '<p>No users found with role "b".</p>';
        }
        ?>
    </div>
</body>
</html>
<?php
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
