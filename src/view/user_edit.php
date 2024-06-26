<?php

require_once '../services/user.php';

if (!isset($_SESSION['is_login'])) {
    header('Location: ' . BASEURL . '/view/login.php');
    exit;
}

// ambil id pada url
$id = $_GET['id'];

// ambil data user berdasarkan id
$user = selectById($id)->fetch_assoc();

// cek apakah tombol edit ditekan
if (isset($_POST['edit'])) {
    // cek update data user
    if (update($id, $_POST)) {
        echo "
        <script>
            alert('User berhasil diedit')
            document.location.href = '" . BASEURL . "/view/dashboard.php'
        </script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Edit</title>
</head>

<body>

    <h1>Edit User</h1>
    <form action="" method="post">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" value="<?= $user['name'] ?>"><br>
        <label for="email">Email</label>
        <input type="email" name="email" id="email" value="<?= $user['email'] ?>"><br>
        <button type="submit" name="edit">Edit</button>
    </form>

</body>

</html>