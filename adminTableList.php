<?php
include('/home/betafactor/public_html/config/conn.php'); // Include your database connection file

// Function to fetch users by role with pagination
function fetchUsersByRole($pdo, $role, $page, $rowsPerPage = 5) {
    // Calculate the offset for the query
    $offset = ($page - 1) * $rowsPerPage;
    $stmt = $pdo->prepare("SELECT UserID, username, email, date_registered FROM Users WHERE role = ? LIMIT ?, ?");
    $stmt->bindParam(1, $role, PDO::PARAM_STR);
    $stmt->bindParam(2, $offset, PDO::PARAM_INT);
    $stmt->bindParam(3, $rowsPerPage, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Function to count total users by role
function countUsersByRole($pdo, $role) {
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM Users WHERE role = ?");
    $stmt->execute([$role]);
    return $stmt->fetchColumn();
}

// Get current page number or set default to 1
$page_b = isset($_GET['page_b']) ? (int)$_GET['page_b'] : 1;
$page_s = isset($_GET['page_s']) ? (int)$_GET['page_s'] : 1;

// Fetch users with pagination
$users_b = fetchUsersByRole($pdo, 'b', $page_b);
$users_s = fetchUsersByRole($pdo, 's', $page_s);

// Count total users for pagination
$totalUsers_b = countUsersByRole($pdo, 'b');
$totalUsers_s = countUsersByRole($pdo, 's');

// Calculate total pages
$totalPages_b = ceil($totalUsers_b / 5);
$totalPages_s = ceil($totalUsers_s / 5);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Magical User Tables with Pagination</title>
<style>
    body {
        font-family: 'Arial', sans-serif;
        background: #120136; /* Dark blue background */
        color: #C6C6C6; /* Light gray text for readability */
    }
    table {
        width: 80%;
        margin: 20px auto;
        border-collapse: collapse;
        background: rgba(10, 25, 47, 0.9); /* Dark background for the table */
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.5);
        border-radius: 8px; /* Rounded corners for the table */
        overflow: hidden;
    }
    th, td {
        padding: 10px;
        border: 1px solid #182848; /* Dark border color */
        text-align: center;
    }
    th {
        background-color: #1e1e2f; /* Even darker header cells */
        color: #D4D4D8; /* Brighter text for headers */
    }
    td:hover {
        background-color: rgba(255, 255, 255, 0.2); /* Hover effect with light highlighting */
    }
    .pagination {
        text-align: center;
        margin: 20px 0;
    }
    .pagination a {
        color: #FFFFFF;
        padding: 8px 16px;
        text-decoration: none;
        transition: background-color .3s, transform .3s;
        border-radius: 5px;
        background-color: #6a11cb;
    }
    .pagination a:hover {
        background-color: #2575fc;
        transform: translateY(-5px);
    }
    h2 {
        text-align: center;
        color: #A2A2D0; /* Light purple color for titles */
    }
    .table-hover tbody tr:hover {
        background-color: #f5f5f5; /* Light grey background on hover */
        cursor: pointer; /* Changes cursor to indicate interactivity */
    }
</style>
</head>
<body>
    <h2>Users with Role 'b'</h2>
    <table>
    <tr>
    <th>UserID</th>
    <th>Username</th>
    <th>Email</th>
    <th>Date Registered</th>
    </tr>
    <?php foreach ($users_b as $user): ?>
    <tr>
        <td><?= htmlspecialchars($user['UserID']) ?></td>
        <td><?= htmlspecialchars($user['username']) ?></td>
        <td><?= htmlspecialchars($user['email']) ?></td>
        <td><?= htmlspecialchars($user['date_registered']) ?></td>
    </tr>
    <?php endforeach; ?>
    </table>
    <?php if ($totalPages_b > 1): ?>
    <div class="pagination">
        <?php if ($page_b > 1): ?>
        <a href="?page_b=<?= $page_b - 1 ?>">Previous</a>
        <?php endif; ?>
        <?php if ($page_b < $totalPages_b): ?>
        <a href="?page_b=<?= $page_b + 1 ?>">Next</a>
        <?php endif; ?>
    </div>
    <?php endif; ?>

    <h2>Users with Role 's'</h2>
    <table>
    <tr>
    <th>UserID</th>
    <th>Username</th>
    <th>Email</th>
    <th>Date Registered</th>
    </tr>
    <?php foreach ($users_s as $user): ?>
    <tr>
        <td><?= htmlspecialchars($user['UserID']) ?></td>
        <td><?= htmlspecialchars($user['username']) ?></td>
        <td><?= htmlspecialchars($user['email']) ?></td>
        <td><?= htmlspecialchars($user['date_registered']) ?></td>
    </tr>
    <?php endforeach; ?>
    </table>
    <?php if ($totalPages_s > 1): ?>
    <div class="pagination">
        <?php if ($page_s > 1): ?>
        <a href="?page_s=<?= $page_s - 1 ?>">Previous</a>
        <?php endif; ?>
        <?php if ($page_s < $totalPages_s): ?>
        <a href="?page_s=<?= $page_s + 1 ?>">Next</a>
        <?php endif; ?>
    </div>
    <?php endif; ?>

</body>
</html>
