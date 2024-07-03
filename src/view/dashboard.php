<?php

require_once '../config/conn.php';
require_once '../services/user.php';

if (!isset($_SESSION['is_login'])) {
    header('Location: ' . BASEURL . '/view/login.php');
    exit;
}

if (isset($_GET['id'])) {
    delete($_GET['id']);
    echo "
    <script>
        alert('User berhasil dihapus')
        document.location.href = './dashboard.php'
    </script>";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman dashboard</title>
</head>

<body>

    <a href="user.php">Users</a>
    <a href="category.php">Categories</a>
    <a href="item.php">Items</a>
    <a href="../services/logout.php">Logout</a>

</body>

</html>