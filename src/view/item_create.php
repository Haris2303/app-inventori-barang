<?php

require_once '../services/category.php';
require_once '../services/item.php';

if (!isset($_SESSION['is_login'])) {
    header('Location: ' . BASEURL . '/view/dashboard.php');
    exit;
}

if (isset($_POST['tambah'])) {
    if (createItem($_POST)) {
        echo "
        <script>
            alert('Item berhasil ditambahkan')
            document.location.href = '" . BASEURL . "/view/item.php'
        </script>";
        exit;
    } else {
        echo "
        <script>
            alert('Item gagal ditambahkan')
            document.location.href = '" . BASEURL . "/view/item.php'
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

    <h1>Tambah Item</h1>
    <form action="" method="post">
        <input type="hidden" name="user_id" value="<?= $_SESSION['user_id'] ?>">
        <label for="name">Nama Item</label>
        <input type="text" name="name" id="name"><br>
        <label for="description">Deskripsi</label>
        <input type="text" name="description" id="description"><br>
        <label for="price">Harga</label>
        <input type="text" name="price" id="price"><br>
        <label for="stock">Stok</label>
        <input type="number" name="stock" id="stock"><br>
        <label for="category_id">Category</label>
        <select name="category_id" id="category_id">
            <?php foreach (selectAllCategory() as $row) : ?>
                <option value="<?= $row['id'] ?>"><?= $row['name'] ?></option>
            <?php endforeach ?>
        </select>
        <button type="submit" name="tambah">Tambah</button>
    </form>

</body>

</html>