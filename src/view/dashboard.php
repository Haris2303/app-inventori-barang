<?php

require_once '../services/user.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman dashboard</title>
</head>

<body>
<<<<<<< HEAD
    <a href="../services/logout.php">Logout</a>

=======
>>>>>>> 8d8061b6f1a00e21ec376ba5a54e2c25dd384662
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
                <td><a href="#">Edit</a> | <a href="#">Hapus</a></td>
            </tr>
        <?php endforeach; ?>
    </table>

</body>

</html>