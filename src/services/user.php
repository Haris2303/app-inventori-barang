<?php

require_once '../config/conn.php';

function selectAll()
{
    global $connection;
    $sql = "SELECT * FROM users";
    return $connection->query($sql);
}

function selectById($id)
{
    global $connection;
    $sql = "SELECT * FROM users WHERE id = $id";
    return $connection->query($sql);
}

function delete($id)
{
    global $connection;
    $sql = "DELETE FROM users WHERE id = $id";
    return $connection->query($sql);
}

function update($id, $data)
{
    global $connection;
    $name = $data['name'];
    $email = $data['email'];

    $sql = "UPDATE users SET name = '$name', email = '$email' WHERE id = $id";
    return $connection->query($sql);
}
