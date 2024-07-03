<?php

require_once '../config/conn.php';

function selectAllItems()
{
    global $connection;
    $sql = "SELECT * FROM categories";
    return $connection->query($sql);
}

function deleteItem($id)
{
    global $connection;
    $sql = "DELETE FROM categories WHERE id = $id";
    return $connection->query($sql);
}

function createItem($data)
{
    global $connection;

    $name = $data['name'];
    $description = $data['description'];
    $price = $data['price'];
    $stock = $data['stock'];
    $category_id = $data['category_id'];
    $user_id = $data['user_id'];

    // insert stock
    $sql = "INSERT INTO stocks VALUES(NULL, $stock, NOW(), NOW())";

    $stock_id = NULL;
    if ($connection->query($sql)) {
        $stock_id = $connection->insert_id;
    }

    $sql = "INSERT INTO items VALUES(NULL, '$name', '$description', '$price', $stock_id, $category_id, $user_id, NOW(), NOW())";
    return $connection->query($sql);
}
