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
    <a href="dashboard.php">Dashboard</a>
    <a href="category.php">Categories</a>
    <a href="../services/logout.php">Logout</a>

    <h1>Data Users</h1>

    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Role</th>
            <th>Aksi</th>
        </tr>
        <?php $i = 1 ?>
        <?php foreach (selectAll() as $row) : ?>
            <tr>
                <td><?= $i++ ?></td>
                <td><?= $row['name'] ?></td>
                <td><?= $row['email'] ?></td>
                <td><?= $row['roles'] ?></td>
                <td><a href="<?= BASEURL ?>/view/user_edit.php?id=<?= $row['id'] ?>">Edit</a> | <a href="<?= BASEURL ?>/view/dashboard.php?id=<?= $row['id'] ?>">Hapus</a></td>
            </tr>
        <?php endforeach; ?>
    </table>

</body>

</html>