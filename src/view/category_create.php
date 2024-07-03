<?php

require_once '../services/category.php';

if (!isset($_SESSION['is_login'])) {
    header('Location: ' . BASEURL . '/view/dashboard.php');
    exit;
}

if (isset($_POST['tambah'])) {
    if (createCategory($_POST)) {
        echo "
        <script>
            alert('Category berhasil ditambahkan')
            document.location.href = '" . BASEURL . "/view/category.php'
        </script>";
        exit;
    } else {
        echo "
        <script>
            alert('Category gagal ditambahkan')
            document.location.href = '" . BASEURL . "/view/category.php'
        </script>";
        exit;
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Tambah Category</title>
</head>

<body>

    <h1>Tambah Category</h1>
    <form action="" method="post">
        <label for="name">Nama Categori</label>
        <input type="text" name="name" id="name"><br>
        <label for="description">Deskripsi</label>
        <input type="text" name="description" id="description"><br>
        <button type="submit" name="tambah">Tambah</button>
    </form>

</body>

</html>