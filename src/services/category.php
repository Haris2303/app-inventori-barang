<?php

require_once '../config/conn.php';

function selectAll()
{
    global $connection;
    $sql = "SELECT * FROM categories";
    return $connection->query($sql);
}

function delete($id)
{
    global $connection;
    $sql = "DELETE FROM categories WHERE id = $id";
    return $connection->query($sql);
}

function create($data)
{
    $name = $data['name'];
    $description = $data['description'];

    global $connection;
    $sql = "INSERT INTO categories VALUES(NULL, '$name', '$description', NOW(), NOW())";
    return $connection->query($sql);
}
