<?php
include('/home/betafactor/public_html/config/conn.php');
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false
    ]);

    // Prepare and execute query
    $stmt = $pdo->query("SELECT role, COUNT(*) as count FROM Users GROUP BY role");

    $data = $stmt->fetchAll();

    // Convert data to JSON
    echo json_encode($data);

} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}


?>